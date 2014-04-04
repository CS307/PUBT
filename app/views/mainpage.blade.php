1@extends('base')

@section('base_link')
<link href="{{asset('css/mainpage.css')}}" rel="stylesheet">
@stop

@section('base_content')
<div class="container slogan">
<h1>You Can Find Any Textbooks Here At BOILER TRADE!</h1>
</div>
<div class="container">
  <div class="navbar-form">

  	{{Form::open(array('url'=>'search','method'=>'post'))}}
        <div class="form-group searchfieldmargin">
          <input type="text" name="keyword" class="searchfieldsize form-control" placeholder="In format:CS 180">
        <button type="submit" class="btn btn-primary" role="search">
        Search</button>

        <form class="navbar-form" role="post" action="#">
		<a href="/postPage" class="btn btn-success" role="post">
			<i class="glyphicon glyphicon-plus"></i>
			Post</a>
		</form>
        </div>
    {{Form::close()}}
	
	
  </div>
</div>

@stop