<?php

namespace App\Providers;

use App\Contracts\Dao\Movie\MovieDaoInterface;
use App\Contracts\Services\Movie\MovieServiceInterface;

use App\Contracts\Dao\Genre\GenreDaoInterface;
use App\Contracts\Services\Genre\GenreServiceInterface;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Contracts\Dao\Movie\MovieDaoInterface','App\Dao\Movie\MovieDao');
        $this->app->bind('App\Contracts\Services\Movie\MovieServiceInterface','App\Services\Movie\MovieService');

        $this->app->bind('App\Contracts\Dao\Genre\GenreDaoInterface','App\Dao\Genre\GenreDao');
        $this->app->bind('App\Contracts\Services\Genre\GenreServiceInterface','App\Services\Genre\GenreService');
 
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }
}
