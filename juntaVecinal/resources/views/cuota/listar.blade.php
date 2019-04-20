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
      function showModal(){
          $('#myModal').modal('show');
      }  

      $(document).ready(function(){
        $('#tablaCuota').DataTable({
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
                        <h4 class="modal-title">Agregar Cuota</h4>
                      </div>
                      <form class="form-horizontal" action="cuota" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="titulo_cuota" class="col-sm-3 control-label">Título</label>
                            <div class="col-sm-9">
                                <input type="text" required="" class="form-control" name="titulo_cuota" id="titulo_cuota" placeholder="Ingrese un título para la cuota">
                            </div>
                        </div>    

                        <div class="form-group">
                            <label for="valor_cuota" class="col-sm-3 control-label">Valor</label>
                            <div class="col-sm-9">
                                <input type="number" min="1" required="" class="form-control" name="valor_cuota" id="valor_cuota" placeholder="Ingrese el valor de la cuota">
                            </div>  
                        </div>

                       <div class="form-group">
                            <label for="descripcion_cuota" class="col-sm-3 control-label">Descripción</label>
                            <div class="col-sm-9"> 
                                <textarea name="descripcion_cuota" required="" id="descripcion_cuota" cols="60" rows="10" placeholder="Ingrese una descripcíon para la cuota"></textarea>
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
                        <h4 class="modal-title">Editar Cuota</h4>
                      </div>
                      <form class="form-horizontal" action="" method="post" name="formEdit"> 
                        @method('PUT')
                        @csrf
                       <div class="form-group">
                            <label for="titulo_edit" class="col-sm-3 control-label">Título</label>
                            <div class="col-sm-9">
                                <input type="text" required="" class="form-control" name="titulo_edit" id="titulo_edit" placeholder="Ingrese un título para la cuota">
                            </div>
                        </div>    

                        <div class="form-group">
                            <label for="valor_edit" class="col-sm-3 control-label">Valor</label>
                            <div class="col-sm-9">
                                <input type="number" min="1" required="" class="form-control" name="valor_edit" id="valor_edit" placeholder="Ingrese el valor de la cuota">
                            </div>  
                        </div>

                       <div class="form-group">
                            <label for="descripcion_edit" class="col-sm-3 control-label">Descripción</label>
                            <div class="col-sm-9"> 
                                <textarea name="descripcion_edit" required="" id="descripcion_edit" cols="60" rows="10" placeholder="Ingrese una descripcíon para la cuota"></textarea>
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
                    <h3 class="panel-title">Listado de Cuotas</h3> 
                    @if(auth()->user()->rol==2)
                      <a class="btn btn-xs btn-success" role="button" onclick="showModal()">Agregar</a>
                    @endif   
                    <a href="{{ route('cuotas.pdf') }}" class="btn btn-xs btn-default"
                    role="button">Exportar en PDF</a>
                </div>
                <div class="panel-body">
                    <table class="table" id="tablaCuota">
                      <thead>
                        <tr>
                            <th>N</th>
                            <th>Título</th>
                            <th>Valor</th>
                            <th>Descripción</th> 
                            @if(auth()->user()->rol==2)
                              <th>Acción</th>
                            @endif  
                        </tr>
                      </thead>  
                      <tbody> 
                        @foreach($cuotas as $cuota) 
                            <tr>
                                <td>{{$loop->index+1}}</td>
                                <td>{{$cuota->titulo}}</td>
                                <td>{{$cuota->valor}}</td>
                                <td>{{$cuota->descripcion}}</td>
                                @if(auth()->user()->rol==2)
                                  <td>

                                    {!! Form::open ([ 'route'=>['cuota.destroy', $cuota->id_cuota], 'method' => 'DELETE'])!!}  
                                          <a onclick="showEdit({{$cuota->id_cuota}})" class="btn btn-xs btn-warning" role="button")" >Editar</a>
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
          url: "cuota/"+$id+"/edit",
          type : 'GET', 
          data:$id, 
          dataType: "json", 
          success: function(respuesta) {
              $("#titulo_edit").val(respuesta.titulo);
              $("#valor_edit").val(respuesta.valor);
              $("#descripcion_edit").val(respuesta.descripcion);
              document.formEdit.action = "cuota/"+$id;
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