<?php


namespace Mobly\Providers;


use Illuminate\Support\ServiceProvider;
use Mobly\Models\User;
use Mobly\Repositories\Contracts\UserRepository as UserRepositoryInterface;
use Mobly\Repositories\UserRepository;

class RepositoryServiceProvider extends ServiceProvider
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
        $this->app->bind(UserRepositoryInterface::class, function ($app) {
            return new UserRepository($app[User::class]);
        });

    }
}
