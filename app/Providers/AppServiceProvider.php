<?php

namespace App\Providers;

use App\Models\Prefix;
use App\Models\Category;
use App\Models\Announcement;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    
    public function register()
    {
        
    }

    public function boot()
    {
        if(Schema::hasTable('categories') && Schema::hasTable('announcements') && Schema::hasTable('prefixes')){

            
            
            $categories = Category::all();
            View::share('categories', $categories);
            $announcements = Announcement::all();
            View::share('announcements', $announcements);
            $prefixes = Prefix::all();
            View::share('prefixes', $prefixes);


        }
        Paginator::useBootstrap();


    }
}
