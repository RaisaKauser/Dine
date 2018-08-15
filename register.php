<?php  
session_start(); 
if(isset($_SESSION['admin_sid']) || isset($_SESSION['customer_sid']) || isset($_SESSION['owner_sid']))
{
  header("location:index.php");
}
else{
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="msapplication-tap-highlight" content="no">
  <title>Register | Dine & Wine</title>

  <!-- CORE CSS-->
  
    <link href="css/bootstrap.min.css" type="text/css" rel="stylesheet" media="screen,projection">
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
 

     <style type="text/css">
          footer {
        background-color: #555;
        color: white;
        padding: 15px;
        alignment-baseline: auto;
      }

      body{
          background-image: url("images/background.png");
          background-size: 100%;
          background-repeat: no-repeat;
        }
  .input-field div.error{
    position: relative;
    top: -1rem;
    left: 0rem;
    font-size: 5px;
    color:#FF4081;
    -webkit-transform: translateY(0%);
    -ms-transform: translateY(0%);
    -o-transform: translateY(0%);
    transform: translateY(0%);
  }
  .input-field label.active{
      width:100%;
  }
  .left-alert input[type=text] + label:after, 
  .left-alert input[type=password] + label:after, 
  .left-alert input[type=email] + label:after, 
  .left-alert input[type=url] + label:after, 
  .left-alert input[type=time] + label:after,
  .left-alert input[type=date] + label:after, 
  .left-alert input[type=datetime-local] + label:after, 
  .left-alert input[type=tel] + label:after, 
  .left-alert input[type=number] + label:after, 
  .left-alert input[type=search] + label:after, 
  .left-alert textarea.materialize-textarea + label:after{
      left:0px;
  }
  .right-alert input[type=text] + label:after, 
  .right-alert input[type=password] + label:after, 
  .right-alert input[type=email] + label:after, 
  .right-alert input[type=url] + label:after, 
  .right-alert input[type=time] + label:after,
  .right-alert input[type=date] + label:after, 
  .right-alert input[type=datetime-local] + label:after, 
  .right-alert input[type=tel] + label:after, 
  .right-alert input[type=number] + label:after, 
  .right-alert input[type=search] + label:after, 
  .right-alert textarea.materialize-textarea + label:after{
      right:70px;
  }
   #login-page{
     width: 27%;
    height: 40%;
    color: black;
    font-size: 10px;
    font-weight: bold;
    margin-left: 470px;
    margin-top: 5px;
  }
    footer {
    background-color: #777;
    bottom: 0px;
    width: 100%;
    position: absolute;
    text-align: center;
    color: white;
  }

  </style> 
</head>

<body>
    <div class="container-fluid text-center">    
    <div class="row content">
      <div class="col-sm-3">
      </div>
      <div class="col-sm-9">
        <div class="container-fluid col-md-8">
        <div class="page-header bg-danger text-white">
          <span class="lead">Register</span>
        </div>
        <div class="panel panel-primary">
          <div class="panel-heading text-danger">Join us now</div>
          <div class="panel-body">
            <form name="loginForm" class="form-horizontal"
              action="routers/register-router.php" method="POST" autocomplete="off"
              onsubmit="return validate()">
                      <img src="images/l2.png" alt="logo" width="200px"; height="90px";>
              <div class="form-group row">
                <label class="control-label col-sm-4" for="username">User
                  Name:</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" id="username"
                    name="username" placeholder="Enter username" maxlength="20"
                    required="required" autofocus="autofocus" data-error=".errorTxt1">
                    <div class="errorTxt1"></div>
                </div>
              </div>
                
              <div class="form-group row">
                <label class="control-label col-sm-4" for="pwd">Password:</label>
                <div class="col-sm-6">
                  <input type="password" class="form-control" id="password"
                    name="password" placeholder="Enter password" maxlength="20"
                    required="required">
                </div>
              </div>
              <div class="form-group row">
                <label class="control-label col-sm-4" for="pwd">Phone:</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" id="phone"
                    name="phone" placeholder="Enter phone number" maxlength="15"
                    required="required" data-error=".errorTxt4">
                </div>
              </div>
              <div class="form-group row">
                <label class="control-label col-sm-4" for="name">Name:</label>
                <div class="col-sm-6">
                <input name="name" id="name" type="text" class="form-control" placeholder="Name" data-error=".errorTxt2" required="required">
                  <div class="errorTxt2"></div>   
                </div>
              </div>
              <div class="form-group row">
                <div class="col-sm-offset-4 col-md-6">
                  <button type="submit" onclick="document.getElementById('formValidate').submit();" class="btn btn-primary btn-block">Register</button>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-sm-offset-4 col-md-6">
                  Already have an account? <a href="login.php">login here</a>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      </div>
    </div>
  </div>

  <!-- ================================================
    Scripts
    ================================================ -->

  <!-- jQuery Library -->
  <script type="text/javascript" src="js/plugins/jquery-1.11.2.min.js"></script>
  <!--materialize js-->
  <script type="text/javascript" src="js/materialize.min.js"></script>
  <!--scrollbar-->
  <script type="text/javascript" src="js/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
     <script type="text/javascript" src="js/plugins/jquery-validation/jquery.validate.min.js"></script>
    <script type="text/javascript" src="js/plugins/jquery-validation/additional-methods.min.js"></script>
     
      <!--plugins.js - Some Specific JS codes for Plugin Settings-->
    <script type="text/javascript" src="js/plugins.min.js"></script>
    <!--custom-script.js - Add your own theme custom JS-->
    <script type="text/javascript" src="js/custom-script.js"></script>
    <script type="text/javascript">
    $("#formValidate").validate({
        rules: {
            username: {
                required: true,
                minlength: 5
            },
            name: {
                required: true,
                minlength: 5        
            },
      password: {
        required: true,
        minlength: 5
      },
            phone: {
        required: true,
        minlength: 4
      },
        },
        messages: {
            username: {
                required: "Enter username",
                minlength: "Minimum 5 characters are required."
            },
            name: {
                required: "Enter name",
                minlength: "Minimum 5 characters are required."
            },
      password: {
        required: "Enter password",
        minlength: "Minimum 5 characters are required."
      },
            phone:{
        required: "Specify contact number.",
        minlength: "Minimum 4 characters are required."
      },    
        },
        errorElement : 'div',
        errorPlacement: function(error, element) {
          var placement = $(element).data('error');
          if (placement) {
            $(placement).append(error)
          } else {
            error.insertAfter(element);
          }
        }
     });
    </script>
 <?php include("footer.php");?>
</body>
</html>
<?php
}
?>