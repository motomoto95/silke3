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

                <div class="card-header">Crear Categorias</div>
                <form action="/categoria" method="GET" role="search">
                    
                    <div class="input-group">
                        <span class="input-group-btn mr-4 ">
                            <button class="btn btn-info" type="submit" title="Buscar Categorias">
                                Buscar
                            </button>
                        </span>
                        <input type="text" class="form-control " name="nom_categoria" placeholder="Nombre de la categoria" id="term">
                    </div>
                   
                </form>
                <a href=""  class="btn btn-outline-success" data-toggle="modal" data-target="#editarModal"> Agregar Categorias</a>
                    <div class="modal fade" id="editarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editarModal">Agregar Saldo</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form method="GET" action="{{ route('categoria.create') }}">
        
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Nombre de la categoria:</label>
                                    <input type="text" name="name_categoria" class="form-control" id="recipient-name">
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
                                        <th scope="col">Categoria</th>
                                        <th scope="col">Descripción</th>
                                        <th scope="col">Editar Categoria</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($categorias as $categoria)
                                    <tr>
                                        <td>{{ $categoria->nom_categoria }}</td>
                                        <td>{{ $categoria->detalle }}</td>
                                        <td>
                                            <a href=""  class="btn btn-outline-success" data-toggle="modal" data-target="#editarModal{{$categoria->id}}" data-name="{{$categoria->nom_categoria}}" > Editar</a>
                                                <div class="modal fade" id="editarModal{{$categoria->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="editarModal{{$categoria->id}}">Editar Categoria</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form method="POST" action="{{route('categoria.update',$categoria->id)}}">
                                                            @csrf @method('PUT')
                                                            <div class="form-group">
                                                                <label for="recipient-name" class="col-form-label">Nombre:</label>
                                                                <input type="text" class="form-control" name="nombre" id="recipient-name" value="{{$categoria->nom_categoria}} ">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="message-text" class="col-form-label">Detalles:</label>
                                    
                                                                <input type="text" class="form-control" name="detalle" value="{{$categoria->detalle}}" id="message-text">
                                                            </div>
                                                            
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                                                            <button type="submit"  class="btn btn-success"><span class="glyphicon glyphicon-check"></span> Cambiar Categoria</button>
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
                            @if (isset($_GET['nom_categoria']))
                            {{ 
                                $categorias->appends(['nom_categoria' => $_GET['nom_categoria']])->links('pagination::bootstrap-4') 
                            }}
                            
                            @else
                            {{ 
                                $categorias->links('pagination::bootstrap-4') 
                            }}
                            @endif
                        </div>
            </div>
        </div>
    </div>
</div>
@endsection
