<?php

namespace App\Http\Controllers;

use App\Models\DeviceToken;
use App\Models\User;
use Illuminate\Http\Request;

class PushSubscriptionController extends Controller
{
    public function store(Request $request)
    {
        return $this->storeToken($request, $request->user());
    }

    public function storeForLatestAppointment(Request $request)
    {
        $patientId = $request->session()->get('appointment_push_patient_id');
        abort_unless($patientId, 403);

        return $this->storeToken($request, User::whereKey($patientId)->where('role', 'patient')->firstOrFail());
    }

    private function storeToken(Request $request, User $user)
    {
        $data = $request->validate(['token' => ['required', 'string', 'max:4096'], 'platform' => ['nullable', 'string', 'max:32']]);
        DeviceToken::updateOrCreate(['token_hash' => hash('sha256', $data['token'])], [
            'user_id' => $user->id, 'token' => $data['token'], 'platform' => $data['platform'] ?? 'web', 'last_seen_at' => now(),
        ]);
        return response()->json(['ok' => true]);
    }
}
