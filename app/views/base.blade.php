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
<style>
body{padding: 50px;}
input{color:black;}
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
        <li><a href="#">MA</a></li>
        <li><a href="#">CS</a></li>
        <li><a href="#">ENG</a></li>
        <li><a href="#">PHY</a></li>
        <li><a href="#">MGMT</a></li>
        <li><a href="#">STAT</a></li>
        <li><a href="#">Others</a></li>
      </ul>
      <form class="navbar-form navbar-left" role="search" action="#">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="In format:CS 180">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
      
      
      <ul class="nav navbar-nav navbar-right pull-right"> 
    
    <li class="dropdown" id="menuSignup">
            <a class="dropdown-toggle" href="#" data-toggle="dropdown" id="navSignup">Join us<b class="caret"></b></a>
            <div class="dropdown-menu" style="padding:17px;">
              {{Form::open(array('url'=>'postRegister','method'=>'post'))}}
              <input type="text" name="email" placeholder="Enter email"/>
              <input type="text" name="password" placeholder="Enter Password"/>
              <input type="text" name="password_confirmation" placeholder="Confirm Password"/>
              <button type="submit" id="btnLogin" class="btn">Sign up</button>
              {{Form::close()}}
            </div>
          </li>
    
        
        <li class="dropdown" id="menuLogin">
          @if(Auth::check())
            <a class="dropdown-toggle" href="#" data-toggle="dropdown" id="navLogin">{{Auth::user()->id}}<b class="caret"></b></a>
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