@extends('base')

@section('base_link')
<link href="{{asset('css/mainpage.css')}}" rel="stylesheet">
@stop

@section('base_content')
<div class="container slogan">
<h1>You Can Find Any Textbooks Here At BOILER TRADE!</h1>
</div>
<div class="container">
  <div class="navbar-form">
    {{Form::open(array('url'=>'mainRequest','method'=>'get'))}}
        <div class="form-group searchfieldmargin">
          <input type="text" name="keyword" class="searchfieldsize form-control" placeholder="In format:CS 15800">
          <button type="submit" class="btn btn-primary" name="button" role="search" value="search">Search</button>
          <button type="submit" class="btn btn-primary" name="button" role="post" value="post">Post</button>
        </div>
    {{Form::close()}}
	
	
  </div>
</div>

@stop