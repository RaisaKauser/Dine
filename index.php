    <?php
    include 'includes/connect.php';
    include 'includes/wallet.php';

      if($_SESSION['customer_sid']==session_id())
      {
        ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="msapplication-tap-highlight" content="no">
      <title>Order Food</title>

     <link href="css/bootstrap.min.css" type="text/css" rel="stylesheet" media="screen,projection">
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>


      <!-- CORE CSS-->
      <link href="css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection">
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

      <!-- //////////////////////////////////////////////////////////////////////////// -->

    <?php include("user_menu.php");?>

    <div class="container" style="margin-top:50px">
        <h4>Order</h4>
        <div class="row">
                  <div class="col-md-12">
                  
              <p class="caption">Order your food here.</p>
              <div class="divider"></div>
          <form class="formValidate" id="formValidate" method="post" action="place-order.php" novalidate="novalidate">
                  <div class="col s12 m4 l3">
                    <h4 class="header">Order Food</h4>
                  </div>
                  <div>
                      <table id="example" class="display">
                        <thead>
                          <tr>
                            <th>Photo</th>
                            <th>Name</th>
                            <th>Type</th>
                            <th>Item Price/Piece</th>
                            <th>Quantity</th>
                          </tr>
                        </thead>

                        <tbody>
            <?php
            $result = mysqli_query($con, "SELECT * FROM items where not deleted;");
            while($row = mysqli_fetch_array($result))
            {
              echo '<tr><td><img src="'.$row["location"].'" width="100px  "></td><td>'.$row["name"].'</td><td>'.$row["menu_type"].'</td><td>'.$row["price"].'</td>';                      
              echo '<td><div class="input-field col s12"><label for='.$row["id"].' class="">Quantity</label>';
              echo '<input id="'.$row["id"].'" name="'.$row['id'].'" type="text" data-error=".errorTxt'.$row["id"].'"><div class="errorTxt'.$row["id"].'"></div></td></tr>';
            }
            ?>
                        </tbody>
    </table>
                  </div>
            <div class="input-field col s12">
                  <i class="mdi-editor-mode-edit prefix"></i>
                  <textarea id="description" name="description" class="materialize-textarea"></textarea>
                  <label for="description" class="">Any note(optional)</label>
            </div>
            <div>
            <div class="input-field col s12">
                                  <button class="btn cyan waves-effect waves-light right" type="submit" name="action">Order
                                    <i class="mdi-content-send right"></i>
                                  </button>
                                </div>
                </div>
          </form>
                <div class="divider"></div>
                </div>
    </div>
</div>
     <?php include("footer.php");?>


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
        $("#formValidate").validate({
            rules: {
          <?php
          $result = mysqli_query($con, "SELECT * FROM items where not deleted;");
          while($row = mysqli_fetch_array($result))
          {
            echo $row["id"].':{
            min: 0,
            max: 10
            },
            ';
          }
        echo '},';
        ?>
            messages: {
          <?php
          $result = mysqli_query($con, "SELECT * FROM items where not deleted;");
          while($row = mysqli_fetch_array($result))
          {  
            echo $row["id"].':{
            min: "Minimum 0",
            max: "Maximum 10"
            },
            ';
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
        if($_SESSION['admin_sid']==session_id()||$_SESSION['owner_sid']==session_id())
        {
          header("location:admin-page.php");    
        }
        else{
          header("location:home.php");
        }
      }
    ?>