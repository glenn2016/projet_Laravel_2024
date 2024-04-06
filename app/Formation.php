<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Formation
 *
 * @property $id
 * @property $libelle
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Formation extends Model
{
    
    static $rules = [
		'libelle' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['libelle'];



}
