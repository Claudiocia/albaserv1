<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\MesaDirRepository;
use App\Models\MesaDir;
use App\Validators\MesaDirValidator;

/**
 * Class MesaDirRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class MesaDirRepositoryEloquent extends BaseRepository implements MesaDirRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return MesaDir::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
