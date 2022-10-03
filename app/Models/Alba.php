<?php

namespace App\Models;

use Bootstrapper\Interfaces\TableInterface;
use Eloquent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;


/**
 * App\Models\Alba
 *
 * @property int $id
 * @property string $chave
 * @property string $nome
 * @property string $sigla
 * @property string|null $presid
 * @property string $end
 * @property string|null $bairro
 * @property string|null $cep
 * @property string $cidade
 * @property string $uf
 * @property string|null $tel
 * @property string|null $cnpj
 * @property string $url
 * @property string|null $email
 * @property string $tag
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Alba newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Alba newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Alba query()
 * @method static \Illuminate\Database\Eloquent\Builder|Alba whereBairro($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Alba whereCep($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Alba whereChave($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Alba whereCidade($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Alba whereCnpj($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Alba whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Alba whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Alba whereEnd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Alba whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Alba whereNome($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Alba wherePresid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Alba whereSigla($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Alba whereTag($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Alba whereTel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Alba whereUf($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Alba whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Alba whereUrl($value)
 * @mixin Eloquent
 */
class Alba extends Model implements Transformable, TableInterface
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'chave', 'nome', 'sigla',
        'presid', 'end', 'bairro', 'cep',
        'cidade', 'uf', 'tel', 'cnpj',
        'url', 'email', 'tag',
    ];

    public function getTableHeaders()
    {
        return ['Sigla', 'Nome', 'UF', 'Presidente'];
    }

    public function getValueForHeader($header)
    {
        switch ($header){
            case 'Sigla':
                return $this->sigla;
            case 'Nome':
                return $this->nome;
            case 'UF':
                return $this->uf;
            case 'Presidente':
                return $this->presid;
        }
    }
}
