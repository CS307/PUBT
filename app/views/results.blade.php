@extends('result_layout')

@section('results')
	@for($count=0;$count < count($search_results);$count++)
		@if($count%4==0)
			@if($count!=0)
				</div>
			@endif
			<div class="row">
		@endif
		<div class="col-xs-6 col-md-3" class=picboxding>
			<div class=picboxding>
				<a href="#" class="thumbnail">
					<img data-src="holder.js/100%x180" alt="sampleimg.jpg" src="{{asset('css/sampleimg.jpg')}}">
				</a>
				<div class="caption" class=imginfoding>
					<h3 class=imginfoding>Price: ${{$search_results[$count]->price}}</h3>
					<p class=imginfoding>Condition: {{$search_results[$count]->condition}}</p>
					<p class=imginfoding>Detail: {{$search_results[$count]->detail}}</p>
					<p>info3</p>
				</div>
		    </div>
		</div>
	@endfor
    </div>

@stop