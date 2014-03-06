@extends('result_layout')

@section('results')
	@for($count=0;$count < $number;$count++)
		@if($count%4==0)
			@if($count!=0)
				</div>
			@endif
			<div class="row">
		@endif
		<div class="col-xs-6 col-md-3">
			<a href="#" class="thumbnail">
				<img data-src="holder.js/100%x180" alt="sampleimg.jpg" src="{{asset('css/sampleimg.jpg')}}">
			</a>
		</div>
	@endfor
    </div>

@stop