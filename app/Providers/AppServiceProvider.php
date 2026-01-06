<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('components.navbar', function ($view) {

            $user = auth()->user();

            $notifications = collect();
            $unreadCount = 0;

            if ($user) {
                $notifications = $user->unreadNotifications()
                    ->latest()
                    ->take(5)
                    ->get();

                $unreadCount = $user->unreadNotifications()->count();
            }

            $view->with(compact('notifications', 'unreadCount'));
        });
    }
}
