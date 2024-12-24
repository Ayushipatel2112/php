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
  <title>Add Product | Dashboard</title>

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
            <h1 class="m-0">Product</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="homepage.php">Home</a></li>
              <li class="breadcrumb-item"><a href="category.php">Product</a></li>
              <li class="breadcrumb-item active">Product Add</li>
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
        <div class="col-md-12">
        <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Categories Add</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
             
              <?php
                 include_once("include/config.php");
                 $qry="select * from categories order by id desc";
                 $result = mysqli_query($conn,$qry) or exit("category select fail".mysqli_error($conn));
                 
              ?>
              <form action="product_add_db.php" method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Selete Category Name</label>
                    <select name="catid" id="catid" class="form-control">
                        <option value="" selected disabled>Select Category</option>
                <?php
                    while($row= mysqli_fetch_array($result)){
                ?>
                    <option value="<?php echo $row['id']?>"><?php echo $row['catname']?></option>
                <?php
                }

                ?>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Product Name</label>
                    <input type="text" class="form-control" id="productname" name="productname" placeholder="Product name">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputPassword1">Product Description</label>
                    <textarea name="productdesciption" class="form-control" id="productdesciption"></textarea>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputPassword1">Product price</label>
                    <input type="text" class="form-control" id="productprice" name="productprice" placeholder="Product Price">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputFile">Select Image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile" name="image">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      
                    </div>
                  </div>
                </div>
            </div>
        </div>
            <!-- /.card-body -->

            <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Add</button>
                </div>
              </form>
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