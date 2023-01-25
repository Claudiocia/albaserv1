<?php

namespace App\Models;

use Bootstrapper\Interfaces\TableInterface;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Andar.
 *
 * @package namespace App\Models;
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Andar newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Andar newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Andar query()
 * @method static \Illuminate\Database\Eloquent\Builder|Andar whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Andar whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Andar whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string $nome
 * @property int $ala_id
 * @property-read \App\Models\Ala $ala
 * @method static \Illuminate\Database\Eloquent\Builder|Andar whereAlaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Andar whereNome($value)
 */
class Andar extends Model implements Transformable, TableInterface
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome', 'ala_id'
    ];

    public function getTableHeaders()
    {
        return ['ID', 'Nome', 'Ala', 'Prédio'];
    }

    public function getValueForHeader($header)
    {
        switch ($header){
            case 'ID':
                return $this->id;
            case 'Nome':
                return $this->nome;
            case 'Ala':
                return $this->ala->nome == 'Única' ? '' : $this->ala->nome;
            case 'Prédio':
                return $this->ala->predio->nome;
        }
    }

    public function ala()
    {
        return $this->belongsTo(Ala::class);
    }

    public function ambientes()
    {
        return $this->hasMany(Ambiente::class);
    }
}
