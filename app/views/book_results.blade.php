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
<<<<<<< HEAD
				<a href="/search/book_id={{ $results[$count]->id }}" class="thumbnail imgcontainer">
					<img data-src="holder.js" height="250" alt="sampleimg.jpg" src="{{$results[$count]->pic_url}}">
=======
				<a href="/search/book_id={{ $results[$count]->id }}" class="thumbnail">
					@if($results[$count]->pic_url == "NO_URL")
						<img data-src="holder.js/100%x180" alt="Sorry, No Cover" src="http://www.slugbooks.com/images/notavail2.png">
					@else
						<img data-src="holder.js/100%x180" alt="Sorry, No Cover" src="{{$results[$count]->pic_url}}">
					@endif
>>>>>>> 30d2ddd8030cbf9cac043e2e3577606a169afdf3
				</a>
				<div class="caption" class=imginfoding>
					<h5 class=imginfoding style="height: 50px; vertical-align:text-top;">{{ $results[$count]->title }}</h5>
					<p class=imginfoding style="height: 40px; vertical-align:text-top;">Author: {{ $results[$count]->author }}</p>
					<p class=imginfoding>Course: {{ $results[$count]->subject.' '.$results[$count]->course_id }}</p>
					<p class=imginfoding>Edition: {{ $results[$count]->edition }}</p>
				</div>
		    </div>
		</div>
	@endfor
    </div>

@stop