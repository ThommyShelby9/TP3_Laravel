<?php

namespace App\Models;

use Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Liste extends Model
{
    protected $fillable = ["name", "surname", "speciality", "birthday", "hobbies", "photo", "bio", "user_id"];
    protected $table = "etudiant_liste";
    use SoftDeletes;

    public function cours(){
        return $this->belongsToMany(Cours::class);
    }


     public function see_attribute(){
        return $this->hasMany(Attribution::class, 'student_id');
    } 

 /*    public function getMoyenneAttribute(){
        $moy_dev = 0;
        if($this->note(){
            $devoirs = $this->notes()->where('type', 'devoir')->get();
            if(count($devoirs)==2{

            })

        });
    } */

  
}
