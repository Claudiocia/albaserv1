<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\DepartRepository;
use App\Models\Depart;
use App\Validators\DepartValidator;

/**
 * Class DepartRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class DepartRepositoryEloquent extends BaseRepository implements DepartRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Depart::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
