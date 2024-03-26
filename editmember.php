<?php
include 'condb.php';
$id=$_GET['id'];
$sql="SELECT * FROM member WHERE id_member ='$id' ";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editmember</title>
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
    <div class="col-md-5 bg-light text-dark">
        <br>


<div class="alert alert-danger h4 fw-bold text-center text-dark" role="alert">
แก้ไขข้อมูลสมาชิก
</div>

<form method="POST" action="updateuser.php">
<div class="mb-3">

<div class="col-sm-15">
<label>รหัสสมาชิก</label>
<input type="text" name="id" class="form-control" readonly value=<?=$row['id_member']?>>
<div class="col-sm-15">

<label>ชื่อจริง</label>
<input type="text" name="firstname" class="form-control" value=<?=$row['name']?>>
<div class="mb-3">
<div class="col-sm-15">

<label>นามสกุล</label>
<input type="text" name="lastname" class="form-control" value=<?=$row['lastname']?>>
<div class="mb-3">
<div class="col-sm-15">

<label>เบอร์โทร</label>
<input type="number" name="phone" class="form-control" required minlength="10" value=<?=$row['phone']?>>
<div class="mb-3">
<div class="col-sm-15">

<label>Username</label>
<input type="text" name="username" class="form-control" value=<?=$row['username']?>>
<div class="mb-3">
<div class="col-sm-15">

<label>Password</label>
<input type="password" name="m_password" class="form-control" value=<?=$row['m_password']?>>
<br>
<input type="submit" name="submit" value="บันทึก" 
class="btn btn-success"> 
<a href="indexadmin.php?Page=1" class="btn btn-danger">ยกเลิก</a>
</form>
</div>
</div>
    </div>
    
</body>
</html>
