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
class Controller extends BaseController
{
    public function subirArchivo(Request $request)
    {
           //Recibimos el archivo y lo guardamos en la carpeta storage/app/public
           $request->file('archivo')->store('public');
           dd("subido y guardado");
    }
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
