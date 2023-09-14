<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cours extends Model
{
    protected $fillable = ["cours", "masse", "coefficient", "category_id"];
    protected $table = "cours";

    public function category(){
        return $this->belongsTo(Category::class, 'id_category', 'category_id');
    }

    public function student(){
        return $this->belongsToMany(Liste::class);
    }

    public function teacher(){
        return $this->belongsTo(Teacher::class);
    }

}
