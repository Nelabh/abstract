<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<title>Buyer's Dashboard</title>
<!-- Bootstrap core CSS -->
<link href="{{URL::asset('testing/css/bootstrap.css')}}" rel="stylesheet"/>
<link href="{{URL::asset('testing/css/style.css')}}" rel="stylesheet" type="text/css" />
<link href="{{URL::asset('testing/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css"/>

<script src="{{URL::asset('testing/js/bootstrap.js')}}"></script>
<script src="{{URL::asset('testing/js/jquery.min.js')}}"></script>
   

</head>
<body onload="setTimeout(function(){window.location = 'http://www.vkulp.com/buyer';}, 5000)">


<nav class="nav navbar-default navbar nav_wrap">
<div class="container">
	<div class="row">
		<div class="col-md-12 nav_outer">
			<div class="col-md-2 logo_outer">
				<a href="{{URL::asset('/')}}">
			<img src="{{URL::asset('testing/img/logo.png')}}" class="img-responsive">
		</a>
			</div>
			<div class="col-md-7 search_barouter">
			<div class="col-md-12 input-group inputdiv">
      <input type="text" class="col-md-12 form-control" placeholder="Search for...">
			</div>
			</div>
			<div class="col-md-3 btnlogin_outer">
				<a href="{{URL::asset('/auth/logout')}}"><div class="col-md-5 signouter"><div class="col-md-12 btn btn-default headbtn">LOGOUT</div></div></a>
			</div>
			</div>
			</div>
			</div>
			</nav>
			<div class="container-fluid">
		<div class="row">
		<div class="col-md-12 getbutton_outer">
		<div class="col-md-10 getbutton">
		</div>
			<center><h2>Thank you for your Information.<br>
You will be redirected to the Buyer's Dashboard in few seconds.</h2></center>
		</div>
		</div>
		</div>
		  	
			<div class="container">
		<div class="row">
		<div class="col-md-12 schedule_formouter">
		<div class="col-md-12 schedule_form">
      <div class="col-md-12 table-responsive">
        
		</div>
		</div>
		</div>
		</div>
      </div><!--end of .table-responsive-->
	  		
		
</body>

 </html>