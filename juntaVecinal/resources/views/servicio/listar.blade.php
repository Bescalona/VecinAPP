@extends('layout')

@section('header')
	@include('header')
@endsection	

@section('sidebar')
	@include('sidebar')
@endsection	

@section('content')
  <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

	<script>
	    function showModal(){
	        $('#myModal').modal('show');
	    } 

      window.onload = function(){ 
        var fecha = new Date(); //Fecha actual
        var mes = fecha.getMonth()+1; //obteniendo mes
        var dia = fecha.getDate(); //obteniendo dia
        var ano = fecha.getFullYear(); //obteniendo año 
        var hora = fecha.getHours();
        var minuto = fecha.getMinutes(); 
        if(dia<10)
          dia='0'+dia; //agrega cero si el menor de 10
        if(mes<10)
          mes='0'+mes //agrega cero si el menor de 10
        if(hora<10)
          hora='0'+hora; //agrega cero si el menor de 10
        if(minuto<10)
          minuto='0'+minuto //agrega cero si el menor de 10
        document.getElementById('fecha_servicio').value=ano+"-"+mes+"-"+dia; 
        document.getElementById('fecha_servicio').min=ano+"-"+mes+"-"+dia; 
        document.getElementById('fecha_edit').min=ano+"-"+mes+"-"+dia;
        document.getElementById('inicio_servicio').value=hora+":"+minuto;
        document.getElementById('termino_servicio').value=hora+":"+minuto;   
        $('#tablaServicio').DataTable({
            language: {
              "decimal": "",
              "emptyTable": "No hay información",
              "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
              "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
              "infoFiltered": "(Filtrado de _MAX_ total entradas)",
              "infoPostFix": "",
              "thousands": ",",
              "lengthMenu": "Mostrar _MENU_ Entradas",
              "loadingRecords": "Cargando...",
              "processing": "Procesando...",
              "search": "Buscar:",
              "zeroRecords": "Sin resultados encontrados",
              "paginate": {
                  "first": "Primero",
                  "last": "Ultimo",
                  "next": "Siguiente",
                  "previous": "Anterior"
              }, 
            },
            'paging'      : true,
            'lengthChange': false,
            'searching'   : true,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : false

        }); 

      }   
        
	</script>   




    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            <!--MODAL AGREGAR-->
              <div id="myModal" class="modal fade" tabindex="-1" role="dialog">
                  <div class="modal-dialog" role="document">
                    <div id="content" class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Agregar Servicio</h4>
                      </div>
                      <form class="form-horizontal" action="servicio" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="nombre_servicio" class="col-sm-3 control-label">Nombre del servicio</label>
                            <div class="col-sm-9">
                                <input type="text" required="" class="form-control" name="nombre_servicio" id="nombre_servicio" placeholder="Ingrese el nombre del servicio ofrecido">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="descripcion_servicio" class="col-sm-3 control-label">Descripción</label>
                            <div class="col-sm-9">
                                <textarea name="descripcion_servicio" required="" id="descripcion_servicio" cols="60" rows="10" placeholder="Ingrese información acerca del servicio"></textarea>
                            </div>
                        </div> 

                        <div class="form-group">
                            <label for="fecha_servicio" class="col-sm-3 control-label">Fecha</label>
                            <div class="col-sm-9">
                                <input type="date" required="" min="" class="form-control" name="fecha_servicio" id="fecha_servicio" placeholder="Ingrese la fecha de realización del servicio">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inicio_servicio" class="col-sm-3 control-label">Hora de inicio</label>
                            <div class="col-sm-9">
                                <input type="time" required="" class="form-control" name="inicio_servicio" id="inicio_servicio" placeholder="Ingrese la hora de inicio del servicio">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="termino_servicio" class="col-sm-3 control-label">Hora de término</label>
                            <div class="col-sm-9">
                                <input type="time" required="" class="form-control" name="termino_servicio" id="termino_servicio" placeholder="Ingrese la hora de término del servicio">
                            </div>
                        </div>

                      <div id="mensaje" class="modal-body">
                        <p></p>
                      </div>
                      <div class="modal-footer" >
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                      </div> 
                    </form>  
                    </div><!-- /.modal-content -->
                  </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->

                <!--MODAL EDITAR-->
              <div id="modal_formUsuario" class="modal fade" tabindex="-1" role="dialog">
                  <div class="modal-dialog" role="document">
                    <div id="content" class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Editar Servicio</h4>
                      </div>
                      <form class="form-horizontal" action="" method="post" name="formEdit"> 
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="nombre_edit" class="col-sm-3 control-label">Nombre del servicio</label>
                            <div class="col-sm-9">
                                <input type="text" required="" class="form-control" name="nombre_edit" id="nombre_edit" placeholder="Ingrese el nombre del servicio ofrecido">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="descripcion_edit" class="col-sm-3 control-label">Descripción</label>
                            <div class="col-sm-9">
                                <textarea name="descripcion_edit" required="" id="descripcion_edit" cols="60" rows="10" placeholder="Ingrese información acerca del servicio"></textarea>
                            </div>
                        </div> 

                        <div class="form-group">
                            <label for="fecha_edit" class="col-sm-3 control-label">Fecha</label>
                            <div class="col-sm-9">
                                <input type="date" required="" min="" class="form-control" name="fecha_edit" id="fecha_edit" placeholder="Ingrese la fecha de realización del servicio">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inicio_edit" class="col-sm-3 control-label">Hora de inicio</label>
                            <div class="col-sm-9">
                                <input type="time" required="" class="form-control" name="inicio_edit" id="inicio_edit" placeholder="Ingrese la hora de inicio del servicio">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="termino_edit" class="col-sm-3 control-label">Hora de término</label>
                            <div class="col-sm-9">
                                <input type="time" required="" class="form-control" name="termino_edit" id="termino_edit" placeholder="Ingrese la hora de término del servicio">
                            </div>
                        </div>

                      <div id="mensaje" class="modal-body">
                        <p></p>
                      </div>
                      <div class="modal-footer" >
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary" >Actualizar</button>
                      </div> 
                    </form>  
                    </div><!-- /.modal-content -->
                  </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->


            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Listado de Servicios</h3> 
                    @if(auth()->user()->rol==2)
                      <a class="btn btn-xs btn-success" role="button" onclick="showModal()">Agregar</a>
                    @endif  
                    <a href="{{ route('servicios.pdf') }}" class="btn btn-xs btn-default"
                    role="button">Exportar en PDF</a>
                </div>
                <div class="panel-body">
                    <table class="table" id="tablaServicio">
                      <thead>
                        <tr>
                            <th>N</th>
                            <th>Nombre del servicio</th>
                            <th>Descripción</th> 
                            <th>Fecha</th>
                            <th>Hora de inicio</th>
                            <th>Hora de término</th> 
                            @if(auth()->user()->rol==2)
                              <th>Acción</th>
                            @endif  
                        </tr>
                      </thead>  
                      <tbody>
                        @foreach($servicios as $servicio) 
                            <tr>
                                <td>{{$loop->index+1}}</td>
                                <td>{{$servicio->nombre_servicio}}</td>
                                <td>{{$servicio->descripcion}}</td>
                                <td>{{$servicio->fecha}}</td>
                                <td>{{$servicio->hora_inicio}}</td>
                                <td>{{$servicio->hora_fin}}</td>
                                @if(auth()->user()->rol==2)
                                  <td>

                                    {!! Form::open ([ 'route'=>['servicio.destroy', $servicio->id_servicio], 'method' => 'DELETE'])!!}  
                                          <a onclick="showEdit({{$servicio->id_servicio}})" class="btn btn-xs btn-warning" role="button")" >Editar</a>
                                          <button type="submit" onclick="return confirm('¿Seguro que deseas eliminarlo?')" class="btn btn-xs btn-danger">Eliminar</button>
                                         
                                    {!! Form::close() !!}
                                      
                                  </td>
                                @endif  
                            </tr> 
                          @endforeach    
                      </tbody>  
                    </table>
                </div>
            </div>
        </div>
    </div> 


    <script> 

     function showEdit($id){
        $('#modal_formUsuario').modal('show'); 

        $.ajax({
          url: "servicio/"+$id+"/edit",
          type : 'GET', 
          data:$id, 
          dataType: "json", 
          success: function(respuesta) {
              $("#nombre_edit").val(respuesta.nombre_servicio);
              $("#descripcion_edit").val(respuesta.descripcion); 
              $("#fecha_edit").val(respuesta.fecha);
              $("#inicio_edit").val(respuesta.hora_inicio); 
              $("#termino_edit").val(respuesta.hora_fin); 
              document.formEdit.action = "servicio/"+$id;
          },
          error: function() {
              console.log("No se ha podido obtener la información");
          }
        });
    }     
    
</script> 


@endsection	

@section('footer')
	@include('footer')
@endsection	
