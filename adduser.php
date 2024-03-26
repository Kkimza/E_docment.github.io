<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Addmember</title>
    <link rel="shortcut icon" href="img/logo.jpg">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">




</head>
<body>


<?php
include 'navadmin.php'
?>

    <!-- ตกแต่งหน้าต่างเพิ่มสมาชิก -->
<div class="container">
<br><br>
<div class="row justify-content-center">
    <div class="col-md-5 bg-light text-dark" style="radius">
        <br>


<div class="alert alert-primary h4 fw-bold text-center text-dark" role="alert">
เพิ่มสมาชิก
</div>

<form method="POST" action="insert_adduser.php">
<div class="mb-3">
<div class="col-sm-15">
ชื่อจริง
<input type="text" name="firstname" class="form-control" required placeholder="Fristname">
  
<div class="mb-3">
<div class="col-sm-15">
นามสกุล
<input type="text" name="lastname" class="form-control" required placeholder="Lastname">

<div class="mb-3">
<div class="col-sm-15">
เบอร์โทร
<input type="number" name="phone" class="form-control" required minlength="10" placeholder="Phone">
  
<div class="mb-3">
<div class="col-sm-15">
Username
<input type="text" name="username" class="form-control" required placeholder="Username">

<div class="mb-3">
<div class="col-sm-15">
Password
<input type="password" name="m_password" class="form-control" required  placeholder="Password">
<p style="color:red">**ตัวเลขเท่านั้น**</p>

<div class="mb-3">
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="status" id="status" value="1">
  <label class="form-check-label" for="inlineRadio1">Admin</label>
</div>

<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="status" id="status" value="0">
  <label class="form-check-label" for="inlineRadio2">Member</label>
</div>
<br>
<br>


<input type="submit" name="submit" value="บันทึก" 
class="btn btn-success"> 
<a href="indexadmin.php?Page=1" class="btn btn-danger">ยกเลิก</a>
</form>
</div>
</div>
</div>
</div>
    
</body>
</html>
