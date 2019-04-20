<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Auth;
use App\Taller; 
use App\Arriendo;
use App\Inscribir;
use PDF;

class TallerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check()){
            $talleres = Taller::all();
            return view('taller.listar',compact('talleres'));  
        }else{
            return view('auth.login');
        } 
    } 

     public function pdf() {
        //Llamada a la BD
        $talleres = DB::table('taller')->get();
        //Se genera el archive PDF
        $pdf = PDF::loadView('pdf.talleres', compact('talleres'));
        //Lo forzamos a iniciar descarga
        return $pdf->download('listado_talleres.pdf');
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

    public function inscribir(Request $request)
    {
        $inscripcion = new Inscribir(); 
        $inscripcion->id_taller = $request->input('id_ins');
        $inscripcion->id_vecino = auth()->user()->id;
        $inscripcion->alumno = $request->input('nombre_ins');
        $inscripcion->num_casa = auth()->user()->num_casa;
        $inscripcion->rut = $request->input('rut_ins');
        $inscripcion->telefono = auth()->user()->telefono;
        $inscripcion->save(); 

        $tallerUpdate = Taller::find($request->input('id_ins')); 
        $tallerUpdate->cupos = $tallerUpdate->cupos-1;
        $tallerUpdate->save();

        return redirect()->route('taller.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $taller = new Taller(); 
        $taller->nombre_profesor = $request->input('profesor_taller');
        $taller->nombre_taller = $request->input('nombre_taller');
        $taller->descripcion = $request->input('descripcion_taller');
        $taller->cupos = $request->input('cupos_taller');
        $taller->save();
        return redirect()->route('taller.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tallerEdit = Taller::find($id);
        return json_encode($tallerEdit); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $tallerUpdate = Taller::find($id);

        $tallerUpdate->nombre_profesor = $request->input('profesor_edit');
        $tallerUpdate->nombre_taller = $request->input('nombre_edit');
        $tallerUpdate->descripcion = $request->input('descripcion_edit');
        $tallerUpdate->cupos = $request->input('cupos_edit');
        $tallerUpdate->save();
        return redirect()->route('taller.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $taller = Taller::find($id);
       $taller->delete(); 
       return redirect()->route('taller.index');
    }
}
