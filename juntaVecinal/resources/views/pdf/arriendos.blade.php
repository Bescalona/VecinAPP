<div class="row">
	<table class="table">
        <thead>
             <tr>
                <th>N</th>
                <th>Fecha</th>
                <th>Valor</th>
                <th>Descripción</th>
            </tr>
        </thead>
        <tbody>
            @foreach($arriendos as $arriendo) 
                <tr>
                    <td>{{$loop->index+1}}</td>
                    <td>{{$arriendo->fecha}}</td>
                    <td>{{$arriendo->valor}}</td>
                    <td>{{$arriendo->descripcion}}</td>
                </tr>    
    		@endforeach	
        </tbody>
	</table>	
</div>