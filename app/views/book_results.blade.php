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
				<div class="imgcontainer">
					<a href="/{{ $method }}/book_id={{ $results[$count]->id }}" class="thumbnail imgcontainer">
						@if($results[$count]->pic_url == "NO_URL" || $results[$count]->pic_url == "")
							<img data-src="holder.js" max-height="200" alt="Sorry, No Cover" src="http://www.slugbooks.com/images/notavail2.png">
						@else
							<img data-src="holder.js" max-height="200" alt="Sorry, No Cover" src="{{$results[$count]->pic_url}}">
						@endif
					</a>
				</div>
				<div class="caption imginfo">
					<h5 class=imginfoding style="height: 48px; vertical-align:text-top;"><b>{{ $results[$count]->title }}</b></h5>
					<p class=imginfoding style="height: 40px; vertical-align:text-top;"><b>Author:</b> {{ $results[$count]->author }}</p>
					<p class=imginfoding><b>Course:</b> {{ $results[$count]->subject.' '.$results[$count]->course_id }}</p>
					<p class=imginfoding><b>Edition:</b> {{ $results[$count]->edition }}</p>
				</div>
		    </div>
		</div>
	@endfor
    </div>

@stop