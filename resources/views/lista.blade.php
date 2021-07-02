@extends('layouts.app')
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
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-header">Lista de contenidos</div>
                <form action="/lista" method="GET" role="search">
                    
                    <div class="input-group">
                        <span class="input-group-btn mr-4 ">
                            <button class="btn btn-info" type="submit" title="Buscar Categorias">
                                Buscar
                            </button>
                        </span>
                        <input type="text" class="form-control " name="name" placeholder="Nombre del contenido" id="term">
                    </div>
                   
                </form>
                

                        <div class="card-body">
                            <table class="table table-striped mt-4">
                                <thead>
                                    <tr>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Precio Actual</th>
                                        <th scope="col">Extensión </th>
                                        <th scope="col">Autor</th>
                                        <th scope="col">Categoria</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($contenidos as $contenido)
                                    <tr>
                                        <td>{{ $contenido->nombre}}</td>
                                        <td>S/.{{$contenido->precio-$contenido->descuento*$contenido->precio/100}}</td>
                                        <td>{{ $contenido->tipo}}</td>
                                        <td>{{ $contenido->autor}}</td>
                                        <td>{{ $contenido->categoria }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
            </div>
        </div>
    </div>
</div>
@endsection
