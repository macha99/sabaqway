<!DOCTYPE html>
<html lang="en">
<?php
include("check_session.php");
?>

<body>
    <br>
    <div class="container">
        <h1>Tambah produk</h1>
        <div class="shadow-sm p-3 mb-5 bg-white rounded">
            <form method="POST">
                <input name="product_name" placeholder='Nama produk'><br><br>
                <input name="product_price" placeholder='Harga produk'><br><br>
                <button class='btn btn-success' name="tambah_produk" id="tambah_product">Tambah</button>
            </form>
        </div>
    </div>
</body>

</html>

<?php
if (isset($_POST['tambah_produk'])) {
    $name = $_POST['product_name'];
    $price = $_POST['product_price'];

    $sql = "INSERT INTO product VALUES (null, ?, ?)";
    $stmt = $conn->prepare($sql);
    echo $conn->error;
    $stmt->bind_param('ss', $name, $price);
    $stmt->execute();

    //echo "<script>window.location = 'index.php?menu=product_list'</script>";
}
?>