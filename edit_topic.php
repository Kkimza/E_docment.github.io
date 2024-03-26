<?php
include 'condb.php';
$id=$_GET['id'];
$sql="SELECT * FROM topic WHERE topic_id ='$id' ";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($result);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>editpage</title>
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
 
<nav class="navbar navbar-expand-lg navbar-light bg-light fw-bold">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav me-auto mb-4 mb-lg-0">
        <li class="nav-item">
            
        <h5>
          <a class="nav-link " aria-current="page" href="indexadmin.php">จัดการผู้ใช้งาน</h5></a>
        </li>
        <li class="nav-item">
        <h5>
          <a class="nav-link active" href="createpage.php">เขียนเอกสาร</h5></a>
        </li>
        <li class="nav-item">
            <h5>
          <a class="nav-link" href="document.php">เอกสาร</h5></a>
        </li>
        <li class="nav-item">
            <h5>
          <a class="nav-link" href="record_document.php">รายการดาวน์โหลด</h5></a>
        </li>
        <li class="nav-item">
        <h5>
          <a class="nav-link" href="logout.php">ออกจากระบบ</h5></a>
        </li>
      </ul>
      <span class="navbar-text">
      <div class="badge bg-primary text-wrap" style="width: 15rem;">
      <h5>
        ยินดีต้อนรับผู้ดูแลระบบ
        </h5>
      </span>
    
     
    </div>
  </div>
</nav>

<!--form-->
<form action="top_update.php" method="post" enctype="multipart/form-data">
    <div class="container"> 
    <br>
    <div class="mb-3">

    <label>รหัสหัวข้อ</label>
    <input type="text" name="topic_id" id="topic_id" class="form-control" readonly value="<?=$row['topic_id']?>">
  </div>
    <br>
    <!--หัวข้อเอกสาร-->
    <div class="mb-3">
    <label>ชื่อหัวข้อ</label>
  <input type="text" name="topic_name" id="topic_name" class="form-control" value="<?php echo $row['topic_name'];?>" required>
</div>
<div class="mb-3">

    <label>รายละเอียด</label>
    <textarea name="topic_detail" id="topic_detail" class="form-control" cols="30" rows="2"><?php echo $row['topic_detail'];?></textarea>
  </div>
<br>
<input type="submit" name="submit" value="บันทึก" 
class="btn btn-success"> 
<a href="topic.php?Page=1" class="btn btn-danger">ยกเลิก</a>
    </div>
</form>
</div>

</body>
</html>
