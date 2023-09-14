<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ["id_category", "nom_category", "user_id"];
    protected $table = "category";


    public function cours_liste(){
        return $this->hasMany(Cours::class, 'category_id', 'id_category');
    }
}
