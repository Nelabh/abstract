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
    <script>
$(function() {
        var scntDiv = $('#entity');
        var i = $('#entity tr').size();

        
        $('#addScnt').click(function() {
                $("#entity").append('<tr id="entity"><td><input type ="text" name="product[]" placeholder="Enter Product" required></td><td><input type ="text" name="description[]" placeholder="Enter Its Description" required></td><td><input type ="text" name="qty[]" placeholder="Enter Quantity" required></td><td><select name="frequency[]"><option value="0" selected >Once in 7 Days</option><option value="1">Once in 15 Days</option><option value="2">Once in 30 Days</option></select></td><td><input type="Checkbox" name="sample[]" value="'+i+'""></td></tr>');
                i++;
            
               
        });
        
       
});

</script>

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
				<a class="col-md-10 col-md-offset-2 get_quotations" href="{{URL::asset('/home')}}">Go to:<br>Buyer's Information</a>
		</div>
		</div>
		</div>
		</div>
		{!!Form::open(array('url'=>'request', 'method'=>'post' ))!!}
                    {!!Form::token()!!}
           	
			<div class="container">
		<div class="row">
		<div class="col-md-12 schedule_formouter">
		<div class="col-md-12 schedule_form">
      <div class="col-md-12 table-responsive">
        <table summary="" class="table table-bordered table-hover">
		<caption><h3>Schedule Purchase</h3></caption>
          <thead>
            <tr class="headbg">
              <th>Product	</th>
              <th>Product Description</th>
              <th>Quantity</th>
              <th>Purchase Frequency</th>
              <th> Sample Required</th>
            </tr>
          </thead>
                   <tbody id="entity">
            <tr id="entity0">

              <td><input type ="text" name="product[]" placeholder="Enter Product" required></td>
              <td><input type ="text" name="description[]" placeholder="Enter Its Description" required></td>
              <td><input type ="text" name="qty[]" placeholder="Enter Quantity" required></td>
              <td><select name="frequency[]">
  <option value="0" selected >Once in 7 Days</option>
  <option value="1">Once in 15 Days</option>
  <option value="2">Once in 30 Days</option>
  </select></td>
              <td><input type="Checkbox" name="sample[]" value = "0" ></td>
            </tr>
            
       
          </tbody>
          <tfoot>
       
          </tfoot>
        </table>
		</div>
		</div>
		</div>
		</div>
      </div><!--end of .table-responsive-->
	  		
		<div class="container">
		<div class="row">
		<div class="col-md-10 col-md-offset-1 tablebotbtn_formouter">
			<div class="col-md-10 tablebotbtn_forminner">
			<div class="btn btn-info" id="addScnt">
		<span>+</span>Add Another Field
		</div>
		</div>
			<div class="col-md-2 tablebotbtn_formoutersumbtn">
			<div class="col-md-10 col-md-offset-2 btn btn-default submitbtnform">
		<button type="submit">SUBMIT</button>
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