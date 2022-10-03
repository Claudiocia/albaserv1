<?php

namespace App\Models;

use Bootstrapper\Interfaces\TableInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Ala.
 *
 * @package namespace App\Models;
 */
class Ala extends Model implements Transformable, TableInterface
{
    use TransformableTrait;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nome', 'predio_id'];

    public function predio()
    {
        return $this->belongsTo(Predio::class);
    }

    public function getTableHeaders()
    {
        return ['Nome da Ala', 'Prédio'];
    }

    public function getValueForHeader($header)
    {
        switch ($header){
            case 'Nome da Ala':
                return $this->nome;
            case 'Prédio':
                return $this->predio->nome;
        }
    }
}
