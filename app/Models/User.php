<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;   


/**
 * Class User
 * 
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property Carbon $created
 * @property Carbon $modified
 * 
 * @property Collection|Post[] $posts
 *
 * @package App\Models
 */
class User extends Authenticatable
{
	protected $table = 'users';
	public $timestamps = false;

	protected $dates = [
		'created',
		'modified'
	];

	protected $hidden = [
		'password'
	];

	protected $fillable = [
		'name',
		'email',
		'password',
		'created',
		'modified'
	];

	public function posts()
	{
		return $this->hasMany(Post::class, 'id_usuario');
	}
}
