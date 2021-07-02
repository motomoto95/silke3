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

class TiendaController extends Controller
{
    public function index(Request $request)
    {
        if(empty($request)){
            $request='';
        }
        $texto=trim($request->get('nom_categoria'));
        $categorias=DB::table('categoria')
        ->where('nom_categoria','LIKE','%'.$texto.'%')
        ->orderBy('nom_categoria','asc')
        ->paginate(5);
        return view('categoria/index',['categorias' => $categorias]);
    }
    public function create(Request $request){
        $usuarios=DB::select("select * from categoria where nom_categoria = '$request->name_categoria'");
        if(count($usuarios)){
            return redirect('categoria')->with('fallo','La categoria ya existe');
        }
        else{
            $name_categoria=$request->name_categoria;
            $detalles_catego=$request->descripcion;
            $data=array('nom_categoria'=>$name_categoria,'detalle'=>$detalles_catego);
            DB::table('categoria')->insert($data);
            return redirect('categoria')->with('edit','La categoria se agrego con exito');
        }
        
    }
}
