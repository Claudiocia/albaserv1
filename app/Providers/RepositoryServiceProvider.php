<?php

namespace App\Providers;

use App\Models\Ala;
use App\Models\MesaDir;
use App\Repositories\AlaRepository;
use App\Repositories\AlaRepositoryEloquent;
use App\Repositories\AlbaRepository;
use App\Repositories\AlbaRepositoryEloquent;
use App\Repositories\AmbienteRepository;
use App\Repositories\AmbienteRepositoryEloquent;
use App\Repositories\AndarRepository;
use App\Repositories\AndarRepositoryEloquent;
use App\Repositories\DepartRepository;
use App\Repositories\DepartRepositoryEloquent;
use App\Repositories\MesaDirRepository;
use App\Repositories\MesaDirRepositoryEloquent;
use App\Repositories\PredioRepository;
use App\Repositories\PredioRepositoryEloquent;
use App\Repositories\RoleRepository;
use App\Repositories\RoleRepositoryEloquent;
use App\Repositories\SuperRepository;
use App\Repositories\SuperRepositoryEloquent;
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
        $this->app->bind(AlbaRepository::class, AlbaRepositoryEloquent::class);
        $this->app->bind(PredioRepository::class, PredioRepositoryEloquent::class);
        $this->app->bind(SuperRepository::class, SuperRepositoryEloquent::class);
        $this->app->bind(DepartRepository::class, DepartRepositoryEloquent::class);
        $this->app->bind(UserRepository::class, UserRepositoryEloquent::class);
        $this->app->bind(MesaDirRepository::class, MesaDirRepositoryEloquent::class);
        $this->app->bind(RoleRepository::class, RoleRepositoryEloquent::class);
        $this->app->bind(AmbienteRepository::class, AmbienteRepositoryEloquent::class);
        $this->app->bind(AndarRepository::class, AndarRepositoryEloquent::class);
        $this->app->bind(AlaRepository::class, AlaRepositoryEloquent::class);
        //:end-bindings:
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
