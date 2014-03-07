@extends('base')

@section('base_link')
<link href="{{asset('css/mainpage.css')}}" rel="stylesheet">
@stop

@section('base_content')
<div class="container">
  <div class="navbar-form">
	<!-- <form class="navbar-form navbar-left" role="search" action="#" method=""> -->
	{{Form::open(array('url'=>'search','method'=>'post'))}}
        <div class="form-group">
          <input type="text" name="keyword" class="form-control searchfield" placeholder="In format:CS 180">
        <button type="submit" class="btn btn-primary" role="search">
        <i class="glyphicon glyphicon-search"></i>
        Search</button>
        </div>
    {{Form::close()}}
	<!-- </form> -->
	
	<form class="navbar-form navbar-left" role="post" action="#">
		<a href="#" class="btn btn-success" role="post">
			<i class="glyphicon glyphicon-plus"></i>
			Post</a>
	</form>
  </div>

@stop