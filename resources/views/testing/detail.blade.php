<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>{{	$parentproduct[0]->name	}} | vKulp</title>
        <!-- Bootstrap core CSS -->
        <link href="{{URL::asset('testing/b/css/bootstrap.css')}}" rel="stylesheet"/>
        <link href="{{URL::asset('testing/b/css/style.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{URL::asset('testing/b/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{URL::asset('testing/b/css/responsive-01.css')}}" rel="stylesheet">
        <style>
            input[type=number]::-webkit-inner-spin-button, 
            input[type=number]::-webkit-outer-spin-button {
                -webkit-appearance: none;
                -moz-appearance: none;
                appearance: none;
                margin: 0;
            }
        </style>
        <script>
            function loc()
            {
                var pin = document.getElementById('pincode').value;
                if ((pin.length == 6) && (!isNaN(pin)))
                {
                    var spin = pin.substring(0, 3);
                    switch (spin)
                    {
                        case '110':
                        case '122':
                        case '201':
                        case '560':
                            alert('The Items will be delivered within 48-hrs of Placing Order.');
                            break;
                        default:
                            alert('vKulp will start servicing in your area soon!');
							$('#place_order').hide();
							$('#no_service_area').show();

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
                                    <li class="main-menu"><a href="/">Home<span>></span></a></li>
                                    <li class="main-menu"><a href="/category/{{$categories['category_slug']}}">{{$categories['category_name']}}<span>></span> </a></li>
                                    <li class="main-menu"><a href="/sub-category/{{$categories['sub_category_slug']}}">{{$categories['sub_category_name']}}<span>></span></a></li>
                                    <li class="main-menu"><a href="/sub-sub-category/{{$categories['sub_sub_category_slug']}}">{{$categories['sub_sub_category_name']}} <span>></span></a></li>
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
                             <li class="main-menu"><a href="/">Home<span>></span></a></li>
                                    <li class="main-menu"><a href="/category/{{$categories['category_slug']}}">{{$categories['category_name']}}<span>></span> </a></li>
                                    <li class="main-menu"><a href="/sub-category/{{$categories['sub_category_slug']}}">{{$categories['sub_category_name']}}<span>></span></a></li>
                                    <li class="main-menu"><a href="/sub-sub-category/{{$categories['sub_sub_category_slug']}}">{{$categories['sub_sub_category_name']}} <span>></span></a></li>
                                    

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
                        <div class="col-md-12 detailpro_inner1"><a href="#"><img src="{{URL::asset('home-theme/img/products/')}}/{{$data[0]->image}}" class="img-responsive" height="400" width="400"></a>
                        </div>
                        <div class="col-md-12 detailpro_inner2">
                        </div>
                    </div>
                    <div class="col-md-7 detailpro_right">
                        <div class="col-md-12 detailpro_righth1">
                            <h3>{{	$parentproduct[0]->name	}}</h3>
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
                                        <span id="basic-addon2 " ><a class="input-group-addon addcheck"onclick="loc()">Check</a></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 placeorder_wrap">
                            <div class="col-md-6 placeorder_outer">
                                <div class="col-md-12 placeorder_headbg">
                                    <h3>&#8377;<input type="text" id="mrp" value="{{  $data[0]->max_retail_price  }}" />{{  $data[0]->max_retail_price  }} </h3>per piece
                                </div><!-- 
                                <center>SKU</center>
                                -->
                                 <div class="col-md-12 skutxt_outer skutxt_mid">
                                    {!!Form::open(array('url'=>'place_order', 'method'=>'post' ))!!}
                                    {!!Form::token()!!}

                                    <div class="col-md-6 skutxt">
                                        <h4>Select Quantity</h4>
                                    </div>
                                    <div class="col-md-6 sku_quality">
                                        <div class="col-md-12 sku_quality_outer">
                                            <div class="form-group">
                                                {!! Form::input('number','quantity',null,['class'=>'form-control' , 'id' => 'quantity' , 'step'=> '1' , 'min'=>'0']) !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-md-6 totalprc">
                                            <h4>Total Price</h4>
                                        </div>
                                        <div class="col-md-6 sku_mid">
                                            {{--<div class="col-md-12 sku">--}}
                                                {{--<div class="col-md-12 btn btn-default skubtn">--}}
                                                    {{--Large--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                            <input class="form-control" id="total_price" type="text">
                                        </div>
                                    </div>
                                    <div id="place_order" class="col-md-12 samlpebtn_outer">
                                        <div class="col-md-12 samlpebtn_wrap">
                                           <button class="col-md-12 btn btn-danger dangerbtn" type="submit">
                                                    PLACE ORDER</button>
                                            
                                        </div>
                                        <a href="{{URL::asset('/req_sample')}}"><div class="col-md-12">
                                                <div class="col-md-12 btn btn-default askbtn">
                                                    ASK FOR SAMPLE
                                                </div>
                                            </div></a>
                                    </div>
									<div id="no_service_area" style="display:none" class="col-md-12 samlpebtn_outer">
                                        Sorry..Currently we do not provide service in this area we will notify you soon!!!!
                                    </div>
                                    </form>
                                </div>

                            </div>
                            <div class="col-md-6 sold_wrap">
                                <div class="col-md-12 sold_outer">
                                    <!--<h3>Sold by</h3>
                                    <h4>HNG Retail</h4>
                                    <div class="col-md-6 hngborder"><hr></div>-->
                                    <div class="col-md-12 yellowbg_outer">
                                        <div class="col-md-12 yellowbg_wrap">
                                            <!-- <h4>Delivered by</h4>-->
                                            <p>Delivery with in 72* hours of placing Order.</p>
                                            <p>Mail us at <a href="mailto:contact@vkulp.com"> contact@vkulp.com </a>for early delivery.</p>
                                        </div>
                                    </div>
                                    <div style="padding-left: 26px;!important" class="col-md-12 retailul">
                                        <ul class="">
                                            <li>Cash-On-Delivery</li>
                                            <li>Cheque at the time of Delivery</li>
                                            <li>NEFT within 24 hours of Delivery </li>
                                            <li>Demand Draft </li>
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
                        <h3>Key Features of {{	$parentproduct[0]->name	}}</h3>
                        <ul>
                            <li>{{	$parentproduct[0]->description	}}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>	
        <div class="container">
            <div class="row">
                <div class="col-md-12 feature__outer">
                    <div class="col-md-12 infohelp__wrap" id="infowrap">
                        <div class="col-md-3 infohelp__txt"><p>Was this information Helpful?</p></div>
                        <div class="col-md-2 infohelp__txt2"><span>Yes</span><a id="feedback_yes" href="#"><img src="{{URL::asset('testing/b/img/thumbsup.png')}}"></a></div>
                        <div class="col-md-2 infohelp__txt2">
							<span>No</span><a id="feedback_no" href="#">
								<img src="{{URL::asset('testing/b/img/thumbsdown.png')}}"></a>
								<div style="display:none;" id="feedback_no_text"><textarea id="feedback_no_comment">
								
								</textarea>
								<input  value="Okay!!!" id="submit_feedback" class="col-md-12 btn btn-danger dangerbtn" type="button" /></div>
						</div>
						
                    </div>
					<div id="feedback_message">
				    </div>
                </div>
            </div>
        </div>	
        <div class="container">

        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 general__outer">
                    <div class="col-md-12 general__wrap">
                        <div class="col-md-12 specification__headtxtbot"><h4 class="col-md-12 specification__headtxt">General</h4></div>
                        <div class="col-md-12 specification__generaltxt_wrap">
                            <div class="col-md-4 col-sm-4 col-xs-6 specification__generaltxt">Category</div>
                            <div class="col-md-8 col-sm-8 col-xs-6 specification__generaltxt">{{$categories['category_name']}}</div>
                        </div>
                        <div class="col-md-12 specification__generaltxt_wrap">
                            <div class="col-md-4 col-sm-4 col-xs-6 specification__generaltxt">Sub Category</div>
                            <div class="col-md-8 col-sm-8 col-xs-6 specification__generaltxt">{{$categories['sub_category_name']}}</div>
                        </div>
                        <div class="col-md-12 specification__generaltxt_wrap">
                            <div class="col-md-4 col-sm-4 col-xs-6 specification__generaltxt">Sub-Sub Category</div>
                            <div class="col-md-8 col-sm-8 col-xs-6 specification__generaltxt">{{$categories['sub_sub_category_name']}}</div>
                        </div>
                        <div class="col-md-12 specification__generaltxt_wrap">
                            <div class="col-md-4 col-sm-4 col-xs-6 specification__generaltxt">Brand</div>
                            <div class="col-md-8 col-sm-8 col-xs-6 specification__generaltxt">{{$parentproduct[0]->brand}}</div>
                        </div>
                        <div class="col-md-12 specification__headtxtbot"><h4 class="col-md-12 specification__headtxt">Packaging Details</h4></div>
                        <div class="col-md-12 specification__generaltxt_wrap">
                            <div class="col-md-4 col-sm-4 col-xs-6 specification__generaltxt">Packaging Type</div>
                            <div class="col-md-8 col-sm-8 col-xs-6 specification__generaltxt">{{$data[0]->package_type}}</div>
                        </div>
                        <div class="col-md-12 specification__generaltxt_wrap">
                            <div class="col-md-4 col-sm-4 col-xs-6 specification__generaltxt">Packaging Volume</div>
                            <div class="col-md-8 col-sm-8 col-xs-6 specification__generaltxt">{{$data[0]->package_volume}}</div>
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
	<input type="hidden" value="{{$data[0]->id}}" id="product_id"/>
	<input type="hidden" value="{{$data[1]}}" id="user_id"/>
    </body>
    <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="{{URL::asset('testing/b/js/jquery.min.js')}}"></script>
    <script src="{{URL::asset('testing/b/js/bootstrap.js')}}"></script>
    <script>
	
        $(document).ready(function()
        {
            var initial_mrp = $('#mrp').val();
            $('#mrp').css( 'display' , 'none' );
            $('#total_price').attr( 'disabled' , 'disabled' );

            var sku_price;
            $('#sku_small , #sku_medium , #sku_large').click(function()
            {
                if( $(this).is(':checked') )
                {
                    sku_price = $(this).val();
                    check_quantity(sku_price);
                    $('#mrp').val(sku_price);
                    $('#mrp').html(sku_price);
                    //var total = sku_price * initial_mrp ;
                    //$('#total_price').attr('disabled','disabled').val(total);
                }
            });

            function check_quantity(sku_price)
            {
                $('#quantity').keyup(function ()
                {
                    var qty = $('#quantity').val()
                    qty = Math.round(qty);
                    $('#quantity').val(qty);
                    if (sku_price != null && sku_price != undefined)
                    {
                        var total = sku_price * qty;
                        $('#total_price').val(total);
                    }
                });
            }
			$('#feedback_yes').click(function() {
				var product_id= $('#product_id').val();
				var user_id= $('#user_id').val();
				var feedback = "Yes";
                var comment = "no comments"
				$.get("/feedback",{product_id: product_id,user_id: user_id,feedback:feedback,comment:comment}, function(data){
					/*.done(function() {*/
					 $('#infowrap').hide();
                    $('#feedback_message').html("<p>Thank You For Your Feedback. We Will Get Back To You!!!</p>");
          /*  			  })*/
				});
			});
			$('#feedback_no').click(function() {
				$('#feedback_no_text').show();
			});
			$('#submit_feedback').click(function() {
				var product_id= $('#product_id').val();
				var user_id= $('#user_id').val();
				var feedback = "No";
				var comment = $('#feedback_no_comment').val();
				$.get("/feedback",{product_id: product_id,user_id: user_id,feedback:feedback,comment:comment}, function(data){
					/*.done(function() {*/
                        $('#infowrap').hide();
					$('#feedback_message').html("<p>Thank You For Your Feedback. We Will Get Back To You!!!</p>");
				 /* })*/
				});
			});
        });
    </script>
</html>