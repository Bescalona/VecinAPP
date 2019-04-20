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

      $(document).ready(function(){
        $('#tablaAnuncio').DataTable({
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

            <!--MODAL AGREGAR-->
              <div id="myModal" class="modal fade" tabindex="-1" role="dialog">
                  <div class="modal-dialog" role="document">
                    <div id="content" class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Agregar Anuncio</h4>
                      </div>
                      <form class="form-horizontal" action="anuncio" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="titulo_anuncio" class="col-sm-3 control-label">Título</label>
                            <div class="col-sm-9">
                                <input type="text" required="" class="form-control" name="titulo_anuncio" id="titulo_anuncio" placeholder="Ingrese el titulo del anuncio">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="descripcion_anuncio" class="col-sm-3 control-label">Descripción</label>
                            <div class="col-sm-9"> 
                                <textarea name="descripcion_anuncio" required="" id="descripcion_anuncio" cols="60" rows="10" placeholder="Ingrese las descripcíon del anuncio"></textarea>
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
                        <h4 class="modal-title">Editar Anuncio</h4>
                      </div>
                      <form class="form-horizontal" action="" method="post" name="formEdit"> 
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="titulo_edit" class="col-sm-3 control-label">Titulo</label>
                            <div class="col-sm-9">
                                <input type="text" required="" class="form-control" name="titulo_edit" id="titulo_edit" placeholder="Ingrese el titulo del anuncio">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="descripcion_edit" class="col-sm-3 control-label">Descripción</label>
                            <div class="col-sm-9"> 
                                <textarea name="descripcion_edit" required="" id="descripcion_edit" cols="60" rows="10" placeholder="Ingrese las descripcíon del anuncio"></textarea>
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
                    <h3 class="panel-title">Listado de Anuncios</h3> 
                    @if(auth()->user()->rol==2) 
                      <a class="btn btn-xs btn-success" role="button" onclick="showModal()">Agregar</a>
                    @endif  
                    <a href="{{ route('anuncios.pdf') }}" class="btn btn-xs btn-default"
                    role="button">Exportar en PDF</a>
                </div>
                <div class="panel-body">
                    <table class="table" id="tablaAnuncio">
                      <thead>
                        <tr>
                            <th>N</th>
                            <th>Titulo</th>
                            <th>Descripción</th>
                            <th>Fecha</th> 
                            @if(auth()->user()->rol==2)
                              <th>Acción</th>
                            @endif  
                        </tr>
                      </thead>  
                      <tbody>  
                        @foreach($anuncios as $anuncio) 
                            <tr>
                                <td>{{$loop->index+1}}</td>
                                <td>{{$anuncio->titulo}}</td>
                                <td>{{$anuncio->descripcion}}</td>
                                <td>{{$anuncio->fecha}}</td> 
                                @if(auth()->user()->rol==2)
                                  <td>

                                    {!! Form::open ([ 'route'=>['anuncio.destroy', $anuncio->id_anuncio], 'method' => 'DELETE'])!!}  
                                          <a onclick="showEdit({{$anuncio->id_anuncio}})" class="btn btn-xs btn-warning" role="button")" >Editar</a>
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
          url: "anuncio/"+$id+"/edit",
          type : 'GET', 
          data:$id, 
          dataType: "json", 
          success: function(respuesta) {
              $("#titulo_edit").val(respuesta.titulo);
              $("#descripcion_edit").val(respuesta.descripcion);
              //$("#fecha_edit").val(respuesta.fecha); 
              document.formEdit.action = "anuncio/"+$id;
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


