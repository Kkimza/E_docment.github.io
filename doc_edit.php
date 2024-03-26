<?php
include 'condb.php';
$id=$_GET['id'];
$sql="SELECT * FROM document WHERE doc_id ='$id' ";
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
.card {
    max-width: 1500px;
    background: #FFF;
    padding: 10px;
    margin: 100px auto;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0,0,0, 0.2);

    display: flex;
    flex-direction: column;
    align-items: center;
}
.btn-submit {
    width: 100%;
    font-size: 1rem;
    padding: 10px 0;
    border: none;
    background: #01579b;
    color: #ffffff;
    cursor: pointer;
    border-radius: 5px;
}
</style>
</head>
<body>

<?php
include 'navadmin.php';
?>

<!--form-->
<form class="card" action="doc_update.php" method="post" enctype="multipart/form-data">
<button type="submit" value="" class="btn-submit"><h4>แก้ไขเอกสาร</h4></button>
    <div class="container">
    <br>
    <div class="mb-3">

    <label>รหัสเอกสาร</label>
    <input type="text" name="doc_id" id="doc_id" class="form-control" readonly value=<?=$row['doc_id']?>>

    <br>
    <!--หัวข้อเอกสาร-->
    <div class="mb-3">
    <select name="doc_topic" id="doc_topic" class="form-select" aria-label="Default select example" required value=<?=$row['doc_topic']?>>
  <option selected value=<?=$row['doc_topic']?>><?=$row['doc_topic']?></option>
  <?php
  $strSQL = "SELECT * FROM topic";
  $objQuery = mysqli_query($conn,$strSQL);
  while ($objResult = mysqli_fetch_array($objQuery,MYSQLI_ASSOC)){
  ?>
  <option value="<?php echo $objResult['topic_id'];?>"><?php echo $objResult['topic_name'];?></option>

  <?php
  }
  ?>
</select>
</div>

<!--ชื่อผู้เขียน-->
<div class="mb-3">
<select name="doc_nameplot" id="doc_nameplot" class="form-select" aria-label="Default select example" required value=<?=$row['doc_nameplot']?>>
  <option selected value=<?=$row['doc_nameplot']?>><?=$row['doc_nameplot']?></option>
  <option value="นายธนาธิป บุญวรรณโณ">นายธนาธิป บุญวรรณโณ</option>
  <option value="นายจิรายุทธ สุจิมงคล">นายจิรายุทธ สุจิมงคล</option>
</select>
</div>

<!--รายละเอียดเอกสาร-->
<div class="mb-3">
  <label for="detail" class="form-label h4">รายละเอียด</label>
  <textarea name="doc_detail" id="doc_detail" class="form-control" rows="5" required ><?=$row['doc_detail']?></textarea>
</div>

<!--อัปโหลดไฟล์-->
<div class="mb-2">
  <label for="formFile" class="form-label"></label>
  <input name="doc_file" class="form-control" type="file" id="doc_file">
  <label><h2></label></h2>
  <input type="text" name="old_file" class="form-control" id="old_file" readonly value=<?=$row['doc_file']?>>
</div>


<br>
<input type="submit" name="submit" value="บันทึก" 
class="btn btn-success"> 
<a href="document.php" class="btn btn-danger">ยกเลิก</a>
    </div>
</form>
</body>
</html>
