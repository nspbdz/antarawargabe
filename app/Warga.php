<?php

namespace App;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warga extends Model
{



    protected $table = "warga";
    // protected $casts = [
    //     'birthdate' => 'datetime:Y-m-d',
    // ];
    protected $fillable = [
        'name',
        'placeofbirth',
        'birthdate' => 'required|date|date_format:Y-n-j',
        'job',
        'iswarga_lingkungan',
        'isKepala_keluarga',
        'isactive',
    ];


    // public function getDepartement(){
    //     return $this->belongsTo(Departement::class,"departementcode");
    // }
    // return $this->hasMany(Comment::class);
}


