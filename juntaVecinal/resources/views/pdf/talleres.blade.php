<div class="row">
  <table class="table">
    <thead>
      <tr>
          <th>N</th>
          <th>Nombre del profesor</th>
          <th>Nombre del taller</th>
          <th>Descripción</th>
          <th>Cupos</th>
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
          </tr> 
      @endforeach    
    </tbody>  
  </table>
</div>