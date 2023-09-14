<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Affectation extends Model
{
    protected $fillable = ["teacher_id", "cours_id"];
    protected $table = "affectation";


    public function get_teacher(){
        return $this->belongsTo(Teacher::class, 'teacher_id', 'id');
    }

    public function get_cours(){
        return $this->belongsTo(Cours::class, 'cours_id', 'id');
    }
}
