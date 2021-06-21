<!DOCTYPE html>
<html lang="en">
<?php 
include("../conn.php"); 
include("check_session.php"); 
?>
<body>
    <br>
    <div class="container">
        <h1>Tambah produk</h1>
        <div class="shadow-sm p-3 mb-5 bg-white rounded">
            <input id="product_name" placeholder='Nama produk'><br><br>
            <input id="product_price" placeholder='Harga produk'><br><br>
            <button class='btn btn-success' id="tambah_product">Tambah</button>
        </div>
    </div>
</body>
<script>
$(document).ready(function(){
    $("#tambah_product").click(function(){
        $.post("engine.php",{
            tambah_product: 1,
            product_name: $("#product_name").val(),
            product_price: $("#product_price").val(),
        }, function(data){
            if(data == "OK"){
                $(".success_banner").html("<div class='shadow-none p-3 mb-5 bg-success rounded'><center><h3>Product added</h3></center></div>")
            }
            console.log(data)
        })
    })
})
</script>
</html>