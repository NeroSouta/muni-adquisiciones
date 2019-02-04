<?php

namespace App\Http\Controllers;
use Auth; 
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Mail\Mailable;

class UserController extends Controller
{
    public function miperfil(){

        return view('miperfil');
    }

        public function miupdate(Request $request){
        
        $rules =[
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'role'=>'required',
            'rut'=>'required|string|max:13',
            'password' => 'nullable|min:6',
        ];


        $this->validate($request, $rules);
        $user = User::find(Auth::user()->id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->role = $request->input('role');
        $user->rut = $request->input('rut');

        $password = $request->input('password');
        if ($password){
            $user->password = bcrypt($password);
            $email = $request->input('email');
            $dates = array('name'=>$request->input('name'), 'password'=>$password);
            $this->Email($dates, $email);
        }
        

        $user->save();


        return back()->with('notification', 'Usuario editado exitosamente.');
    }

    public function Email($dates, $email) {

        Mail::send('emails.plantilla', $dates, function($message) use ($email){
            $message->subject('Cambio de contraseña');
            $message->to($email);
            $message->from('no-repply_da@arica.cl', 'Portal de Departamento de');

        });
    }

    public function share(){
        
    }
}
