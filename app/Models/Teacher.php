<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{

    protected $fillable = ["name", "surname", "number", 'address'];
    protected $table = "teacher";

    public function cours(){
        return $this->belongsToMany(Cours::class);
    }


     public function see_affectation(){
        return $this->hasMany(Affectation::class, 'teacher_id');
    } 
}
