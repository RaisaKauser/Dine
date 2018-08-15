      <?php
      include 'includes/connect.php';
      include 'includes/wallet.php';

        if($_SESSION['customer_sid']==session_id() || isset($_SESSION['owner_sid']))
        {
          ?>
      <!DOCTYPE html>
      <html lang="en">

      <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="msapplication-tap-highlight" content="no">
        <title>Past Orders</title>

      <link href="css/bootstrap.min.css" type="text/css" rel="stylesheet" media="screen,projection">
          <script type="text/javascript" src="js/jquery.min.js"></script>
          <script type="text/javascript" src="js/bootstrap.min.js"></script>

        <!-- CORE CSS-->
        <link href="css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection">
        <style type="text/css">
          footer {
                        background-color: #555;
                        color: white;
                        padding: 15px;
                        alignment-baseline: auto;
                      }
        </style>
        
        <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
        <link href="js/plugins/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet" media="screen,projection">
        
      </head>

      <body>
        <!-- Start Page Loading -->
        <div id="loader-wrapper">
            <div id="loader"></div>        
            <div class="loader-section section-left"></div>
            <div class="loader-section section-right"></div>
        </div>
        <!-- End Page Loading -->
      <?php include("user_menu.php");?>

      <div class="container" style="margin-top:50px">
              <h4>Past Orders</h4>
              <div class="row">
                        <div class="col-md-12">
                        <p class="caption">List of your past orders with details</p>
                <div class="divider"></div>
                <div id="work-collections" class="seaction">
                   
                <?php
                if(isset($_GET['status'])){
                  $status = $_GET['status'];
                }
                else{
                  $status = '%';
                }
                $sql = mysqli_query($con, "SELECT * FROM orders WHERE customer_id = $user_id AND status LIKE '$status';;");
                echo '              <div class="row">
                      <div>
                          <h4 class="header">List</h4>
                          <ul id="issues-collection" class="collection">';
                while($row = mysqli_fetch_array($sql))
                {
                  $status = $row['status'];
                  echo '<li class="collection-item avatar">
                                    <i class="mdi-content-content-paste red circle"></i>
                                    <span class="collection-header">Order No. '.$row['id'].'</span>
                                    <p><strong>Date:</strong> '.$row['date'].'</p>
                                    <p><strong>Payment Type:</strong> '.$row['payment_type'].'</p>
                      <p><strong>Address: </strong>'.$row['address'].'</p>                
                                    <p><strong>Status:</strong> '.($status=='Paused' ? 'Paused <a  data-position="bottom" data-delay="50" data-tooltip="Please contact administrator for further details." class="btn-floating waves-effect waves-light tooltipped cyan">    ?</a>' : $status).'</p>                
                      '.(!empty($row['description']) ? '<p><strong>Note: </strong>'.$row['description'].'</p>' : '').'                                           
                      <a href="#" class="secondary-content"><i class="mdi-action-grade"></i></a>
                                    </li>';
                  $order_id = $row['id'];
                  $sql1 = mysqli_query($con, "SELECT * FROM order_details WHERE order_id = $order_id;");
                  while($row1 = mysqli_fetch_array($sql1))
                  {
                    $item_id = $row1['item_id'];
                    $sql2 = mysqli_query($con, "SELECT * FROM items WHERE id = $item_id;");
                    while($row2 = mysqli_fetch_array($sql2)){
                      $item_name = $row2['name'];
                    }
                    echo '<li class="collection-item">
                                  <div class="row">
                                  <div class="col s7">
                                  <p class="collections-title"><strong>#'.$row1['item_id'].'</strong> '.$item_name.'</p>
                                  </div>
                                  <div class="col s2">
                                  <span>'.$row1['quantity'].' Pieces</span>
                                  </div>
                                  <div class="col s3">
                                  <span>Rs. '.$row1['price'].'</span>
                                  </div>
                                  </div>
                                  </li>';
                    $id = $row1['order_id'];
                  }
                      echo'<li class="collection-item">
                                              <div class="row">
                                                  <div class="col s7">
                                                      <p class="collections-title"> Total</p>
                                                  </div>
                                                  <div class="col s2">
                            <span> </span>
                                                  </div>
                                                  <div class="col s3">
                                                      <span><strong>Rs. '.$row['total'].'</strong></span>
                                                  </div>';
                      if(!preg_match('/^Cancelled/', $status)){
                        if($status != 'Delivered'){
                      echo '<form action="routers/cancel-order.php" method="post">
                          <input type="hidden" value="'.$id.'" name="id">
                          <input type="hidden" value="Cancelled by Customer" name="status"> 
                          <input type="hidden" value="'.$row['payment_type'].'" name="payment_type">                      
                          <button class="btn waves-effect waves-light right submit" type="submit" name="action">Cancel Order
                                                    <i class="mdi-content-clear right"></i> 
                          </button>
                          </form>';
                      }
                      }
                      echo'</div></li>';

                }
                ?>
                 </ul>
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
          
          <!-- jQuery Library -->
          <script type="text/javascript" src="js/plugins/jquery-1.11.2.min.js"></script>    
          <!--angularjs-->
          <script type="text/javascript" src="js/plugins/angular.min.js"></script>
          <!--materialize js-->
          <script type="text/javascript" src="js/materialize.min.js"></script>
          <!--scrollbar-->
          <script type="text/javascript" src="js/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>       
          <!--plugins.js - Some Specific JS codes for Plugin Settings-->
          <script type="text/javascript" src="js/plugins.min.js"></script>
          <!--custom-script.js - Add your own theme custom JS-->
          <script type="text/javascript" src="js/custom-script.js"></script>
      </body>

      </html>
      <?php
        }
        else
        {
          if($_SESSION['admin_sid'||'owner_sid']==session_id())
          {
            header("location:all-orders.php");    
          }
          else{
            header("location:login.php");
          }
        }
      ?>