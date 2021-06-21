<?php
include("../conn.php");
include("check_session.php");

if(isset($_POST['logout'])){
    if(session_destroy()){
        echo "OK";
    }else{
        echo "err";
    }
}

if (isset($_POST['delete_cus'])) {
    $id = x($_POST['cus_id']);
    $query = mysqli_query($conn, "DELETE FROM customer WHERE idcustomer = '$id'");
    if ($query) {
        echo "OK";
    } else {
        echo "FAIL";
    }
}

if (isset($_POST['delete_product'])) {
    $id = x($_POST['product_id']);
    $query = mysqli_query($conn, "DELETE FROM product WHERE idproduct = '$id'");
    if ($query) {
        echo "OK";
    } else {
        echo "FAIL";
    }
}

if (isset($_POST['edit_cus'])) {
    $_SESSION['edit_cus_id'] = x($_POST['cus_id']);
}

if (isset($_POST['edit_product'])) {
    $_SESSION['edit_product_id'] = x($_POST['product_id']);
}

if (isset($_POST['update_cus'])) {
    $username = x($_POST['cus_username']);
    $fullname = x($_POST['cus_fullname']);
    $address = x($_POST['cus_address']);
    $email = x($_POST['cus_email']);
    //$hash_pass = password_hash($newpass, PASSWORD_DEFAULT);

    $query = mysqli_query($conn, "UPDATE customer set username = '$username', fullname = '$fullname', address = '$address', email = '$email' WHERE idcustomer = '$_SESSION[edit_cus_id]' ");
    if ($query) {
        echo "OK";
    } else {
        echo "err";
    }
}

if (isset($_POST['update_product'])) {
    $name = x($_POST['product_name']);
    $price = x($_POST['product_price']);
    //$hash_pass = password_hash($newpass, PASSWORD_DEFAULT);

    $query = mysqli_query($conn, "UPDATE product set productname = '$name', price = '$price' WHERE idproduct = '$_SESSION[edit_product_id]' ");
    if ($query) {
        echo "OK";
    } else {
        echo "err";
    }
}

if (isset($_POST['tambah_product'])) {
    $nama = x($_POST['product_name']);
    $price = x($_POST['product_price']);

    $query = mysqli_query($conn, "INSERT INTO product (productname, price) VALUES ('$nama', '$price')");
    if ($query) {
        echo "OK";
    } else {
        echo "err";
    }
}

if (isset($_POST['reset_pass'])) {
    $id = x($_POST['customer_id']);
    $password = password_hash('resetpass123', PASSWORD_DEFAULT);
    $query = mysqli_query($conn, "UPDATE customer set custpassword = '$password' WHERE idcustomer = '$id'");
    if ($query) {
        echo "OK";
    } else {
        echo "err";
    }
}
