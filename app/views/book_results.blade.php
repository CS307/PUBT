@extends('base')

@section('base_link')
<link href="{{asset('css/resultpage.css')}}" rel="stylesheet">
@stop

@section('base_content')
	<h1 class="topicding">Choose the book you want to search for: </h1>
	@if(count($results)==0)
	Sorry, no record of the books correponding to that course
	@endif
	@for($count=0;$count < count($results);$count++)
		@if($count%5==0)
			@if($count!=0)
				<div class="col-md-1">
				</div>
				</div>
			@endif
			<div class="row">
			<div class="col-md-1">
			</div>
		@endif
		<div class="col-md-2" class=picboxding>
			<div class=picboxding>
				<div class="imgcontainer">
					<a href="/{{ $method }}/book_id={{ $results[$count]->id }}" class="thumbnail imgcontainer">
						@if($results[$count]->pic_url == "NO_URL" || $results[$count]->pic_url == "")
							<img data-src="holder.js" max-width="200" max-height="200" alt="Sorry, No Cover" src="http://www.slugbooks.com/images/notavail2.png">
						@else
							<img data-src="holder.js" max-width="200" max-height="200" alt="Sorry, No Cover" src="{{$results[$count]->pic_url}}">
						@endif
					</a>
				</div>
				<div class="caption imginfo">
					<h5 class=imginfoding><b>{{ $results[$count]->title }}</b></h5>
					<p class=imginfoding><b>Author:</b> {{ $results[$count]->author }}</p>
					<p class=imginfoding><b>Course:</b> {{ $results[$count]->subject.' '.$results[$count]->course_id }}</p>
					<p class=imginfoding><b>Edition:</b> {{ $results[$count]->edition }}</p>
				</div>
		    </div>
		</div>
	@endfor
    </div>

@stop