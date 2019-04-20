 <div class="row">
    <table class="table" >
      <thead>
        <tr>
            <th>N</th>
            <th>Titulo</th>
            <th>Descripción</th>
            <th>Fecha</th> 
        </tr>
      </thead>  
      <tbody>  
        @foreach($anuncios as $anuncio) 
            <tr>
                <td>{{$loop->index+1}}</td>
                <td>{{$anuncio->titulo}}</td>
                <td>{{$anuncio->descripcion}}</td>
                <td>{{$anuncio->fecha}}</td> 
            </tr> 
          @endforeach    
      </tbody>
    </table>
</div>