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

                <div class="card-header">Crear Descuento</div>
                <form action="/promocion" method="GET" role="search">
                    
                    <div class="input-group">
                        <span class="input-group-btn mr-4 ">
                            <button class="btn btn-info" type="submit" title="Buscar Descuento">
                                Buscar
                            </button>
                        </span>
                        <input type="number" class="form-control " name="descuento" placeholder="Cantidad de descuento" id="term">
                    </div>
                   
                </form>
                <a href=""  class="btn btn-outline-success" data-toggle="modal" data-target="#editarModal"> Agregar promoción</a>
                    <div class="modal fade" id="editarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editarModal">Agregar Promoción</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form method="GET" action="{{ route('promocion.create') }}">
        
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Cantidad de descuento en porcentaje:</label>
                                    <input type="number" name="cantidad" class="form-control" id="recipient-name">
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Fecha de inicio del descuento:</label>
                                    <input type="date" class="form-control" name="inicio">
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Fecha de finalización del descuento:</label>
                                    <input type="date" class="form-control" name="fin">

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
                                        <th scope="col">Fecha de inicio</th>
                                        <th scope="col">Fecha final</th>
                                        <th scope="col">Descuento</th>
                                        <th scope="col">Editar Categoria</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($descuentos as $descuento)
                                    <tr>
                                        <td>{{ $descuento->inicio }}</td>
                                        <td>{{ $descuento->fin }}</td>
                                        <td>{{$descuento->descuento}}</td>
                                        <td>
                                            <a href=""  class="btn btn-outline-success" data-toggle="modal" data-target="#editarModal{{$descuento->id}}" > Editar</a>
                                                <div class="modal fade" id="editarModal{{$descuento->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="editarModal{{$descuento->id}}">Editar Categoria</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form method="POST" action="{{route('promocion.update',$descuento->id)}}">
                                                            @csrf @method('PUT')
                                                            <div class="form-group">
                                                                <label for="recipient-name" class="col-form-label">Descuento:</label>
                                                                <input type="text" class="form-control" name="descuento" id="recipient-name" value="{{$descuento->descuento}} ">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="message-text" class="col-form-label">Fecha de inicio:</label>
                                                                <input type="date" class="form-control" name="inicio" value="{{$descuento->inicio}}" id="message-text">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="message-text" class="col-form-label">Fecha final:</label>
                                                                <input type="date" class="form-control" name="fin" value="{{$descuento->fin}}" id="message-text">
                                                            </div>
                                                            
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                                                            <button type="submit"  class="btn btn-success"><span class="glyphicon glyphicon-check"></span> Cambiar Descuento</button>
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
                            @if (isset($_GET['descuento']))
                            {{ 
                                $descuentos->appends(['descuento' => $_GET['descuento']])->links('pagination::bootstrap-4') 
                            }}
                            
                            @else
                            {{ 
                                $descuentos->links('pagination::bootstrap-4') 
                            }}
                            @endif
                        </div>
            </div>
        </div>
    </div>
</div>
@endsection
