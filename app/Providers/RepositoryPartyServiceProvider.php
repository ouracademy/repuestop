<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Domain\Repository\PersonRepository;
use App\Domain\Repository\CompanyRepository;
use App\Domain\Repository\PartyRepository;
use App\Infraestructure\Persistence\Doctrine\DoctrinePersonRepository;
use App\Infraestructure\Persistence\Doctrine\DoctrineCompanyRepository;
use App\Infraestructure\Persistence\Doctrine\DoctrinePartyRepository;

use App\Domain\Entities\Party;
use App\Domain\Entities\Person;
use App\Domain\Entities\Company;


class RepositoryPartyServiceProvider extends ServiceProvider {

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

     
          $this->app->bind(PersonRepository::class, function($app) {

            return new DoctrinePersonRepository(
                    $app['em']->getRepository(Person::class),
                    $app['Doctrine\ORM\EntityManagerInterface']
            );
        });
         $this->app->bind(CompanyRepository::class, function($app) {

            return new DoctrineCompanyRepository(
                    $app['em']->getRepository(Company::class),
                    $app['Doctrine\ORM\EntityManagerInterface']
            );
        });
            $this->app->bind(PartyRepository::class, function($app) {

            return new DoctrinePartyRepository(
                    $app['em']->getRepository(Party::class),
                    $app['Doctrine\ORM\EntityManagerInterface']
                    
       
            );
        });
      
       
    }

}
