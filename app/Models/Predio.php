<?php

namespace App\Models;

use Bootstrapper\Interfaces\TableInterface;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;


class Predio extends Model implements Transformable, TableInterface
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 'nome', 'alba_id'];

    public function alba()
    {
        return $this->belongsTo(Alba::class);
    }

    public function getTableHeaders()
    {
        return ['ID', 'Assembleia' ,'Nome'];
    }

    public function getValueForHeader($header)
    {
        switch ($header){
            case 'ID':
                return $this->id;
            case 'Assembleia':
                return $this->alba->nome;
            case 'Nome':
                return $this->nome;
        }
    }
}
