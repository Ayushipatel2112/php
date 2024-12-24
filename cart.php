
<?php
include("header.php");
if(isset($_SESSION['user_name']))
{
?>

<?php

if(isset($_POST['update_update_btn'])){
   $update_value = $_POST['update_quantity'];
   $update_id = $_POST['update_quantity_id'];
   $update_quantity_query = mysqli_query($con, "UPDATE `cart` SET quantity = '$update_value' WHERE id = '$update_id'");
   if($update_quantity_query){
      header('location:cart.php');
   };
};

if(isset($_GET['remove'])){
   $remove_id = $_GET['remove'];
   mysqli_query($con, "DELETE FROM `cart` WHERE id = '$remove_id'");
   header('location:cart.php');
};
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
						<h1>Cart</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- cart -->
	<div class="cart-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-md-12">
					<div class="cart-table-wrap">
						<table class="cart-table">
							<thead class="cart-table-head">
								<tr class="table-head-row">
									
									<th class="product-image">Product Image</th>
									<th class="product-name">Name</th>
									<th class="product-name">Price</th>
									<th class="product-quantity">Quantity</th>
									<th class="product-name"> Total Price</th>
									<th class="product-total">Action</th>
								</tr>
							</thead>
							<tbody>
								    <?php 
								    $select_cart = mysqli_query($con, "SELECT * FROM `cart`");
								    $grand_total = 0;
								    if(mysqli_num_rows($select_cart) > 0){
								        while($fetch_cart = mysqli_fetch_assoc($select_cart)){
								    ?>
								    <tr>
								       
								        <td><img src="images/products/<?php echo $fetch_cart['image']; ?>" height="100" alt=""></td>
								        <td><?php echo $fetch_cart['name']; ?></td>
								         <td>Rs.<?php echo number_format($fetch_cart['price']); ?>/-</td>
								            <td>
								               <form action="" method="post">
								                  <input type="hidden" name="update_quantity_id"  value="<?php echo $fetch_cart['id']; ?>" >
								                  <input type="number" name="update_quantity" max="10"  value="<?php echo $fetch_cart['quantity']; ?>" >
								                  <input type="submit" value="update" name="update_update_btn">
								               </form>   
								            </td>
								            <td>Rs.<?php echo $sub_total = number_format($fetch_cart['price'] * $fetch_cart['quantity']); ?>/-</td>
                                	 
								            <td><a href="cart.php?remove=<?php echo $fetch_cart['id']; ?>" onclick="return confirm('remove item from cart?')" class="delete-btn"> <i class="fas fa-trash"></i></a></td>
								    </tr>
								    <?php
								        $grand_total += $sub_total;  
								        };
								    };
								    ?>
								    <tr >
								        <td colspan="4">Grand Total</td>
								        <td>Rs.<?php echo $grand_total; ?>/-</td>
						   			 </tr>
								</tbody>				
							</table>
											</div>
										</div>

										<div class="col-lg-4">
											<div class="total-section">
												<table class="total-table">
													<thead class="total-table-head">
														<tr class="table-total-row">
															<th>Total</th>
															<th>Price</th>
														</tr>
													</thead>
													<tbody>
														<tr class="total-data">
															<td><strong>Subtotal: </strong></td>
															<td>Rs.<?php echo $sub_total ;?>/-</td>
														</tr>
														
														<tr class="total-data">
															<td><strong>Total: </strong></td>
															<td>Rs.<?php echo $grand_total ?>/-</td>
														</tr>
							</tbody>
						</table>
						<div class="cart-buttons">
							<a href="checkout.php" class="boxed-btn black">Order</a>
						</div>
					</div>

					
				</div>
			</div>
		</div>
	</div>
	<!-- end cart -->

	<!-- logo carousel -->
	
	<!-- end logo carousel -->

<?php
}else{
  $_SESSION['error'] = "you are not  access this page without login";
  header("location:login.php");
}
?>

<?php
include("footer.php");
?>