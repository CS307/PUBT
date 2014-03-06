@extends('result_layout')

@section('results')
	@for($count=0;$count < $number;$count++)
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
					<h3 class=imginfoding>tasiod</h3>
					<p class=imginfoding>info1</p>
					<p class=imginfoding>info2</p>
					<p>info3</p>
				</div>
		    </div>
		</div>
	@endfor
    </div>

@stop