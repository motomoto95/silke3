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


class PromocionController extends Controller
{
    public function index(Request $request)
    {
        if(empty($request)){
            $request='';
        }
        $texto=trim($request->get('descuento'));
        $descuentos=DB::table('descuento')
        ->where('descuento','LIKE','%'.$texto.'%')
        ->orderBy('descuento','asc')
        ->paginate(5);
        return view('promocion',['descuentos' => $descuentos]);
    }
    public function create(Request $request){


        $cantidad=$request->cantidad;
        $inicio=$request->inicio;
        $fin=$request->fin;
        $data=array('inicio'=>$inicio,'fin'=>$fin,'descuento'=>$cantidad);
        DB::table('descuento')->insert($data);
        return redirect('promocion')->with('edit','La promoción se agrego con exito');
        
        
    }
    public function update(Request $request,$id){
        $affected =  DB::update('update descuento set inicio = ?, fin = ?, descuento = ? where id = ?', [ $request->inicio,$request->fin,$request->descuento ,$id]);
        return redirect('promocion')->with('edit','La promoción se edito con exito');
    }
}
