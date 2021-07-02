<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;



class ListaController extends Controller
{
    public function index(Request $request){
        if(empty($request)){
            $request='';
        }
        $texto=trim($request->get('name'));
        $contenidos=DB::select("SELECT contenido.*, descuento.descuento ,autor.nombre as 'autor' ,categoria.nom_categoria as 'categoria'
        FROM contenido
        INNER JOIN descuento
        ON descuento.id = contenido.id_descuento
        INNER JOIN autor
        ON autor.id = contenido.id_autor
        INNER JOIN categoria
        ON categoria.id = contenido.id_cateogoria
        WHERE contenido.nombre LIKE '%' '$texto' '%';
        ");
        return view('lista',['contenidos' => $contenidos]);
    }
    public function update(Request $request,$id){
        $affected =  DB::update('update descuento set inicio = ?, fin = ?, descuento = ? where id = ?', [ $request->inicio,$request->fin,$request->descuento ,$id]);
        return redirect('promocion')->with('edit','La promoción se edito con exito');
    }
}
