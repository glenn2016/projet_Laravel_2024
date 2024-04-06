<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Evaluer
 *
 * @property $id
 * @property $user_id
 * @property $ec_id
 * @property $PointsForts
 * @property $PointsFaible
 * @property $note
 * @property $date
 * @property $created_at
 * @property $updated_at
 *
 * @property Ec $ec
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Evaluer extends Model
{
    
    static $rules = [
		'user_id' => 'required',
		'ec_id' => 'required',
		'PointsForts' => 'required',
		'PointsFaible' => 'required',
		'note' => 'required',
		'date' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id','ec_id','PointsForts','PointsFaible','note','date'];


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
