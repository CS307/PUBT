@extends('base')

@section('base_link')
<link href="{{asset('css/mainpage.css')}}" rel="stylesheet">
@stop

@section('base_content')
<div class="container slogan">
<h1 style="font-size:2em;">You Can Find Any Textbooks Here At BOILER TRADE!</h1>
</div>
<div class="container">
  <div class="navbar-form">
    {{Form::open(array('url'=>'mainRequest','method'=>'get'))}}
        <div class="form-group searchfieldmargin">
          <input type="text" name="keyword" class="searchfieldsize form-control" placeholder="Format:MA or CS 18000" style="width: 280px;">

          <button type="submit" class="btn btn-primary" name="button" role="search" value="search">
          <span class="glyphicon"></span>
          Search</button>
          <button type="submit" class="btn btn-success" name="button" role="post" value="post">
          <span class="glyphicon glyphicon-plus"></span>
          Post</button>
        </div>
    {{Form::close()}}
	
	
  </div>
</div>

@stop