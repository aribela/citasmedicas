<?php

namespace App\Http\Controllers;

use App\Models\Consultorios;
use App\Models\Doctores;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class DoctoresController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if(auth()->user()->rol != "Administrador" && auth()->user()->rol != "Secretaria"){
            return redirect('inicio');
        }else{
            $doctores = Doctores::all();
            $consultorios = Consultorios::all();
            // $doctores = array();
            return view('modulos.doctores', compact('doctores', 'consultorios'));
        }
    }

    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $datos = request()->validate([
            'name' => ['required'],
            'sexo' => ['required'],
            'id_consultorio' => ['required'],
            'password' => ['required', 'string', 'min:3'],
            'email' => ['required', 'string', 'email', 'unique:users'],
        ]);

        Doctores::create([
            'name' => $datos['name'],
            'id_consultorio' => $datos['id_consultorio'],
            'email' => $datos['email'],
            'sexo'  => $datos['sexo'],
            'documento' => '',
            'telefono' => '',
            'rol' => 'Doctor',
            'password' => Hash::make($datos['password']),
        ]);

        return redirect('doctores')->with('registrado', 'Si');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Doctores  $doctores
     * @return \Illuminate\Http\Response
     */
    public function show(Doctores $doctores)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Doctores  $doctores
     * @return \Illuminate\Http\Response
     */
    public function edit(Doctores $doctores)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Doctores  $doctores
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Doctores $doctores)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Doctores  $doctores
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        DB::table('users')->whereId($id)->delete();
        return redirect('doctores');
    }

    public function verDoctores($id){
        $consultorio = Consultorios::find($id);
        $doctores = DB::select('select *, A.id AS idUser, B.id idHorario from users A LEFT JOIN horarios B ON B.doctor_id=A.id where A.id_consultorio='.$id);

        return view('modulos.ver-doctores', compact('consultorio', 'doctores'));
    }
}
