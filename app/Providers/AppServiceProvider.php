<?php

namespace App\Providers;

use App\Models\Album;
use App\Models\Artist;
use App\Models\Genre;
use App\Models\Playlist;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\View;
use Laravel\Sanctum\Sanctum;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        Sanctum::ignoreMigrations();
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Model::preventLazyLoading();
        Paginator::useBootstrapFive();

        Facades\View::composer('app.nav', function (View $view) {
            $genres = Genre::orderBy('name')
                ->get();

            $artists = Artist::orderBy('name')
                ->get();

            $albums = Album::orderBy('name')
                ->get();

            $playlists = Playlist::orderBy('name')
                ->get();

            $view->with([
                'genres' => $genres,
                'artists' => $artists,
                'albums' => $albums,
                'playlists' => $playlists,
                'user' => auth()->user(),
            ]);
        });
    }
}
