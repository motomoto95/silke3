<?php

namespace App\Http\Controllers\Config;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class ConfigController
{
    public function store(Request $request){
        $usuarios=DB::select("select * from users where email = '$request->email'");
        $usuario=User::find($request->id);
        if (Hash::check($request->contraseña, $usuarios[0]->password)) {
            $password=Hash::make($request->contraseña_nueva);
            $affected =  DB::update('update users set password = ? where id = ?', [ "$password" , $usuarios[0]->id]);
            return redirect('/config')->with('edit','La contraseña se cambio con exito'); 
        }
        else{
            return redirect('/config')->with('fallo','La contraseña no se cambio , no coincide la contraseña anterior');
        }
    }
    public function index()
    {
        return view('config/index');
    }
    public function eliminar_cuenta()
    {
        return view('config/delete');
    }
    public function datos_personales()
    {
        return view('config/datos');
    }
    public function edit($id)
    {
        $usuario=User::find($id);
        $usuario->estado=!$usuario->estado;      
        if($usuario->estado==1){
            $usuario->save();
            return redirect('/');
        }  
        if($usuario->save()){
            return redirect('/home');
        }
        else{
            index();
        }
        exit;
    }

}
