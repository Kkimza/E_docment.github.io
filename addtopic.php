<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Addtopic</title>
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


<div class="alert alert-primary h4 fw-bold text-center text-dark " role="alert">
เพิ่มหมวดหมู่เอกสาร
</div>

<form method="POST" action="insert_addtopic.php">
<div class="mb-3">
<div class="col-sm-15">
ชื่อหมวดหมู่
<input type="text" name="firstname" class="form-control" required placeholder="หัวข้อ">
  
<div class="mb-3">
<div class="col-sm-15">
รายละเอียดหมวดหมู่
<input type="text" name="lastname" class="form-control" required placeholder="รายละเอียด">


<br>
<input type="submit" name="submit" value="บันทึก" 
class="btn btn-success"> 
<a href="topic.php?Page=1" class="btn btn-danger">ยกเลิก</a>
</form>
</div>
</div>
</div>
</body>
</html>
