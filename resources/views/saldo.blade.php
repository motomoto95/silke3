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
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <form action="/saldo" method="GET" role="search">
                    <div class="col-md-8">
                    <div class="input-group">
                        <span class="input-group-btn mr-4 ">
                            <button class="btn btn-info" type="submit" title="Search Name">
                                Buscar
                            </button>
                        </span>
                        <input type="text" class="form-control mr-2" name="name" placeholder="Nombre del usuario" id="term">
            
                    </div>
                    </div>
                </form>
                <table class="table table-striped mt-4">
                    <thead>
                        <tr>
                            <th scope="col">Nombre</th>
                            <th scope="col">Saldo</th>
                            <th scope="col">Email</th>
                            <th scope="col">Editar Saldo</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($usuarios as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->saldo }}</td>
                            <td>{{$user->email }}</td>
                            <td>
                                <a href=""  class="btn btn-outline-success" data-toggle="modal" data-target="#editarModal{{$user->id}}" data-name="{{$user->name}}" > Agregar Saldo</a>
                                    <div class="modal fade" id="editarModal{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editarModal{{$user->id}}">Agregar Saldo</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST" action="{{route('saldo.update',$user->id)}}">
                                                @csrf @method('PUT')
                                                <div class="form-group">
                                                    <label for="recipient-name" class="col-form-label">Nombre:</label>
                                                    <input type="text" class="form-control" id="recipient-name" value="{{$user->name}} " disabled>
                                                </div>
                                                <div class="form-group">
                                                    <label for="message-text" class="col-form-label">Saldo a agregar:</label>
                                                    <input type="number" class="form-control" name="saldo" value="0" id="message-text">
                                                </div>
                                                
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                                                <button type="submit" name="editar" class="btn btn-success"><span class="glyphicon glyphicon-check"></span> Agregar Saldo</button>
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
                @if (isset($_GET['name']))
                {{ 
                    $usuarios->appends(['name' => $_GET['name']])->links('pagination::bootstrap-4') 
                }}
                
                @else
                {{ 
                    $usuarios->links('pagination::bootstrap-4') 
                }}
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
