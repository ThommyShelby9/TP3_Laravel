<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Liste extends Model
{
    protected $fillable = ["name", "surname", "speciality", "birthday", "hobbies", "photo", "bio", "user_id"];
    protected $table = "etudiant_liste";
    use SoftDeletes;
}
