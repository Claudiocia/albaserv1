<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\AmbienteRepository;
use App\Models\Ambiente;
use App\Validators\AmbienteValidator;

/**
 * Class AmbienteRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class AmbienteRepositoryEloquent extends BaseRepository implements AmbienteRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Ambiente::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
