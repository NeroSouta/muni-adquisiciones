<?php

namespace App\Http\Controllers\Admin;

use Auth; 
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User; 
use Illuminate\Support\Facades\Mail;
use Illuminate\Mail\Mailable;
/**
* Es el controlador del administrador del sistema.
*
*/
class UserController extends Controller
{
    /**
    * Es la funcion que presenta la vista principal de la gestion de usuarios
    * por parte del administrador
    */
    public function index(){

        //$users = User::where('role', 1)->get(); Est es para que el admin solo pueda ver Compradores
        $users = User::all();
        return view('admin.users.index')->with(compact('users'));
    }


    /**
    * Es la funcion que almacena el usuario creado por el administrador
    */
    public function store(Request $request){

        // Estas son las reglas que tendrá el usuario creado, las cuales pueden ser modificadas
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

        /* 
        * Se envia un email con la contraseña asignada al usuario.
        */
        $email = $request->input('email');
        $dates = array('name'=>$request->input('name'), 'password'=>$request->input('password'));
        $this->Email($dates, $email);


        return back()->with('notification', 'Usuario registrado exitosamente.');
    }

    /**
    * Es la funcion permite al administrador seleccionar un usuario, para su posterior edición.
    La cual recibe como parametro el id del usuario seleccionado, para mostrar la vista 'admin.users.edit'
    */
    public function edit($id){

        $user = User::find($id);
        return view('admin.users.edit', compact('user'));
    }


    /*
    * Es la funcion que permite la modificacion de los datos del usuario seleccionado por el administrador, muy parecida a la funcion store
    */

    public function update($id, Request $request){
        
        // Estas son las reglas que tendrá el usuario durante su modificación, las cuales pueden ser modificadas
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
    /*
    * Es la funcion que permite que se pueda eliminar algún usuario por parte del administrador
    */
      public function delete($id){
        $user = User::find($id);
        $user->delete();
        return back()->with('notification', 'Usuario eliminado exitosamente.');
    }

    /*
    * Es la funcion que permite que se envíe un email al usuario creado, con la contraseña generada por el administrador.
    */
        public function Email($dates, $email) {

        Mail::send('emails.plantilla', $dates, function($message) use ($email){
            $message->subject('Bienvenido a la Plataforma');
            $message->to($email);
            $message->from('no-repply_da@arica.cl', 'Portal de Departamento de Adquisiciones');

        });
    }

    /*
    * Es la funcion que permite que se pueda realizar la busqueda de los usuarios.
    * Hace uso del modelo User para poder realizar estas busquedas.
    */
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
