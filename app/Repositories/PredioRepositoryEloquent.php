<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\PredioRepository;
use App\Models\Predio;
use App\Validators\PredioValidator;

/**
 * Class PredioRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class PredioRepositoryEloquent extends BaseRepository implements PredioRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Predio::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
