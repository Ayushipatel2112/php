 <!-- Navbar -->
 <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      

      <!-- Messages Dropdown Menu -->
      
        
    
            <!-- Message Start -->
            <div class="media">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                <?php
                    echo "Welcome ".$_SESSION['uname'];

                 ?>
                </h3>
                <a href="logout.php">Logout</a>
               
              </div>
            </div>
            <!-- Message End -->
          
      <!-- Notifications Dropdown Menu -->
     
    </ul>
  </nav>
  <!-- /.navbar -->