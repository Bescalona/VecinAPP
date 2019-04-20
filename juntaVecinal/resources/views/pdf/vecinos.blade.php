
<div class="row">
	<table class="table">
        <tr>
            <th>N</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Teléfono</th>
            <th>Número de casa</th>
        </tr>
        
        @foreach($vecinos as $vecino) 
            @if($vecino->rol!=2) 
                <tr>
                    <td>{{$loop->index+1}}</td>
                    <td>{{$vecino->name}}</td>
                    <td>{{$vecino->email}}</td>
                    <td>{{$vecino->telefono}}</td>
                    <td>{{$vecino->num_casa}}</td>
    			</tr> 
            @endif    
		@endforeach	
	</table>	
</div>