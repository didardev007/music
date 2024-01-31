<?php

namespace App\Providers;


use App\Models\Genre;
use App\Models\Playlist;
use App\Models\Track;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades;
use Illuminate\Pagination\Paginator;
use App\Models\Album;
use App\Models\Artist;
use Illuminate\Support\Facades\Auth;
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
        Model::preventLazyLoading(! app()->isProduction());
        Paginator::useBootstrapFive();

        Facades\View::composer('app.nav', function (View $view) {
            $genres = Genre::orderBy('name')
                ->get();

            $tracks = Track::orderBy('id')
                ->get();

            $artists = Artist::orderBy('name')
                ->get();

            $albums = Album::orderBy('name')
                ->get();

            $playlists = Playlist::orderBy('name')
                ->get();

            $user = Auth::user();

            $view->with([
                'genres' => $genres,
                'tracks' => $tracks,
                'artists' => $artists,
                'albums' => $albums,
                'playlists' => $playlists,
                'user' => $user,
            ]);
        });
    }
}
