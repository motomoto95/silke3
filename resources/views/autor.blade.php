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

                <div class="card-header">Crear Autores</div>
                <form action="/autor" method="GET" role="search">
                    
                    <div class="input-group">
                        <span class="input-group-btn mr-4 ">
                            <button class="btn btn-info" type="submit" title="Buscar Categorias">
                                Buscar
                            </button>
                        </span>
                        <input type="text" class="form-control " name="nom_autor" placeholder="Nombre de la categoria" id="term">
                    </div>
                   
                </form>
                <a href=""  class="btn btn-outline-success" data-toggle="modal" data-target="#editarModal"> Agregar Autor</a>
                    <div class="modal fade" id="editarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editarModal">Agregar Autor</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form method="GET" action="{{ route('autor.create') }}">
        
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Nombre del autor:</label>
                                    <input type="text" name="name_autor" class="form-control" id="recipient-name">
                                </div>
                                
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Ciudad Natal:</label>
                                    <input type="text" name="ciudad" class="form-control" id="recipient-name">
                                </div>

                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label" placeholder="Año/Mes/Dia">Fecha de nacimiento:</label>
                                    <small id="emailHelp" class="form-text text-muted">2001/12/29</small>
                                    <input type="text" name="fecha" class="form-control" id="recipient-name">
                                </div>

                                <div class="form-group">
                                    <label for="message-text" class="col-form-label">Descripción:</label>
                                    <textarea class="form-control" name="descripcion" rows="3"></textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                                <button type="submit"  class="btn btn-success"><span class="glyphicon glyphicon-check"></span> Agregar Categorias</button>
                                </form>
                            </div>
                            </div>
                        </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped mt-4">
                                <thead>
                                    <tr>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Fecha</th>
                                        <th scope="col">Ciudad Natal</th>
                                        <th scope="col">Descripción</th>
                                        <th scope="col">Editar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($autores as $autor)
                                    <tr>
                                        <td>{{ $autor->nombre }}</td>
                                        <td>{{ $autor->fecha_nacimiento }}</td>
                                        <td>{{ $autor->ciudad_natal }}</td>
                                        <td>{{ $autor->detalle }}</td>
                                        <td>
                                            <a href=""  class="btn btn-outline-success" data-toggle="modal" data-target="#editarModal{{$autor->id}}" data-name="{{$autor->nombre}}" > Editar</a>
                                                <div class="modal fade" id="editarModal{{$autor->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="editarModal{{$autor->id}}">Editar Autor</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form method="POST" action="{{route('autor.update',$autor->id)}}">
                                                            @csrf @method('PUT')
                                                            <div class="form-group">
                                                                <label for="recipient-name" class="col-form-label">Nombre:</label>
                                                                <input type="text" class="form-control" name="nombre" id="recipient-name" value="{{$autor->nombre}} ">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="message-text" class="col-form-label">Fecha:</label>
                                    
                                                                <input type="text" class="form-control" name="fecha" value="{{$autor->fecha_nacimiento}}" id="message-text">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="recipient-name" class="col-form-label">Ciudad:</label>
                                                                <input type="text" class="form-control" name="ciudad" id="recipient-name" value="{{$autor->ciudad_natal}} ">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="recipient-name" class="col-form-label">Descripción:</label>
                                                                <input type="text" class="form-control" name="detalle" id="recipient-name" value="{{$autor->detalle}} ">
                                                            </div>
                                                            
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                                                            <button type="submit"  class="btn btn-success"><span class="glyphicon glyphicon-check"></span> Editar Autor</button>
                                                            </form>
                                                        </div>
                                                        </div>
                                                    </div>
                                                </div>
            
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
            
                            </table>
                            @if (isset($_GET['nom_autor']))
                            {{ 
                                $autores->appends(['nom_autor' => $_GET['nom_autor']])->links('pagination::bootstrap-4') 
                            }}
                            
                            @else
                            {{ 
                                $autores->links('pagination::bootstrap-4') 
                            }}
                            @endif
                        </div>
            </div>
        </div>
    </div>
</div>
@endsection
