<?php

namespace App\Providers;
use App\Model\CatModel;
use DB;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $catModel = new CatModel();
        $cats = $catModel->getItems();
        $cat1 = $catModel->getParent();
        $roleUser=DB::table('role')->get();
        view()->share(compact('cats'));
         view()->share(compact('cat1'));
          view()->share(compact('roleUser'));
    }
}
