<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User; 
use PDF;


class VecinoController extends Controller
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
            $vecinos = User::all();
            return view('vecino.listar',compact('vecinos'));
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
        //Llamada a la BD
        $vecinos = DB::table('users')->get();
        //Se genera el archive PDF
        $pdf = PDF::loadView('pdf.vecinos', compact('vecinos'));
        //Lo forzamos a iniciar descarga
        return $pdf->download('listado_vecinos.pdf');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVecino $request)
    {
       /* $vecino = new Vecino(); 
        /*$request->validate([
            'nombre_vecino' =>'required', 
            'apellido_vecino' =>'required', 
            'telefono_vecino' =>'required|numeric|size:9', 
            'num_casa' =>'required|numeric|min:1'
        ]);
        

        $vecino->nombres = $request->input('nombre_vecino');
        $vecino->apellidos = $request->input('apellido_vecino');
        $vecino->telefono = $request->input('telefono_vecino');
        $vecino->num_casa = $request->input('num_casa');
        $vecino->save();
        return redirect()->route('vecino.index');*/
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
       $vecinoEdit = User::find($id);
       return json_encode($vecinoEdit); 

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
        $vecinoUpdate = User::find($id);

        $vecinoUpdate->name = $request->input('nombre_edit');
        $vecinoUpdate->email = $request->input('email_edit');
        $vecinoUpdate->telefono = $request->input('telefono_edit');
        $vecinoUpdate->num_casa = $request->input('ncasa_edit');
        $vecinoUpdate->save();
        return redirect()->route('vecino.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $vecino = User::find($id);
       $vecino->delete(); 
       return redirect()->route('vecino.index');
    }
}
