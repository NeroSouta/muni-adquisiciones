<?php

namespace App\Http\Controllers;
use Auth; 
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Mail\Mailable;

/**
* Es el controlador de cualquier usuario del sistema.
*
*/
class UserController extends Controller
{
    //Funcion que muestra el perfil de cada usuario.
    // retorna la view 'mi perfil'
    public function miperfil(){

        return view('miperfil');
    }

    /*Funcion para realizar la actualización del perfil, la cual se realiza
    / en la vista 'mi perfil'
    / Como argumento toma los valores que se entregan en la vista, los cuales coinciden
    con los del usuario.
    */
        public function miupdate(Request $request){
        
        // Estas son las reglas que tendrá el usuario modificado, las cuales pueden ser modificadas
            ini_set('max_execution_time', 60);
        $rules =[
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'rut'=>'required|string|max:13',
            'password' => 'nullable|min:6',
            'cargo'=>'cargo|string',
        ];


        $this->validate($request, $rules);
        $user = User::find(Auth::user()->id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->cargo = $request->input('cargo');
        $user->rut = $request->input('rut');

        /* No es obligación cambiar la contraseña, pero si desea hacerlo
        se llama a la función Email, la cual le envía un email al usuario
        al realizar dicha actualización o cambio.
        */
        $password = $request->input('password');
        if ($password){
            $user->password = bcrypt($password);
            $email = $request->input('email');
            $dates = array('name'=>$request->input('name'), 'password'=>$password);
            $this->Email($dates, $email);
        }
        
        //Finalmente se guardan los cambios
        $user->save();

        //Se muestra un mensaje al ser modificado el usuario
        return back()->with('notification', 'Usuario editado exitosamente.');
    }

    // La funcion Email cuando se haga el cambio de contraseña desde la vista "Mi Perfil"
    public function Email($dates, $email) {

        //El primer argumnto es la view "emails.plantilla"
        Mail::send('emails.plantilla', $dates, function($message) use ($email){
            $message->subject('Cambio de contraseña'); //El nombre del mensaje
            $message->to($email); //El email al que se envía
            $message->from('no-repply_da@arica.cl', 'Portal del Departamento de Adquisiciones de la Municipalidad de Arica'); //El email ficticio sin y nombre del mismo

        });
    }

    public function share(){
        
    }
}
