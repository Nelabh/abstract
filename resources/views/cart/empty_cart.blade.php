<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<title>Cart</title>
<style>
.header
{
	background-color:#4F81C0;
	padding: 13px;
}

input.box1 {
  padding: 10px;
  border-radius: 2px;
  width: 790px;
  height: 40px; 
}

input.box2 {
  border-radius: 2px;
  padding: 2px;
  width: 40px;
  height: 40px;
  background-color:#FFF;
  padding-bottom:4px; 
}
input.box3 {
  border-radius: 2px;
  padding: 2px;
  width: 40px;
  height: 40px;
  background-color:#4F81C0;
  padding-bottom:6px; 
}
.login{
  color: #FFF;
  font-size:15px;
  text-align: center;
  padding: 2px; 
  border-left: 2px solid #CCC;
  border-right: 2px solid #CCC;
  padding-top: 6px;
  padding-bottom:6px; 

}

.signup{
  color: #FFF;
  font-size:15px;
  text-align: center;
  padding: 0px;
  padding-top: 0px;
  padding-bottom:0px; 
  padding-top: 6px;
  padding-bottom:6px; 
}

.logo_image
{

    width: 300px;
    padding: 30px;
    border: 10px solid navy;
    margin: 50px;
}

.footer
{
  border-top: solid 10px #16193b;
  color: #232323;
  background-color: #f9fafb;
}

.footer-widgets {
    padding: 80px 0;
    margin-top: -50px;
    background-color: transparent;
}
.footer-meta {
    padding: 15px 0;
    background-color: #2C3E50;
    border-top: solid 1px #a1b1bc;
}
body{font-family: 'Raleway', sans-serif;}

.copyright {
    font-size: 14px;
    line-height: 14px;
    color: #7f7f7f;
    margin-bottom: 15px;
    padding: 7px 0;
}

hr { 
    display: block;
    margin-top: 0.5em;
    margin-bottom: 0.5em;
    margin-left: auto;
    margin-right: auto;
    border-style: inset;
    border-width: 1px;
} 

.verticle_line {

border-left: 2px solid #CCC;
margin-left: auto;
padding-left: 20px;
}



.header-search{
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;
}

.cart {
  text-align:center;
    background:#176575; padding:5px; 
    width: 250px;
    height: 50px; 
  color: #FFF; 
  font-size:17px; 
}

.get-quotations{
  width: 200px;
  height: 40px;
  background-color:#000;
  color:#CCC;
}

.my-cart{
  width: 100px;
  height: 40px;
  background-color:#000;
  color:#FFF;
}

form.orientation{
  padding-top: 22px;
}
img.orientation{
   padding: 18px;
}

.summary{
  border: solid 2px #CCC;
}

.text-centre{
  text-align: center;
}

.align-left{
  padding-left: 70px;
}

.align-left-cart{
  padding-left: 10px;
}

.text-color{
  color: #999;
}

.left-align{
  padding-right: 10px;
}

.right-align{
  padding-left: 10px;
}
</style>


</head>

<body>

<div class="header">
  <div class="row">
    <div class="col-sm-2">
     <img class="orientation" src="{{URL::asset('images/vkulp.png')}}" class="img-responsive" class="logo_image" alt="vkulp logo">
    </div>

    <div class="col-sm-8">
      <div class="row">
        <div class="col-sm-12">
          <div class="row">
            <div class="col-sm-10">
              <form class="orientation">
                <input  class="box1" type="text" value="Search">
              </form>
            </div>
            <div class="col-sm-2">
              <form class="orientation">
                <input class="box2" class="img-responsive" type="image" src="{{URL::asset('images/search.gif')}}" alt="Submit">
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-sm-2">
    </div>

    <div class="col-sm-2">
      <div class="row">
        <div class="col-sm-4 signup">
          <p>Sign Up</p>
        </div>
        <div class="col-sm-4">
          <p class="login">Login</p>
        </div>
        <div class="col-sm-4">
          <input class="box3" class="img-responsive" type="image" src="{{URL::asset('images/cart.gif')}}" alt="Submit" width="60" height="60">
        </div>
        </div> 
        <div class="row">
          <div class="col-sm-12">
            <button type="button" class="get-quotations" >GET QUOTATIONS</button>
          </div>
        </div>
      </div>
    </div>
  </div>
<br>
<hr>
<center><h3>No Product Is Added In Cart</h3></center>
    <div class="row">
        <div class="col-sm-12 form-group text-centre">
          <a class="btn btn-theme btn-theme-transparent" href="{{URL::asset('/')}}">Continue Shopping</a>
        </div>
      </div>
  


<br>
<br>



<footer class="footer">
    <div class="footer-widgets">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="widget">
                        <h4 class="widget-title">About VKULP</h4>
                        <p>vkulp is here to ensure an easy and efficient procurement process for hospitality industry. Leave your worries to us!!</p>
                        <ul class="social-icons">
                            <li><a href="https://www.facebook.com/Officialvkulp" class="facebook" target="_blank"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="https://www.linkedin.com/company/vkulp" class="linkedin" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="https://twitter.com/Official_vKulp" class="twitter" target="_blank"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="https://www.youtube.com/channel/UCFtwrbVj23xkdUXhvKkoLIQ" class="youtube" target="_blank"><i class="fa fa-youtube"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="widget">
                        <h4 class="widget-title">News Letter</h4>
                        <p>Register to our newsletter and be updated with the latests information regarding our services, offers and much more.</p>
                        <form method="POST" action="http://www.vkulp.com/subscribe" accept-charset="UTF-8">
                         <div class="form-group">
                            <input class="form-control" placeholder="Enter your email" name="email" type="text">
                        </div>
                        <div class="form-group">
                            <input class="btn btn-theme btn-theme-transparent pull-right" type="submit" value="Subscribe">
                        </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="widget widget-categories">
                        <h4 class="widget-title">Quick Links</h4>
                        <ul>
                            <li><a href="http://www.vkulp.com">Home</a></li>
                            <li><a href="http://www.vkulp.com#about">About</a></li>
                            <li><a href="http://www.vkulp.com#team">Team</a></li>
                            <li><a href="http://www.vkulp.com/blog">Blog</a></li>
                            <li><a href="http://www.vkulp.com/terms">Privacy Policy</a></li>
                        </ul>
                    </div>
                </div>
  <div>
        </div>
    </div>
    <div class="footer-meta">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="copyright text-center">Copyright 2015 VKULP   |   All Rights Reserved   </div>
                </div>
            </div>
        </div>
    </div>
  </div>
</div>
</footer>

</body>
</html>