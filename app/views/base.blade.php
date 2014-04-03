<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>The Most Poplular Local Trading Site!</title>

<link href="{{asset('css/bootstrap.min.css')}} " rel="stylesheet">

@yield('base_link')

<script src="http://code.jquery.com/jquery-latest.min.js"
        type="text/javascript"></script>
<script src="{{asset('css/bootstrap.min.js')}}"></script>
																		<!--<link rel="stylesheet/less" type="text/css" href="{{asset('less/bootstrap.less')}}">
																		<script src="{{asset('css/less-1.7.0.min.js')}}" type="text/javascript"></script>-->
<style>
body{padding: 50px;}
input{color:black;}
::-webkit-scrollbar-track
{
	-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.1);
	background-color: #F5F5F5;
	border-radius: 10px;
}

::-webkit-scrollbar
{
	width: 10px;
	background-color: #F5F5F5;
}

::-webkit-scrollbar-thumb
{
	border-radius: 10px;
	background-color: #FFF;
	background-image: -webkit-linear-gradient(top,
											  #A9A9A9 0%,
											  #DCDCDC 50%,
											  #A9A9A9 100%);
}

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
        <li class="active"><a href="/">Home</a></li>
        <li><a href="/search/subject=ma">MA</a></li>
        <li><a href="/search/subject=cs">CS</a></li>
        <li><a href="#">ENG</a></li>
        <li><a href="#">PHY</a></li>
        <li><a href="#">MGMT</a></li>
        <li><a href="#">STAT</a></li>
        <li><a href="#">Others</a></li>
      </ul>
        {{Form::open(array('url'=>'search','method'=>'post'))}}
      <div class="navbar-form navbar-left" role="search" action="#">
        <div class="form-group">
          <input type="text" class="form-control" name="keyword" placeholder="In format:CS 180">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </div>
        {{Form::close()}}
      
      <ul class="nav navbar-nav navbar-right pull-right"> 
    
    @if(!Auth::check())
    <li class="dropdown" id="menuSignup">
            <a class="dropdown-toggle" href="#" data-toggle="dropdown" id="navSignup">Join us<b class="caret"></b></a>
            <div class="dropdown-menu" style="padding:17px;">
              {{Form::open(array('url'=>'postRegister','method'=>'post'))}}
              <input type="text" name="email" placeholder="Enter email"/>
              <input name="password" type="password" placeholder="Enter Password"/>
              <input name="password_confirmation" type="password" placeholder="Confirm Password"/>
              <button type="submit" id="btnLogin" class="btn">Sign up</button>
              {{Form::close()}}
            </div>
          </li>
    @endif
        
        <li class="dropdown" id="menuLogin">
          @if(Auth::check())
            <a class="dropdown-toggle" href="#" data-toggle="dropdown" id="navLogin">{{Auth::user()->email}}<b class="caret"></b></a>
            <div class="dropdown-menu" style="padding:17px;">
              {{Form::open(array('url'=>'postLogout','method'=>'post'))}}
                <button type="submit" id="btnLogin" class="btn">Log out</button>
                {{Form::close()}}
          @else
            <a class="dropdown-toggle" href="#" data-toggle="dropdown" id="navLogin">Sign in<b class="caret"></b></a>
            <div class="dropdown-menu" style="padding:17px;">
              {{Form::open(array('url'=>'postLogin','method'=>'post'))}}
              <input name="email" id="username" type="text" placeholder="Email">
                <input name="password" id="password" type="password" placeholder="Password"><br>
                <button type="submit" id="btnLogin" class="btn">Login</button>
                {{Form::close()}}
          @endif
            </div>
          </li>
      </ul>
    </div><!-- /.navbar-collapse -->
 </div><!-- /.container -->
</nav>

@yield('base_content')

</body>
</html>