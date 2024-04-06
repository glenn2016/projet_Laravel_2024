<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Enseigner
 *
 * @property $id
 * @property $ec_id
 * @property $user_id
 * @property $annee
 * @property $created_at
 * @property $updated_at
 *
 * @property Ec $ec
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Enseigner extends Model
{
    
    static $rules = [
		'ec_id' => 'required',
		'user_id' => 'required',
		'annee' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['ec_id','user_id','annee'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function ec()
    {
        return $this->hasOne('App\Models\Ec', 'id', 'ec_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }
    

}
