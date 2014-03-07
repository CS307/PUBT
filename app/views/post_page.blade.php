@extends('base')

@section('base_link')
<link href="{{asset('css/postpage.css')}}" rel="stylesheet">
@stop

@section('base_content')

<div class="container mainsection">
  <h1 class=h1ding>Post your book:</h1>
	<div class="row-fluid">
		<!--form id="user-new-address" action="/logistics/address/" method="post">
	
		<div class="partinfo">
			<h3 class="heading-3">Book info:</h3>
				
		<div class="single">
			<label class="control-label" for="recipient_name">Title:</label>
			<div class="controls">
			<input type="text" class="input-xlarge" id="recipient_name" name="recipient_name">
			<p class="help-inline"></p>
			</div>
		</div>
		<div class="single">
			<label class="control-label" for="recipient_name">Author:</label>
			<div class="controls">
			<input type="text" class="input-xlarge" id="author" name="author">
			<p class="help-inline"></p>
		</div>
		</div>
		
		<div class="single">
			<label class="control-label" for="phone">Co-course Number:</label>
			<div class="controls">
			<input type="text" class="input-xlarge" id="CN" name="CN">
			<p class="help-inline"></p>
			</div>
		</div>
	
		<div class="single">
			<label class="control-label" for="phone">Listing Price:</label>
			<div class="controls">
			<input type="text" class="input-xlarge" id="price" name="price">
			<p class="help-inline"></p>
			</div>
		</div>
		
		<div class="single">
			<label class="control-label" for="phone">Condition:</label><br>
			<div class="btn-group btn-group-lg">
  				<div class="btn-group">
    			<button type="button" class="btn btn-default">New with tags</button>
  				</div>
  				<div class="btn-group">
    			<button type="button" class="btn btn-default">Like new</button>
  				</div>
  				<div class="btn-group">
    			<button type="button" class="btn btn-default">Good condition</button>
  				</div>
  				<div class="btn-group">
    			<button type="button" class="btn btn-default">Fair condition</button>
  				</div>
			</div>
		</div>
		
		<div class="single">
			<label class="control-label" for="phone">Discription:</label>
			<div class="controls">
			<input type="text" class="input-xlarge" id="price" name="price">
			<p class="help-inline"></p>
			</div>
		</div>
		</div>	
		
		<div class="single">
		<a href="#" class="btn btn-success" type="post">
			<i class="glyphicon glyphicon-plus"></i>
			Submit&Post</a>
		</div>
		<form-->
		{{Form::open(array('url'=>'postPost','method'=>'post'))}}
              <div class="partinfo">
			  <h3 class="heading-3">Book info:</h3>
				
		<div class="single">
			<label class="control-label">Title:</label>
			<div class="controls">
<input type="text" name="title">
			<p class="help-inline"></p>
			</div>
		</div>
		<div class="single">
			<label class="control-label">Author:</label>
			<div class="controls">
<input type="text" name="author">
			<p class="help-inline"></p>
		</div>
		</div>
		
		<div class="single">
			<label class="control-label">Co-course Number:</label>
			<div class="controls">
<input type="text" name="CN">
			<p class="help-inline"></p>
			</div>
		</div>
	
		<div class="single">
			<label class="control-label">Listing Price:</label>
			<div class="controls">
<input type="text" name="price">
			<p class="help-inline"></p>
			</div>
		</div>
		
		<div class="single">
			<label class="control-label">Listing Condition:</label>
			<div class="controls">
<input type="text" name="condition">
			<p class="help-inline"></p>
			</div>
		</div>
		
		<div class="single">
			<label class="control-label">Discription:</label>
			<div class="controls">
<input type="text" name="price">
			<p class="help-inline"></p>
			</div>
		</div>
		</div>	
		
		<div class="single">
		<a href="#" class="btn btn-success" type="post">
			<i class="glyphicon glyphicon-plus"></i>
			Submit&Post</a>
		</div>
        {{Form::close()}}

		</div>
		</div>

@stop