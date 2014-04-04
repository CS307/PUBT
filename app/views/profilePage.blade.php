@extends('base')

@section('base_link')
<link href="{{asset('css/profilePage.css')}}" rel="stylesheet">
@stop

@section('base_content')
<div class=container>
		<div class=headding>
			<div class="col-md-1">
				<div class="media">
					<a class="pull-right" href="#">
						<img height="31" width="66" class="media-object" src="{{asset('css/logo.jpg')}}" alt="...">
					</a>
				</div>
			</div>
			<div class="col-md-11">
				<p class=pheadding>Welcome, DingYEYE</p>
				<p class=ph2ding>Your are currently logged in.</p>
			</div>
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
					<div class="row no-gutter">
						<div class="col-sm-6 col-md-3">
							<a href="#" class="thumbnail">
								<img data-src="holder.js/240x160" src="{{asset('css/sampleimg.jpg')}}" alt="sampleimg">
							</a>
						</div>
						<div class="col-md-9">
							<div class=tbreakding>
								<p>Book: Mother da facker</p>
								<p>Author: jcjcjcjc</p>
								<p>Course: CS250</p>
								<p>Condition: like shit!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!1</p>
							</div>
						</div>
					</div>
					<div class="row no-gutter">
						<div class="col-sm-6 col-md-3">
							<a href="#" class="thumbnail">
								<img data-src="holder.js/240x160" src="{{asset('css/sampleimg.jpg')}}" alt="sampleimg">
							</a>
						</div>
						<div class="col-md-9">
							<div class=tbreakding>
								<p>Book: Mother da facker</p>
								<p>Author: jcjcjcjc</p>
								<p>Course: CS250</p>
								<p>Condition: like shit!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!1</p>
							</div>
						</div>
					</div>
					<div class="row no-gutter">
						<div class="col-sm-6 col-md-3">
							<a href="#" class="thumbnail">
								<img data-src="holder.js/240x160" src="{{asset('css/sampleimg.jpg')}}" alt="sampleimg">
							</a>
						</div>
						<div class="col-md-9">
							<div class=tbreakding>
								<p>Book: Mother da facker</p>
								<p>Author: jcjcjcjc</p>
								<p>Course: CS250</p>
								<p>Condition: like shit!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!1</p>
							</div>
						</div>
					</div>
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
					<a href="#" class="thumbnail">
								<img data-src="holder.js/240x160" src="{{asset('css/sampleimg.jpg')}}" alt="sampleimg">
					</a>
					<a href="#" class="thumbnail">
								<img data-src="holder.js/240x160" src="{{asset('css/sampleimg.jpg')}}" alt="sampleimg">
					</a>
					<a href="#" class="thumbnail">
								<img data-src="holder.js/240x160" src="{{asset('css/sampleimg.jpg')}}" alt="sampleimg">
					</a>
					<a href="#" class="thumbnail">
								<img data-src="holder.js/240x160" src="{{asset('css/sampleimg.jpg')}}" alt="sampleimg">
					</a>
					<a href="#" class="thumbnail">
								<img data-src="holder.js/240x160" src="{{asset('css/sampleimg.jpg')}}" alt="sampleimg">
					</a>
				</div>
			</div>
			</div>
		</div>
	</div>
	
	
	<div class="row">
		<footer class=footerding>
			Copyright: PUBT: Dingzhe Li-Zorak!
		</footer>
	</div>
</div>
@stop