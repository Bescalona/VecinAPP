<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Auth;
use App\Arriendo;
use Lava;
use PDF;

class GrafarriendoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   

        if(Auth::check()){
            $mesActual=date("n");
            $añoActual=date("Y");  
            $añoPasado=date("Y")-1;
            $nombreMes = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
            $aniopasado = array(0,0,0,0,0,0,0,0,0,0,0,0);
            $aniopresente = array(0,0,0,0,0,0,0,0,0,0,0,0);
            $gananciaspasado = array(0,0,0,0,0,0,0,0,0,0,0,0);
            $gananciaspresente = array(0,0,0,0,0,0,0,0,0,0,0,0);
            /*$aniopasado = array("Enero"=>0, "Febrero"=>0, "Marzo"=>0,"Abril"=>0, "Mayo"=>0, "Junio"=>0,"Julio"=>0, "Agosto"=>0, "Septiembre"=>0,"Octubre"=>0, "Noviembre"=>0, "Diciembre"=>0);
            $aniopresente = array("Enero"=>0, "Febrero"=>0, "Marzo"=>0,"Abril"=>0, "Mayo"=>0, "Junio"=>0,"Julio"=>0, "Agosto"=>0, "Septiembre"=>0,"Octubre"=>0, "Noviembre"=>0, "Diciembre"=>0);*/
           
            $mes=11;
            $aniopresente[$mesActual-1]=1;
            while ($mes>0) {
                $mes1=$mesActual- $mes;
                if($mes1<0){
                    $mes1=$mes1+12;
                    $aniopasado[$mes1-1]=1;
                }else{
                    $aniopresente[$mes1-1]=1;
                }
                $mes--; 
            }
            
            $ganancias = Lava::DataTable(); 
            $ganancias->addStringColumn("Mes"); 
            $ganancias->addNumberColumn("Ingresos"); 
            
            $arriendos = Arriendo::all(); 
            foreach ($arriendos as $arriendo) {
               $fechaBd=$arriendo->fecha; 
               $anio = date("Y", strtotime($fechaBd)); 
               $mess = date("n", strtotime($fechaBd)); 
               if($anio==$añoPasado){
                    $gananciaspasado[$mess-1] = $gananciaspasado[$mess-1]+$arriendo->valor;
               }
               if($anio==$añoActual){
                    $gananciaspresente[$mess-1] = $gananciaspresente[$mess-1]+$arriendo->valor;
               }
            }

            for ($i=0; $i <12 ; $i++) { 
                if($aniopasado[$i]==1){
                    $ganancias->addRow([$nombreMes[$i],$gananciaspasado[$i]]);
                }
            } 

            for ($i=0; $i <12 ; $i++) { 
                if($aniopresente[$i]==1){
                    $ganancias->addRow([$nombreMes[$i],$gananciaspresente[$i]]);
                }
            }
                   
            Lava::AreaChart('Ganancias', $ganancias,[
                'title'=>'Ganancias por arriendo ultimos 12 meses',
                'legend'=>[
                    'position'=>'in'
                ]

            ]);
            return view('grafico.arriendo',compact('arriendos'));
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