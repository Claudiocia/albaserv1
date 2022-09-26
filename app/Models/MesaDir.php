<?php

namespace App\Models;

use Bootstrapper\Interfaces\TableInterface;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class MesaDir.
 *
 * @package namespace App\Models;
 * @property int $id
 * @property string $chave
 * @property string $setor
 * @property string $cargo
 * @property string $titular
 * @property string|null $tel
 * @property string|null $email
 * @property string $tag
 * @property int|null $predio_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Predio|null $predio
 * @method static \Illuminate\Database\Eloquent\Builder|MesaDir newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MesaDir newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MesaDir query()
 * @method static \Illuminate\Database\Eloquent\Builder|MesaDir whereCargo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MesaDir whereChave($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MesaDir whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MesaDir whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MesaDir whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MesaDir wherePredioId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MesaDir whereSetor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MesaDir whereTag($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MesaDir whereTel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MesaDir whereTitular($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MesaDir whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class MesaDir extends Model implements Transformable, TableInterface
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'chave','setor', 'cargo', 'titular',
        'tel', 'email','tag', 'predio_id',
        ];

    public function predio()
    {
        return $this->belongsTo(Predio::class, 'predio_id', 'id');
    }

    public function getTableHeaders()
    {
        // TODO: Implement getTableHeaders() method.
    }

    public function getValueForHeader($header)
    {
        // TODO: Implement getValueForHeader() method.
    }
}
