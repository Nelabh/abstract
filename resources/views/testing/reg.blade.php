<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<title>Buyer's Information</title>
<!-- Bootstrap core CSS -->
<link href="{{URL::asset('testing/css/bootstrap.css')}}" rel="stylesheet"/>
<link href="{{URL::asset('testing/css/style.css')}}" rel="stylesheet" type="text/css" />
<link href="{{URL::asset('testing/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css"/>

<script src="{{URL::asset('testing/js/bootstrap.js')}}"></script>
<script src="{{URL::asset('testing/js/jquery.min.js')}}"></script>
 

</head>
<body>


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
			<div class="col-md-2 getbutton">
				<a type="button" class="col-md-10 col-md-offset-2 get_quotations" href="{{URL::asset('/buyer')}}"> Go to:<br>Buyer's Dashboard</a>
		</div>
		</div>
		</div>
		</div>
		   	
			<div class="container">
		<div class="row">
		<div class="col-md-12 schedule_formouter">
		<div class="col-md-12 schedule_form">
      <div class="col-md-12 table-responsive">
      	      <div class="col-md-6">
                        {!! Form::open(['url'=>'post_info']) !!}
                        <div class="form-group">
                            {!! Form::text('name', $name, ['class'=>'form-control input-lg','placeholder'=>'Full Name']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::email('email',$email, ['class'=>'form-control input-lg','placeholder'=>'Your Email ID']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::text('username', $username, ['class'=>'form-control input-lg','placeholder'=>'Company Name']) !!}
                        </div>
                      <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon" id="basic-addon1">+91-</span>
                                {!! Form::text('phone',$contact, ['class'=>'form-control
                                input-lg','placeholder'=>'Phone Number','aria-describedby' => 'basic-addon1']) !!}
                            </div>
                        </div>
                                <div class="form-group">
                                    {!! Form::text('add1',$add1, ['class'=>'form-control
                                    input-lg','placeholder'=>'Address Line 1']) !!}
                                </div>
                           
                           <div class="form-group">
                                    {!! Form::text('add2',$add2, ['class'=>'form-control
                                    input-lg','placeholder'=>'Address line 2']) !!}
                                </div>
                            
                      
                      <div class="row">
                      	<div class="col-md-6">
                      	 <div class="form-group">
                                    {!! Form::text('city',$city, ['class'=>'form-control
                                    input-lg','placeholder'=>'City']) !!}
                                </div>
                                </div>

                           
                            
                             	<div class="col-md-6">
                      	 <div class="form-group">
                                    {!! Form::text('state',$state, ['class'=>'form-control
                                    input-lg','placeholder'=>'State']) !!}
                                </div>
                                </div>
                           
                            </div>
                            <div class="row">
                      	<div class="col-md-6">
                      	 <div class="form-group">
                                    {!! Form::text('zipcode',$zipcode, ['class'=>'form-control
                                    input-lg','placeholder'=>'Zipcode']) !!}
                                </div>
                                </div>
                                </div>


                        
                        <div class="form-group">
                         </div>
                        <div class="form-group">
                                {!! Form::submit('Confirm',['class'=>'btn btn-success btn-block btn-lg pull-right']) !!}
                        </div>
                        {!! Form::close() !!}
                    </div>
        
		</div>
		</div>
		</div>
		</div>
      </div><!--end of .table-responsive-->
	  		
		<div class="container">
		<div class="row">
		<div class="col-md-10 col-md-offset-1 tablebotbtn_formouter">
			<div class="col-md-10 tablebotbtn_forminner">
			
		</div>
			<div class="col-md-2 tablebotbtn_formoutersumbtn">
			<div class="col-md-10 col-md-offset-2 ">
		</div>
		</div>
		</div>
		</div>
		</div>
		</form>
			<div class="footer_wrap">
			<div class="container">
		<div class="row">
		<div class="col-md-12 footer_outer">
		<div class="col-md-4 footer_left">
		<h3>About Vklup</h3>
		<div class="col-md-5 footer_border">
		<hr>
		</div>
		<p class="col-md-12 footerp">Vkulp is here to ensure an easy & efficient 
procurement process for hospitality industry. </p>
		<div class="col-md-12 footiconouter">
		<div class="col-md-2 socialicons">
       <a href="#"><i class="fa fa-facebook faicon"></i></a>
	   </div>
	   <div class="col-md-2 socialicons">
       <a href="#"><i class="fa  fa-twitter faicon"></i></a>
	   </div>
	   <div class="col-md-2 socialicons">
       <a href="#"><i class="fa fa-linkedin faicon"></i></a>
	   </div>
	   <div class="col-md-2 socialicons">
       <a href="#"><i class="fa fa-youtube faicon"></i></a>
	   </div>
	   </div>
		</div>
		<div class="col-md-4 footer_mid">
		<h3>News Letter</h3>
		<div class="col-md-5 footer_border">
		<hr>
		</div>
				<p class="col-md-12 footerp">Vkulp is here to ensure an easy & efficient 
procurement process for hospitality industry. </p>
		<div class="col-md-8 footsearch">
			<div class="col-md-12 input-group footsearch_barouter">
      <input type="text" class="col-md-12 form-control" placeholder="Search for...">
			</div>
					<div class="col-md-12 submitbtn">
			<div class="col-md-7 col-md-offset-5 btn btn-default submitbtninner">SUBMIT</div>
			</div>
			</div>
		</div>
		<div class="col-md-4 footer_right">
		<h3>Quick Link</h3>
		<div class="col-md-5 footer_border">
		<hr>
		</div>
		<div class="col-md-12 sociallink_outer">
		<div class="col-md-1 sociallink_outer">
	<img src="{{URL::asset('testing/img/arrow.png')}}">
	</div>
		<div class="col-md-10 sociallink_outertxt">
	<a href="{{URL::asset('/')}}">Home</a>
	</div>
	</div>
		<div class="col-md-12 sociallink_outer">
		<hr>
		<div class="col-md-1 sociallink_outer">
	<img src="{{URL::asset('testing/img/arrow.png')}}">
	</div>
		<div class="col-md-10 sociallink_outertxt">
	<a href="{{URL::asset('/#about')}}">About</a>
	</div>
	</div>
		<div class="col-md-12 sociallink_outer">
		<hr>
		<div class="col-md-1 sociallink_outer">
	<img src="{{URL::asset('testing/img/arrow.png')}}">
	</div>
		<div class="col-md-10 sociallink_outertxt">
	<a href="{{URL::asset('/#blog')}}">Blog</a>
	</div>
	</div>
		<div class="col-md-12 sociallink_outer">
		<hr>
		<div class="col-md-1 sociallink_outer">
	<img src="{{URL::asset('testing/img/arrow.png')}}">
	</div>
		<div class="col-md-10 sociallink_outertxt">
	<a href="{{URL::asset('/#team')}}">team</a>
	</div>
	</div>
		<div class="col-md-12 sociallink_outer">
		<hr>
		<div class="col-md-1 sociallink_outer">
	<img src="{{URL::asset('testing/img/arrow.png')}}">
	</div>
		<div class="col-md-10 sociallink_outertxt">
	<a href="{{URL::asset('/terms')}}">Privacy Policy</a>
	</div>
	</div>
			<div class="col-md-12 sociallink_outer">
			<hr>
	</div>
		</div>
		</div>
		</div>
		</div>
		</div>
			<div class="footer_botouter">
		<div class="container">
			<div class="row">
			<div class="col-md-12 footer_botinner">
		<h5>Copyright 2015 VKULP | All Right Preserved</h5>
			</div>
			</div>
			</div>
			</div>
</body>

 </html>