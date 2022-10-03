<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\AndarRepository;
use App\Models\Andar;
use App\Validators\AndarValidator;

/**
 * Class AndarRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class AndarRepositoryEloquent extends BaseRepository implements AndarRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Andar::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
