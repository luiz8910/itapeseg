<?php

namespace App\Providers;

use App\Repositories\MenuRepository;
use App\Repositories\MenuRepositoryEloquent;
use App\Repositories\PersonRepository;
use App\Repositories\PersonRepositoryEloquent;
use App\Repositories\ProductCategoryRepository;
use App\Repositories\ProductCategoryRepositoryEloquent;
use App\Repositories\ProductRepository;
use App\Repositories\ProductRepositoryEloquent;
use App\Repositories\SubCatChooseRepository;
use App\Repositories\SubCatChooseRepositoryEloquent;
use App\Repositories\SubCategoryRepository;
use App\Repositories\SubCategoryRepositoryEloquent;
use App\Repositories\UserRepository;
use App\Repositories\UserRepositoryEloquent;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(UserRepository::class, UserRepositoryEloquent::class);
        $this->app->bind(PersonRepository::class, PersonRepositoryEloquent::class);
        $this->app->bind(ProductRepository::class, ProductRepositoryEloquent::class);
        $this->app->bind(ProductCategoryRepository::class, ProductCategoryRepositoryEloquent::class);
        $this->app->bind(SubCategoryRepository::class, SubCategoryRepositoryEloquent::class);
        $this->app->bind(SubCatChooseRepository::class, SubCatChooseRepositoryEloquent::class);
        $this->app->bind(MenuRepository::class, MenuRepositoryEloquent::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
