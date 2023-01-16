<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * Class User
 *
 * @property $id
 * @property $user_name
 * @property $user_ci
 * @property $user_email
 * @property $password
 * @property $user_date_of_birth
 * @property $user_gender
 * @property $created_at
 * @property $updated_at
 *
 * @property Acussation[] $acussations
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class User extends Authenticatable
{
    use HasFactory, Notifiable;
    static $rules = [
		'user_name' => 'required',
    'user_username' => 'required',
		'user_ci' => 'required',
		'user_email' => 'required',
		'password' => 'required',
    'user_number' => 'required',
		'user_date_of_birth' => 'required',
		'user_gender' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['user_name','user_surname','user_ci','user_email','password','user_number','user_date_of_birth','user_gender'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function acussations()
    {
        return $this->hasMany('App\Models\Acussation', 'users_id', 'id');
    }

    public function getAuthPassword()
    {
        return $this->password;
    }
}
