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

class UserController extends Controller
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
        return view('user',['categorias' => $categorias]);
    }
}
