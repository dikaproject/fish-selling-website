<?php

namespace App\Providers;

use App\Interfaces\AuthRepositoryInterface;
use App\Interfaces\WriterRepositoryInterface;
use App\Interfaces\RoleRepositoryInterface;
use App\Interfaces\PermissionRepositoryInterface;
use App\Interfaces\ArticleCategoryRepositoryInterface;
use App\Interfaces\ArticleTagRepositoryInterface;
use App\Interfaces\ArticleRepositoryInterface;
use App\Interfaces\ProductCategoryRepositoryInterface;
use App\Interfaces\ProductRepositoryInterface;


use App\Repositories\AuthRepository;
use App\Repositories\WriterRepository;
use App\Repositories\RoleRepository;
use App\Repositories\PermissionRepository;
use App\Repositories\ArticleCategoryRepository;
use App\Repositories\ArticleTagRepository;
use App\Repositories\ArticleRepository;
use App\Repositories\ProductCategoryRepository;
use App\Repositories\ProductRepository;


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
        $this->app->bind(AuthRepositoryInterface::class, AuthRepository::class);
        $this->app->bind(\App\Interfaces\ExampleRepositoryInterface::class, \App\Repositories\ExampleRepository::class);
        $this->app->bind(WriterRepositoryInterface::class, WriterRepository::class);
        $this->app->bind(RoleRepositoryInterface::class, RoleRepository::class);
        $this->app->bind(PermissionRepositoryInterface::class, PermissionRepository::class);
        $this->app->bind(ArticleCategoryRepositoryInterface::class, ArticleCategoryRepository::class);
        $this->app->bind(ArticleTagRepositoryInterface::class, ArticleTagRepository::class);
        $this->app->bind(ArticleRepositoryInterface::class, ArticleRepository::class);
        $this->app->bind(ProductCategoryRepositoryInterface::class, ProductCategoryRepository::class);
        $this->app->bind(ProductRepositoryInterface::class, ProductRepository::class);

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
