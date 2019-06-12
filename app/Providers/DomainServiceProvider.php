<?php


namespace Mobly\Providers;


use Illuminate\Support\ServiceProvider;
use Mobly\Services\Domain\Core\Contracts\UserDomainService as UserDomainServiceInterface;
use Mobly\Services\Domain\Core\UserDomainService;
use Mobly\Services\Infrastructure\Persistence\Contracts\UserPersistenceService as UserPersistenceServiceInterface;

class DomainServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        #Core
        $this->app->bind(UserDomainServiceInterface::class, function ($app) {
            return new UserDomainService($app[UserPersistenceServiceInterface::class]);
        });
    }
}
