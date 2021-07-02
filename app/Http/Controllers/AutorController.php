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


class AutorController extends Controller
{
    public function index(Request $request)
    {
        if(empty($request)){
            $request='';
        }
        $texto=trim($request->get('nom_autor'));
        $autores=DB::table('autor')
        ->where('nombre','LIKE','%'.$texto.'%')
        ->orderBy('nombre','asc')
        ->paginate(5);
        return view('autor',['autores' => $autores]);
    }
    public function create(Request $request){
        $autores=DB::select("select * from autor where nombre = '$request->name_autor'");
        if(count($autores)){
            return redirect('autor')->with('fallo','La categoria ya existe');
        }
        else{
            $name_autor=$request->name_autor;
            $detalles_autor=$request->descripcion;
            $ciudad=$request->ciudad;
            $fecha=$request->fecha;
            $data=array('nombre'=>$name_autor,'detalle'=>$detalles_autor,'fecha_nacimiento'=>$fecha,'ciudad_natal'=>$ciudad);
            DB::table('autor')->insert($data);
            return redirect('autor')->with('edit','El autor se agrego con exito');
        }
        
    }
    public function update(Request $request,$id){
        $affected =  DB::update('update autor set nombre = ?, fecha_nacimiento = ?, ciudad_natal = ?, detalle = ? where id = ?', [ $request->nombre,$request->fecha,$request->ciudad,$request->detalle, $id]);
        return redirect('autor')->with('edit','El autor se edito con exito');
    }
}
