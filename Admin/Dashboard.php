<?php
session_start();
if (!isset($_SESSION['username'])){
header("location:login.php");
}
?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css" />
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#example').DataTable();
        });
    </script>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-12">
                    <h1 class="table-striped" style="padding-left:20px;">Grievance Admin</h1>
					<a href="logout.php" class="btn btn-primary btn-sm pull-right" style="margin-bottom:5px;">Log Out</a>
                </div>
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>

                        <tr>
                            <th>Prefix</th>
                            <th>Name</th>
                            <th>Reg Number</th>
                            <th>Email</th>
                            <th>Unique Id</th>
                            <th>Time Stamp</th>
                        </tr>
                    </thead>
                    <tbody>
<?php
require_once '../db_connect.php';
$sql_query = "SELECT * FROM grievance_registration";
 $result = $connect->query($sql_query);
while( $developer = mysqli_fetch_assoc($result) ) {
?>
                        <tr>
                            <td><?php echo $developer ['TitlePrefex']; ?></td>
                            <td><?php echo $developer ['Name']; ?></td>
                            <td><?php echo $developer ['RegistrationNumber']; ?></td>
                            <td><?php echo $developer ['EmailId']; ?></td>
                            <td><?php echo $developer ['UniqueId']; ?></td>
                            <td><?php echo $developer ['TimeStamp']; ?></td>
                        </tr>
<?php } ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Prefix</th>
                            <th>Name</th>
                            <th>Reg Number</th>
                            <th>Email</th>
                            <th>Unique Id</th>
                            <th>Time Stamp</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</body>
</html>