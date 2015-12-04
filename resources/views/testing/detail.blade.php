<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<title>{{	$data[0]->name	}} | vKulp</title>
<!-- Bootstrap core CSS -->
<link href="{{URL::asset('testing/b/css/bootstrap.css')}}" rel="stylesheet"/>
<link href="{{URL::asset('testing/b/css/style.css')}}" rel="stylesheet" type="text/css" />
<link href="{{URL::asset('testing/b/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{URL::asset('testing/b/css/responsive-01.css')}}" rel="stylesheet">
<script>
function loc()
{
	var pin=document.getElementById('pincode').value;
	if((pin.length==6)&&(!isNaN(pin)))
	{
	var spin=pin.substring(0,3);
	switch(spin)
	{
		case '110':
		case '122':
		case '201':
		case '560':
		alert('The Items will be delivered within 48-hrs of Placing Order.');
		break;
		default:
		alert('vKulp will start servicing in your area soon!');


	}
}
else
{
	alert('Please Enter valid PINCODE');
}
}
</script>
</head>
<body>
<nav class="nav navbar-default navbar nav_wrap">
<div class="container">
	<div class="row">
		<div class="col-md-12 nav_outer">
			<div class="col-md-2 logo_outer">
			<img src="{{URL::asset('testing/b/img/logo.png')}}" class="img-responsive">
			</div>
			<div class="col-md-7 search_barouter display-sec">
			<div class="col-md-12 input-group inputdiv">
      <input type="text" class="col-md-12 form-control" placeholder="Search for...">
			</div>
			</div>
			<div class="col-md-3 btnlogin_outer-001">
			
			<div class="togg-nav">
					<label class="togg-inner" for="menu-toggle"><img src="{{URL::asset('testing/b/img/menu.png')}}" /></label>
					<input type="checkbox" id="menu-toggle"/>
					<ul id="menu">
					  
						
						
						
						<li class="main-menu"><a href="#">Home<span>></span></a></li>
						<li class="main-menu"><a href="#">Sports & Fitness<span>></span> </a></li>
						<li class="main-menu"><a href="#">Team Sports <span>></span></a></li>
						<li class="main-menu"><a href="#">Cricket <span>></span></a></li>
						<li class="main-menu"><a href="#">Cricket bats <span>></span></a></li>
						<li class="main-menu"><a href="#">adidas cricket bats<span>></span> </a></li>
						<li class="main-menu"><a href="#">adidas Master Blaster Cricket Club Kashmir willow Crick.....</a></li>
						
					</ul>
					
					
					
				</div>
				
				
				
			
			<a href="{{URL::asset('/auth/logout')}}"><div class="col-md-6 col-md-offset-1 headbtnlog"><div class="col-md-9 btn btn-default headbtn head-btn-001">LOGOUT</div></div></a>
			
			
			</div>
			
			<div class="col-md-12 input-group inputdiv input-search">
							<input type="text" class="col-md-12 form-control" placeholder="Search for...">
						</div>
			
			
			</div>
			</div>
			</div>
			</nav>
		<div class="container">
		<div class="row">
		<div class="col-md-12 getbutton_outer">
		<div class="col-md-10 getbutton">
		<ul class="col-md-12 list-inline getbtndiv_ul display-sec">
		<li><a href="#">Home<span>></span></a></li>
		<li><a href="#">Sports & Fitness<span>></span> </a></li>
		<li><a href="#">Team Sports <span>></span></a></li>
		<li><a href="#">Cricket <span>></span></a></li>
		<li><a href="#">Cricket bats <span>></span></a></li>
		<li><a href="#">adidas cricket bats<span>></span> </a></li>
		<li><a href="#">adidas Master Blaster Cricket Club Kashmir willow Crick.....</a></li>
		</ul>
		</div>
		<div class="col-md-2 getbutton">
		<div class="col-md-12 getbutton_outer">	
		<button type="button" class="col-md-10 col-md-offset-2 get_quotations">Get Quotations</button>
		
		</div>
		</div>
		</div>
		</div>
		</div>
		<div class="container">
		<div class="row">
		<div class="col-md-12 detailpro_outer">
		<div class="col-md-5 detailpro_left">
		<div class="col-md-12 detailpro_inner1"><a href="#"><img src="{{URL::asset('testing/b/img/detailproimg.png')}}" class="img-responsive"></a>
		</div>
		<div class="col-md-12 detailpro_inner2">
		<div class="col-md-3 detailproimgdiv"><a href="#"><img src="{{URL::asset('testing/b/img/lube1.png')}}" class="img-responsive"></a></div>
		<div class="col-md-3 detailproimgdiv"><a href="#"><img src="{{URL::asset('testing/b/img/lube1.png')}}" class="img-responsive"></a></div>
		<div class="col-md-3 detailproimgdiv"><img src="{{URL::asset('testing/b/img/lube1.png')}}" class="img-responsive"></a></div>
		<div class="col-md-3 detailproimgdiv"><img src="{{URL::asset('testing/b/img/lube1.png')}}" class="img-responsive"></a></div>
		</div>
		</div>
		<div class="col-md-7 detailpro_right">
		<div class="col-md-12 detailpro_righth1">
		<h3>{{	$data[0]->name	}}</h3>
		<div class="col-md-12 detailpro_righth1">
		<div class="col-md-4 detailpro_rightpara">
		<p>Color black</p>
         <p>Advantaged with venti..</p>
		</div>
		<div class="col-md-4 detailpro_rightpara">
		<p>Adjestable Srape:yes</p>
		<p>Enable with acrivated..</p>
		</div>
		<div class="col-md-4 detailpro_rightpara">
		<p>Material:Nylon</p>
         <p>View all item details..</p>
		</div>
		</div>
		</div>
		<div class="col-md-12 check_wrap">
		<div class="col-md-12 check_outer">
		<div class="col-md-6 check_locator">
		<div class="col-md-1 locatorouter"><img src="{{URL::asset('testing/b/img/locator-red.png')}}"></div>
		<div class="col-md-10 locatortxt"><h4>Check Availabilty at</h4></div>
		</div>
		<div class="col-md-6 check_content">
	<div class="col-md-11 input-group checkouter">
  <input id="pincode" type="text" class="form-control checkinput" placeholder="PINCODE" aria-describedby="basic-addon2">
  <span class="input-group-addon addcheck" id="basic-addon2 "><a onclick="loc()">Check</a></span>
	</div>
		</div>
		</div>
		</div>
		<div class="col-md-12 placeorder_wrap">
	<div class="col-md-6 placeorder_outer">
	<div class="col-md-12 placeorder_headbg">
	<h4>&#8377; {{	$data[0]->max_retail_price	}} per piece</h4>
	</div>
	<div class="col-md-12 skutxt_outer">
	<div class="col-md-3 skutxt">
	<h4>SKU</h4>
	</div>
	<div class="col-md-9 skudivs">
	<div class="col-md-12 btn_wrapsku">
	<div class="col-md-6 btn_outersku">
   <div class="col-md-12 btn btn-default skubtn">
	Small
	</div></div>
	<div class="col-md-6 btn_outersku">
	<div class="col-md-12 btn btn-default skubtn">
	Medium
	</div>
	</div>
	<div class="col-md-6 btn_outersku">
	<div class="col-md-12 btn btn-default skubtn">
	Large
	</div>
	</div>
	</div>
	</div>
	</div>
		<div class="col-md-12 skutxt_outer skutxt_mid">
			{!!Form::open(array('url'=>'place_order', 'method'=>'post' ))!!}
                    {!!Form::token()!!}
           	
	<div class="col-md-6 skutxt">
	<h4>Select Quality</h4>
	</div>
	<div class="col-md-6 sku_quality">
	<div class="col-md-12 sku_quality_outer">
<div class="form-group">
  <select class="form-control sell" name="quantity" id="sel1" placeholder="10">
    <option value="10">10</option>
    <option value="9">9</option>
    <option value="8">8</option>
    <option value="7">7</option>
   </select>
</div>
	</div>
	</div>
		<div class="col-md-12">
	<div class="col-md-6 totalprc">
	<h4>Total Price</h4>
	</div>
	<div class="col-md-6 sku_mid">
	<div class="col-md-12 sku">
  <div class="col-md-12 btn btn-default skubtn">
	Large
	</div>
	</div>
	</div>
	</div>
		<div class="col-md-12 samlpebtn_outer">
	<div class="col-md-12 samlpebtn_wrap">
	 <div class="col-md-12 btn btn-danger dangerbtn"><button type="submit">
PLACE ORDER</button>
	</div>
	</div>
	<a href="{{URL::asset('/req_sample')}}"><div class="col-md-12">
  <div class="col-md-12 btn btn-default askbtn">
	ASK FOR SAMPLE
	</div>
	</div></a>
	</div>
	</form>
	</div>

	</div>
	<div class="col-md-6 sold_wrap">
	<div class="col-md-12 sold_outer">
	<h3>Sold by</h3>
<h4>HNG Retail</h4>
		<div class="col-md-6 hngborder"><hr></div>
	<div class="col-md-12 yellowbg_outer">
	<div class="col-md-12 yellowbg_wrap">
	<h4>Delivered by</h4>
	<p>Delivery with in 48 hours of palcing order</p>
	<p>Contact :---------- 	for early delivery</p>
	</div>
	</div>
		<div class="col-md-12 retailul">
		<ul class="">
	<li>CASH ON DELIVERY</li>
	<li>10 DAYS REPLACEMENT GUARANTEE</li>
	</ul>
	</div>
	</div>
	</div>
		</div>
		</div>
		</div>
		</div>
		</div>
			<div class="container">
			<div class="row">
		<div class="col-md-12 doortodoor__outer">
		<div class="col-md-12 doortodoor__wrap">
		<div class="col-md-4 doortodoor__left">
		<div class="col-md-2"><a href="#"><img src="{{URL::asset('testing/b/img/doorimg.png')}}"></a></div>
		<div class="col-md-9 doortxt"><p>DOOR TO DOOR</p> <p>DELIVERY</p></div>
		</div>
		<div class="col-md-4 doortodoor__mid">
		<div class="col-md-2"><a href="#"><img src="{{URL::asset('testing/b/img/refresh.png')}}"></a></div>
		<div class="col-md-9 doortxt"><p>FRESH AND EASY 
        </p> <p>RETURNS</p></div>
		</div>
		<div class="col-md-4 doortodoor__right">
		<div class="col-md-2"><a href="#"><img src="{{URL::asset('testing/b/img/close.png')}}"></a></div>
		<div class="col-md-9 doortxt"><p>ONLINE</p> <p class="pnone">CANCELLATIONS</p></div>
		</div>
		</div>
		</div>
		</div>
		</div>
					<div class="container">
			<div class="row">
		<div class="col-md-12 feature__outer">
		<div class="col-md-12 feature__wrap">
		<h3>Key Features of {{	$data[0]->name	}}</h3>
		<ul>
		<li>{{	$data[0]->description	}}</li>
		</ul>
</div>
</div>
</div>
</div>	
			<div class="container">
			<div class="row">
		<div class="col-md-12 feature__outer">
		<div class="col-md-12 infohelp__wrap">
		<div class="col-md-3 infohelp__txt"><p>Was this information Helpful?</p></div>
		<div class="col-md-2 infohelp__txt2"><span>Yes</span><a href="#"><img src="{{URL::asset('testing/b/img/thumbsup.png')}}"></a></div>
		<div class="col-md-2 infohelp__txt2"><span>No</span><a href="#"><img src="{{URL::asset('testing/b/img/thumbsdown.png')}}"></a></div>
</div>
</div>
</div>
</div>	
		<div class="container">
			<div class="row">
		<div class="col-md-12 feature__outer">
		<div class="col-md-12 specification__wrap">
		<div class="col-md-12 specification__head"><h3 class="col-md-12 specification__headtxt">Specification of {{	$data[0]->name	}}</h3><div>
		<div class="col-md-12 specification__head"><h4 class="col-md-12 specification__headtxt">In the Box</h4></div>
		<div class="col-md-12 specification__headtxtbot"><div class="col-md-3 specification__head"></div><h5 class="col-md-6 specification__headtxt">One Dining</h5></div>
		</div>
</div>
		<div class="col-md-12 demo__outer">
		<div class="col-md-12 demo__wrap">
		<div class="col-md-12 specification__headtxtbot"><h4 class="col-md-12 specification__headtxt">Installation & Demo</h4></div>
		<div class="col-md-12 demo__txt">
		<div class="col-md-4 demo__txt"><h5>Installation and Demo Detail</h5></div>
		<div class="col-md-8 demo__txt">Installation and Demo for this product  is done free of cost as part of this 
purchase. Our service partnert will visit your location within 72 business 
hours from the delivery of the product.</div>
		</div>
</div>
</div>
</div>
</div>	
</div>
</div>
			<div class="container">
			<div class="row">
		<div class="col-md-12 general__outer">
		<div class="col-md-12 general__wrap">
		<div class="col-md-12 specification__headtxtbot"><h4 class="col-md-12 specification__headtxt">General</h4></div>
		<div class="col-md-12 specification__generaltxt_wrap">
		<div class="col-md-4 col-sm-4 col-xs-6 specification__generaltxt">Brand</div>
		<div class="col-md-8 col-sm-8 col-xs-6 specification__generaltxt">Royal Oak</div>
		</div>
		<div class="col-md-12 specification__generaltxt_wrap">
		<div class="col-md-4 col-sm-4 col-xs-6 specification__generaltxt">Suitable for	</div>
		<div class="col-md-8 col-sm-8 col-xs-6 specification__generaltxt">Dining & Kitchen</div>
		</div>
		<div class="col-md-12 specification__generaltxt_wrap">
		<div class="col-md-4 col-sm-4 col-xs-6 specification__generaltxt">Delivery condition</div>
		<div class="col-md-8 col-sm-8 col-xs-6 specification__generaltxt">Knock down</div>
		</div>
		<div class="col-md-12 specification__generaltxt_wrap">
		<div class="col-md-4 col-sm-4 col-xs-6 specification__generaltxt">Storage included	</div>
		<div class="col-md-8 col-sm-8 col-xs-6 specification__generaltxt">No</div>
		</div>
		<div class="col-md-12 specification__generaltxt_wrap">
		<div class="col-md-4 col-sm-4 col-xs-6 specification__generaltxt"> Model no	</div>
		<div class="col-md-8 col-sm-8 col-xs-6 specification__generaltxt">Dt 154/135-4</div>
		</div>
		<div class="col-md-12 specification__generaltxt_wrap">
		<div class="col-md-4 col-sm-4 col-xs-6 specification__generaltxt"> Style</div>
		<div class="col-md-8 col-sm-8 col-xs-6 specification__generaltxt">Contemporary & Modern</div>
		</div>
		<div class="col-md-12 specification__generaltxt_wrap">
		<div class="col-md-4 col-sm-4 col-xs-6 specification__generaltxt"> Sitting Capacity</div>
		<div class="col-md-8 col-sm-8 col-xs-6 specification__generaltxt">4 Seater</div>
		</div>
		<div class="col-md-12 specification__generaltxt_wrap">
		<div class="col-md-4 col-sm-4 col-xs-6 specification__generaltxt">Sitting Capacity	</div>
		<div class="col-md-8 col-sm-8 col-xs-6 specification__generaltxt">4 Seater</div>
		</div>
		<div class="col-md-12 specification__generaltxt_wrap">
		<div class="col-md-4 col-sm-4 col-xs-6 specification__generaltxt"> Upholstery included	</div>
		<div class="col-md-8 col-sm-8 col-xs-6 specification__generaltxt">Yes</div>
		</div>
		<div class="col-md-12 specification__generaltxt_wrap">
		<div class="col-md-4 col-sm-4 col-xs-6 specification__generaltxt">Care instructions</div>
		<div class="col-md-8 col-sm-8 col-xs-6 specification__generaltxt">Clean with dry cloth.Wipe any spills immedietly.Do not anything hot & cold directly on the surface.</div>
		</div>
				</div>
				</div>
				</div>
				</div>	
			<div class="foottopborder_wrap">
			<div class="container">
			<div class="row">
			<div class="foottopborder">
			</div>
			</div>
			</div>
			</div>	
			<div class="footer_wrap">
			<div class="container">
		<div class="row">
		<div class="col-md-12 footer_outer">
		<div class="col-md-4 footer_left">
		<h3>About Vkulp</h3>
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
 <script src="{{URL::asset('testing/b/js/bootstrap.js')}}"></script>
<script src="{{URL::asset('testing/b/js/jquery.min.js')}}"></script>

  </html>