<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Inscribir; 
use App\Taller; 
use PDF;


class TallerinsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        /*$neighbors = DB::table('neighbors')->get();

        return view('neighbor.listar')->with('neighbors',$neighbors);*/
        if(Auth::check()){
            $inscritos = Inscribir::all();
            $talleres = Taller::all();
            return view('inscribir.listar',compact('inscritos','talleres'));
        }else{
            return view('auth.login');
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
    } 

    public function pdf() {
        /*Llamada a la BD
        $vecinos = DB::table('users')->get();
        //Se genera el archive PDF
        $pdf = PDF::loadView('pdf.vecinos', compact('vecinos'));
        //Lo forzamos a iniciar descarga
        return $pdf->download('listado_vecinos.pdf');*/
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVecino $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       

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
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
     
    }
}
