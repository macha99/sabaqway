<?php
include("../conn.php");
include("check_session.php");
$id = $_SESSION["edit_product_id"];
$query = mysqli_query($conn, "SELECT * FROM product WHERE idproduct = '$id'");
$fetch = mysqli_fetch_assoc($query);
?>
<br>
<div class="container">
    <h1>Edit Produk (<?php echo $fetch['productname'] ?>)</h1>
    <br>
    <div class="input-group flex-nowrap">
        <span class="input-group-text" id="addon-wrapping">Nama produk</span>
        <input type="text" class="form-control" id="product_name" placeholder="Product name" value="<?php echo $fetch['productname'] ?>" aria-label="Username" aria-describedby="addon-wrapping">
    </div>
    <br>
    <div class="input-group flex-nowrap">
        <span class="input-group-text" id="addon-wrapping">Harga</span>
        <input type="text" class="form-control" id="product_price" placeholder="Price" value="<?php echo $fetch['price'] ?>" aria-label="Username" aria-describedby="addon-wrapping">
    </div>
    <br>
    <div class="row">
        <div class="col-sm-2">
            <button class="btn btn-success update_cus" data-id="<?php echo $id; ?>">Update</button>
        </div>
        <div class="col-sm-2">
            <button class="btn btn-danger cancel_edit">Cancel</button>
        </div>
    </div>


</div>

<script>
    $(document).ready(function() {
        $(".update_cus").click(function() {
            $.post("engine.php", {
                update_product: 1,
                product_id: $(this).data("id"),
                product_name: $("#product_name").val(),
                product_price: $("#product_price").val(),
            }, function(data) {
                if (data == "OK") {
                    $(".content").load("edit_product.php")
                    $(".success_banner").html("<div class='shadow-none p-3 mb-5 bg-success rounded'><center><h3>Product data edited</h3></center></div>")
                }
                console.log(data)
            })
        })

        $(".cancel_edit").click(function() {
            $(".content").load("product_list.php")
            $(".success_banner").html("")
        })
    })
</script>