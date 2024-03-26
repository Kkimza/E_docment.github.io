<?php
include 'condb.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedold</title>
    <link rel="shortcut icon" href="img/logo.jpg">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<style>

table {
  border-collapse: collapse;
  border-spacing: 0;
  width: 100%;
  
}

th, td {
  text-align: center;
  padding: 8px;
}

*{
	margin:0;
	padding: 0;
	box-sizing: border-box;
}
.toggle{
	height: 0;
	width: 0;
	visibility: hidden;
}
label{
	position: relative;
	display: block;
	width: 50px;
	height: 25px;
	background-color: #cdcdcd;
	border-radius: 100px;
	cursor: pointer;
	transition: 0.4s;
}
label::after{
	content: "";
	position: absolute;
	left: 7px;
	top: 2px;
	height: 20px;
	width: 20px;
	background-color: #fff;
	border-radius: 50%;
	transition: 0.4s;
}
.toggle:checked + label{
	background-color: #51e600;
}
.toggle:checked + label::after{
	left: calc(100% - 7px);
	transform: translateX(-100%);
}
</style>

</head>
<body>
 
<?php
include 'navadmin.php';
?>

<br>
<div class="container" style="width:100%">
  <div style="overflow-x:auto;">
    <div class="h4 text-center alert alert-success mb-4 mt-2" stlye="width:100%" role="alert">การติดต่อที่รับทราบแล้ว</div>
    <a href="feed.php"><input class="btn btn-info" type="button" value="ย้อนกลับ"></a>
        <table class="table table-hover">
          

          <tr>
            <th width="20%">แผนก</th>
            <th width="20%">ชื่อผู้เขียน</th>
            <th width="20%">หัวข้อ</th>
            <th width="20%">รายละเอียด</th>
            <th width="20%">สถานะ</th>
          </tr>
        
          

          <?php
            $sql = "SELECT * FROM contactadmin WHERE status_ct = '1' ORDER BY id_ct DESC";
            $result=mysqli_query($conn,$sql);
            while($row=mysqli_fetch_array($result)){
            ?>
            <tr>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
            </tr>
            <tr>
              <td><?=$row["dept_ct"]?></td>
              <td><?=$row['name_ct']?></td>
              <td><?=$row["topic_ct"]?></td>
              <td><?=$row["detail_ct"]?></td>
              <td><p style="color:green">อ่านแล้ว</p></td>
            <?php
            }mysqli_close($conn); //ปิดฐานข้อมูล
        
            ?>
      </table>
  </div>
</div>  

    