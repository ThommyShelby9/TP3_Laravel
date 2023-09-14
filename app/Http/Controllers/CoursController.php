<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Cours;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CoursController extends Controller
{
    public function cours(){
        $user = Auth::user();
        $cours = Cours::all();
        return view('cours', compact('cours'));
    }

    public function course_view(){
        $user = Auth::user();
        $category_data = Category::all();
        return view('addCourse', compact('category_data'));
    }

    public function add_course(Request $request){
        $data = $request->all();

        $category_data = Category::all();

        $request->validate([
            "cours" => "required",
            "masse" => "required",
            "coefficient" => "required",
            "category_id" => "required"
        ]);

        $save = Cours::create([
            "cours" => $data['cours'],
            "masse" => $data['masse'],
            "coefficient" => $data['coefficient'],
            "category_id" => $data['category_id'],
        ]);

        return redirect()->route('cours')->with('success', 'Cours ajouté avec succès ! ', compact('category_data'));
    }

}
