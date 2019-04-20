<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;  
use Illuminate\Support\Facades\Auth;
use App\Cuota;
use PDF;

class CuotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check()){
            $cuotas = Cuota::all();
            return view('cuota.listar',compact('cuotas'));
        }else{
            return view('auth.login');
        } 
        
    }

    public function pdf() {
        //Llamada a la BD
        $cuotas = DB::table('cuota')->get();
        //Se genera el archive PDF
        $pdf = PDF::loadView('pdf.cuotas', compact('cuotas'));
        //Lo forzamos a iniciar descarga
        return $pdf->download('listado_cuotas.pdf');
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
        $cuota = new Cuota(); 
        $cuota->titulo = $request->input('titulo_cuota');
        $cuota->valor = $request->input('valor_cuota');
        $cuota->descripcion = $request->input('descripcion_cuota');
        $cuota->save();
        return redirect()->route('cuota.index');
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
        $cuotaEdit = Cuota::find($id);
        return json_encode($cuotaEdit); 
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
        $cuotaUpdate = Cuota::find($id);

        $cuotaUpdate->titulo = $request->input('titulo_edit');
        $cuotaUpdate->valor = $request->input('valor_edit');
        $cuotaUpdate->descripcion = $request->input('descripcion_edit');
        $cuotaUpdate->save();
        return redirect()->route('cuota.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $cuota = Cuota::find($id);
       $cuota->delete(); 
       return redirect()->route('cuota.index');
    }
}
