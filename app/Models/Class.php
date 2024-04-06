<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Class
 *
 * @property $id
 * @property $libelle
 * @property $formation_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Formation $formation
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Class extends Model
{
    
    static $rules = [
		'libelle' => 'required',
		'formation_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['libelle','formation_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function formation()
    {
        return $this->hasOne('App\Models\Formation', 'id', 'formation_id');
    }
    

}
