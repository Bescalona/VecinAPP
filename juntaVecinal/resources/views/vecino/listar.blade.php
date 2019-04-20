@extends('layout')

@section('header')
	@include('header')
@endsection	

@section('sidebar')
	@include('sidebar')
@endsection	

@section('content') 
<!-- DataTables -->
  <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

	<script>

      $(document).ready(function(){
        $('#tablaVecino').DataTable({
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
      });         
	</script>   


    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            
                <!--MODAL EDITAR-->
              <div id="modal_formUsuario" class="modal fade" tabindex="-1" role="dialog">
                  <div class="modal-dialog" role="document">
                    <div id="content" class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Editar Vecino</h4>
                      </div>
                      <form class="form-horizontal" action="" method="post" name="formEdit"> 
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="nombre_edit" class="col-sm-3 control-label">Nombre</label>
                            <div class="col-sm-9">
                                <input type="text" required="" class="form-control" value="" name="nombre_edit" id="nombre_edit" placeholder="Ingrese el nombre del vecino">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email_edit" class="col-sm-3 control-label">Email</label>
                            <div class="col-sm-9">
                                <input type="email" required="" class="form-control" name="email_edit" id="email_edit" placeholder="Ingrese el email del vecino">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="telefono_edit" class="col-sm-3 control-label">Teléfono</label>
                            <div class="col-sm-9">
                                <input type="tel" required="" class="form-control" name="telefono_edit" id="telefono_edit" placeholder="Ingrese el número telefonico del vecino">
                            </div>
                        </div>

                         <div class="form-group">
                            <label for="ncasa_edit" class="col-sm-3 control-label">Número de casa</label>
                            <div class="col-sm-9">
                                <input type="number" required="" min="1" class="form-control" value="" name="ncasa_edit" id="ncasa_edit" placeholder="Ingrese el número de casa del vecino">
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
                    <h3 class="panel-title">Listado de Vecinos</h3> 
                    <a href="{{ route('vecinos.pdf') }}" class="btn btn-xs btn-default"
                    role="button">Exportar en PDF</a>
                </div>
                <div class="panel-body">
                    <table class="table" id="tablaVecino">
                      <thead>
                        <tr>
                            <th>N</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Teléfono</th>
                            <th>Número de casa</th> 
                          @if(auth()->user()->rol==2)   
                            <th>Acción</th>
                          @endif  
                        </tr>
                      </thead>
                        
                      <tbody>  
                        @foreach($vecinos as $vecino)
                          @if($vecino->rol!=2)
                            <tr>
                                <td>{{$loop->index+1}}</td>
                                <td>{{$vecino->name}}</td>
                                <td>{{$vecino->email}}</td>
                                <td>{{$vecino->telefono}}</td>
                                <td>{{$vecino->num_casa}}</td> 
                                @if(auth()->user()->rol==2)
                                  <td>

                                    {!! Form::open ([ 'route'=>['vecino.destroy', $vecino->id], 'method' => 'DELETE'])!!}  
                                          <!--<a href="vecino/{{$vecino->id}}/edit" onclick="showModal()" class="btn btn-xs btn-warning" role="button")" >Editar</a>-->
                                          <a onclick="showEdit({{$vecino->id}})" class="btn btn-xs btn-warning" role="button")" >Editar</a>
                                          <button type="submit" onclick="return confirm('¿Seguro que deseas eliminarlo?')" class="btn btn-xs btn-danger">Eliminar</button>
                                    {!! Form::close() !!}
                                      
                                  </td> 
                                @endif  
                            </tr> 
                          @endif
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
          url: "vecino/"+$id+"/edit",
          type : 'GET', 
          data:$id, 
          dataType: "json", 
          success: function(respuesta) {
              $("#nombre_edit").val(respuesta.name);
              $("#email_edit").val(respuesta.email);
              $("#telefono_edit").val(respuesta.telefono);
              $("#ncasa_edit").val(respuesta.num_casa); 
              document.formEdit.action = "vecino/"+$id;
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