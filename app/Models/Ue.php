<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Ue
 *
 * @property $id
 * @property $libelle
 * @property $niveauclasse_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Niveauclass $niveauclass
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Ue extends Model
{
    
    static $rules = [
		'libelle' => 'required',
		'niveauclasse_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['libelle','niveauclasse_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function niveauclass()
    {
        return $this->hasOne('App\Models\Niveauclass', 'id', 'niveauclasse_id');
    }
    

}
