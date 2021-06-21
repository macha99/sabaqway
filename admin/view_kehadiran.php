<!DOCTYPE html>
<html lang="en">
<?php 
include("../conn.php"); 
include("check_session.php"); 
?>
<body>
    <br>
    <div class="container">
        <h1>Senarai Kehadiran</h1>
        <div class="shadow-sm p-3 mb-5 bg-white rounded">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">First</th>
                        <th scope="col">Last</th>
                        <th scope="col">Handle</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Imran</td>
                        <td>Suraya</td>
                        <td>@mdo</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Syatirah</td>
                        <td>Ismail</td>
                        <td>@fat</td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td colspan="2">*</td>
                        <td>@twitter</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>