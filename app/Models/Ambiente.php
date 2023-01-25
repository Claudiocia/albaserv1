<?php

namespace App\Models;

use Bootstrapper\Interfaces\TableInterface;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Ambiente.
 *
 * @package namespace App\Models;
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Ambiente newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Ambiente newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Ambiente query()
 * @method static \Illuminate\Database\Eloquent\Builder|Ambiente whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ambiente whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ambiente whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string $nome
 * @property string|null $num
 * @property string $tipo
 * @property int $andar_id
 * @property-read \App\Models\Andar $andar
 * @method static \Illuminate\Database\Eloquent\Builder|Ambiente whereAndarId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ambiente whereNome($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ambiente whereNum($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ambiente whereTipo($value)
 */
class Ambiente extends Model implements Transformable, TableInterface
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome', 'num', 'tipo', 'andar_id'
    ];

    public function andar()
    {
        return $this->belongsTo(Andar::class);
    }

    public function getTableHeaders()
    {
        return ['Nome', 'Num', 'Tipo', 'Localização'];
    }

    public function getValueForHeader($header)
    {
        switch ($header){
            case 'Nome':
                return $this->nome;
            case 'Num':
                return $this->num;
            case 'Tipo':
                return $this->tipo;
            case 'Localização':
                return $this->andar->ala->predio->nome.' - '.$this->andar->ala->nome.' - '.$this->andar->nome;
        }
    }
}
