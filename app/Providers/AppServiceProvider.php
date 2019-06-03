<?php

namespace App\Providers;
use App\Room;
use App\Observers\RoomObserver;
use App\Community;
use App\CommunityObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        

        Room::observe(RoomObserver::class);
        Community::observe(CommunityObserver::class);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        
    }
}
