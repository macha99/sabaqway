<!DOCTYPE html>
<html lang="en">
<?php
include("../conn.php");
include("check_session.php");
?>

<h1>Senarai Pelanggan</h1>
<div class="shadow-sm p-3 mb-5 bg-white rounded">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama pengguna</th>
                <th scope="col">Nama penuh</th>
                <th scope="col">Alamat</th>
                <th scope="col">Email</th>
                <th scope="col">Pilihan</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 1;
            $q_customer = mysqli_query($conn, "SELECT * FROM customer");
            if (mysqli_num_rows($q_customer) > 0) {
                while ($f_customer = mysqli_fetch_assoc($q_customer)) {
            ?>
                    <tr>
                        <th scope="row"><?php echo $i; ?></th>
                        <td><?php echo $f_customer['username'] ?></td>
                        <td><?php echo $f_customer['fullname'] ?></td>
                        <td><?php echo $f_customer['address'] ?></td>
                        <td><?php echo $f_customer['email'] ?></td>
                        <td><button class="btn btn-link edit_cus prehide" data-id="<?php echo $f_customer['idcustomer']; ?>">Edit</button> | <button class="btn btn-link delete_cus prehide" data-id="<?php echo $f_customer['idcustomer']; ?>">Delete</button> | <button class="btn btn-link reset_customer" data-name="<?php echo $f_customer['username'] ?>" data-id="<?php echo $f_customer['idcustomer']; ?>">Reset</button></td>
                    </tr>
            <?php
                    $i++;
                }
            }
            ?>
        </tbody>
    </table>
    <script>
        $(document).ready(function() {
            $(".delete_cus").click(function() {
                $.post("engine.php", {
                    delete_cus: 1,
                    cus_id: $(this).data("id")
                }, function(data) {
                    if (data == "OK") {
                        $(".success_banner").html("")
                        $('.content').load("customer.php")
                    }
                    console.log(data)
                })
            })
            $(".edit_cus").click(function() {
                $.post("engine.php", {
                    edit_cus: 1,
                    cus_id: $(this).data("id")
                }, function(data) {
                    $(".success_banner").html("")
                    $(".content").load("edit_customer.php")
                })

            })
            $(".reset_customer").click(function() {
                let custname = [$(this).data("name")]
                $.post("engine.php", {
                    reset_pass: 1,
                    customer_id: $(this).data("id")
                }, function(data) {
                    if (data == "OK") {
                        $(".success_banner").html("<div class='shadow-none p-3 mb-5 bg-success rounded'><center><h3>" + custname[0] + " password has been reset</h3></center></div>")
                    }
                })
            })
        })
    </script>
</div>

</html>