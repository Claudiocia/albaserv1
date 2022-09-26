<?php

namespace App\Models;

use Bootstrapper\Interfaces\TableInterface;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Super.
 *
 * @package namespace App\Models;
 * @method static \Illuminate\Database\Eloquent\Builder|Super newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Super newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Super query()
 * @mixin \Eloquent
 * @property int $id
 * @property string $nome
 * @property string $localiz
 * @property string $tel
 * @property string|null $email
 * @property string|null $url
 * @property int $predio_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Super whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Super whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Super whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Super whereLocaliz($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Super whereNome($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Super wherePredioId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Super whereTel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Super whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Super whereUrl($value)
 */
class Super extends Model implements Transformable, TableInterface
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 'nome', 'localiz', 'predio_id', 'tel', 'email', 'url'];

    public function getTableHeaders()
    {
        // TODO: Implement getTableHeaders() method.
    }

    public function getValueForHeader($header)
    {
        // TODO: Implement getValueForHeader() method.
    }
}
