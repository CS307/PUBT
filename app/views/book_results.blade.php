@extends('result_layout')

@section('results')
	@for($count=0;$count < count($results);$count++)
		@if($count%4==0)
			@if($count!=0)
				</div>
			@endif
			<div class="row">
		@endif
		<div class="col-xs-6 col-md-3" class=picboxding>
			<div class=picboxding>
				<a href="#" class="thumbnail">
					<img data-src="holder.js/100%x180" alt="sampleimg.jpg" src="{{$results[$count]->pic_url}}">
				</a>
				<div class="caption" class=imginfoding>
					<h3 class=imginfoding>{{ $results[$count]->title }}</h3>
					<p class=imginfoding>Author: {{ $results[$count]->author }}</p>
					<p class=imginfoding>Course: {{ $results[$count]->subject.' '.$results[$count]->course_id }}</p>
					<p class=imginfoding>Edition: {{ $results[$count]->edition }}</p>
				</div>
		    </div>
		</div>
	@endfor
    </div>

@stop