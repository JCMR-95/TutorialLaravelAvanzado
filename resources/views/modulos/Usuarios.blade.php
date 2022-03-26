@extends('plantilla')

@section('contenido')


<div class="content-wrapper">

    <section>

        <h1>Gestor de Usuarios</h1>

    </section>

    <section class="content">

    <div class="box">

        <div class="box-header">

            <button class="btn btn-primary" data-toggle="modal" data-target="#CrearUsuario">Crear Nuevo Usuario</button>

        </div>

        <div class="box-body">

            <table class="table table-bordered table-hover table-striped">

                <thead>

                    <tr>

                        <th>Nombre</th>
                        <th>Documento</th>
                        <th>Foto</th>
                        <th>Email</th>
                        <th>Rol</th>
                        <th></th>

                    </tr>

                </thead>

                <tbody>

                    @foreach($usuarios as $user)

                        <tr>

                            <td>{{ $user->name }}</td>

                            @if($user->documento == "")

                                <td>No Registrado</td>

                            @else

                                <td>{{ $user->documento }}</td>

                            @endif

                            @if($user->foto == "")

                                <td><img src="{{ url('storage/defecto.png') }}" width="50px"></td>

                            @else

                                <td><img src="{{ url('storage/'.$user->foto) }}" width="50px"></td>

                            @endif

                            <td>{{ $user->email }}</td>
                            <td>{{ $user->rol }}</td>

                            <td>

                                <a href="{{ url('Editar-Usuario/'.$user->id) }}">

                                    <button class="btn btn-success"><i class="fa fa-pencil"></i></button>

                                </a>

                                <button type="button" class="btn btn-danger EliminarUsuario" Uid="{{$user->id}}" Usuario="{{$user->name}}" data-dismiss="modal"><i class="fa fa-trash"></i></button>

                            </td>

                        </tr>

                    @endforeach

                </tbody>

            </table>
        
        </div>

    </div>

    </section>

</div>


<div class="modal fade" id="CrearUsuario">

    <div class="modal-dialog">

        <div class="modal-content">

            <form method="post">

                @csrf

                <div class="modal-body">

                    <div class="box-body">

                        <div class="form-group">

                            <h2>Tipo de Usuario</h2>

                            <select class="form-control input-lg" name="rol" required="">

                                <option value="">Seleccionar...</option>

                                <option value="Administrador">Administrador</option>
                                <option value="Vendedor">Vendedor</option>

                            </select>

                        </div>

                        <div class="form-group">

                            <h2>Nombre:</h2>
                            <input type="text" class="form-control input-lg" name="name" required="" value="{{old('name')}}">

                        </div>

                        <div class="form-group">

                            <h2>Email:</h2>
                            <input type="email" class="form-control input-lg" name="email" required="">

                        </div>

                        @error('email')

                            <br>
                            <div class="alert alert-danger">El Email ya existe</div>

                        @enderror

                        <div class="form-group">

                            <h2>Contraseña:</h2>
                            <input type="text" class="form-control input-lg" name="password" required="">

                        </div>

                    </div>

                </div>

                <div class="modal-footer">

                    <button type="submit" class="btn btn-primary">Crear</button>

                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>

                </div>

            </form>

        </div>

    </div>

</div>

<?php

$exp = explode('/', $_SERVER["REQUEST_URI"]);

?>

@if($exp[1] == 'Editar-Usuario')

    <div class="modal fade" id="EditarUsuario">

        <div class="modal-dialog">

            <div class="modal-content">

                    <form method="post" action="{{ url('actualizar-Usuario/'.$exp[2]) }}">

                        @csrf
                        @method('put')

                        <div class="modal-body">

                            <div class="box-body">

                                <div class="form-group">

                                    <h2>Nombre:</h2>
                                    <input type="text" class="form-control input-lg" name="name" required="" value="{{$usuario->name}}">

                                </div>

                                <div class="form-group">

                                    <h2>Email:</h2>
                                    <input type="email" class="form-control input-lg" name="email" required="" value="{{$usuario->email}}">

                                </div>

                                @error('email')

                                    <br>
                                    <div class="alert alert-danger">El Email ya existe</div>

                                @enderror

                                <div class="form-group">

                                    <h2>Contraseña:</h2>
                                    <input type="text" class="form-control input-lg" name="password" required="">

                                </div>

                            </div>

                        </div>

                        <div class="modal-footer">

                            <button type="submit" class="btn btn-primary">Editar</button>

                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>

                        </div>

                    </form>

            </div>

        </div>

    </div>

@endif

@endsection