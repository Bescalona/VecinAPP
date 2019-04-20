<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Auth;
use App\Arriendo;
use Lava;
use PDF;

class ArriendoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   

        if(Auth::check()){
            $arriendos = Arriendo::all(); 
            return view('arriendo.listar',compact('arriendos'));
        }else{
            return view('auth.login');
        }   
      
    } 

     public function pdf() {
        //Llamada a la BD
        $arriendos = DB::table('arriendo')->get();
        //Se genera el archive PDF
        $pdf = PDF::loadView('pdf.arriendos', compact('arriendos'));
        //Lo forzamos a iniciar descarga
        return $pdf->download('listado_arriendos.pdf');
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
        $arriendo = new Arriendo(); 
        $arriendo->fecha = $request->input('fecha_arriendo');
        $arriendo->valor = $request->input('valor_arriendo');
        $arriendo->descripcion = $request->input('descripcion_arriendo');
        $arriendo->save();
        return redirect()->route('arriendo.index');
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
        $arriendoEdit = Arriendo::find($id);
        return json_encode($arriendoEdit); 
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
        $arriendoUpdate = Arriendo::find($id);

        $arriendoUpdate->fecha = $request->input('fecha_edit');
        $arriendoUpdate->valor = $request->input('valor_edit');
        $arriendoUpdate->descripcion = $request->input('descripcion_edit');
        $arriendoUpdate->save();
        return redirect()->route('arriendo.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $arriendo = Arriendo::find($id);
       $arriendo->delete(); 
       return redirect()->route('arriendo.index');
    }
}
