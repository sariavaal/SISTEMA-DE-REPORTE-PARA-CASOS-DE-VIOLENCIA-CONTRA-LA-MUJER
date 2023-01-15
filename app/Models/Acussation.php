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
class Acussation extends Model
{
    
    static $rules = [
		'users_id' => 'required',
		'police_id' => 'required',
		'type_of_acusation' => 'required',
		'standard_acussation' => 'required',
		'urgent_acussation' => 'required',
		'lat_lon' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['users_id','police_id','type_of_acusation','standard_acussation','urgent_acussation','lat_lon'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function police()
    {
        return $this->hasOne('App\Models\Police', 'id', 'police_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'users_id');
    }
    

}
