<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Acussation
 *
 * @property $id
 * @property $users_id
 * @property $police_id
 * @property $type_of_acusation
 * @property $standard_acussation
 * @property $urgent_acussation
 * @property $lat_lon
 * @property $created_at
 * @property $updated_at
 *
 * @property Police $police
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Urgente extends Model
{
    protected $table = 'urgente';
    static $rules = [
        'description',
		'lat' => 'required',
        'lon' => 'required',
        'ci',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['description','lat','lon','ci','status'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    /*public function police()
    {
        return $this->hasOne('App\Models\Police', 'id', 'police_id');
    }*/
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
   /* public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'users_id');
    }*/
    

}
