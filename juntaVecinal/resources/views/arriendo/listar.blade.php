
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
  		  if(dia<10)
  		    dia='0'+dia; //agrega cero si el menor de 10
  		  if(mes<10)
  		    mes='0'+mes //agrega cero si el menor de 10
  		  document.getElementById('fecha_arriendo').value=ano+"-"+mes+"-"+dia; 
        document.getElementById('fecha_arriendo').min=ano+"-"+mes+"-"+dia; 
        document.getElementById('fecha_edit').min=ano+"-"+mes+"-"+dia;
        $('#tablaArriendo').DataTable({
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
                        <h4 class="modal-title">Agregar Nuevo Arriendo</h4>
                      </div>
                      <form class="form-horizontal" action="arriendo" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="fecha_arriendo" class="col-sm-3 control-label">Fecha de arriendo</label>
                            <div class="col-sm-9">
                                <input type="date" required="" min="" class="form-control" name="fecha_arriendo" id="fecha_arriendo" placeholder="Ingrese la fecha del arriendo de la sede">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="valor_arriendo" class="col-sm-3 control-label">Valor</label>
                            <div class="col-sm-9">
                                <input type="number" required="" min="0" class="form-control" name="valor_arriendo" id="valor_arriendo" placeholder="Ingrese el valor cobrado por el arriendo">
                            </div>
                        </div>
                       
                         <div class="form-group">
                            <label for="descripcion_arriendo" class="col-sm-3 control-label">Descripción</label>
                            <div class="col-sm-9">
                                <textarea name="descripcion_arriendo" required="" id="descripcion_arriendo" cols="60" rows="10" placeholder="Ingrese información acerca del arriendo"></textarea>
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
                        <h4 class="modal-title">Editar Arriendo</h4>
                      </div>
                      <form class="form-horizontal" action="" method="post" name="formEdit"> 
                        @method('PUT')
                        @csrf
                       <div class="form-group">
                            <label for="fecha_edit" class="col-sm-3 control-label">Fecha de arriendo</label>
                            <div class="col-sm-9">
                                <input type="date" required="" class="form-control" name="fecha_edit" id="fecha_edit" placeholder="Ingrese la fecha del arriendo de la sede">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="valor_edit" class="col-sm-3 control-label">Valor</label>
                            <div class="col-sm-9">
                                <input type="number" required="" min="0" class="form-control" name="valor_edit" id="valor_edit" placeholder="Ingrese el valor cobrado por el arriendo">
                            </div>
                        </div>
                       
                         <div class="form-group">
                            <label for="descripcion_edit" class="col-sm-3 control-label">Descripción</label>
                            <div class="col-sm-9">
                                <textarea name="descripcion_edit" required="" id="descripcion_edit" cols="60" rows="10" placeholder="Ingrese información acerca del arriendo"></textarea>
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
                    <h3 class="panel-title">Listado de Arriendos</h3> 
                    @if(auth()->user()->rol==2)
                      <a class="btn btn-xs btn-success" role="button" onclick="showModal()">Agregar</a>
                    @endif  
                    <a href="{{ route('arriendos.pdf') }}" class="btn btn-xs btn-default"
                    role="button">Exportar en PDF</a>
                </div>
                <div class="panel-body">
                    <table class="table" id="tablaArriendo"> 
                      <thead>
                        <tr>
                            <th>N</th>
                            <th>Fecha</th>
                            <th>Valor</th>
                            <th>Descripción</th> 
                            @if(auth()->user()->rol==2)
                              <th>Acción</th>
                            @endif  
                        </tr> 
                      </thead>  
                       <tbody> 
                          @foreach($arriendos as $arriendo)                           
                              <tr>
                                  <td>{{$loop->index+1}}</td>
                                  <td>{{$arriendo->fecha}}</td>
                                  <td>{{$arriendo->valor}}</td>
                                  <td>{{$arriendo->descripcion}}</td> 
                                  @if(auth()->user()->rol==2)
                                    <td>

                                      {!! Form::open ([ 'route'=>['arriendo.destroy', $arriendo->id_arriendo], 'method' => 'DELETE'])!!}  
                                            <a onclick="showEdit({{$arriendo->id_arriendo}})" class="btn btn-xs btn-warning" role="button")" >Editar</a>
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
        
		 function eliminar(){
		    var txt;
		    var r = confirm("seguro que quiere eliminar?");
		    if (r == true) {
		        
		    } else {
		        txt = "You pressed Cancel!";
		    } 
		 }   

     function showEdit($id){
        $('#modal_formUsuario').modal('show'); 

        $.ajax({
          url: "arriendo/"+$id+"/edit",
          type : 'GET', 
          data:$id, 
          dataType: "json", 
          success: function(respuesta) {
              $("#fecha_edit").val(respuesta.fecha);
              $("#valor_edit").val(respuesta.valor);
              $("#descripcion_edit").val(respuesta.descripcion); 
              document.formEdit.action = "arriendo/"+$id;
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
