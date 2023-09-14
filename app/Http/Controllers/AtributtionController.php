<?php

namespace App\Http\Controllers;

use App\Models\Attribution;
use App\Models\Cours;
use App\Models\Liste;
use Attribute;
use Illuminate\Http\Request;

class AtributtionController extends Controller
{
    public function see_attribution(){
        $etu = Liste::all();
        $attribute = Attribution::all();
        $student = Liste::with('see_attribute')->has('see_attribute')->get();
        $cours = Cours::all();
        return view('attribution_cours', compact('attribute', 'student', 'cours', 'etu'));
    }

    public function get_attribute(Request $request){
        $data = $request->all();
        $request->validate([
            "cours_id" => 'required',
            "student_id" => 'required',
        ]);

        foreach($data['cours_id'] as $item){
            $save = Attribution::updateorcreate([
                "cours_id" => $item,
                "student_id" => $data['student_id'],
            ]);  
        }

       

       /*  $student = Liste::where('id', 'student_id')->student->groupBy('name');
        /* $name = $student->student->name; */
        return redirect()->back()->with('success', 'Attribution effectuée avec succès !');
    }
}
