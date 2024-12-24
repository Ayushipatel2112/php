<?php
session_start();
if(isset($_SESSION['user_name']))
{
    include_once("config.php");
    $id=$_REQUEST["id"];
    $qry="delete from cart where id=$id";
    mysqli_query($con,$qry) or exit("delete fail".mysqli_error($con));
    $_SESSION['error'] = "cart deleted successfully";
  header("location:cart.php");
   
}
else{
  $_SESSION['error'] = "you are not authorize to access this page without login";
  header("location:index.php");
}
?>