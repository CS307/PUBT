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
    {{Form::open(array('url'=>'post_select_page','method'=>'post'))}}
      <div class="form-group searchfieldmargin">
        <input type="text" name="keyword" class="searchfieldsize form-control" placeholder="In format:CS 18000">
        <button type="submit" class="btn btn-primary" role="post">Post</button>
      </div>
    {{Form::close()}}
  </div>
</div>

@stop