<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsuariosAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use  Carbon\Carbon;
use App\Http\Requests\validadorRegistro;

class UsuariosAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $consultaAdmis = DB::table('administradores')->get();
        return view('AdminVisualizacion', compact('consultaAdmis'));

    }

    public function indexUsuarios()
{
    // Listar los usuarios normales
    $consultaUsuarios = DB::table('usuarios')->get();
    return view('AdminUsuarios', compact('consultaUsuarios'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $generos = DB::table('generos')->select('id', 'nombre')->get(); // Selecciona solo 'id' y 'nombre'
    return view('AdminUsuariosform', compact('generos'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UsuariosAdmin $request)
    {
        DB::table('administradores')->insert([
            'nombre' => $request->input('nombre'),
            'apellidos' => $request->input('apellidos'),
            'correo' => $request->input('correo'),
            'contraseña' =>     ($request->input('password')),
            'Id_genero' => $request->input('Id_genero'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $usuario = $request->input('nombre');
        session()->flash('exito', 'Se guardó el administrador: ' . $usuario);

        return to_route('rutaLogin');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}