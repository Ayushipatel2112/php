<?php
session_start();
if(isset($_SESSION['uname']))
{
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Master Layout | Dashboard</title>

  <!--add your style hear-->
  <?php
    include_once('include/style.php');
  ?>

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>

 <!-- Navbar -->
      <!--navbar header file include hear-->
    <!-- Left navbar links -->
    <?php
      include_once('include/header.php');
    ?>
    <!-- Main Sidebar Container -->
           <!--add sidebar hear-->
           <?php
                include_once('include/sidebar.php');
            ?>
    <!-- sidebarclose -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">

        <!-- your content goes here -->

        <h1>content area</h1>
        </div>
        <!-- /.row -->

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
        <!-- add footer hear -->

<?php
include_once('include/footer.php');
?>

</div>
<!-- ./wrapper -->

<!-- jQuery -->
    <!-- add script hear -->
<?php
include_once('include/script.php');
?>
</body>
</html>
<?php
}else{
  $_SESSION['error'] = "you are not authorize to access this page without login";
  header("location:index.php");
}
?>
