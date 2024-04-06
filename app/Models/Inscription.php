<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Inscription
 *
 * @property $id
 * @property $user_id
 * @property $niveauclasse_id
 * @property $annee
 * @property $created_at
 * @property $updated_at
 *
 * @property Niveauclass $niveauclass
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Inscription extends Model
{
    
    static $rules = [
		'user_id' => 'required',
		'niveauclasse_id' => 'required',
		'annee' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id','niveauclasse_id','annee'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function niveauclass()
    {
        return $this->hasOne('App\Models\Niveauclass', 'id', 'niveauclasse_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }
    

}
