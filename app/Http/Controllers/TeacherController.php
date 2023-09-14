<?php

namespace App\Http\Controllers;

use App\Models\Affectation;
use App\Models\Cours;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function see_teacher(){
        $teacher = Teacher::all();
        return view('teacher', compact('teacher'));
    }

    public function see_teacher_form(){
        return view('teacher_form');
    }

    public function send_teacher(Request $request){
        $data = $request->all();
        $request->validate([
            "name"=> "required",
            "surname" => "required",
            "number" => 'required',
            "address" => 'required'
        ]);

        $save = Teacher::create([
            "name"=> $data['name'],
            "surname" => $data['surname'],
            "number" => $data['number'],
            "address" => $data['address'],
        ]);
        return redirect()->route('see_teacher')->with('success', 'Nouvel enseignant ajouté avec succès');
    }

    public function set_affect($id){
        $teacher_info = Teacher::all();
        $teacher_data = Teacher::find($id);
        $teacher_list = Teacher::with('see_affectation')->has('see_affectation')->where('id', $id)->get();
        $cours = Cours::all();
        /* $affect = Affectation::all(); */
        return view('affectation', compact('teacher_data', 'id', 'cours', 'teacher_list'));
     }
}
