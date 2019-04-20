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
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Talleres Inscritos</h3>
                </div>
                <div class="panel-body">
                    <table class="table" id="tablaTaller">
                      <thead>
                        <tr>
                            <th>N</th>
                            <th>Nombre del profesor</th>
                            <th>Nombre del inscrito</th>
                            <th>Nombre del taller</th>
                            <th>Descripción</th>
                            <th>Cupos</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($talleres as $taller) 
                          @foreach($inscritos as $ins) 
                              @if($taller->id_taller==$ins->id_taller && $ins->id_vecino==auth()->user()->id) 
                                <tr>
                                    <td>{{$loop->index+1}}</td>
                                    <td>{{$taller->nombre_profesor}}</td>
                                    <td>{{$ins->alumno}}</td>
                                    <td>{{$taller->nombre_taller}}</td>
                                    <td>{{$taller->descripcion}}</td>
                                    <td>{{$taller->cupos}}</td>
                                </tr>  
                              @endif 
                          @endforeach     
                        @endforeach    
                      </tbody>  
                    </table>
                </div>
            </div>
        </div>
    </div> 

@endsection 

@section('footer')
  @include('footer')
@endsection 