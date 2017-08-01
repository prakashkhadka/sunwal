<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Category;
use View;
class NavComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        
    //    view()->composer('layouts.masterLayout.home', function($view){
    //        $view->with('catg', Category::all());
    //    });

      //  view()->composer('layouts.masterLayout.navigationMenus.makeup', function($view){
      //      $view->with('navCat', Category::where('id', 1));
      //  });
        $value = Category::all();
        View::share('catg', $value);


    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
