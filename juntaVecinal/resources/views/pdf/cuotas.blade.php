<div class="row">
  <table class="table">
    <thead>
      <tr>
          <th>N</th>
          <th>Título</th>
          <th>Valor</th>
          <th>Descripción</th>      
      </tr>
    </thead>  
    <tbody> 
        @foreach($cuotas as $cuota)  
          <tr>
              <td>{{$loop->index+1}}</td>
              <td>{{$cuota->titulo}}</td>
              <td>{{$cuota->valor}}</td>
              <td>{{$cuota->descripcion}}</td>       
          </tr>
        @endforeach     
    </tbody> 
  </table>
</div>