<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthenticateDoctor
{
    public function handle(Request $request, Closure $next): Response
    {
        if (! $request->user() || ! $request->user()->isDoctor()) {
            return redirect()->route('doctor.login')->withErrors(['email' => 'Please sign in as a doctor.']);
        }

        if (! $request->user()->doctor || ! $request->user()->doctor->is_active) {
            auth()->logout();
            abort(403, 'This doctor account is inactive.');
        }

        return $next($request);
    }
}
