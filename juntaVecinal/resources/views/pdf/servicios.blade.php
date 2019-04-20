<div class="row">
  <table class="table">
    <thead>
      <tr>
          <th>N</th>
          <th>Nombre del servicio</th>
          <th>Descripción</th> 
          <th>Fecha</th>
          <th>Hora de inicio</th>
          <th>Hora de término</th> 
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
        </tr> 
      @endforeach    
    </tbody>  
  </table>
</div>