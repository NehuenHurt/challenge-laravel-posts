<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Post
 * 
 * @property int $id
 * @property int $id_usuario
 * @property int $id_categoria
 * @property string $titulo
 * @property string $slug
 * @property string $imagen
 * @property string $descripcion
 * @property Carbon $created
 * @property Carbon $modified
 * 
 * @property Categoria $categoria
 * @property User $user
 *
 * @package App\Models
 */
class Post extends Model
{
	protected $table = 'posts';
	public $timestamps = false;

	protected $casts = [
		'id_usuario' => 'int',
		'id_categoria' => 'int'
	];

	protected $dates = [
		'created',
		'modified'
	];

	protected $fillable = [
		'id_usuario',
		'id_categoria',
		'titulo',
		'slug',
		'imagen',
		'descripcion',
		'created',
		'modified'
	];

	public function categoria()
	{
		return $this->belongsTo(Categoria::class, 'id_categoria');
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'id_usuario');
	}
}
