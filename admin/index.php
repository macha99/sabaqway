<!DOCTYPE html>
<html lang="en">
<?php
include("../conn.php");
include("check_session.php");
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    <title>SabaqWay</title>
</head>

<body>
    <?php include("navbar.php"); ?>
    <span class="success_banner"></span>
    <div class="container content">

    </div>
</body>
<script>
    $(document).ready(function() {
        $('.content').load("customer.php")
        $(".tambah_produk").click(function() {
            $('.content').load("new_product.php")
        })

        $(".senarai_pelanggan").click(function() {
            $('.content').load("customer.php")
        })

        $(".senarai_produk").click(function() {
            $('.content').load("product_list.php")
        })

        $(".prehide").click(function(){
            $(".success_banner").html("")
        })
    })
</script>

</html>