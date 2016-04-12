<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Domain\Repository\AccountRepository;
use App\Infraestructure\Persistence\Doctrine\DoctrineAccountRepository;
use App\Domain\Entities\Account;

use App\Domain\Repository\QuantityRepository;
use App\Infraestructure\Persistence\Doctrine\DoctrineQuantityRepository;
use App\Domain\Entities\Quantity;

use App\Domain\Repository\UnitRepository;
use App\Infraestructure\Persistence\Doctrine\DoctrineUnitRepository;
use App\Domain\Entities\Unit;

use App\Domain\Entities\Transference;
use App\Domain\Repository\TransferenceRepository;

use App\Infraestructure\Persistence\Doctrine\DoctrineTransferenceRepository;

class RepositoryAccountServiceProvider extends ServiceProvider {

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

     
          $this->app->bind(AccountRepository::class, function($app) {
            return new DoctrineAccountRepository(
                    $app['em']->getRepository(Account::class),
                    $app['Doctrine\ORM\EntityManagerInterface'] 
            );
        });
        
          $this->app->bind(QuantityRepository::class, function($app) {

            return new DoctrineQuantityRepository(
                    $app['em']->getRepository(Quantity::class),
                    $app['Doctrine\ORM\EntityManagerInterface']
            );
        });
                $this->app->bind(UnitRepository::class, function($app) {

            return new DoctrineUnitRepository(
                    $app['em']->getRepository(Unit::class),
                    $app['Doctrine\ORM\EntityManagerInterface']
            );
        });
    
            $this->app->bind(TransferenceRepository::class, function($app) {

            return new DoctrineTransferenceRepository(
                    $app['em']->getRepository(Transference::class),
                    $app['Doctrine\ORM\EntityManagerInterface']
            );
        });
       
    }

}
