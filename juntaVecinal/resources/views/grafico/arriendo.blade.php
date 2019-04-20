@extends('layout')

@section('header')
	@include('header')
@endsection	

@section('sidebar')
	@include('sidebar')
@endsection	

@section('content') 

  



    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="col-md-12 col-md-offset-1"></div>
                <div id="pop_div"></div>
                @areachart('Ganancias','pop_div')
            </div >
        </div>
    </div> 


  

@endsection	

@section('footer')
	@include('footer')
@endsection	