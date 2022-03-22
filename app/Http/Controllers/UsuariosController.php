<?php

namespace App\Http\Controllers;

use App\Models\Usuarios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuariosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function MisDatos()
    {

        return view('modulos.Mis-Datos');

    }

    public function DatosUpdate(Request $request)
    {
        
        if(auth()->user()->email != request('email')){

            if(isset($datos['passwordN'])){

                $datos = request()->validate([

                    'name'=>['required','string','max:255'],
                    'email'=>['required','email','unique:users'],
                    'passwordN'=>['required','string','min:3']
                ]);

            }else{

                $datos = request()->validate([

                    'name'=>['required','string','max:255'],
                    'email'=>['required','email','unique:users']

                ]);

            }

        }else{


            if(isset($datos['passwordN'])){

                $datos = request()->validate([

                    'name'=>['required','string','max:255'],
                    'email'=>['required','email'],
                    'passwordN'=>['required','string','min:3']
                ]);

            }else{

                $datos = request()->validate([

                    'name'=>['required','string','max:255'],
                    'email'=>['required','email']
                    
                ]);

            }

        }

        //Este "documento" es de Mis-Datos.blade.php
        if(request('documento')){

            $documento = $request['documento'];

        }else{

            $documento = auth()->user()->documento;

        }


        //Este "fotoPerfil" es de Mis-Datos.blade.php
        if(request('fotoPerfil')){

            Storage::delete('public/'.auth()->user()->foto);

            $rutaImg = $request['fotoPerfil']->store('Usuarios/'.$datos["name"], 'public');

        }else{

            $rutaImg = auth()->user()->foto;

        }


        if(isset($datos['passwordN'])){

            DB::table('users')->where('id', auth()->user()->id)->update(['name' => $datos["name"], 'email' => $datos["email"], 'documento' => $documento, 'foto' => $rutaImg, 'password' => Hash::make($datos["passwordN"])]);

        }else{

            DB::table('users')->where('id', auth()->user()->id)->update(['name' => $datos["name"], 'email' => $datos["email"], 'documento' => $documento, 'foto' => $rutaImg]);

        }

        return redirect('Mis-Datos');

    }
    

    public function index()
    {

        if(auth()->user()->rol != "Administrador"){

            return redirect('Inicio');

        }

        $usuarios = Usuarios::all();

        return view('modulos.Usuarios')->with('usuarios', $usuarios);

    }


  


    public function store(Request $request)
    {
        
        $datos = request()->validate([

            'name' => ['string','max:255'],
            'rol' => ['required'],
            'email' => ['string','unique:users'],
            'password' => ['string','min:3']

        ]);

        Usuarios::create([

            'name'=>$datos["name"],
            'email'=>$datos["email"],
            'rol'=>$datos["rol"],
            'password'=>Hash::make($datos["password"]),
            'documento'=>'',
            'foto'=>''

        ]);

        return redirect('Usuarios')->with('UsuarioCreado','OK');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Usuarios  $usuarios
     * @return \Illuminate\Http\Response
     */
    public function show(Usuarios $usuarios)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Usuarios  $usuarios
     * @return \Illuminate\Http\Response
     */
    public function edit(Usuarios $usuarios)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Usuarios  $usuarios
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Usuarios $usuarios)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Usuarios  $usuarios
     * @return \Illuminate\Http\Response
     */
    public function destroy(Usuarios $usuarios)
    {
        //
    }
}
