<?php
session_start();
if(isset($_SESSION['uname']))
{
    include_once("include/config.php");
    $id=$_REQUEST["id"];
    $qry="delete from users where id=$id";
    mysqli_query($conn,$qry) or exit("delete fail".mysqli_error($conn));
    $_SESSION['error'] = "cart deleted successfully";
  header("location:userprofile.php");
   
}
else{
  $_SESSION['error'] = "you are not authorize to access this page without login";
  header("location:index.php");
}
?>