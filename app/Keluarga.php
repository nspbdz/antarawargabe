<?php

namespace App;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keluarga extends Model
{



    protected $table = "keluarga";
    // protected $casts = [
    //     'birthdate' => 'datetime:Y-m-d',
    // ];
    protected $fillable = [
        'idwarga',
        'name',
        'status',
        'isactive',
    ];


    // public function getDepartement(){
    //     return $this->belongsTo(Departement::class,"departementcode");
    // }
    // return $this->hasMany(Comment::class);
}


