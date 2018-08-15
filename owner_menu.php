  <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container-fluid">
              <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>                        
                </button>
                <a class="navbar-brand" href="#"><img src="images/l2.png" alt="logo" width="150px"; height="50px"></a>
              </div>
              <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                  <li class="active"><a href="index.php">Food Menu</a></li>
                  <li class="dropdown">
                  <a class="dropdown-toggle" data-toggle="dropdown" href="#">Orders
                  <span class="caret"></span></a>
        <!--           <ul class="dropdown-menu">
                    <li><a href="routers/logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                  </ul> -->
                  <ul class="dropdown-menu">
                          <li><a href="all-orders.php">All Orders</a>
                                          </li>
                          <?php
                            $sql = mysqli_query($con, "SELECT DISTINCT status FROM orders;");
                            while($row = mysqli_fetch_array($sql)){
                                              echo '<li><a href="all-orders.php?status='.$row['status'].'">'.$row['status'].'</a>
                                              </li>';
                            }
                            ?>
                                          </ul>
                  </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                  <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user"></span> <?php echo $name;?> (<?php echo $role;?>)
                  <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="routers/logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                  </ul>
                </li>
                </ul>
              </div>
            </div>
          </nav>