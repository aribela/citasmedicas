<?php

namespace App\Http\Controllers;

use App\Models\Citas;
use App\Models\Pacientes;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CitasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        
        if(auth()->user() != null){
            if(auth()->user()->rol == "Doctor" && $id != auth()->user()->id){
                return redirect('inicio');
            }
        }else{
            return redirect('login');
        }
        $pacientes = Pacientes::where("rol", "=", "Paciente")->get();
        $horarios = DB::select('select * from horarios where doctor_id='.$id);
        if(auth()->user()->rol == "Doctor"){
            $citas = Citas::all()->where('doctor_id', $id);
        }elseif(auth()->user()->rol == "Paciente"){
            $citas = Citas::all()->where('paciente_id', auth()->user()->id)->where('doctor_id', $id);
        }
        $doctor_id = $id;
        $doctor = User::find($id);

        return view('modulos.citas', compact('horarios', 'pacientes', 'citas', 'doctor_id', 'doctor'));
    }

    public function horarioDoctor(Request $request)
    {
        $datos = request();
        DB::table('horarios')->insert(['doctor_id' => auth()->user()->id, 'horaInicio' => $datos["horaInicio"], 'horaFin' => $datos["horaFin"]]);

        return redirect('citas/'.auth()->user()->id);
    }

    public function editarHorario(Request $request){
        $datos = request();
        DB::table('horarios')->where('id', $datos["id"])->update(['horaInicio' => $datos["horaInicioE"], 'horaFin' => $datos["horaFinE"]]);

        return redirect('citas/'.auth()->user()->id);
    }

    
    public function crearCita(Request $doctor_id)
    {
        //
        Citas::create([
            'doctor_id' => request("doctor_id"),
            'paciente_id' => request("paciente_id"),
            'FyHinicio' => request("FyHinicio"),
            'FyHfinal' => request("FyHfinal"),
        ]);

        return redirect('citas/'.request("doctor_id"));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Citas  $citas
     * @return \Illuminate\Http\Response
     */
    public function show(Citas $citas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Citas  $citas
     * @return \Illuminate\Http\Response
     */
    public function edit(Citas $citas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Citas  $citas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Citas $citas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Citas  $citas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Citas $citas)
    {
        DB::table('citas')->whereId(request("idCitaE"))->delete();
        return redirect('citas/'.request('doctor_idE'));
    }

    public function historial(){
        if(auth()->user()->rol != "Paciente"){
            return redirect('inicio');
        }
        $citas = Citas::all()->where('paciente_id', auth()->user()->id);
        return view('modulos.historial', compact('citas'));
    }
}
