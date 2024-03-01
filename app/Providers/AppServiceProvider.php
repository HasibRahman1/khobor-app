<?php

namespace App\Providers;

use App\Models\Ad;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\ServiceProvider;
use View;

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
        View::composer('*',function ($view){
            $view->with('firstAd', Ad::where(['status' => 1, 'home_status' => 1, 'position' => '1'])->get()->first());
        });
        View::composer('*',function ($view){
            $view->with('headCategories', Category::where(['status' => 1, 'home_status' => 1])->orderBy('id', 'desc')->take(5)->get(['id','name']));
            $view->with('footerTopPosts', Post::where(['status'=> 1, 'top_status' => 1])->orderBy('id', 'desc')->take(3)->get());
            $view->with('footerPopularPosts', Post::where(['status'=> 1, 'popular_status' => 1])->orderBy('id', 'desc')->take(3)->get());
            $view->with('breakingPosts', Post::where(['status'=> 1, 'breaking_status' => 1])->orderBy('id', 'desc')->get());
        });
    }
}
