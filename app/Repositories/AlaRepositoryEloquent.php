<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\AlaRepository;
use App\Models\Ala;
use App\Validators\AlaValidator;

/**
 * Class AlaRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class AlaRepositoryEloquent extends BaseRepository implements AlaRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Ala::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
