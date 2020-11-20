<?php

namespace App\Providers;

use App\Repositories\AboutRepository;
use App\Repositories\AboutRepositoryEloquent;
use App\Repositories\BannerRepository;
use App\Repositories\BannerRepositoryEloquent;
use App\Repositories\BrandRepository;
use App\Repositories\BrandRepositoryEloquent;
use App\Repositories\BrandSegmentRepository;
use App\Repositories\BrandSegmentRepositoryEloquent;
use App\Repositories\CompanyDataRepository;
use App\Repositories\CompanyDataRepositoryEloquent;
use App\Repositories\ContactRepository;
use App\Repositories\ContactRepositoryEloquent;
use App\Repositories\FAQRepository;
use App\Repositories\FAQRepositoryEloquent;
use App\Repositories\MenuRepository;
use App\Repositories\MenuRepositoryEloquent;
use App\Repositories\NewsletterRepository;
use App\Repositories\NewsletterRepositoryEloquent;
use App\Repositories\PersonRepository;
use App\Repositories\PersonRepositoryEloquent;
use App\Repositories\ProductCategoryRepository;
use App\Repositories\ProductCategoryRepositoryEloquent;
use App\Repositories\ProductRepository;
use App\Repositories\ProductRepositoryEloquent;
use App\Repositories\SegBrandChoosesRepository;
use App\Repositories\SegBrandChoosesRepositoryEloquent;
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
        $this->app->bind(BrandRepository::class, BrandRepositoryEloquent::class);
        $this->app->bind(BrandSegmentRepository::class, BrandSegmentRepositoryEloquent::class);
        $this->app->bind(SegBrandChoosesRepository::class, SegBrandChoosesRepositoryEloquent::class);
        $this->app->bind(AboutRepository::class, AboutRepositoryEloquent::class);
        $this->app->bind(FAQRepository::class, FAQRepositoryEloquent::class);
        $this->app->bind(ContactRepository::class, ContactRepositoryEloquent::class);
        $this->app->bind(CompanyDataRepository::class, CompanyDataRepositoryEloquent::class);
        $this->app->bind(NewsletterRepository::class, NewsletterRepositoryEloquent::class);
        $this->app->bind(BannerRepository::class, BannerRepositoryEloquent::class);
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
