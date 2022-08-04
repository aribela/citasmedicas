<?php

namespace App\Http\Controllers;

use App\Models\Secretarias;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class SecretariasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user() !== null){
            if(auth()->user()->rol != "Administrador"){
                return redirect('inicio');
            }
        }else{
            return redirect('login');
        }

        $secretarias = Secretarias::all()->where('rol', '=','Secretaria');

        return view('modulos.secretarias')->with('secretarias', $secretarias);

    }

    
    public function store(Request $request)
    {
        $datos = request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'max:255', 'email', 'unique:users'],
            'password' => ['required', 'string', 'min:3'],
        ]);

        $secretaria = Secretarias::create([
            'name' => $datos['name'],
            'id_consultorio' => 0,
            'email' => $datos['email'],
            'password' => Hash::make($datos['password']),
            'sexo' => '',
            'telefono' => '',
            'documento' => '',
            'rol' => 'Secretaria',
        ]);

        return redirect('secretarias')->with('secretariaCreada', 'Si');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Secretarias  $secretarias
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $editarsid = $id;
        if(auth()->user() !== null){
            if(auth()->user()->rol != "Administrador"){
                return redirect('inicio');
            }
        }else{
            return redirect('login');
        }

        $secretarias = Secretarias::all()->where('rol', '=','Secretaria');
        $secretaria = Secretarias::find($id);

        return view('modulos.secretarias', compact('secretarias', 'editarsid', 'secretaria'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Secretarias  $secretarias
     * @return \Illuminate\Http\Response
     */
    public function edit(Secretarias $secretarias)
    {
        //
    }

    
    public function update(Request $request, Secretarias $secretaria)
    {
    //    dd($secretaria["email"]);
        if($secretaria["email"] != request('email') && request('passwordN') != ""){
            $datos = request()->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'email', 'string', 'max:255', 'unique:users'],
                'passwordN' => ['required', 'string', 'min:3']
            ]);

            DB::table('users')->where('id', $secretaria["id"])->update([
                'name' => $datos['name'],
                'email' => $datos['email'],
                'password' => Hash::make($datos['passwordN']),
            ]);
        }elseif($secretaria["email"] != request('email') && request('passwordN') == ""){
            $datos = request()->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'email', 'string', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:3']
            ]);

            DB::table('users')->where('id', $secretaria["id"])->update([
                'name' => $datos['name'],
                'email' => $datos['email'],
                'password' => $datos['password'],
            ]);
        }elseif($secretaria["email"] == request('email') && request('passwordN') != ""){
            $datos = request()->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'email', 'string', 'max:255'],
                'passwordN' => ['required', 'string', 'min:3']
            ]);

            DB::table('users')->where('id', $secretaria["id"])->update([
                'name' => $datos['name'],
                'email' => $datos['email'],
                'password' => Hash::make($datos['passwordN']),
            ]);
        }else{
            $datos = request()->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'email', 'string', 'max:255'],
                'password' => ['required', 'string', 'min:3']
            ]);

            DB::table('users')->where('id', $secretaria["id"])->update([
                'name' => $datos['name'],
                'email' => $datos['email'],
                'password' => $datos['password'],
            ]);
        }

        return redirect('secretarias')->with('actualizadoS', 'Si');
    }

    public function destroy($id)
    {
        Secretarias::destroy($id);

        return redirect('secretarias');
    }
}
