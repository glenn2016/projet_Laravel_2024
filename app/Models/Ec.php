<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Ec
 *
 * @property $id
 * @property $libelle
 * @property $ues_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Ue $ue
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Ec extends Model
{
    
    static $rules = [
		'libelle' => 'required',
		'ues_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['libelle','ues_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function ue()
    {
        return $this->hasOne('App\Models\Ue', 'id', 'ues_id');
    }
    

}
