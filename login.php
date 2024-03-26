<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="shortcut icon" href="img/logo.jpg">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <style>
    footer {
        position: fixed;
        bottom: 0;
        width: 100%;
        
    }
    </style>

</head>
<body>
<img src="img/banner.jpg" alt="" class="" width="100%">
<div class="container">
<br><br>
<div class="row justify-content-center">
    <div class="col-md-5 bg-light text-dark">
        <br>


<div class="alert alert-primary h4 fw-bold text-center text-dark " role="alert">
B-est Login
</div>

<form method="POST" action="login_check.php">
<div class="mb-4">
<div class="col-sm-15">
ชื่อผู้ใช้งาน
<input type="text" name="username" class="form-control" required placeholder="Username">
  
<div class="mb-3">
<div class="col-sm-15">
รหัสผ่าน
<input type="password" name="m_password" class="form-control" required placeholder="Password"><br>

<?php
if(isset($_SESSION["Error"])){
    echo $_SESSION["Error"] ;
}
?>

<input type="submit" name="submit" value="เข้าสู่ระบบ" 
class="btn btn-primary col-md-12"> 
</form>



</body>
</html>