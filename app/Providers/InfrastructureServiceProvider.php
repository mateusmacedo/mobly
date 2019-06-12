<?php


namespace Mobly\Providers;


use Illuminate\Support\ServiceProvider;
use Mobly\Services\Infrastructure\Persistence\Contracts\UserPersistenceService as UserPersistenceServiceInterface;
use Mobly\Services\Infrastructure\Persistence\UserPersistenceService;

class InfrastructureServiceProvider extends ServiceProvider
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
        #Persistence
        $this->app->bind(UserPersistenceServiceInterface::class, UserPersistenceService::class);

    }
}
