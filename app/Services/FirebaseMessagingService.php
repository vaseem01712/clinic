<?php

namespace App\Services;

use App\Models\DeviceToken;
use App\Models\User;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class FirebaseMessagingService
{
    public function sendToUser(User $user, string $title, string $body, array $data = []): void
    {
        if (! config('services.firebase.project_id') || ! config('services.firebase.service_account')) {
            Log::warning('Firebase push is not configured', ['user_id' => $user->id]);
            return;
        }

        foreach ($user->deviceTokens()->pluck('token') as $token) {
            try {
                $response = Http::withOptions(['verify' => $this->caBundle()])->withToken($this->accessToken())->post(
                    'https://fcm.googleapis.com/v1/projects/'.config('services.firebase.project_id').'/messages:send',
                    ['message' => [
                        'token' => $token,
                        'notification' => compact('title', 'body'),
                        'data' => collect($data)->map(fn ($v) => (string) $v)->all(),
                        'webpush' => [
                            'headers' => ['Urgency' => 'high'],
                            'fcm_options' => ['link' => ($data['url'] ?? '') ?: route('appointments.create')],
                        ],
                    ]]
                );
                if ($response->status() === 404) DeviceToken::where('token', $token)->delete();
                $response->throw();
                Log::info('Firebase push accepted', ['user_id' => $user->id, 'message_id' => $response->json('name')]);
            } catch (\Throwable $exception) {
                Log::warning('Firebase push could not be delivered', ['user_id' => $user->id, 'error' => $exception->getMessage()]);
            }
        }
    }

    private function accessToken(): string
    {
        return Cache::remember('firebase.fcm.access-token', now()->addMinutes(55), function (): string {
            $account = json_decode(file_get_contents(config('services.firebase.service_account')), true, 512, JSON_THROW_ON_ERROR);
            $now = time();
            $head = $this->base64Url(json_encode(['alg' => 'RS256', 'typ' => 'JWT']));
            $claim = $this->base64Url(json_encode(['iss' => $account['client_email'], 'scope' => 'https://www.googleapis.com/auth/firebase.messaging', 'aud' => 'https://oauth2.googleapis.com/token', 'iat' => $now, 'exp' => $now + 3600]));
            if (! openssl_sign("{$head}.{$claim}", $signature, $account['private_key'], OPENSSL_ALGO_SHA256)) {
                throw new \RuntimeException('Firebase credential could not sign an access token.');
            }
            $assertion = "{$head}.{$claim}.".$this->base64Url($signature);

            return Http::withOptions(['verify' => $this->caBundle()])->asForm()->post('https://oauth2.googleapis.com/token', ['grant_type' => 'urn:ietf:params:oauth:grant-type:jwt-bearer', 'assertion' => $assertion])->throw()->json('access_token');
        });
    }

    private function caBundle(): string|bool
    {
        $path = config('services.firebase.ca_bundle');

        return $path && is_file($path) ? $path : true;
    }

    private function base64Url(string $value): string { return rtrim(strtr(base64_encode($value), '+/', '-_'), '='); }
}
