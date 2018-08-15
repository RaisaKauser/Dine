          <?php
          include 'includes/connect.php';
            if($_SESSION['admin_sid']==session_id()||$_SESSION['owner_sid']==session_id())
            {
              ?>
          <!DOCTYPE html>
          <html lang="en">

          <head>
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="msapplication-tap-highlight" content="no">
            <title>Food Menu</title>

            <!-- CORE CSS-->

              <link href="css/bootstrap.min.css" type="text/css" rel="stylesheet" media="screen,projection">
            <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
            <link href="js/plugins/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet" media="screen,projection">
            <link href="js/plugins/data-tables/css/jquery.dataTables.min.css" type="text/css" rel="stylesheet" media="screen,projection">
            
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
  <?php
  if(isset($_SESSION['admin_sid'])==session_id()){
include 'menu.php';
  }elseif ($_SESSION['owner_sid']==session_id()) {
    include 'owner_menu.php';
  }  ?>
        <div class="container" style="margin-top:70px">
          <h4>Food Menu</h4>
          <div class="row">
            <div class="col-md-12">
<form class="formValidate" id="formValidate1" method="post" action="routers/add-item.php" novalidate="novalidate" enctype="multipart/form-data">
                      <div class="row">
                        <div class="col-md-4">
                          <h4 class="header">Add Item</h4>
                        </div>
                        <table class="table">
                        <thead>
                          <tr>
                            <th data-field="id">Name</th>
                            <th data-field="type">Type</th>
                            <th data-field="name">Item Price/Piece</th>
                            <th data-field="photo">Picture</th>
                          </tr>
                        </thead>

                        <tbody>
                          <?php
                          echo '<tr><td><input class="form-control" id="name" name="name" type="text" data-error=".errorTxt01" placeholder="Name"><div class="errorTxt01"></div></td>';
                          echo '<td><select class="form-control" id="menu_type" name="menu_type" data-error=".errorTxt03" required="required"><option value="">Select Menu type</option><option value="Indian Veg">Indian Veg</option><option value="Indian Non Veg">Indian Non Veg</option><option value="Chinese">Chinese</option><option value="Italian">Italian</option><option value="Dessert">Dessert</option></select><div class="errorTxt03"></div></td>';
                          echo '<td><input class="form-control" id="price" name="price" type="text" data-error=".errorTxt02" placeholder="Price"><div class="errorTxt02"></div></td>'; 
                          echo '<td><input class="form-control" id="photo" name="photo" type="file" data-error=".errorTxt04"><div class="errorTxt04"></div></td>';                   
                          echo '<td></tr>';
                          ?>
                        </tbody>
                        </table>
                <div class="row">
                   <div class="col-sm-12 text-right">
                      <button class="btn btn-primary" type="submit" name="action">Add
                      <i class="mdi-content-send right"></i>
                    </button>
                  </div>     
                </div>
                </div>
                </form>
                <hr>  
              <p class="caption">Add, Edit or Remove Menu Items.</p>
              <div class="divider"></div>
              <form class="formValidate" id="formValidate" method="post" action="routers/menu-router.php" novalidate="novalidate">
                      <div class="row">
                        <div class="col-md-4">
                          <h4 class="header">Menu Items</h4>
                        </div>
                        <div>

                  <table id="example" class="display">
                              <thead>
                                <tr>
                                  <th>Photo</th>
                                  <th>Name</th>
                                  <th>Menu Type</th>
                                  <th>Item Price/Piece</th>
                                  <th>Available</th>
                                </tr>
                              </thead>

                              <tbody>
                  <?php
                  $result = mysqli_query($con, "SELECT * FROM items");
                  while($row = mysqli_fetch_array($result))
                  {
                    echo '<tr><td><img src="'.$row["location"].'" width="100px"></td>';
                    echo '<td><div class="input-field col s12">';
                    echo '<input class="form-control" value="'.$row["name"].'" id="'.$row["id"].'_name" name="'.$row['id'].'_name" type="text" data-error=".errorTxt'.$row["id"].'"><div class="errorTxt'.$row["id"].'"></div></td>';       
                    if($row['menu_type'] === 'Indian Veg'){
                      $menu0='';
                      $menu1 = 'selected';
                      $menu2 = '';
                      $menu3 = '';
                      $menu4 = '';
                      $menu5 = '';
                    }
                    elseif($row['menu_type'] === 'Indian Non Veg'){
                      $menu0='';
                      $menu1 = '';
                      $menu2 = 'selected';
                      $menu3 = '';
                      $menu4 = '';
                      $menu5 = '';
                    }elseif($row['menu_type'] === 'Chinese'){
                      $menu0='';
                      $menu1 = '';
                      $menu2 = '';
                      $menu3 = 'selected';
                      $menu4 = '';
                      $menu5 = '';
                    }elseif($row['menu_type'] === 'Italian'){
                      $menu0='';
                      $menu1 = '';
                      $menu2 = '';
                      $menu3 = '';
                      $menu4 = 'selected';
                      $menu5 = '';
                    }elseif($row['menu_type'] === 'Dessert'){
                      $menu0='';
                      $menu1 = '';
                      $menu2 = '';
                      $menu3 = '';
                      $menu4 = '';
                      $menu5 = 'selected';
                    }
                    else{
                      $menu0='selected';
                      $menu1 = '';
                      $menu2 = '';
                      $menu3 = '';
                      $menu4 = '';
                      $menu5 = ''; 
                    }
                    echo '<td><select class="form-control" id="'.$row["id"].'_menu" name="'.$row["id"].'_menu">
                            <option value="" '.$menu0.'>Select Menu type</option>
                            <option value="Indian Veg" '.$menu1.'>Indian Veg</option>
                            <option value="Indian Non Veg" '.$menu2.'>Indian Non Veg</option>
                            <option value="Chinese" '.$menu3.'>Chinese</option>
                            <option value="Italian" '.$menu4.'>Italian</option>
                            <option value="Dessert" '.$menu5.'>Dessert</option>
                          </select><div class="errorTxt03"></div></td>';   
                    echo '<td><div class="input-field col s12 ">';
                    echo '<input class="form-control" value="'.$row["price"].'" id="'.$row["id"].'_price" name="'.$row['id'].'_price" type="text" data-error=".errorTxt'.$row["id"].'"><div class="errorTxt'.$row["id"].'"></div></td>';                   
                    echo '<td>';
                    if($row['deleted'] == 0){
                      $text1 = 'selected';
                      $text2 = '';
                    }
                    else{
                      $text1 = '';
                      $text2 = 'selected';            
                    }
                    echo '<select class="form-control" name="'.$row['id'].'_hide">
                                <option value="1"'.$text1.'>Available</option>
                                <option value="2"'.$text2.'>Not Available</option>
                              </select></td></tr>';
                  }
                  ?>
                              </tbody>
        </table>
                      </div>    
                <div>
                  
                </div>
                <div class="row">
                   <div class="col-sm-12 text-right">
                      <button class="btn btn-primary" type="submit" name="action">Modify
                        <i class="mdi-content-send right"></i>
                      </button>
                  </div>     
                </div>
                </div>
                </form>
                <div class="row">
                  <div class="col-md-12">
                    <hr>
                  </div>
                </div>
            </div>
          </div>
        </div>
</div>
      <?php include("footer.php");?>
            <!-- ================================================
            Scripts
            ================================================ -->
          <script type="text/javascript" src="js/jquery.min.js"></script>
          <script type="text/javascript" src="js/bootstrap.min.js"></script>  
            <!--angularjs-->
            <script type="text/javascript" src="js/plugins/angular.min.js"></script>
            <!--scrollbar-->
            <script type="text/javascript" src="js/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
            <!-- data-tables -->
            <script type="text/javascript" src="js/plugins/data-tables/js/jquery-3.3.1.js"></script>
            <script type="text/javascript" src="js/plugins/data-tables/js/jquery.dataTables.min.js"></script>
            <script type="text/javascript" src="js/plugins/data-tables/data-tables-script.js"></script>
            
            <script type="text/javascript" src="js/plugins/jquery-validation/jquery.validate.min.js"></script>
            <script type="text/javascript" src="js/plugins/jquery-validation/additional-methods.min.js"></script>
            
            <!--plugins.js - Some Specific JS codes for Plugin Settings-->
            <script type="text/javascript" src="js/plugins.min.js"></script>
            <!--custom-script.js - Add your own theme custom JS-->
            <script type="text/javascript" src="js/custom-script.js"></script>
              <script type="text/javascript">
               jq= $.noConflict();
                jq(document).ready(function() {
                    $('#example').DataTable();
                  } );  
            $("#formValidate").validate({
                rules: {
              <?php
              $result = mysqli_query($con, "SELECT * FROM items");
              while($row = mysqli_fetch_array($result))
              {
                echo $row["id"].'_name:{
                required: true,
                minlength: 5,
                maxlength: 20 
                },';
                echo $row["id"].'_menu_type:{
                required: true, 
                min: 0
                },';        
                echo $row["id"].'_price:{
                required: true, 
                min: 0
                },';        
              }
            echo '},';
            ?>
                messages: {
              <?php
              $result = mysqli_query($con, "SELECT * FROM items");
              while($row = mysqli_fetch_array($result))
              {  
                echo $row["id"].'_name:{
                required: "Ener item name",
                minlength: "Minimum length is 5 characters",
                maxlength: "Maximum length is 20 characters"
                },';
                echo $row["id"].'_menu_type:{
                required: "Select Menu Type",
                min: "Select any one"
                },';        
                echo $row["id"].'_price:{
                required: "Ener price of item",
                min: "Minimum item price is Rs. 0"
                },';        
              }
            echo '},';
            ?>
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
            <script type="text/javascript">
            $("#formValidate1").validate({
                rules: {
            name: {
                required: true,
                minlength: 3
              },
            menu_type: {
                required: true
              },
            price: {
                required: true,
                min: 0
              },
          },
                messages: {
            name: {
                required: "Enter item name",
                minlength: "Minimum length is 5 characters"
              },
              menu_type: {
                required: "Select type of menu item",
                minlength: "Select Any One"
              },
             price: {
                required: "Enter item price",
                minlength: "Minimum item price is Rs.0"
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
        <script type="text/javascript">
          $(document).ready(function() {
            $('#example').DataTable();
            } );  
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