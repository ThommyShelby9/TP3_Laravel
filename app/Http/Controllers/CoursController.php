<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Cours;
use Illuminate\Http\Request;

class CoursController extends Controller
{
    public function cours(){
        return view('cours');
    }

    public function course_view(){
        $category_data = Category::all();
        return view('addCourse', compact('category_data'));
    }

    public function addCourse(Request $request){
        $data = $request->all();

        $category_data = Category::all();

        $request->validate([
            "cours" => "required",
            "masse" => "required",
            "coefficient" => "required",
            "category" => "required"
        ]);

        $save = Cours::create([
            "cours" => $data['cours'],
            "masse" => $data['masse'],
            "coefficient" => $data['coefficient'],
            "category" => $data['category']
        ]);

        return redirect()->route('cours')->with('success', 'Cours ajouté avec succès ! ', compact('category_data'));
    }

}
