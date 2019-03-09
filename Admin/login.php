<?php session_start(); 
 require_once '../db_connect.php';
if ($_POST) {
if (isset($_POST['username']) and isset($_POST['password'])){
 
    $usr = $_POST['username']; 
    $pas =$_POST['password'];
 $sql_query= mysqli_query($connect, "SELECT * FROM users  WHERE userName='$usr' AND password='$pas'");
 $row_cnt = $sql_query->num_rows;
    if($row_cnt == 1){ 
         
        $_SESSION['username'] = $usr; 
        $_SESSION['logged'] = TRUE; 
        header("Location: dashboard.php"); // Modify to go to the page you would like 
        exit; 
    }else{ 
        header("Location: login.php"); 
        exit; 
    } 
}else{    //If the form button wasn't submitted go to the index page, or login page 
    header("Location: index.php");     
    exit; 
} 
}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
<?php 

?> 

<div class="container">
  <h2>Admin Login</h2>
  <form action="login.php" method="POST">
  <div class="row">
  <div class="col-md-12">
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="text" class="form-control" id="username" placeholder="Enter email" name="username">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
  </form>
</div>
</div>
</div>
</body>
</html>
