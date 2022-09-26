<?php

namespace App\Models;

use Bootstrapper\Interfaces\TableInterface;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Depart.
 *
 * @package namespace App\Models;
 * @method static \Illuminate\Database\Eloquent\Builder|Depart newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Depart newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Depart query()
 * @mixin \Eloquent
 * @property int $id
 * @property string $nome
 * @property string $localiz
 * @property string $tel
 * @property string|null $email
 * @property string|null $url
 * @property int $super_id
 * @property int $predio_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Depart whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Depart whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Depart whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Depart whereLocaliz($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Depart whereNome($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Depart wherePredioId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Depart whereSuperId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Depart whereTel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Depart whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Depart whereUrl($value)
 */
class Depart extends Model implements Transformable, TableInterface
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'nome', 'localiz', 'tel',
        'email', 'url', 'super_id',
        'predio_id'];

    public function getTableHeaders()
    {
        // TODO: Implement getTableHeaders() method.
    }

    public function getValueForHeader($header)
    {
        // TODO: Implement getValueForHeader() method.
    }
}
