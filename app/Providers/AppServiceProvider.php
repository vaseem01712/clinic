<?php
namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void {}
    public function boot(): void
    {
        Schema::defaultStringLength(191);
        RateLimiter::for('doctor-login', fn($request)=>Limit::perMinute(5)->by(strtolower((string)$request->input('email')).'|'.$request->ip()));
    }
}
