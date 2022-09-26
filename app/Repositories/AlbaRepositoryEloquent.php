<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\AlbaRepository;
use App\Models\Alba;
use App\Validators\AlbaValidator;

/**
 * Class AlbaRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class AlbaRepositoryEloquent extends BaseRepository implements AlbaRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Alba::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
