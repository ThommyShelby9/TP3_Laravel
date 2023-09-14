<?php

namespace App\Http\Controllers;

use App\Models\Affectation;
use App\Models\Cours;
use App\Models\Teacher;
use Illuminate\Http\Request;

class AffectationController extends Controller
{

    public function get_affectation(Request $request, $id){
        $data = $request->all();
        $teacher_data = Teacher::all();
        $request->validate([
            "cours_id" => 'required',
        ]);

        foreach($data['cours_id'] as $item){
            $save = Affectation::updateorcreate([
                "cours_id" => $item,
                "teacher_id" => $id
            ]);
        }
        return redirect()->back()->with('success', 'Attribution effectuée avec succès !');
    }
}
