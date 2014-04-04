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
					<img data-src="holder.js/100%x180" alt="sampleimg.jpg" src="{{asset('css/sampleimg.jpg')}}">
				</a>
				<div class="caption" class=imginfoding>
					<h5 class=imginfoding>{{ $results[$count]->title }}</h5>
					<p class=imginfoding>Price: ${{ $results[$count]->price}}</p>
					<p class=imginfoding>Seller: {{ DB::table('users')->where('id',$results[$count]->seller_id)->first()->email }}</p>
					<p class=imginfoding>Condition: {{ $results[$count]->condition }}</p>
				</div>
		    </div>
		</div>
	@endfor
    </div>

@stop