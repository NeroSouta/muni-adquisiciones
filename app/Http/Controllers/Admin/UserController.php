<?php

namespace App\Http\Controllers\Admin;

use Auth; 
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User; 
use Illuminate\Support\Facades\Mail;
use Illuminate\Mail\Mailable;

class UserController extends Controller
{
    public function index(){

        //$users = User::where('role', 1)->get(); Est es para que el admin solo pueda ver Compradores
        $users = User::all();
        return view('admin.users.index')->with(compact('users'));
    }

    public function store(Request $request){

        


        $rules =[
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
            'role'=>'required',
            'rut'=>'required|string|max:13|unique:users',

        ];


        $this->validate($request, $rules);

        $user = new User;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->role = $request->input('role');
        $user->rut = $request->input('rut');
        $user->password = bcrypt($request->input('password'));

        $user->save();

        $email = $request->input('email');
        $dates = array('name'=>$request->input('name'), 'password'=>$request->input('password'));
        $this->Email($dates, $email);


        return back()->with('notification', 'Usuario registrado exitosamente.');
    }

    public function edit($id){

        $user = User::find($id);
        return view('admin.users.edit', compact('user'));
    }

    public function update($id, Request $request){
        
        $rules =[
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'role'=>'required',
            'rut'=>'required|string|max:13',
        ];


        $this->validate($request, $rules);
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->role = $request->input('role');
        $user->rut = $request->input('rut');

        $user->save();


        return back()->with('notification', 'Usuario editado exitosamente.');
    }

      public function delete($id){
        $user = User::find($id);
        $user->delete();
        return back()->with('notification', 'Usuario eliminado exitosamente.');
    }

        public function Email($dates, $email) {

        Mail::send('emails.plantilla', $dates, function($message) use ($email){
            $message->subject('Bienvenido a la Plataforma');
            $message->to($email);
            $message->from('no-repply_da@arica.cl', 'Portal de Departamento de Adquisiciones');

        });
    }

    public function share(Request $request){
        $name  = $request->get('name');
        $email = $request->get('email');
        $rut   = $request->get('rut');
        $users = User::orderBy('id', 'DESC')
            ->name($name)
            ->email($email)
            ->rut($rut)
            ->paginate(4);
        return view('admin.users.index', compact('users'));
    }

}
