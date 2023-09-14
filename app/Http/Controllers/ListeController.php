<?php

namespace App\Http\Controllers;

use App\Models\Liste;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ListeController extends Controller
{
   public function index()
   {
      $user = Auth::user();
      $nom = $user ? $user->firstname :"";
      $prenom = $user ? $user->lastname: "";
      $liste_etudiants = Liste::all();
      return view('liste', compact('liste_etudiants', 'prenom', 'nom'));
   }

   public function add($id)
   {
      $student = Liste::all();
      $data = Liste::find($id);
      return view('addetudiant', compact('id', 'data', 'student'));
   }
 
   public function delete($id)
   {
      $data = Liste::where('id', $id)->delete('id', $id);
      return redirect()->route('index')->with('id', 'data');
   } 

   public function addStudent()
   {
      return view('addetudiant');
   }

   public function store(Request $request)
   {
      $data = $request->all();
      $validation = $request->validate([
         "name" => "required",
         "surname" => "required",
         "speciality" => "required",
         "birthday" => "required",
         "hobbies" => "required",
         "bio" => "required",
         "photo" => "required",
      ]);

      if($data['photo']){
         $photo = $data['photo'];
         $path = $photo->store('image_etudiant');
      };

      $save = Liste::create([
         "name" => $data['name'],
         "surname" => $data['surname'],
         "speciality" => $data['speciality'],
         "birthday" => $data['birthday'],
         "hobbies" => $data['hobbies'],
         "bio" => $data['bio'],
         "photo" => $path,
         'user_id' => Auth::user()->id
     ]);
      return redirect()->route('index')->with('message', 'Nouvel ajout efféctué !');
   }

   public function getStudentInfo($id){
      $studentInfo = Liste::all();
      $data = Liste::find($id);
      return view('modifyStudent', compact('data', 'id'));
   }

   public function modifyStudentInfo(Request $request, $id){
      $data = $request->all();
      if($data['photo']){
         $photo = $data['photo'];
         $path = $photo->store('image_etudiant');
      };
      Liste::where('id',$id)->update([
         "name" => $data['name'],
         "surname" => $data['surname'],
         "speciality" => $data['speciality'],
         "birthday" => $data['birthday'],
         "hobbies" => $data['hobbies'],
         "bio" => $data['bio'],
         "photo" => $path  
      ]);
      $validation = $request->validate([
         "name" => "required",
         "surname" => "required",
         "speciality" => "required",
         "birthday" => "required",
         "hobbies" => "required",
         "bio" => "required",
         "photo" => "required",
      ]);

     return redirect()->route('index')->with('message', 'Modification effectuée !');
   }
}
