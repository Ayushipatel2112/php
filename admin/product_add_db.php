<?php
session_start();
if(isset($_SESSION['uname']))
{
    include_once("include/config.php");
    extract($_POST);
    $filename=time()."_".$_FILES['image']['name'];
    $path="../images/products/".$filename;
    $productdesciption = mysqli_real_escape_string($conn,$productdesciption);
    if(move_uploaded_file($_FILES['image']['tmp_name'],$path)){
      $qry="insert into products (catid,productname,productdesciption,productprice,image) values('".$catid."','".$productname."','".$productdesciption."','".$productprice."','".$filename."')";
      mysqli_query($conn,$qry) or exit("Products insert fail".mysqli_error($conn));

      $_SESSION['error'] = "Product added successfully";
       header("location:product_add.php");

    }else{
      $_SESSION['error'] = "file upload fail";
      header("location:product_add.php");
    }

   
}
else{
  $_SESSION['error'] = "you are not authorize to access this page without login";
  header("location:index.php");
}
?>