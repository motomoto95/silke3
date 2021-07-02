@extends('layouts.app')

@section('content')
@if (\Session::has('edit'))
    <div class="alert alert-success">
        <p> {{\Session::get('edit')}}</p>
    </div>
@endif
@if (\Session::has('fallo'))
    <div class="alert alert-danger">
        <p> {{\Session::get('fallo')}}</p>
    </div>
@endif
<div class="container ">
    <div class=" row justify-content-center ">
        <div class="col-md-4 ">
            <div class="card-header">{{ __('Opciones') }}</div>
            <div class="card">
                <div class="list-group" id="list-tab" role="tablist">
                    <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">Inicio</a>
                    <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">Perfil</a>
                    <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list" href="#list-segurity" role="tab" aria-controls="segurity">Seguridad</a>
                    @if(Auth::user()->tipo_cuenta==0)
                        <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab" aria-controls="settings">Eliminar Cuenta</a>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Configuracion') }}</div>

                <div class="card-body" style="height: 35rem;">
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
                            En este menu ustede puede editar sus datos personales, gestionar su contraseña y eliminar su Usuario tenga cuidado
                            <img src="https://img1.freepng.es/20180320/kae/kisspng-skull-and-bones-skull-and-crossbones-clip-art-skull-and-crossbones-png-picture-5ab15492d1c0d1.8928022515215709628592.jpg" class="img-thumbnail" style="display: block;margin-left: auto; margin-right: auto;">
                        </div>
                        <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">Perfil</div>
                        <div class="tab-pane fade" id="list-segurity" role="tabpanel" aria-labelledby="list-segurity-list">
                            @if (Auth::user()->tipo_cuenta==1)
                            <form>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Correo Electronico</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="{{Auth::user()->email}}" disabled> 
                                </div>
                            </form>
                            @else
                            <form method="POST" action="{{route('config.store')}}">
                                @csrf
                                <div class="form-group">
                                  <label for="exampleInputEmail1">Correo Electronico</label>
                                  <input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Ingrese corre electronico nuevo">
                                </div>
                                <div class="form-group">
                                  <label >Contraseña actual</label>
                                  <input type="password" name="contraseña" class="form-control"  placeholder="Contraseña">
                                </div>
                                <div class="form-group">
                                    <label >Contraseña nueva</label>
                                    <input type="password" name="contraseña_nueva" class="form-control"  placeholder="Contraseña nueva">
                                  </div>
                                <button type="submit" class="btn btn-primary">Cambiar</button>
                              </form>
                            @endif
                        </div>

                        <div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">
                            <h2  style="text-align: center;">¿Esta seguro de eliminar su cuenta?</h2>
                            <a class="btn btn-success btn-lg" href="{{ route('config.edit', Auth::user()->id) }}" method="POST" style="position: absolute; right: 20px;">Si</a>  
                            <a class="btn btn-danger btn-lg" href="{{route('home') }}">No </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
