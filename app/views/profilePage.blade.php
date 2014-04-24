@extends('base')

@section('base_link')
<link href="{{asset('css/profilePage.css')}}" rel="stylesheet">
@stop

@section('base_content')
<div class=container>
		<div>

		</div>
	<div class="row">
	
		<div class="col-md-3">
			<aside class=leftding>
				<h1 class=h1ding>Personal Infomations: </h1>
				<div class="border"></div>
				<img class="touxiang aligncenter" src="http://www.freelander.net.cn/app/Public/images/default_top.jpg" alt="img">
				<p class=pding>Name: {{Auth::user()->email}}</p>
				<p class=pding>Email addr: {{Auth::user()->email}}@purdue.edu</p>
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
									{{Form::open(array('url'=>'/unfollow','method'=>'post'))}}
										<input type="hidden" name="book_copy_id" value="{{$followingbooks[$count]->id}}">
										<input type="hidden" name="follower_id" value="{{Auth::user()->id}}">
										<button type="submit" class="btn btn-info btn-xs">Unfollow</button>
									{{Form::close()}}
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
				<div class="panelbodyding">
				
					@for($count=0;$count<count($sellingbooks);$count++)
					<div class="imgcontainerding">
						<a href="/search/book_copy_id={{$sellingbooks[$count]->id}}" class="imgcontainerding thumbnail">
							<img data-src="holder.js" src="{{ DB::table('books')->where('id',$sellingbooks[$count]->book_id)->first()->pic_url }}" alt="sampleimg">
						</a>
					</div>
					<div class="expdate">
					<p style="margin:0px;">Exp. date: {{$sellingbooks[$count]->expire_date}}</p>
					</div>
					@endfor
				
				</div>
			</div>
			</div>
		</div>
	</div>
</div>
@stop