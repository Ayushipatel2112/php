<?php
include("header.php");
?>
<?php
if(isset($_POST['add_to_cart'])){

   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_image = $_POST['product_image'];
   $product_quantity = 1;

   $select_cart = mysqli_query($con, "SELECT * FROM `cart`");
   
      $insert_product = mysqli_query($con, "INSERT INTO `cart`(name, price, image, quantity) VALUES('$product_name', '$product_price', '$product_image', '$product_quantity')");
      $message[] = 'product added to cart succesfully';
   }


?>

   <!-- search area -->

<?php

if(isset($message)){
   foreach($message as $message){
      echo '<div class="message"><span>'.$message.'</span>  </div>';
   };
};

?>

   <!-- end search arewa -->
   
   <!-- breadcrumb-section -->
   <div class="breadcrumb-section breadcrumb-bg">
      <div class="container">
         <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
               <div class="breadcrumb-text">
                  <p>Fresh and Organic</p>
                  <h1>Product</h1>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- end breadcrumb section -->

   <!-- products -->
   <div class="product-section mt-100 mb-100">
      <div class="container">
      <?php
      require 'admin/include/config.php';
      ?>
      <div class="row">
                <div class="col-md-12">
                    <div class="product-filters">
                        <ul>
                  <li class="active" data-filter="*">All</li>
                        </ul>
                    </div>
                </div>
            </div>
            
         
<!-- All juice  -->

<div class="container">

<section class="products">

    <link rel="stylesheet" href="style.css">

   <div class="box-container">

      <?php
      
      $select_products = mysqli_query($con, "SELECT * FROM `products`");
      if(mysqli_num_rows($select_products) > 0){
         while($fetch_product = mysqli_fetch_assoc($select_products)){
      ?>

      <form action="" method="post">

         
         <div class="box">
            
            <img src="images/products/<?php echo $fetch_product['image']; ?>" alt="">

            <h3><?php echo $fetch_product['productname']; ?></h3>
            <div class="price">Rs.<?php echo $fetch_product['productprice']; ?>/-</div>
            <input type="hidden" name="product_name" value="<?php echo $fetch_product['productname']; ?>">
            <input type="hidden" name="product_price" value="<?php echo $fetch_product['productprice']; ?>">
            <input type="hidden" name="product_image" value="<?php echo $fetch_product['image']; ?> ">
            <h4>450ml</h4>
            <input type="submit" class="btn" value="add to cart" name="add_to_cart">
        
         </div>
      </form>

      <?php
         };
      };
      ?>

   </div>

</section>

</div>
</div>
</div>

  

<!-- All juice over -->

   <!-- end products -->

   <!-- logo carousel -->
   
   <!-- end logo carousel -->


   <?php
include("footer.php");
?>