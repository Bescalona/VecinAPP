<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Auth;
use App\Servicio;
use PDF;

class ServicioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        if(Auth::check()){
            $servicios = Servicio::all();
            return view('servicio.listar',compact('servicios'));
        }else{
            return view('auth.login');
        } 
    } 

    public function pdf() {
        //Llamada a la BD
        $servicios = DB::table('servicio')->get();
        //Se genera el archive PDF
        $pdf = PDF::loadView('pdf.servicios', compact('servicios'));
        //Lo forzamos a iniciar descarga
        return $pdf->download('listado_servicios.pdf');
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
        if ($request->input('inicio_servicio')>=$request->input('termino_servicio')) { 
            echo "<script>
                alert('La hora de termino debe ser mayor a la hora de inicio');
                window.location= 'servicio'
                </script>";
            
        }else{
            $servicio = new Servicio(); 
            $servicio->nombre_servicio = $request->input('nombre_servicio');
            $servicio->descripcion = $request->input('descripcion_servicio');
            $servicio->fecha = $request->input('fecha_servicio');
            $servicio->hora_inicio = $request->input('inicio_servicio');
            $servicio->hora_fin = $request->input('termino_servicio');
            $servicio->save();
            return redirect()->route('servicio.index');
        }
        
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
        $servicioEdit = Servicio::find($id);
        return json_encode($servicioEdit); 
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

        if ($request->input('inicio_edit')>=$request->input('termino_edit')) { 
            echo "<script>
                alert('La hora de termino debe ser mayor a la hora de inicio');
                window.location= '/juntaVecinal/public/servicio'
                </script>";
            
        }else{
            $servicioUpdate = Servicio::find($id);

            $servicioUpdate->nombre_servicio = $request->input('nombre_edit');
            $servicioUpdate->descripcion = $request->input('descripcion_edit');
            $servicioUpdate->fecha = $request->input('fecha_edit');
            $servicioUpdate->hora_inicio = $request->input('inicio_edit');
            $servicioUpdate->hora_fin = $request->input('termino_edit');
            $servicioUpdate->save();
            return redirect()->route('servicio.index');
        }    
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $servicio = Servicio::find($id);
       $servicio->delete(); 
       return redirect()->route('servicio.index');
    }
}
