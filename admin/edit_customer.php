<?php
$idcustomer = $_GET['idcustomer'];
$sql = "SELECT username, fullname, address, email, custpassword FROM customer WHERE idcustomer = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $idcustomer);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($username, $fullname, $address, $email, $password);
$stmt->fetch();
$stmt->close();
?>
<br>
<div class="container">
    <h1>Edit Customer (<?php echo $username ?>)</h1>
    <br>
    <form method="post">
        <input type="hidden" name="idcustomer" value="<?php echo $idcustomer; ?>">
        <div class="input-group flex-nowrap">
            <span class="input-group-text" id="addon-wrapping">Username</span>
            <input type="text" class="form-control" name="username" placeholder="Username" value="<?php echo $username; ?>" aria-label="Username" aria-describedby="addon-wrapping">
        </div>
        <br>
        <div class="input-group flex-nowrap">
            <span class="input-group-text" id="addon-wrapping">Full name</span>
            <input type="text" class="form-control" name="fullname" placeholder="Full name" value="<?php echo $fullname; ?>" aria-label="Username" aria-describedby="addon-wrapping">
        </div>
        <br>
        <div class="input-group flex-nowrap">
            <span class="input-group-text" id="addon-wrapping">Address</span>
            <input type="text" class="form-control" name="address" placeholder="Address" value="<?php echo $address; ?>" aria-label="Username" aria-describedby="addon-wrapping">
        </div>
        <br>
        <div class="input-group flex-nowrap">
            <span class="input-group-text" id="addon-wrapping">Email</span>
            <input type="text" class="form-control" name="email" placeholder="Email" value="<?php echo $email ?>" aria-label="Username" aria-describedby="addon-wrapping">
        </div>
        <br>
        <div class="row">
            <div class="col-sm-2">
                <button type="submit" name="edit" class="btn btn-success update_cus" data-id="<?php echo $id; ?>">Update</button>
            </div>
            <div class="col-sm-2">
                <button class="btn btn-danger cancel_edit">Cancel</button>
            </div>
        </div>
    </form>

</div>

<?php
if (isset($_POST['edit'])) {

    $idcustomer = $_POST['idcustomer'];
    $fullname = $_POST['fullname'];
    $address = $_POST['address'];
    $email = $_POST['email'];

    $sql = "UPDATE customer SET fullname=?, address=?, email=?  WHERE idcustomer=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sssi', $fullname, $address, $email, $idcustomer);
    $stmt->execute();
    $stmt->close();

    echo "<script>window.location = 'index.php?menu=customer'</script>";
}
?>