<?php

namespace App\Http\Controllers;

use App\Models\Inicio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class InicioController extends Controller
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
        $inicio = Inicio::find(1);

        return view('modulos.inicio')->with('inicio', $inicio);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Inicio  $inicio
     * @return \Illuminate\Http\Response
     */
    public function show(Inicio $inicio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Inicio  $inicio
     * @return \Illuminate\Http\Response
     */
    public function edit(Inicio $inicio)
    {
        $inicio = Inicio::find(1);

        return view('modulos.editar-inicio')->with('inicio', $inicio);
    }

   
    public function update(Request $request)
    {
        $datos = request();

        $inicio = Inicio::find(1);

        $inicio->dias = $datos['dias'];
        $inicio->horaInicio = $datos['horaInicio'];
        $inicio->horaFin = $datos['horaFin'];
        $inicio->email = $datos['email'];
        $inicio->telefono = $datos['telefono'];
        $inicio->direccion = $datos['direccion'];

        if(request('logoN')){
            Storage::delete('public/'.$inicio->logo);
            $rutaImg = $request['logoN']->store('inicio', 'public');
            $inicio->logo = $rutaImg;
        }

        $inicio->save();

        return redirect('inicio-editar');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Inicio  $inicio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Inicio $inicio)
    {
        //
    }

    public function datosCreate(){
        return view('modulos.mis-datos');
    }

    public function datosUpdate(Request $request){
        if(auth()->user()->email != request("email")){
        
            if(request('passwordN') != null){
                $datos = request()->validate([
                    'name' => ['required', 'string', 'max:255'],
                    'telefono' => ['max:255'],
                    'documento' => ['max:255'],
                    'email' => ['required', 'email', 'string', 'max:255', 'unique:users'],
                    'passwordN' => ['required', 'string', 'min:3'],
                ]);
            }else{
                $datos = request()->validate([
                    'name' => ['required', 'string', 'max:255'],
                    'telefono' => ['max:255'],
                    'documento' => ['max:255'],
                    'email' => ['required', 'email', 'string', 'max:255', 'unique:users'],
                ]);
            }
        }else{
            if(request('passwordN') != null){
                // dd("a");
                $datos = request()->validate([
                    'name' => ['required', 'string', 'max:255'],
                    'telefono' => ['max:255'],
                    'documento' => ['max:255'],
                    'email' => ['required', 'email', 'string', 'max:255'],
                    'passwordN' => ['required', 'string', 'min:3'],
                ]);
            }else{
                $datos = request()->validate([
                    'name' => ['required', 'string', 'max:255'],
                    'telefono' => ['max:255'],
                    'documento' => ['max:255'],
                    'email' => ['required', 'email', 'string', 'max:255'],
                ]);
            }
            // dd("pi");
        }
        
        
        if(request('passwordN') != null){
            // dd("1");
            DB::table('users')->where('id', auth()->user()->id)->update([
                'name' => $datos["name"],
                'email' => $datos["email"],
                'telefono' => $datos["telefono"],
                'documento' => $datos["documento"],
                'password' => Hash::make($datos["passwordN"]),
            ]);
        }else{
            // dd("2");
            DB::table('users')->where('id', auth()->user()->id)->update([
                'name' => $datos["name"],
                'email' => $datos["email"],
                'telefono' => $datos["telefono"],
                'documento' => $datos["documento"],
            ]);
        }

        return redirect('mis-datos');
    }
}
