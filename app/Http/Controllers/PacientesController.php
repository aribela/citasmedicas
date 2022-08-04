<?php

namespace App\Http\Controllers;

use App\Models\Pacientes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PacientesController extends Controller
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
        if(auth()->user()->rol != "Administrador" && auth()->user()->rol != "Secretaria" && auth()->user()->rol != "Doctor"){
            return redirect('inicio');
        }else{
            $pacientes = DB::select('select * from users where rol = "Paciente"');
            return view('modulos.pacientes')->with('pacientes', $pacientes);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        if(auth()->user()->rol != "Administrador" && auth()->user()->rol != "Secretaria" && auth()->user()->rol != "Doctor"){
            return redirect('inicio');
        }else{
            
            return view('modulos.crear-paciente');
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
            'documento' => ['required'],
            'password' => ['required', 'string', 'min:3'],
            'email' => ['required', 'string', 'email', 'unique:users'],
        ]);

        Pacientes::create([
            'name' => $datos['name'],
            'id_consultorio' => 0,
            'email' => $datos['email'],
            'sexo'  => '',
            'documento' => $datos['documento'],
            'telefono' => '',
            'rol' => 'Paciente',
            'password' => Hash::make($datos['password']),
        ]);

        return redirect('pacientes')->with('agregado', 'Si');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pacientes  $pacientes
     * @return \Illuminate\Http\Response
     */
    public function show(Pacientes $pacientes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pacientes  $pacientes
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(auth()->user()->rol != "Administrador" && auth()->user()->rol != "Secretaria" && auth()->user()->rol != "Doctor"){
            return redirect('inicio');
        }
        $paciente = Pacientes::find($id);

        return view('modulos.editar-paciente')->with('paciente', $paciente);
    }

   
    public function update(Request $request, Pacientes $paciente){
        // dd($request('email'));
        // dd($paciente['email']);
        if($paciente["email"] != request('email') && request('passwordN') != "") {
            // dd('1');
            $datos = request()->validate([
                'name' => ['required'],
                'documento' => ['required'],
                'passwordN' => ['required', 'string', 'min:3'],
                'email' => ['required', 'string', 'email', 'unique:users'],
            ]);

            DB::table('users')->where('id', $paciente['id'])->update(['name' => $datos['name'], 'email' => $datos['email'], 'documento' => $datos['documento'], 'password' => Hash::make($datos['passwordN'])]);
        }elseif($paciente["email"] != request('email') && request('passwordN') == ""){
            // dd('2');
            $datos = request()->validate([
                'name' => ['required'],
                'documento' => ['required'],
                'password' => ['required', 'string', 'min:3'],
                'email' => ['required', 'string', 'email', 'unique:users'],
            ]);

            DB::table('users')->where('id', $paciente['id'])->update(['name' => $datos['name'], 'email' => $datos['email'], 'documento' => $datos['documento'], 'password' => $datos['password']]);
        }elseif($paciente["email"] == request('email') && request('passwordN') != ""){
            // dd('3');
            $datos = request()->validate([
                'name' => ['required'],
                'documento' => ['required'],
                'passwordN' => ['required', 'string', 'min:3'],
                'email' => ['required', 'string', 'email'],
            ]);

            DB::table('users')->where('id', $paciente['id'])->update(['name' => $datos['name'], 'email' => $datos['email'], 'documento' => $datos['documento'], 'password' => Hash::make($datos['passwordN']) 
            ]);
        }else{
            // dd('4');
            $datos = request()->validate([
                'name' => ['required'],
                'documento' => ['required'],
                'password' => ['required', 'string', 'min:3'],
                'email' => ['required', 'string', 'email'],
            ]);

            DB::table('users')->where('id', $paciente['id'])->update(['name' => $datos['name'], 'email' => $datos['email'], 'documento' => $datos['documento'], 'password' => $datos['password']]);
        }

        return redirect('pacientes')->with('actualizadoP', 'Si');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pacientes  $pacientes
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pacientes::destroy($id);

        return redirect('pacientes');
    }
}
