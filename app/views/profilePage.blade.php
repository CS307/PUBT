@extends('base')

@section('base_link')
<link href="{{asset('css/profilePage.css')}}" rel="stylesheet">
@stop

@section('base_content')
<div class=container>
		<div class=headding>
			<div class="col-md-1">
			</div>
			<div class="col-md-11">
				<p class=pheadding>Welcome, DingYEYE</p>
				<p class=ph2ding>Your are currently logged in.</p>
			</div>
		</div>
	<div class="row">
		<div class="col-md-2">
			<aside class=leftding>
				<h1 class=h1ding>Quick Links</h1>
				<p class=pding>Informations: </p>
				<a href="#">Personal Info</a><br>
				<a href="#">Address & phones</a><br>
				<a href="#">Email Reminds</a><br>
				<a href="#">Credit Record</a><br>
				<p class=pding>Account: </p>
				<a href="#">Change Password</a><br>
				<a href="#">Follow List</a><br>
				<a href="#">Buyer List</a><br>
			</aside>
		</div>
		<div class="col-md-5">
	
		</div>
		<div class="col-md-5">
	
		</div>
	</div>
</div>
@stop