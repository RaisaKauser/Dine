    <?php 
    include 'includes/connect.php';


      if($_SESSION['admin_sid']==session_id())
      {
        ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="msapplication-tap-highlight" content="no">
      <title>User List</title>

      <!-- CORE CSS-->
                  <link href="css/bootstrap.min.css" type="text/css" rel="stylesheet" media="screen,projection">
                  <script type="text/javascript" src="js/jquery.min.js"></script>
                  <script type="text/javascript" src="js/bootstrap.min.js"></script>

      <link href="css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection">


      <link href="js/plugins/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet" media="screen,projection">
         <style type="text/css">
         footer {
              background-color: #555;
              color: white;
              padding: 15px;
              alignment-baseline: auto;
            }
      .input-field div.error{
        position: relative;
        top: -1rem;
        left: 0rem;
        font-size: 0.8rem;
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
      </style> 
    </head>

    <body>
      <!-- Start Page Loading -->
      <div id="loader-wrapper">
          <div id="loader"></div>        
          <div class="loader-section section-left"></div>
          <div class="loader-section section-right"></div>
      </div>
      <!-- End Page Loading -->
  <?php include("menu.php"); ?>
  <div class="container" style="margin-top:50px">
    <h4>User List</h4>
    <div class="row">
              <div class="col-md-12">
              <p class="caption">Enable, Disable or Verify Users.</p>
              <div class="divider"></div>
              <form class="formValidate" id="formValidate1" method="post" action="routers/user-router.php" novalidate="novalidate">
                <div class="row">
                  <div class="col s12 m4 l3">
                    <h4 class="header">List of users</h4>
                  </div>
                  <div>
    <table>
                        <thead>
                          <tr>
                            <th data-field="name">Name</th>
                            <th data-field="price">Email</th>
                            <th data-field="price">Contact</th>
                            <th data-field="price">Address</th> 
                            <th data-field="price">Role</th>
                            <th data-field="price">Verified</th>
                            <th data-field="price">Enable</th>
                            <th data-field="price">Wallet</th>            
                          </tr>
                        </thead>

                        <tbody>
            <?php
            $result = mysqli_query($con, "SELECT * FROM users");
            while($row = mysqli_fetch_array($result))
            {
              echo '<tr><td>'.$row["name"].'</td>';
              echo '<td>'.$row["email"].'</td>';
              echo '<td>'.$row["contact"].'</td>';   
              echo '<td>'.$row["address"].'</td>';                
              echo '<td><select name="'.$row['id'].'_role">
                          <option value="Administrator"'.($row['role']=='Administrator' ? 'selected' : '').'>Administrator</option>
                          <option value="Customer"'.($row['role']=='Customer' ? 'selected' : '').'>Customer</option>
                          <option value="Customer"'.($row['role']=='Owner' ? 'selected' : '').'>Owner</option>
                        </select></td>';
              echo '<td><select name="'.$row['id'].'_verified">
                          <option value="1"'.($row['verified'] ? 'selected' : '').'>Verified</option>
                          <option value="0"'.(!$row['verified'] ? 'selected' : '').'>Not Verified</option>
                        </select></td>';  
              echo '<td><select name="'.$row['id'].'_deleted">
                          <option value="1"'.($row['deleted'] ? 'selected' : '').'>Disable</option>
                          <option value="0"'.(!$row['deleted'] ? 'selected' : '').'>Enable</option>
                        </select></td>';
              $key = $row['id'];
              $sql = mysqli_query($con,"SELECT * from wallet WHERE customer_id = $key;");
              if($row1 = mysqli_fetch_array($sql)){
                $wallet_id = $row1['id'];
                $sql1 = mysqli_query($con,"SELECT * from wallet_details WHERE wallet_id = $wallet_id;");
                if($row2 = mysqli_fetch_array($sql1)){
                  $balance = $row2['balance'];
                }
              }
              echo '<td><label for="balance">Balance</label><input id="balance" name="'.$row['id'].'_balance" value="'.$balance.'" type="number" data-error=".errorTxt01"><div class="errorTxt01"></div></td></tr>';          
            }
            ?>
                        </tbody>
    </table>
                  </div>
            <div class="input-field col s12">
                                  <button class="btn cyan waves-effect waves-light right" type="submit" name="action">Modify
                                    <i class="mdi-content-send right"></i>
                                  </button>
                                </div>
                </div>
          </form>
          <div class="divider"></div>
          <form class="formValidate" id="formValidate" method="post" action="routers/add-users.php" novalidate="novalidate">
                <div class="row">
                  <div class="col s12 m4 l3">
                    <h4 class="header">Add User</h4>
                  </div>
                  <div>
    <table>
                        <thead>
                          <tr>
                            <th data-field="name">Username</th>
                            <th data-field="name">Password</th>             
                            <th data-field="name">Name</th>
                            <th data-field="price">Email</th>
                            <th data-field="price">Phone number</th>
                            <th data-field="price">Address</th> 
                            <th data-field="price">Role</th>
                            <th data-field="price">Verified</th>
                            <th data-field="price">Enable</th>    
                          </tr>
                        </thead>

                        <tbody>
            <?php
              echo '<tr><td><label for="username">Username</label><input id="username" name="username" type="text" data-error=".errorTxt02"><div class="errorTxt02"></div></td>';                     
              echo '<td><label for="password">Password</label><input id="password" name="password" type="password" data-error=".errorTxt03"><div class="errorTxt03"></div></td>';                     
              echo '<td><label for="name">Name</label><input id="name" name="name" type="text" data-error=".errorTxt04"><div class="errorTxt04"></div></td>';
              echo '<td><label for="email">Email</label><input id="email" name="email" type="email"></td>';
              echo '<td><label for="contact">Phone number</label><input id="contact" name="contact" type="number" data-error=".errorTxt05"><div class="errorTxt05"></div></td>';   
              echo '<td><label for="address">Address</label><input id="address" name="address" type="text" data-error=".errorTxt06"><div class="errorTxt06"></div></td>';   
              echo '<td><select name="role">
                          <option value="Administrator">Administrator</option>
                          <option value="Owner">Owner</option>
                          <option value="Customer" selected>Customer</option>
                        </select></td>';
              echo '<td><select name="verified">
                          <option value="1">Verified</option>
                          <option value="0" selected>Not Verified</option>
                        </select></td>';  
              echo '<td><select name="deleted">
                          <option value="1">Disable</option>
                          <option value="0" selected>Enable</option>
                        </select></td></tr>';         
            ?>
                        </tbody>
    </table>
                  </div>
            <div class="input-field col s12">
                                  <button class="btn cyan waves-effect waves-light right" type="submit" name="action">Add
                                    <i class="mdi-content-send right"></i>
                                  </button>
                                </div>
                </div>
          </form>  
              </div>
              </div>
  </div>


      <!-- //////////////////////////////////////////////////////////////////////////// -->
  <?php include("footer.php"); ?>
   


        <!-- ================================================
        Scripts
        ================================================ -->
        
        
        <!-- jQuery Library -->
        <script type="text/javascript" src="js/plugins/jquery-1.11.2.min.js"></script>    
        <!--angularjs-->
        <script type="text/javascript" src="js/plugins/angular.min.js"></script>
        <!--materialize js-->
        <script type="text/javascript" src="js/materialize.min.js"></script>
        <!--scrollbar-->
        <script type="text/javascript" src="js/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
      <script type="text/javascript" src="js/plugins/jquery-validation/jquery.validate.min.js"></script>
        <script type="text/javascript" src="js/plugins/jquery-validation/additional-methods.min.js"></script>
          
      
        <!--plugins.js - Some Specific JS codes for Plugin Settings-->
        <script type="text/javascript" src="js/plugins.min.js"></script>
        <!--custom-script.js - Add your own theme custom JS-->
        <script type="text/javascript" src="js/custom-script.js">
        $("#formValidate").validate({
            rules: {
                username: {
                    required: true,
                    minlength: 5,
                },
                password: {
                    required: true,
                    minlength: 5,
                },
                name: {
                    required: true,
                    minlength: 5,
          },
                contact: {
                    required: true,
                    minlength: 4,
          },
                address: {
                    minlength: 10,
          },    
                balance: {
                    required: true,
          },        
        },
            messages: {
               username:{
                    required: "Enter a username",
                    minlength: "Enter at least 5 characters"
                },  
               password:{
                    required: "Provide a prove",
                    minlength: "Password must be atleast 5 characters long",
                },  
               name:{
                    required: "Please provide CVV number",
                    minlength: "Enter at least 5 characters",   
                },  
               contact:{
                    required: "Please provide card number",
                    minlength: "Enter at least 4 digits",
                },  
               address:{
                    minlength: "Address must be atleast 10 characters long",    
                },    
               balance:{
                    required: "Please provide a balance.",    
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
    </body>

    </html>
    <?php
      }
      else
      {
        if($_SESSION['customer_sid']==session_id())
        {
          header("location:index.php");   
        }
        else{
          header("location:login.php");
        }
      }
    ?>