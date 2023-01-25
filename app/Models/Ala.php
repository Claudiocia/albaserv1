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
 * @property int $id
 * @property string $nome
 * @property int $predio_id
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Predio $predio
 * @method static \Illuminate\Database\Eloquent\Builder|Ala newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Ala newQuery()
 * @method static \Illuminate\Database\Query\Builder|Ala onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Ala query()
 * @method static \Illuminate\Database\Eloquent\Builder|Ala whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ala whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ala whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ala whereNome($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ala wherePredioId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ala whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Ala withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Ala withoutTrashed()
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Andar[] $andars
 * @property-read int|null $andars_count
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

    public function andars()
    {
        return $this->hasMany(Andar::class);
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
