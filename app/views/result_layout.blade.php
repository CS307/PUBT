@extends('base')

@section('base_link')
<link href="{{asset('css/resultpage.css')}}" rel="stylesheet">
@stop

@section('base_content')
<div class=container>
	<div class="row">
  		<div class="col-md-2">
			<aside class=checkboxding>
			{{ Form::open(array('url'=>'test','method'=>'get')) }}
			<input type="hidden" name="book_id" value=711>
			<p class=checkboxcolording>Price:</p>
			<div class="checkbox">
				<div class=checkboxstyleding>
				<label>
					<input type="checkbox" name="price1" value="Under $20">
						Under $20
				</label>
				</div>
				<div class=checkboxstyleding>
				<label>
					<input type="checkbox" name="price2" value="$20 to $50">
						$20 to $50
				</label>
				</div>
				<div class=checkboxstyleding>
				<label>
					<input type="checkbox" name="price3" value="$50 to $100">
						$50 to $100
				</label>
				</div>
				<div class=checkboxstyleding>
				<label>
					<input type="checkbox" name="price4" value="$100 to $200">		
						$100 to $200
				</label>
				</div>
				<div class=checkboxstyleding>
				<label>
					<input type="checkbox" name="price5" value="Above $200">
						Above $200
				</label>
				</div>
			</div>
			
			<p class=checkboxcolording>Condition:</p>
			<div class="checkbox">
				<div class=checkboxstyleding>
				<label>
					<input type="checkbox" name="condition1" value="New With Tags">
						New With Tags
				</label>
				</div>
				<div class=checkboxstyleding>
				<label>
					<input type="checkbox" name="condition2" value="Like New">
						Like New
				</label>
				</div>
				<div class=checkboxstyleding>
				<label>
					<input type="checkbox" name="condition3" value="Good Condition">
						Good Condition
				</label>
				</div>
				<div class=checkboxstyleding>
				<label>
					<input type="checkbox" name="condition4" value="Fair Condition">
						Fair Condition
				</label>
				</div>
			</div>	
			<input type="submit">
			{{ Form::close() }}	
		</aside>
  	</div>
  
  	<div class="col-md-10">
  		<div class=mainsectionding>
  		<h1 class=h1ding>Search Result: </h1>
		@for($count=0;$count < count($results);$count++)
			@if($count%4==0)
				@if($count!=0)
					</div>
				@endif
				<div class="row">
			@endif
			<div class="col-xs-6 col-md-3">
				<div class=picboxding>
					<a href="/search/book_copy_id={{$results[$count]->id}}" class="thumbnail">							
						<img data-src="holder.js/100%x180" maxheight="200" alt="sampleimg.jpg" src="{{DB::table('books')->where('id',$results[$count]->book_id)->first()->pic_url}}">
					</a>
					<div class="caption" class=imginfoding>
						<p class=imginfoding>Price: ${{ $results[$count]->price }}</p>
						<p class=imginfoding>Seller: {{ DB::table('users')->where('id',$results[$count]->seller_id)->first()->email }}</p>
						<p class=imginfoding>Condition: {{ $results[$count]->condition }}</p>
					</div>
		   		</div>
			</div>
		@endfor
		</div>
  	</div>
</div>




</body>
</html>
@stop