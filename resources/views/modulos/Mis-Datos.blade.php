@extends('plantilla')

@section('contenido')


<div class="content-wrapper">

    <section>

        <h1>Gestor de su Perfil Personal</h1>

    </section>

    <section class="content">

    <div class="box">

        <div class="box-body">

            <form method="post" enctype="multipart/form-data">

                @csrf

                @method('put')

                <div class="row">

                    <div class="col-md-6 col-xs-12">

                        <h2>Nombre:</h2>
                        <input type="text" class="input-lg" name="name" value="{{ auth()->user()->name }}"> 

                        <h2>Documento:</h2>
                        <input type="text" class="input-lg" name="documento" value="{{ auth()->user()->documento }}"> 

                    </div>

                    <div class="col-md-6 col-xs-12">

                        <h2>Email:</h2>
                        <input type="email" class="input-lg" name="email" value="{{ auth()->user()->email }}"> 

                        <h2>Contraseña:</h2>
                        <input type="text" class="input-lg" name="passwordN" value=""> 

                        <input type="hidden" name="password" value="{{ auth()->user()->password }}"> 

                        <h2>Foto de Perfil:</h2>
                        <br>
                        
                        <input type="file" name="fotoPerfil">
                        <br>

                        @if(auth()->user()->foto == "")

                            <img src="{{ url('storage/defecto.png') }}" width="150px" height="150px">

                        @else 

                            <img src="{{ url('storage/'.auth()->user()->foto) }}" width="150px" height="150px">

                        @endif

                    </div>

                </div>


        
        </div>

        <div class ="box-footer">

            <button type="submit" class="btn btn-success btn-lg pull-right">Guardar</button>

        </div>

        </form>

    </div>

    </section>

</div>


@endsection