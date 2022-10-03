<?php

namespace App\Models;

use Bootstrapper\Interfaces\TableInterface;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;


/**
 * App\Models\Predio
 *
 * @property int $id
 * @property string $nome
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Alba|null $alba
 * @method static \Illuminate\Database\Eloquent\Builder|Predio newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Predio newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Predio query()
 * @method static \Illuminate\Database\Eloquent\Builder|Predio whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Predio whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Predio whereNome($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Predio whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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
