<?php
include("../conn.php");
include("check_session.php");
$id = $_SESSION["edit_cus_id"];
$query = mysqli_query($conn, "SELECT * FROM customer WHERE idcustomer = '$id'");
$fetch = mysqli_fetch_assoc($query);
?>
<br>
<div class="container">
    <h1>Edit Customer (<?php echo $fetch['username'] ?>)</h1>
    <br>
    <div class="input-group flex-nowrap">
        <span class="input-group-text" id="addon-wrapping">Username</span>
        <input type="text" class="form-control" id="cus_username" placeholder="Username" value="<?php echo $fetch['username'] ?>" aria-label="Username" aria-describedby="addon-wrapping">
    </div>
    <br>
    <div class="input-group flex-nowrap">
        <span class="input-group-text" id="addon-wrapping">Full name</span>
        <input type="text" class="form-control" id="cus_fullname" placeholder="Full name" value="<?php echo $fetch['fullname'] ?>" aria-label="Username" aria-describedby="addon-wrapping">
    </div>
    <br>
    <div class="input-group flex-nowrap">
        <span class="input-group-text" id="addon-wrapping">Address</span>
        <input type="text" class="form-control" id="cus_address" placeholder="Address" value="<?php echo $fetch['address'] ?>" aria-label="Username" aria-describedby="addon-wrapping">
    </div>
    <br>
    <div class="input-group flex-nowrap">
        <span class="input-group-text" id="addon-wrapping">Email</span>
        <input type="text" class="form-control" id="cus_email" placeholder="Email" value="<?php echo $fetch['email'] ?>" aria-label="Username" aria-describedby="addon-wrapping">
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
                update_cus: 1,
                cus_id: $(this).data("id"),
                cus_username: $("#cus_username").val(),
                cus_fullname: $("#cus_fullname").val(),
                cus_address: $("#cus_address").val(),
                cus_email: $("#cus_email").val(),
            }, function(data) {
                if (data == "OK") {
                    $(".content").load("edit_customer.php")
                    $(".success_banner").html("<div class='shadow-none p-3 mb-5 bg-success rounded'><center><h3>User data edited</h3></center></div>")
                }
                console.log(data)
            })
        })

        $(".cancel_edit").click(function() {
            $(".content").load("customer.php")
            $(".success_banner").html("")
        })
    })
</script>