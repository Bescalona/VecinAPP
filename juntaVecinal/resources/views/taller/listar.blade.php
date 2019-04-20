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
        $('#tablaTaller').DataTable({
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
                        <h4 class="modal-title">Agregar Taller</h4>
                      </div>
                      <form class="form-horizontal" action="taller" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="profesor_taller" class="col-sm-3 control-label">Nombre Profesor</label>
                            <div class="col-sm-9">
                                <input type="text" required="" class="form-control" name="profesor_taller" id="profesor_taller" placeholder="Ingrese el nombre del profesor del taller">
                            </div>
                        </div>    

                        <div class="form-group">
                            <label for="nombre_taller" class="col-sm-3 control-label">Nombre Taller</label>
                            <div class="col-sm-9">
                                <input type="text" required="" class="form-control" name="nombre_taller" id="nombre_taller" placeholder="Ingrese el nombre del taller">
                            </div>  
                        </div>

                       <div class="form-group">
                            <label for="descripcion_taller" class="col-sm-3 control-label">Descripción</label>
                            <div class="col-sm-9"> 
                                <textarea name="descripcion_taller" required="" id="descripcion_taller" cols="60" rows="10" placeholder="Ingrese una descripcíon del taller"></textarea>
                            </div>
                        </div> 

                        <div class="form-group">
                            <label for="cupos_taller" class="col-sm-3 control-label">Cupos</label>
                            <div class="col-sm-9">
                                <input type="number" required="" min="1" class="form-control" name="cupos_taller" id="cupos_taller" placeholder="Ingrese el número de cupos disponibles"> 
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
                        <h4 class="modal-title">Editar Taller</h4>
                      </div>
                      <form class="form-horizontal" action="" method="post" name="formEdit"> 
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="profesor_edit" class="col-sm-3 control-label">Nombre Profesor</label>
                            <div class="col-sm-9">
                                <input type="text" required="" class="form-control" name="profesor_edit" id="profesor_edit" placeholder="Ingrese el nombre del profesor del taller">
                            </div>    
                        </div>

                        <div class="form-group">
                            <label for="nombre_edit" class="col-sm-3 control-label">Nombre Taller</label>
                            <div class="col-sm-9">
                                <input type="text" required="" class="form-control" name="nombre_edit" id="nombre_edit" placeholder="Ingrese el nombre del taller">
                        </div>  

                        </div>
                       <div class="form-group">
                            <label for="descripcion_edit" class="col-sm-3 control-label">Descripción</label>
                            <div class="col-sm-9"> 
                                <textarea name="descripcion_edit" required="" id="descripcion_edit" cols="60" rows="10" placeholder="Ingrese una descripcíon del taller"></textarea>
                            </div>
                        </div> 

                        <div class="form-group">
                            <label for="cupos_edit" class="col-sm-3 control-label">Cupos</label>
                            <div class="col-sm-9">
                                <input type="number" required="" min="1" class="form-control" name="cupos_edit" id="cupos_edit" placeholder="Ingrese el número de cupos disponibles">
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

                <!--MODAL INSCRIBIR-->
              <div id="modal_inscribir" class="modal fade" tabindex="-1" role="dialog">
                  <div class="modal-dialog" role="document">
                    <div id="content" class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Inscribir Taller</h4>
                      </div>
                     <form class="form-horizontal" action="{{url('taller/inscribir')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <div class="col-sm-9">
                                <input type="hidden" required="" class="form-control" name="id_ins" id="id_ins" value="">
                            </div>    
                        </div>
                        <div class="form-group">
                            <label for="nombre_ins" class="col-sm-3 control-label">Nombre del Alumno</label>
                            <div class="col-sm-9">
                                <input type="text" required="" class="form-control" name="nombre_ins" id="nombre_ins" placeholder="Ingrese el nombre del asistente">
                            </div>    
                        </div>

                        <div class="form-group">
                            <label for="rut_ins" class="col-sm-3 control-label">RUT</label>
                            <div class="col-sm-9">
                                <input type="text" required="" class="form-control" name="rut_ins" id="rut_ins" placeholder="Ingrese su rut">
                              </div>  
                        </div>

                      <div id="mensaje" class="modal-body">
                        <p></p>
                      </div>
                      <div class="modal-footer" >
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary" >Inscribir</button>
                      </div> 
                    </form>
                    </div><!-- /.modal-content -->
                  </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->


            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Listado de Talleres</h3> 
                    @if(auth()->user()->rol==2)
                      <a class="btn btn-xs btn-success" role="button" onclick="showModal()">Agregar</a>
                    @endif   
                    <a href="{{ route('talleres.pdf') }}" class="btn btn-xs btn-default"
                    role="button">Exportar en PDF</a>
                </div>
                <div class="panel-body">
                    <table class="table" id="tablaTaller">
                      <thead>
                        <tr>
                            <th>N</th>
                            <th>Nombre del profesor</th>
                            <th>Nombre del taller</th>
                            <th>Descripción</th>
                            <th>Cupos</th>
                            @if(auth()->user()->rol==1) 
                              <th>Inscribise</th>
                            @endif
                            @if(auth()->user()->rol==2)  
                              <th>Acción</th>
                            @endif  
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($talleres as $taller) 
                            <tr>
                                <td>{{$loop->index+1}}</td>
                                <td>{{$taller->nombre_profesor}}</td>
                                <td>{{$taller->nombre_taller}}</td>
                                <td>{{$taller->descripcion}}</td>
                                <td>{{$taller->cupos}}</td>
                                @if(auth()->user()->rol==1)
                                  @if($taller->cupos>0) 
                                    <td>
                                      <a onclick="showInscribir({{$taller->id_taller}})" class="btn btn-xs btn-success" role="button")" >Inscribirse</a>
                                    </td>
                                  @else
                                    <td>
                                      <p>No hay más cupos disponibles</p> 
                                    </td>       
                                  @endif   
                                @endif
                                @if(auth()->user()->rol==2)  
                                  <td>

                                    {!! Form::open ([ 'route'=>['taller.destroy', $taller->id_taller], 'method' => 'DELETE'])!!}  
                                          <a onclick="showEdit({{$taller->id_taller}})" class="btn btn-xs btn-warning" role="button")" >Editar</a>
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
          url: "taller/"+$id+"/edit",
          type : 'GET', 
          data:$id, 
          dataType: "json", 
          success: function(respuesta) {
              $("#profesor_edit").val(respuesta.nombre_profesor);
              $("#nombre_edit").val(respuesta.nombre_taller);
              $("#descripcion_edit").val(respuesta.descripcion);
              $("#cupos_edit").val(respuesta.cupos);
              document.formEdit.action = "taller/"+$id;
          },
          error: function() {
              console.log("No se ha podido obtener la información");
          }
        });
    }  
     function showInscribir($id){
        $('#modal_inscribir').modal('show'); 
        $("#id_ins").val($id);
     }   
    
</script> 


@endsection 

@section('footer')
  @include('footer')
@endsection 