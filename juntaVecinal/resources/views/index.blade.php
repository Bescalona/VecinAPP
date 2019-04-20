@extends('layout')

@section('header')
	@include('header')
@endsection	

@section('sidebar')
	@include('sidebar')
@endsection	

@section('content') 

	
	
	<h2>Bienvenido {{Auth::user()->name}}</h2>
	<center><h1>a VecinAPP</h1></center> 

	<center><img class="img-responsive" src="\juntaVecinal\public\dist\img/juntapp.jpg" alt="vecinapp" width="460" height="345"></center>
		 
  			
@endsection	

@section('footer')
	@include('footer')
@endsection	