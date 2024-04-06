<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Etreresponsable
 *
 * @property $id
 * @property $formation_id
 * @property $user_id
 * @property $annee
 * @property $created_at
 * @property $updated_at
 *
 * @property Formation $formation
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Etreresponsable extends Model
{
    
    static $rules = [
		'formation_id' => 'required',
		'user_id' => 'required',
		'annee' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['formation_id','user_id','annee'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function formation()
    {
        return $this->hasOne('App\Models\Formation', 'id', 'formation_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }
    

}
