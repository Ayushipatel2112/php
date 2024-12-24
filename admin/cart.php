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
 <!-- DataTables -->
 <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

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
            <h1 class="m-0">Cart</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="homepage.php">Home</a></li>
              <li class="breadcrumb-item active">Cart</li>
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
        <div class="col-12">

        <div class="card">
              <div class="card-header">
                <h3 class="card-title">Cart List</h3>
                
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th> id</th>
                    <th> Images</th>
                    <th>Product Name</th>
                    <th>Product Price</th>
                    <th>Product Quantity</th>
                    <th>Action</th>
              
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                          include_once("include/config.php");
                          $qry="select * from cart order by id desc";
                          $result = mysqli_query($conn,$qry) or exit("cart select fail".mysqli_error($conn));
                          while($row= mysqli_fetch_array($result)){
                     ?>
                             <tr>
                                <td><?php echo $row['id'];?></td>
                                <td><img src="../images/products/<?php echo $row['image'] ?>" alt="" width="150px" height="200px"></td>
                                <td><?php echo $row['name'];?></td>
                                <td><?php echo $row['price'];?></td>
                                <td><?php echo $row['quantity'];?></td>
                                 <td>
                                 <a href="cart_delete.php?id=<?php echo $row['id'];?>"> <i class="fas fa-trash"></i></a>
                                
                                </td>
                  </tr>
                            <?php
                          }
                    ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
        </div>
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

<script src="plugins/jquery/jquery.min.js"></script>

<!-- DataTables  & Plugins -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>
</html>
<?php
}else{
  $_SESSION['error'] = "you are not authorize to access this page without login";
  header("location:index.php");
}
?>
