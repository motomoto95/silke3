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


class ContenidoController extends Controller
{
    public function index(){
        $categorias=DB::select("select * from categoria");
        $descuentos=DB::select("select * from descuento");
        $autores=DB::select("select * from autor");
        return view('contenido',['categorias' => $categorias,'descuentos' => $descuentos,'autores' => $autores]);
    }
    public function mform(){
        return view('mform');
    }
    public function subirArchivo(Request $request)
    {
           //Recibimos el archivo y lo guardamos en la carpeta storage/app/public
           $nombre=$request->nombre;
           $nombre_guardado=$request->file('archivo')->hashName();
           $tipo=$request->file('archivo')->extension();
           $estado=$request->estado;
           $precio=$request->precio;
           $id_descuento=DB::select("select * from descuento where descuento=$request->descuento");
           $id_descuento=$id_descuento[0]->id;
           $id_categoria=DB::select("select * from categoria where nom_categoria='$request->categoria'");
           $id_categoria=$id_categoria[0]->id;
           $id_autor=DB::select("select * from autor where nombre='$request->autor'");
           $id_autor=$id_autor[0]->id;
           $request->file('archivo')->store($request->file('archivo')->extension());
           $puntuacion=0;
           $data=array('nombre'=>$nombre,'nombre_guardado'=>$nombre_guardado,'tipo'=>$tipo,'estado'=>$estado,'precio'=>$precio,'id_descuento'=>$id_descuento,'id_cateogoria'=>$id_categoria,'id_autor'=>$id_autor,'puntuacion'=>$puntuacion);
           DB::table('contenido')->insert($data);
           return redirect('/contenido')->with('edit','El archivo se subio con exito');
    }
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
