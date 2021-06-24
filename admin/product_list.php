<!DOCTYPE html>
<html lang="en">
<?php
include("check_session.php");
?>
<h1>Senarai Produk</h1>
<div class="shadow-sm p-3 mb-5 bg-white rounded">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama produk</th>
                <th scope="col">Harga</th>
                <th scope="col">Pilihan</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 1;
            $q_product = mysqli_query($conn, "SELECT * FROM product");
            if (mysqli_num_rows($q_product) > 0) {
                while ($f_product = mysqli_fetch_assoc($q_product)) {
            ?>
                    <tr>
                        <th scope="row"><?php echo $i; ?></th>
                        <td><?php echo $f_product['productname'] ?></td>
                        <td>RM <?php echo $f_product['price'] ?></td>
                        <td><button class="btn btn-link edit_product" data-id="<?php echo $f_product['idproduct']; ?>">Edit</button> | <button class="btn btn-link delete_product" data-id="<?php echo $f_product['idproduct']; ?>">Delete</button></td>
                    </tr>
            <?php
                    $i++;
                }
            }
            ?>
        </tbody>
    </table>
</div>
<script>
    $(document).ready(function() {
        $(".delete_product").click(function() {
            $.post("engine.php", {
                delete_product: 1,
                product_id: $(this).data("id")
            }, function(data) {
                if (data == "OK") {
                    $('.content').load("product_list.php")
                }
                console.log(data)
            })
        })
        $(".edit_product").click(function() {
            $.post("engine.php", {
                edit_product: 1,
                product_id: $(this).data("id")
            }, function(data) {
                $(".content").load("edit_product.php")
            })

        })
    })
</script>

</html>