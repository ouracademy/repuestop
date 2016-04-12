<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Infraestructure\Persistence\Doctrine\DoctrineProductRepository;
use App\Infraestructure\Persistence\Doctrine\DoctrineOrderRepository;
use App\Infraestructure\Persistence\Doctrine\DoctrineOrderLineRepository;
use App\Infraestructure\Persistence\Doctrine\DoctrineInstrumentRepository;
use App\Infraestructure\Persistence\Doctrine\DoctrineBrandRepository;
use App\Domain\Repository\OrderRepository;
use App\Domain\Repository\OrderLineRepository;
use App\Domain\Repository\ProductRepository;
use App\Domain\Repository\InstrumentRepository;
use App\Domain\Repository\BrandRepository;
use App\Domain\Entities\Order;
use App\Domain\Entities\Product;
use App\Domain\Entities\Instrument;
use App\Domain\Entities\Brand;
use App\Domain\Entities\LineOrder;

class RepositoryServiceProvider extends ServiceProvider {

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot() {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register() {

        $this->app->bind(OrderRepository::class, function($app) {

            return new DoctrineOrderRepository(
                    $app['em']->getRepository(Order::class), $app['Doctrine\ORM\EntityManagerInterface']
            );
        });
        $this->app->bind(OrderLineRepository::class, function($app) {

            return new DoctrineOrderLineRepository(
                    $app['em']->getRepository(LineOrder::class), $app['Doctrine\ORM\EntityManagerInterface']
            );
        });

        $this->app->bind(ProductRepository::class, function($app) {

            return new DoctrineProductRepository(
                    $app['em']->getRepository(Product::class), $app['Doctrine\ORM\EntityManagerInterface']
            );
        });
        $this->app->bind(InstrumentRepository::class, function($app) {

            return new DoctrineInstrumentRepository(
                    $app['em']->getRepository(Instrument::class), $app['Doctrine\ORM\EntityManagerInterface']
            );
        });

        $this->app->bind(BrandRepository::class, function($app) {

            return new DoctrineBrandRepository(
                    $app['em']->getRepository(Brand::class), $app['Doctrine\ORM\EntityManagerInterface']
            );
        });
    }

}
