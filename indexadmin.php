<?php
include 'condb.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>indexadmin</title>
    <link rel="shortcut icon" href="img/logo.jpg">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="stylesheet" href="css/font-awesome.min.css">

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

h4{
  color: #fffff;
}
</style>


</head>
<body>
 
<?php
include 'navadmin.php';
?>

<!-----------------------------Content----------------------------->
<!--ตาราง-->
<br>
<div class="container" style="width:100%">
<div style="overflow-x:auto;">
<div class="h4 text-center alert alert-dark mb-4 mt-2" stlye="width:100%" role="alert">แสดงข้อมูลสมาชิก</div>
<a href="adduser.php" class="btn btn-success mb-3"><i class="fa fa-user-plus" aria-hidden="true"></i>
เพิ่มผู้ใช้งาน</a>

  <table class="table table-hover">

      <tr>
        <th>รหัส</th>
        <th>ชื่อ</th>
        <th>นามสกุล</th>
        <th>เบอร์โทรศัพท์</th>
        <th>สถานะ</th>
        <th>Edit</th>
        <th>Delete</th>

      </tr>
      <!--เชื่อมต่อฐานข้อมูล-->
      <?php
        $sql = "SELECT * FROM member";
        $result=mysqli_query($conn,$sql);
        $Num_Rows = mysqli_num_rows($result);

$Per_Page = 10;   // จำนวนที่จะแสดง

$Page = $_GET["Page"];
if(!$_GET["Page"])
{
    $Page=1;
}

$Prev_Page = $Page-1;
$Next_Page = $Page+1;

$Page_Start = (($Per_Page*$Page)-$Per_Page);
if($Num_Rows<=$Per_Page)
{
    $Num_Pages =1;
}
else if(($Num_Rows % $Per_Page)==0)
{
    $Num_Pages =($Num_Rows/$Per_Page) ;
}
else
{
    $Num_Pages =($Num_Rows/$Per_Page)+1;
    $Num_Pages = (int)$Num_Pages;
}
$sql .=" ORDER BY id_member ASC LIMIT $Page_Start , $Per_Page";
$result=mysqli_query($conn,$sql);
        while($row=mysqli_fetch_array($result)){
          if($row['status'] == "1") {
            $status = "แอดมิน" ;
          }else{
            $status = "สมาชิก";
          }
      ?>
      <tr>
        <td><?=$row["id_member"]?></td>   
        <td><?=$row["name"]?></td>
        <td><?=$row["lastname"]?></td>
        <td><?=$row["phone"]?></td>
        <td><?=$status?></td>

        <td><a href="editmember.php?id=<?=$row["id_member"]?>" class="btn btn-warning "><i class="fa fa-pencil" aria-hidden="true"></i>
 Edit</a></td>
        <td><a href="deletemember.php?id=<?=$row["id_member"]?>" class="btn btn-danger" onclick="Del(this.href);return false;"><i class="fa fa-trash" aria-hidden="true"></i>
 Delete</a>   </td>
      </tr>
      <?php
        }
      ?>
  </table>
  <div style="float:right;">
    Total <?php echo $Num_Rows;?> :
    <?php
    if($Prev_Page)
    {
        echo " <a href='$_SERVER[SCRIPT_NAME]?Page=$Prev_Page'><input type='button' value='ย้อนกลับ' class='btn btn-default'></a> ";
    }

    for($i=1; $i<=$Num_Pages; $i++){
        if($i != $Page)
        {
            echo "[ <a href='$_SERVER[SCRIPT_NAME]?Page=$i'>$i</a> ]";
        }
        else
        {
            echo "<b> $i </b>";
        }
    }
    if($Page!=$Num_Pages)
    {
        echo " <a href ='$_SERVER[SCRIPT_NAME]?Page=$Next_Page'><input type='button' value='ถัดไป' class='btn btn-default'></a> ";
    }
            mysqli_close($conn); //ปิดฐานข้อมูล
            ?>
  </div>
</div>
  

<script language="JavaScript">
function Del(mypage){
    var agree=confirm("ยืนยันการลบข้อมูลใช่หรือไหม");
    if(agree){
      window.location=mypage;
    }

}

</script>
<!-----------------------------Content----------------------------->

</body>
</html>