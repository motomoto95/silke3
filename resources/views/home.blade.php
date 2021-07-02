@extends('layouts.app')

@section('content')
@if(Auth::user()->estado==1)
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Bienvenido de vuelta</div>

                <div class="card-body">
                    <h2  style="text-align: center;">¿Quieres regresar a la familia?</h2>
                    <a class="btn btn-success btn-lg" href="{{ route('config.edit', Auth::user()->id) }}" method="POST" style="position: absolute; right: 20px;">Si</a>
                    
                    <a class="btn btn-danger btn-lg" href="{{route('logout') }}"     onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                    {{ __('No') }}
                    </a>
                    </div>
            </div>
        </div>
    </div>
</div>
@else

<div class="container ">
    <div class=" row justify-content-center ">
        <div class="col-md-4 ">
            <div class="card-header">{{ __('Opciones') }}</div>
            <div class="card">
                <div class="list-group" id="list-tab" role="tablist">
                    <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">Tienda</a>
                    <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">Contenido</a>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Detalle') }}</div>

                <div class="card-body" style="height: 35rem;">
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
                            <div class="container">
                                <div class="row">
                                    <div class="col-4">
                                    <img class="w-50 p-3 " src="https://www.abd.es/wp-content/uploads/2016/02/icono-promociones-300x300.png" class="img-thumbnail" style="display: block;margin-left: auto; margin-right: auto;">
                                    </div>
                                    <div class="col-8">
                                        <a class="btn btn-primary btn-lg btn-block" href="/promocion" role="button" style="height: 4rem;">Crear Promocion</a>
                                    </div>
                                </div>
                                <div class="row">
                                
                                    <div class="col-4">
                                        <img class="w-50 p-3 " src="https://thumbs.dreamstime.com/b/icono-de-combinaci%C3%B3n-para-categor%C3%ADa-rango-y-serie-clase-jerarqu%C3%ADa-logotipo-159893237.jpg"  style="display: block;margin-left: auto; margin-right: auto;">
                                    </div>
                                    <div class="col-8">
                                        <a class="btn btn-primary btn-lg btn-block " href="{{ route('categoria.index') }}" role="button" style="height: 4rem;">Crear Categoria</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
                            <div class="container">
                            <div class="row">
                                <div class="col" style="height: 60px;">
                                    <a href="/contenido" class="btn btn-primary btn-lg btn-block"  role="button" aria-pressed="true">Añadir Contenido</a>
                                </div>
                                <div class="col " style="height: 60px;">
                                    <button type="button" class="btn btn-primary btn-lg btn-block">Historial de Descargas</button>
                                </div>
                                <div class="w-100"></div>
                                <div class="col" style="height: 60px;">
                                    <a href="/autor" class="btn btn-primary btn-lg btn-block"  role="button" aria-pressed="true">Agregar Autor</a>
                                </div>
                                <div class="col" style="height: 60px;">
                                    <a href="/lista" class="btn btn-primary btn-lg btn-block"  role="button" aria-pressed="true">Lista de Contenidos multimedia</a>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endif
@endsection
