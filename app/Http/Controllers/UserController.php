<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;

class UserController extends Controller
{
    public function login(){
        return view('login');
    }


    public function register(){
        return view('register');
    }


    public function store(Request $request)
    {
        $data = $request->all();
        $request->validate([
            'firstname' => "required|min:2",
            'lastname' => "required|min:2",
            'email' => array(
                "required",
                "regex:/^[\w\-\.]+@([\w\-]+\.)+[\w\-]{2,4}$/",
                "unique:users"
            ),
            'password' => array(
                "required",
                "regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%?&#^_;:,])[A-Za-z\d@$!%?&#^_;:,]{8,}$/",
                "confirmed:password_confirmation"
            )
        ]);

        $save = User::create([
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        $url = URL::temporarySignedRoute(
            'email_verified',
            now()->addMinutes(30),
            ['email' => $data['email']]
        );

        Mail::send('mail', ['url' => $url, 'nom' => $data['firstname'] . ' ' . $data['lastname']], function ($message) use ($data) {
            $config = config('mail');
            $message->subject('Registration verification !')
                ->from($config['from']['address'], $config['from']['name'])
                ->to($data['email'], $data['firstname'], $data['lastname']);
        });
        return redirect()->back()->with('success', 'Veuillez votre consulter mail pour activer votre compte.');
    }

    public function verify(Request $request, $email)
    {
        $user = User::where('email', $email)->first();
        /* dd($user);  */
        if (!$user) {
            abort(404);
        };

        if (!$request->hasValidSignature()) {
            abort(404);
        };

        $user->update([
            'email_verified_at' => now(),
            'email_verified' => true,
        ]);
        return redirect()->route('login')->with('success', "Compte activé avec succès!");
    }

    public function email_verify()
    {
        return view('email_verify');
    }


    public function emailVerify(Request $request)
    {
     
        $request->validate([
            'email' => "required|regex:/^[\w\-\.]+@([\w\-]+\.)+[\w\-]{2,4}$/"
        ]);

        $user = User::where('email', $request->email)->first();


        $url = URL::temporarySignedRoute(
            'modify_pass',
            now()->addMinutes(30),
            ['email' => $user['email']]
        );

        if (!$user) {
            return redirect()->back()->with('success', 'Invalide e-mail !');
        } else {
            Mail::send('verification_message', ['url' => $url, 'nom' => $user['firstname'] . ' ' . $user['lastname']], function ($message) use ($user) {
                $config = config('mail');
                $message->subject('Verification de votre compte !')
                    ->from($config['from']['address'], $config['from']['name'])
                    ->to($user['email'], $user['firstname'], $user['lastname']);
            });

            return redirect()->back()->with('success', 'Un mail de confirmation vous a été envoyer pour réinitialiser votre mot de passe!');
        };
    }

    public function modify_pass(Request $request, $email)
    {
        $user = User::where('email', $email)->first();
        if (!$user) {
            abort(404);
        };

        if (!$request->hasValidSignature()) {
            abort(404);
        };
        session(['reset_email' => $user->email]);
        return view('password_modification');
    }

    public function modify_password(Request $request)
    {
        $email = session('reset_email');
        $user = User::where('email', $email)->first();
        /*   dd($user); */
        $request->validate([
            'new_password' => array(
                "required",
                "regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%?&#^_;:,])[A-Za-z\d@$!%?&#^_;:,]{8,}$/",
                "confirmed:new_password_confirmation"
            )
        ]);

        $user->update([
            'password' => Hash::make($user['new_password']),
        ]);

        return redirect()->route('login')->with('success', 'Mot de passe réinitialisé avec succès!');
    }

    public function authentification(Request $request){
       /*  dd(Auth::user()); */
       $user = Auth::attempt(['email'=>$request->email, 'password'=>$request->password, 'email_verified'=>true]);
       if($user){
        return redirect()->route('index');
       };

       return redirect()->back()->with('errors', 'Combinaison email/password invalide !');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('to_login');
    }
}
