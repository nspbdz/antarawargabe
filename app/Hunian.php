<?php

namespace App;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hunian extends Model
{



    protected $table = "hunian";
    // protected $casts = [
    //     'birthdate' => 'datetime:Y-m-d',
    // ];
    protected $fillable = [
        'idwarga',
        'block_number',
        'house_number',
        'building_type',
        'surface_area',
        'building_area',
        'isactive',
    ];


    // public function getDepartement(){
    //     return $this->belongsTo(Departement::class,"departementcode");
    // }
    // return $this->hasMany(Comment::class);
}


