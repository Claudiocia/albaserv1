<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\SuperRepository;
use App\Models\Super;
use App\Validators\SuperValidator;

/**
 * Class SuperRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class SuperRepositoryEloquent extends BaseRepository implements SuperRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Super::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
