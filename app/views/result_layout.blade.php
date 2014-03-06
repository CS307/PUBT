<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>The Most Poplular Local Trading Site!</title>

<link href="{{asset('css/bootstrap.min.css')}} " rel="stylesheet">
<link href="{{asset('css/resultpage.css')}}" rel="stylesheet">
<script src="http://code.jquery.com/jquery-latest.min.js"
        type="text/javascript"></script>
<script src="{{asset('css/bootstrap.min.js')}}"></script>
<style>
body{padding: 50px;}
</style>
</head>
<body>


<nav class="navbar navbar-default navbar-fixed-top navbar-inverse" role="navigation">
  <div class=container>
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">PUBT</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav ">
        <li class="active"><a href="#">Home</a></li>
        <li><a href="#">MA</a></li>
        <li><a href="#">CS</a></li>
        <li><a href="#">ENG</a></li>
        <li><a href="#">PHY</a></li>
        <li><a href="#">MGMT</a></li>
        <li><a href="#">STAT</a></li>
        <li><a href="#">Others</a></li>
      </ul>
      <form class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="In format:CS 180">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
      <ul class="nav navbar-nav navbar-right">	
        
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Join us<b class="caret"></b></a>
          <ul class="dropdown-menu dropdown-menu-left" role="menu" aria-labelledby="dropdownMenu1">
            <li role="presentation" class="dropdown-header">Join the PU Book Trade!</li>
            <li class="divider"></li>
            <li>
 				<div class="input-group">
  					<input type="text" class="form-control">
  					<span class="input-group-addon">@purdue.edu</span>
  				</div>
  			</li>
  			<li>
  				<div class="input-group">
  					<input type="text" class="form-control" placeholder="Enter Password">  					
				</div>
			</li>
			<li>
                <div class="input-group">
  					<input type="text" class="form-control" placeholder="Confirm Password">  					
				</div>
			</li>
			<li>
				<button type="submit" class="btn btn-default btn-sm">Submit</button>
			</li>
			</ul>
		</li>
        
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Sign-in<b class="caret"></b></a>
          <ul class="dropdown-menu dropdown-menu-right" role="menu" aria-labelledby="dropdownMenu1">
            <li role="presentation" class="dropdown-header">Sign in to the PU Book Trade!</li>
            <li class="divider"></li>
            <li>
 				<div class="input-group">
  					<input type="text" class="form-control">
  					<span class="input-group-addon">@purdue.edu</span>
  				</div>
  			</li>
  			<li>
  				<div class="input-group">
  					<input type="text" class="form-control" placeholder="Enter Password">  					
				</div>
			</li>
			<li>
				<button type="submit" class="btn btn-default btn-sm">Login</button>
			</li>
		  </ul>
		</li>
      </ul>
    </div><!-- /.navbar-collapse -->
 </div><!-- /.container -->
</nav>
 
 <div class=container>
 <div class="row">
  <div class="col-md-2">
	<aside class=checkboxding>
		<p class=checkboxcolording>New Release:</p>
			<div class="checkbox">
				<div class=checkboxstyleding>
				<label>
					<input type="checkbox" value="">
						book1
				</label>
				</div>
				<div class=checkboxstyleding>
				<label>
					<input type="checkbox" value="">
						book2
				</label>
				</div>
				<div class=checkboxstyleding>
				<label>
					<input type="checkbox" value="">
						book3
				</label>
				</div>
				<div class=checkboxstyleding>
				<label>
					<input type="checkbox" value="">
						book4
				</label>
				</div>
			</div>
			
			<p class=checkboxcolording>Math:</p>
			<div class="checkbox">
				<div class=checkboxstyleding>
				<label>
					<input type="checkbox" value="">
						book1
				</label>
				</div>
				<div class=checkboxstyleding>
				<label>
					<input type="checkbox" value="">
						book2
				</label>
				</div>
				<div class=checkboxstyleding>
				<label>
					<input type="checkbox" value="">
						book3
				</label>
				</div>
				<div class=checkboxstyleding>
				<label>
					<input type="checkbox" value="">
						book4
				</label>
				</div>
			</div>
			
			<p class=checkboxcolording>Phys:</p>
			<div class="checkbox">
				<div class=checkboxstyleding>
				<label>
					<input type="checkbox" value="">
						book1
				</label>
				</div>
				<div class=checkboxstyleding>
				<label>
					<input type="checkbox" value="">
						book2
				</label>
				</div>
				<div class=checkboxstyleding>
				<label>
					<input type="checkbox" value="">
						book3
				</label>
				</div>
				<div class=checkboxstyleding>
				<label>
					<input type="checkbox" value="">
						book4
				</label>
				</div>
			</div>
	</aside>
  </div>
  
  <div class="col-md-10">
  <div class=mainsectionding>
  <h1 class=h1ding>Search Result: </h1>
	<section>

		@yield('results')
		
	</section>
	</div>
	<div class="row">
	<div class="col-md-4">
	</div>
	<div class="col-md-6">
	<ul class="pagination">
  <li><a href="#">&laquo;</a></li>
  <li><a href="#">1</a></li>
  <li><a href="#">2</a></li>
  <li><a href="#">3</a></li>
  <li><a href="#">4</a></li>
  <li><a href="#">5</a></li>
  <li><a href="#">&raquo;</a></li>
</ul>
</div>
</div>
  </div>
</div>
</div>

<div class="row">
	<footer class=footerding>
		Copyright: Dingzhe Li-Zorak!
	</footer>
</div>


</body>
</html>