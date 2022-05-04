<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Categoria
 * 
 * @property int $id
 * @property int $id_padre
 * @property string $nombre
 * @property Carbon $created
 * @property Carbon $modified
 * 
 * @property Collection|Post[] $posts
 *
 * @package App\Models
 */
class Categoria extends Model
{
	protected $table = 'categorias';
	public $timestamps = false;

	protected $casts = [
		'id_padre' => 'int'
	];

	protected $dates = [
		'created',
		'modified'
	];

	protected $fillable = [
		'id_padre',
		'nombre',
		'created',
		'modified'
	];

	public function posts()
	{
		return $this->hasMany(Post::class, 'id_categoria');
	}


	public function parent()
    {
        return $this->belongsTo(Categoria::class, 'id_padre', 'id');
    }

    public function children()
{
    return $this->hasMany(Categoria::class, 'id_padre')->with('children');
}
}
