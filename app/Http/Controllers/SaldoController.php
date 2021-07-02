<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class SaldoController extends Controller
{

    
    public function index(Request $request)
    {
        if(empty($request)){
            $request='';
        }
        $texto=trim($request->get('name'));
        $usuarios=DB::table('users')
        ->where('tipo_cuenta','=',0)
        ->where(function($q) use ($texto) {
            $q->where('name','LIKE','%'.$texto.'%')
              ->orWhere('email','LIKE','%'.$texto.'%');
        })
        ->orderBy('name','asc')
        ->paginate(5);
        return view('/saldo', ['usuarios' => $usuarios]);
    }
    public function update(Request $request, $id)
    {
        $usuario=User::find($id);
        $usuario->saldo=$usuario->saldo+$request->saldo;
        $usuarios=DB::select("select * from users where tipo_cuenta = 0");
        if($usuario->save()){
            return redirect('/saldo')->with('edit','El saldo se agrego con exito');
        }
        else{
            index();
        }
        exit;
    }
}
