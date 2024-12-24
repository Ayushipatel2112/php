<?php
include("header.php");
?>


   <!-- search area -->
   <div class="search-area">
      <div class="container">
         <div class="row">
            <div class="col-lg-12">
               <span class="close-btn"><i class="fas fa-window-close"></i></span>
               <div class="search-bar">
                  <div class="search-bar-tablecell">
                     <h3>Search For:</h3>
                     <input type="text" placeholder="Keywords">
                     <button type="submit">Search <i class="fas fa-search"></i></button>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- end search arewa -->
   
   <!-- breadcrumb-section -->
   <div class="breadcrumb-section breadcrumb-bg">
      <div class="container">
         <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
               <div class="breadcrumb-text">
                  <p>Fresh and Organic</p>
                  <h1>Check Out Product</h1>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- end breadcrumb section -->



<?php

if(isset($_POST['btn_submit']))
{
   $nm=$_POST['name'];
   $em=$_POST['email'];
   $add=$_POST['address'];
   $no=$_POST['phone'];
   $pay=$_POST['payment'];
   
   $ins="insert into pro_order values('','$nm','$em','$add','$no','$pay')";
   $q=mysqli_query($con,$ins);
   echo"<script>alert('successfully submitted')</script>";
}

?>
<?php
if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>


   <!-- check out section -->
   <br>
            <div class="container">
            <div class="row">
               <div class="col-md-8">
                  <h3 class="section-title">Your Order</h3>
                  
<form class="form-light mt-20" role="form" method="POST">
                     <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" id= "name" class="form-control" placeholder="Your name" required>
                     </div>
                  
                        
                           <div class="form-group">
                              <label>Email</label>
                              <input type="email" name="email" id="email" class="form-control" placeholder="Email address" required>
                           </div>
                        
                        
                           
                           <div class="form-group">
                              <label>address</label>
                              <input type="text" name="address" id="address" class="form-control" placeholder=" address" required>
                           </div>
                     
                           <div class="form-group">
                              <label>Phone</label>
                              <input type="text" name="phone"class="form-control" placeholder="Phone number" required>
                           </div>

                     <div class="form-group">
                        <label>payment method</label>
                        <input type="text" class="form-control" name="payment" id="payment" placeholder="online/case" required>
                     </div>
                     <input type="submit"name="btn_submit" class="btn btn-two"></button><p><br/></p>
                  </form>
                  </div>
                  
                     <div class="col-lg-4">
               <div class="contact-form-wrap">
                  <div class="contact-form-box">
                     <h4><i class="fas fa-map"></i> Shop Address</h4>
                     <p>34/8, Kalawad road <br> rajkot, Gujarat. <br> India</p>
                  </div>
                  <div class="contact-form-box">
                     <h4><i class="far fa-clock"></i> Shop Hours</h4>
                     <p>MON - FRIDAY: 8 to 9 PM <br> SAT - SUN: 10 to 8 PM </p>
                  </div>
                  <div class="contact-form-box">
                     <h4><i class="fas fa-address-book"></i> Contact</h4>
                     <p>Phone: +91 8128102388 <br> Email: juiceysip123@gmail.com</p>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- end check out section -->

   <!-- logo carousel -->
   
   <!-- end logo carousel -->

   <?php
include("footer.php");
?>