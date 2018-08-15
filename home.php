<!DOCTYPE html>
<html lang="en">
<head>  
<title>Home | Dine & Wine</title>

<link href="css/bootstrap.min.css" type="text/css" rel="stylesheet" media="screen,projection">
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
  <style>
  body {
      font: 400 15px Lato, sans-serif;
      line-height: 1.8;
      color: #818181;
  }
  h2 {
      font-size: 24px;
      text-transform: uppercase;
      color: #303030;
      font-weight: 600;
      margin-bottom: 30px;
  }
  h4 {
      font-size: 19px;
      line-height: 1.375em;
      color: #303030;
      font-weight: 400;
      margin-bottom: 30px;
  }  
  .jumbotron {
      background-color: #fff;
      color: #A82128 ;

      font-family: Montserrat, sans-serif;
  }
  .container-fluid {
      padding: 60px 50px;
  }
  .bg-grey {
      background-color: #f6f6f6;
  }
  .logo-small {
      color: #f4511e;
      font-size: 50px;
  }
  .logo {
      color: #f4511e;
      font-size: 200px;
  }
  .thumbnail {
      padding: 0 0 15px 0;
      border: none;
      border-radius: 0;
  }
  .thumbnail img {
      width: 100%;
      height: 100%;
      margin-bottom: 10px;
  }
  .carousel-control.right, .carousel-control.left {
      background-image: none;
      color: #f4511e;
  }
  .carousel-indicators li {
      border-color: #f4511e;
  }
  .carousel-indicators li.active {
      background-color: #f4511e;
  }
  .item h4 {
      font-size: 19px;
      line-height: 1.375em;
      font-weight: 400;
      font-style: italic;
      margin: 70px 0;
  }
  .item span {
      font-style: normal;
  }
  .panel {
      border: 1px solid #f4511e; 
      border-radius:0 !important;
      transition: box-shadow 0.5s;
  }
  .panel:hover {
      box-shadow: 5px 0px 40px rgba(0,0,0, .2);
  }
  .panel-footer .btn:hover {
      border: 1px solid #f4511e;
      background-color: #fff !important;
      color: #f4511e;
  }
  .panel-heading {
      color: #fff !important;
      background-color: #f4511e !important;
      padding: 25px;
      border-bottom: 1px solid transparent;
      border-top-left-radius: 0px;
      border-top-right-radius: 0px;
      border-bottom-left-radius: 0px;
      border-bottom-right-radius: 0px;
  }
  .panel-footer {
      background-color: white !important;
  }
  .panel-footer h3 {
      font-size: 32px;
  }
  .panel-footer h4 {
      color: #aaa;
      font-size: 14px;
  }
  .panel-footer .btn {
      margin: 15px 0;
      background-color: #A82128;
      color: #fff;
  }
  .navbar {
      margin-bottom: 0;
      background-color: #A82128;
      z-index: 9999;
      border: 0;
      font-size: 12px !important;
      line-height: 1.42857143 !important;
      letter-spacing: 4px;
      border-radius: 0;
      font-family: Montserrat, sans-serif;
  }
  .navbar li a, .navbar .navbar-brand {
      color: #fff !important;
  }
  .navbar-nav li a:hover, .navbar-nav li.active a {
      color: #f4511e !important;
      background-color: #fff !important;
  }
  .navbar-default .navbar-toggle {
      border-color: transparent;
      color: #fff !important;
  }
  footer .glyphicon {
      font-size: 20px;
      margin-bottom: 20px;
      color: #A82128;
  }
  .slideanim {visibility:hidden;}
  .slide {
      animation-name: slide;
      -webkit-animation-name: slide;
      animation-duration: 1s;
      -webkit-animation-duration: 1s;
      visibility: visible;
  }
  @keyframes slide {
    0% {
      opacity: 0;
      transform: translateY(70%);
    } 
    100% {
      opacity: 1;
      transform: translateY(0%);
    }
  }
  @-webkit-keyframes slide {
    0% {
      opacity: 0;
      -webkit-transform: translateY(70%);
    } 
    100% {
      opacity: 1;
      -webkit-transform: translateY(0%);
    }
  }
  @media screen and (max-width: 768px) {
    .col-sm-4 {
      text-align: center;
      margin: 25px 0;
    }
    .btn-lg {
        width: 100%;
        margin-bottom: 35px;
    }
  }
  @media screen and (max-width: 480px) {
    .logo {
        font-size: 150px;
    }
  }
  </style>
</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>                        
          </button>
          <a class="navbar-brand" href="#myPage">Home</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#about">About Us</a></li>
            <li><a href="#services">Services</a></li>
            <li><a href="#menu">Menus</a></li>
            <li><a href="login.php">Login</a></li>
            <li><a href="register.php">Register</a></li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="jumbotron text-center">
      <img src="images/logo.jpg" alt="logo" width="100%" height="20%">
    </div>
    <div class="jumbotron text-center" style="background-image: url('images/roll.jpg');">
      <h1>Dine & Wine</h1> 
      <p>The place to chase the flavors</p> 
    </div>
    <!-- Container (About Section) -->
    <div id="about" class="container-fluid">
        <h2 class="text-center text-danger">About Dine & Wine</h2>
      <div class="row">
        <div class="col-sm-6">
            <h4>DINE & WINE . It is for you.</h4>
            <p>Iconic, stylish and sophisticated, Dine n wine creates excitingly individual hotels for individual minds. We delight our travel savvy, modern guests with a genuine, inviting ambiance. We create excitement with our stunning, leading edge design. And we strive to engage each and every guest through our innovative and very relevant range of holistic facilities and services, including fast Free Internet. We’ve packaged it all neatly together, with our unique. Yes I Can!SM service ethos and our 100% Satisfaction Guarantee.</p>

            DINE N WINE features 380 unique hotels, open or coming soon, in the world’s most desirable destinations: dynamic major cities, nearby airport gateways and in the most sought after leisure hotspots.

            It’s a perfect equation that adds up to a highly individual - and unforgettable – 360° hospitality experience, unrivalled anywhere in the world today.
            <h4>DINE & WINE. Designed for you.</h4><br>
        </div>
        <div class="col-sm-6">
            <img src="images/rest.jpg" width="640px" />
        </div>
      </div>
    </div>

    <!-- Container (Services Section) -->
    <div id="services" class="container-fluid text-center" style="background-image: url('images/pizza.jpg');">
        <h2 class="text-danger">Our Chefs</h2>
        <h4 class="text-danger">“A recipe has no soul, you as the cook must bring soul to the recipe.”</h4>
        <div class="col-sm-4">
            <div class="thumbnail " style="background-color: #fdf5e6; border-color: black"><br><br>
            <img src="images/chef5.jpg" alt="chef" class="img-circle" width="150px" height="150px">
            <div class="caption">
                <center>
                <h3 style="color:slateblue">Sanjeev Kapoor</h3>
                <h5 style="color:slateblue">CHEF</h5>
                <p>Sanjeev Kapoor is an Indian celebrity chef, entrepreneur and television personality. He is the most celebrated face of Indian cuisine and a Chef extraordinaire.He won several major awards including two National. also known as Rachael Ray of India. Profession, Master Chef.</p>
                </center>
            </div>
        </div>
    </div>
 <div class="col-sm-4">
    <div class="thumbnail"  style="background-color: #fdf5e6; border-color: black" ><br><br>
      <img src="images/chef1.jpg" alt="chef" class="img-circle" width="149px" height="149px">
      <div class="caption">
        <center>
            <h3 style="color: slateblue">Helana Rizzo</h3>
            <h5 style="color:slateblue">CHEF</h5>
            <p>Helena Rizzo is the Brazilian-born chef,and the current winner of Veuve Clicquot World’s Best Female Chef 2014.Helena’s cooking has the blending of traditional Brazilian cooking techniques and ingredients infused with Spanish cooking and modern gastronomic practices.</p>
        </center>
      </div>
    </div>
  </div>
    <div class="col-sm-6 col-md-4">
    <div class="thumbnail"  style="background-color: #fdf5e6; border-color: black"><br><br>
      <img src="images/chef4.jpg" alt="chef" class="img-circle" width="144px" height="144px">
      <div class="caption">
        <center>
            <h3 style="color: slateblue">Vikas Khanna</h3>
            <h5 style="color:slateblue">CHEF</h5>
            <p>Vikas Khanna was executive chef at the Manhattan restaurant Salaam Bombay from 2002-05. He is an Indian American chef, restaurateur, cookbook writer, humanitarian, a Michelin star chef, is undoubtedly the face of Indian cuisine on the international scene today. </p>
        </center>
      </div>
    </div>
  </div>
</div>

         <!-- Container (Pricing Section) -->
        <div id="menu" class="container-fluid">
          <div class="text-center">
            <h2>Menu</h2>           
          </div>
          <div class="row slideanim">
            <div class="col-sm-4 col-xs-12">
              <div class="panel panel-default text-center">
                <div class="panel-heading">
                  <h1>Indian veg</h1>
                </div>
                <div class="panel-body">
                  <a href="indian.php"><img src="images/indian.jpg" height="300px" width="250px"></a>
                </div>
              </div>      
            </div>     
             <div class="row slideanim">
            <div class="col-sm-4 col-xs-12">
              <div class="panel panel-default text-center">
                <div class="panel-heading">
                  <h1>Indian non-veg</h1>
                </div>
                <div class="panel-body">
                  <a href="nonveg.php"><img src="images/drumstick.jpg" height="300px" width="250px"></a>
                </div>
              </div>      
            </div>  
            <div class="row slideanim">
            <div class="col-sm-4 col-xs-12">
              <div class="panel panel-default text-center">
                <div class="panel-heading">
                  <h1>Chinese</h1>
                </div>
                <div class="panel-body">
                  <a href="chinese.php"><img src="images/chinese.jpg" height="300px" width="250px"></a>
                </div>
              </div>      
            </div> 
             <div class="row slideanim" style="margin-left: 300px">
            <div class="col-sm-4 col-xs-12">
              <div class="panel panel-default text-center">
                <div class="panel-heading">
                  <h1>Italian</h1>
                </div>
                <div class="panel-body">
                  <a href="italian.php"><img src="images/italian.jpg" height="300px" width="250px"></a>
                </div>
              </div>      
            </div>        
            <div class="col-sm-4 col-xs-12">
              <div class="panel panel-default text-center">
                <div class="panel-heading">
                  <h1>Desserts</h1>
                </div>
                <div class="panel-body">
                    <a href="desserts.php"><img src="images/desserts.jpg" height="300px" width="250px"></a>
                </div>
              </div>      
            </div>    
          </div>
        </div>
        <footer class="container-fluid text-center">
          <a href="#myPage" title="To Top">
            <span class="glyphicon glyphicon-chevron-up"></span>
          </a>
          <?php include("footer.php");?>
        </footer>

        <script>
        $(document).ready(function(){
          // Add smooth scrolling to all links in navbar + footer link
          $(".navbar a, footer a[href='#myPage']").on('click', function(event) {
            // Make sure this.hash has a value before overriding default behavior
            if (this.hash !== "") {
              // Prevent default anchor click behavior
              event.preventDefault();

              // Store hash
              var hash = this.hash;

              // Using jQuery's animate() method to add smooth page scroll
              // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
              $('html, body').animate({
                scrollTop: $(hash).offset().top
              }, 900, function(){
           
                // Add hash (#) to URL when done scrolling (default click behavior)
                window.location.hash = hash;
              });
            } // End if
          });
          
          $(window).scroll(function() {
            $(".slideanim").each(function(){
              var pos = $(this).offset().top;

              var winTop = $(window).scrollTop();
                if (pos < winTop + 600) {
                  $(this).addClass("slide");
                }
            });
          });
        })
        </script>
</body>
    </html>