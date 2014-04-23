@extends('base')

@section('base_link')
<link href="{{asset('css/profilePage.css')}}" rel="stylesheet">
@stop

@section('base_content')
<div class=container>
		<div>
<!-- 			<div class="col-md-1">
				<div class="media">
					<a class="pull-right" href="#">
						<img height="31" width="66" class="media-object" src="{{asset('css/logo.jpg')}}" alt="...">
					</a>
				</div>
			</div> -->
<!-- 			<div class="col-md-11">
				<p class=pheadding>Welcome, {{ $user->email }}</p>
				<p class=ph2ding>Your are currently logged in.</p>
			</div> -->
		</div>
	<div class="row">
	
		<div class="col-md-3">
			<aside class=leftding>
				<h1 class=h1ding>Personal Infomations: </h1>
				<p class=pding>Name:</p>
				<p class=pding>Major:</p>
				<p class=pding>Phone Number:</p>
			</aside>
		</div>
		<div class="col-md-7">
			<div class=topding>
			<div class="panel panel-warning">
				<div class="panel-heading">
					<h3 class="panel-title">Followed Books:</h3>
				</div>
				<div class=panelbodyding>
					@if(1)			
					@for($count=0;$count<count($followingbooks);$count++)		
						<div class="row no-gutter">
							<div class="col-sm-6 col-md-3">
								<a href="/search/book_copy_id={{$followingbooks[$count]->id}}">
									<img class="picding" onload="resizeImage(this)" src="{{DB::table('books')->where('id',$followingbooks[$count]->book_id)->first()->pic_url}}" width="145" height="145" alt="sampleimg">
								</a>
							</div>
							<div class="col-md-9">
								<div class=tbreakding>
									<a id="tip" href="#">Book: {{ DB::table('books')->where('id',$followingbooks[$count]->book_id)->first()->title }}
									<span id="tip_info">Book: {{ DB::table('books')->where('id',$followingbooks[$count]->book_id)->first()->title }}</span>
									</a>
									<p>Author: {{ DB::table('books')->where('id',$followingbooks[$count]->book_id)->first()->author }}</p>
									<p>Course: {{ DB::table('books')->where('id',$followingbooks[$count]->book_id)->first()->subject.' '.DB::table('books')->where('id',$followingbooks[$count]->book_id)->first()->course_id }}</p>
									<p>Condition: {{ $followingbooks[$count]->condition }}
									<div class="btn-group btn-group-xs pull-right buttonding">
										<button type="button" class="btn btn-default">Unfollow</button>
									</div></p>
									<p>Owner: {{ DB::table('users')->where('id', $followingbooks[$count]->seller_id )->first()->email }}</p>
									
								</div>
							</div>
						</div>
					@endfor
					@endif
				</div>
			</div>
			</div>
		</div>
		
		<div class="col-md-2">
			<div class=topding>
			<div class="panel panel-success">
				<div class="panel-heading">
					<h3 class="panel-title">Selling Books:</h3>
				</div>
				<div class=panelbodyding>
					@for($count=0;$count<count($sellingbooks);$count++)
						<a href="/search/book_copy_id={{$sellingbooks[$count]->id}}" class="thumbnail">
							<img data-src="holder.js/240x160" src="{{ DB::table('books')->where('id',$sellingbooks[$count]->book_id)->first()->pic_url }}" alt="sampleimg">
						</a>
					@endfor
				</div>
			</div>
			</div>
		</div>
	</div>
	
	
	<!-- <div class="row">
		<footer class=footerding>
			Copyright: PUBT: Dingzhe Li-Zorak!
		</footer>
	</div> -->
</div>
@stop