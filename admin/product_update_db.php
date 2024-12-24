<?php
// Assuming you have a database connection established
// and session started
include_once('include/config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize and validate input data
    $catid = mysqli_real_escape_string($conn, $_POST['catid']);
    $productname = mysqli_real_escape_string($conn, $_POST['productname']);
    $productdesciption = mysqli_real_escape_string($conn, $_POST['productdesciption']);
    $productprice = mysqli_real_escape_string($conn, $_POST['productprice']);
    $id = intval($_POST['id']);

    // Prepare base SQL query
    $qry = "UPDATE products SET catid=?, productname=?, productdesciption=?, productprice=?";

    // Check if an image file is uploaded
    if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
        $filename = mysqli_real_escape_string($conn, $_FILES['image']['name']);
        $tmp_name = $_FILES['image']['tmp_name'];
        $path = 'uploads/' . basename($filename); // Define your upload directory

        // Attempt to move the uploaded file
        if (move_uploaded_file($tmp_name, $path)) {
            $qry .= ", image=?";
            $params = [$catid, $productname, $productdesciption, $productprice, $filename];
        } else {
            $_SESSION['error'] = "File upload failed";
            header("Location: product_add.php");
            exit;
        }
    } else {
        $params = [$catid, $productname, $productdesciption, $productprice];
    }

    // Complete the SQL query
    $qry .= " WHERE id=?";
    $params[] = $id;

    // Prepare and execute the SQL statement
    $stmt = mysqli_prepare($conn, $qry);
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, str_repeat('s', count($params) - 1) . 'i', ...$params);
        $result = mysqli_stmt_execute($stmt);

        if ($result) {
            $_SESSION['error'] = "Product updated successfully";
        } else {
            $_SESSION['error'] = "Product update failed: " . mysqli_error($conn);
        }
    } else {
        $_SESSION['error'] = "Failed to prepare statement: " . mysqli_error($conn);
    }

    header("Location: product.php");
    exit;
}
?>
