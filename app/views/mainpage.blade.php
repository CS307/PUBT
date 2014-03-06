@extends('base')

@section('base_content')
<div class="container">
		<form action="#" id="searchbox" method="post">
  			<input type="hidden" name="cx" value="YOUR SEARCH ENGINE ID goes here" />
  			<input type="hidden" name="ie" value="UTF-8" />
  			<input type="text" name="q" size="31" />
  			<a href="#" class="btn btn-inverse btn-large"><i class="icon-white icon-plus"></i>Search</a>
		</form>
		<form role="post" action="#">
			<a href="#" class="btn btn-inverse btn-large"><i class="icon-white icon-plus"></i>Post</a>
		</form>
</div>

@stop