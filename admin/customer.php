<h1>Senarai Pelanggan</h1>
<div class="shadow-sm p-3 mb-5 bg-white rounded">
    <table class="table">
        <tr>
            <th>Bil</th>
            <th>Username</th>
            <th>Full Name</th>
            <th>Address</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
        <?php
        $bil = 1;
        $sql = "SELECT * FROM customer ORDER BY username";
        $result = $conn->query($sql);
        echo $conn->error;
        while ($row = $result->fetch_object()) {
        ?>
            <tr>
                <td><?php echo $bil++; ?></td>
                <td><?php echo $row->username; ?></td>
                <td><?php echo $row->fullname; ?></td>
                <td><?php echo $row->address; ?></td>
                <td><?php echo $row->email; ?></td>
                <td>
                    <a href="index.php?resetcus&idcustomer=<?php echo $row->idcustomer; ?>">Reset</a>
                    |
                    <a href="index.php?menu=edit_customer&idcustomer=<?php echo $row->idcustomer; ?>">Edit</a>
                    |
                    <a href="padam.php?idcustomer=<?php echo $row->idcustomer; ?>">Delete</a>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
</div>

</html>