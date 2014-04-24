<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>The Most Poplular Local Trading Site!</title>

  <link href="{{asset('css/bootstrap.min.css')}} " rel="stylesheet">
  <link href="{{asset('css/base.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
  <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
  <script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css">

  <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
  <script src="{{asset('css/bootstrap.min.js')}}"></script>
    @yield('base_link')
																		<!--<link rel="stylesheet/less" type="text/css" href="{{asset('less/bootstrap.less')}}">
																		<script src="{{asset('css/less-1.7.0.min.js')}}" type="text/javascript"></script>-->


<style>
  body { font-size: 150%; padding: 50px;}
    label, input { display:block; }
    input.text { margin-bottom:12px; width:95%; padding: .4em; }
    fieldset { padding:0; border:0; margin-top:25px; }
    h1 { font-size: 1.2em; margin: .6em 0; }
    div#users-contain { width: 350px; margin: 20px 0; }
    div#users-contain table { margin: 1em 0; border-collapse: collapse; width: 100%; }
    div#users-contain table td, div#users-contain table th { border: 1px solid #eee; padding: .6em 10px; text-align: left; }
    .ui-dialog .ui-state-error { padding: .3em; }
    .validateTips { border: 1px solid transparent; padding: 0.3em; }
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

<style type="text/CSS">
a#tip:link,a#tip:hover {text-decoration:none;color:#000;display:block}
a#tip span {display:none;text-decoration:none;}
a#tip:visited {color:#000;text-decoration:underline;}
a#tip:hover #tip_info {display:block;Max-width: 300px;border:1px solid #696969;border-radius:3px;background:#FFFFFF;
padding:2px;margin:0px;position:absolute;top:20px;left:150px;font-size:12px; color:#696969}
</style>






<script>
  $(function() {
    var email = $( "#email" ), password = $( "#password" ), pwconfirm = $("#pwconfirm")
      allFields = $( [] ).add( email ).add( password ).add(pwconfirm),
      tips = $( ".validateTips" );
 
    function updateTips( t ) {
      tips
        .text( t )
        .addClass( "ui-state-highlight" );
      setTimeout(function() {
        tips.removeClass( "ui-state-highlight", 1500 );
      }, 500 );
    }
 
    function checkLength( o, n, min, max ) {
      if ( o.val().length > max || o.val().length < min ) {
        o.addClass( "ui-state-error" );
        updateTips( "Length of " + n + " must be between " +
          min + " and " + max + "." );
        return false;
      } else {
        return true;
      }
    }

    function checkPw(o, n) {
      if (o.val()!=n.val()) {
        n.addClass( "ui-state-error" );
        updateTips( "Two passwords must be consistent.");
        return false;
      } else {
        return true;
      }

    }
 
    function checkRegexp( o, regexp, n ) {
      if ( !( regexp.test( o.val() ) ) ) {
        o.addClass( "ui-state-error" );
        updateTips( n );
        return false;
      } else {
        return true;
      }
    }


 
    $( "#signup-form" ).dialog({
      autoOpen: false,
      height: 300,
      width: 350,
      modal: true,
      buttons: {
        "Create an account": function() {
          var bValid = true;
          allFields.removeClass( "ui-state-error" );
 
          bValid = bValid && checkLength( email, "email", 6, 80 );
          bValid = bValid && checkLength( password, "password", 4, 32 );
          bValid = bValid && checkPw( password, pwconfirm);
          // From jquery.validate.js (by joern), contributed by Scott Gonzalez: http://projects.scottsplayground.com/email_address_validation/
          bValid = bValid && checkRegexp( email, /^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i, "eg. Lee123" );
          bValid = bValid && checkRegexp( password, /^([0-9a-zA-Z])+$/, "Password field only allow : a-z 0-9" );
 
          if ( bValid ) {
            $( "#users tbody" ).append( "<tr>" +
              "<td>" + email.val() + "</td>" +
              "<td>" + password.val() + "</td>" +
            "</tr>" );
            $( this ).dialog( "close" );
          }
        },
        Cancel: function() {
          $( this ).dialog( "close" );
        }
      },
      close: function() {
        allFields.val( "" ).removeClass( "ui-state-error" );
      }
    });
 


    $( "#editprice-form").dialog({
      autoOpen: false,
      height: 150,
      width: 250,
      modal: true,
      buttons: {
        "Edit list price": function() {
          var bValid = true;
          allFields.removeClass( "ui-state-error" );
 
          bValid = bValid && checkLength( newprice, "email", 0, 80 );
          // From jquery.validate.js (by joern), contributed by Scott Gonzalez: http://projects.scottsplayground.com/email_address_validation/
          bValid = bValid && checkRegexp( newprice, /^\d+.?\d*$/, "Please enter valid price" );
 
        },
        Cancel: function() {
          $( this ).dialog( "close" );
        }
      },
      close: function() {
        allFields.val( "" ).removeClass( "ui-state-error" );
      }

    });


    $( "#edit-price")
      .button()
      .click(function() {
        $( "#editprice-form").dialog( "open" );
      });


    $( "#create-user" )
      .button()
      .click(function() {
        $( "#signup-form" ).dialog( "open" );
      });
  });
  </script>



  
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
      <a class="navbar-brand" href="/">PUBT</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav ">
        @if(Auth::check())
        <li class="active"><a href="/profilepage">Home</a></li>
        @endif
        <li><a href="/search/subject=chm">CHM</a></li>
        <li><a href="/search/subject=cs">CS</a></li>
        <li><a href="/search/subject=engl">ENGL</a></li>
        <li><a href="/search/subject=ma">MA</a></li>
        <li><a href="/search/subject=mgmt">MGMT</a></li>
        <li><a href="/search/subject=phys">PHYS</a></li>
        <li><a href="/search/subject=stat">STAT</a></li>
      </ul>
        {{Form::open(array('url'=>'mainRequest','method'=>'get'))}}
      <div class="navbar-form navbar-left" role="search" action="#">
        <div class="form-group">
          <input type="text" class="form-control" name="keyword" placeholder="In format:CS 18000">
        </div>
        <button type="submit" class="btn btn-default" name='button' value='search'>Submit</button>
      </div>
        {{Form::close()}}
      
    <ul class="nav navbar-nav navbar-right pull-right"> 
    
    @if(!Auth::check())
    <li class="dropdown" id="menuSignup">
          <a class="dropdown-toggle" href="#" data-toggle="dropdown" id="navSignup">Join us<b class="caret"></b></a>
            <div class="dropdown-menu dropdownMenu" style="width:230px">
              {{Form::open(array('url'=>'postRegister','method'=>'post'))}}
              <div class="input-group button">
                <input class="form-control" type="text" name="email" placeholder="PUaccount"/>
                <span class="input-group-addon">@purdue.edu</span>
              </div>
              <div class="button">
              <input class="form-control" name="password" type="password" placeholder="Enter Password"/>
              </div>
              <div class="button">
              <input class="form-control" name="password_confirmation" type="password" placeholder="Confirm Password"/>
            </div>
              <button type="submit" id="btnLogin" class="btn">Sign up</button>
              {{Form::close()}}
            </div>
    </li>
    @endif
        
        <li class="dropdown" id="menuLogin">
          @if(Auth::check())
            <a class="dropdown-toggle" href="#" data-toggle="dropdown" id="navLogin">{{Auth::user()->email}}<b class="caret"></b></a>
            <div class="dropdown-menu dropdownMenu" style="padding:17px;">
                <div class="button">
                <a href="/profilepage">
                  <button class="btn btn-primary" style="width:90%">Profile</button>
                </a>
              </div>
                {{Form::open(array('url'=>'postLogout','method'=>'post'))}}
                <button type="submit" id="btnLogin" class="btn btn-danger" style="width:90%">Log out</button>
                {{Form::close()}}


          @else
            <a class="dropdown-toggle" href="#" data-toggle="dropdown" id="navLogin">Sign in<b class="caret"></b></a>
            <div class="dropdown-menu dropdownMenu" style="padding:17px;">
              {{Form::open(array('url'=>'postLogin','method'=>'post'))}}
                <div class="button">
                <input class="form-control button" name="email" id="username" type="text" placeholder="Email">
                </div>
                <div class="button">
                <input class="form-control button" name="password" id="password" type="password" placeholder="Password"><br>
                </div>
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