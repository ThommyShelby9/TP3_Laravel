<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function addCategory(Request $request){

        $category_data = $request->all();
        $request->validate([
            "nom_category" => "required",
        ]);

        $save = Category::create([
            "nom_category" => $category_data["nom_category"],
            "user_id" => Auth::user()->id
        ]);

        return redirect()->back()->with('success', 'Categorie ajoutée avec succès', compact('category_data'));
    }

}
