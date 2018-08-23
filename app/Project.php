<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use SoftDeletes;

    public static $rules = [
        'name' => 'required|max:255',
        'start' => 'required|date',
    ];

    public static $messages = [
        'name.required' => 'Es necesario ingresar el nombre del proyecto',
        'name.max' => 'El nombre es demasiado extenso',
        'start.required' => 'Olvidó ingresar una fecha',
        'start.date' => 'La fecha no tiene un formato adecuado'
    ];

    protected $fillable = [
        'name', 'description', 'start',
    ];

    //relationships
    public function users()
    {
        return $this->belongsToMany('App\User');
    }

    public function categories()
    {
        return $this->hasMany('App\Category');
    }

    public function levels()
    {
        return $this->hasMany('App\Level');
    }

    // accessors

    public function getFirstLevelIdAttribute()
    {
        return $this->levels->first()->id;
    }
}
