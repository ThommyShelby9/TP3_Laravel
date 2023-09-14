<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attribution extends Model
{
    protected $fillable = ["cours_id", "student_id"];
    protected $table = "attribution";

    public function get_student(){
        return $this->belongsTo(Liste::class, 'student_id', 'id');
    }

    public function get_cours(){
        return $this->belongsTo(Cours::class, 'cours_id', 'id');
    }

    
}
