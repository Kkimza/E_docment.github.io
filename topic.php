<?php
include 'condb.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Topic</title>
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
</style>

</head>
<body>
 
<?php
include 'navadmin.php'
?>
  
<!--ตาราง-->
<div class="container">
<table class="table table-hover">
  <br>
    <div class="h4 text-center alert alert-success mb-4 mt-2" role="alert">หมวดหมู่เอกสาร</div>
<a href="addtopic.php" class="btn btn-success mb-3"><i class="fa fa-plus" aria-hidden="true"></i>
 เพิ่มหมวดหมู่เอกสาร</a>
    <tr>
      <th>รหัส</th>
      <th>ชื่อ</th>
      <th>รายละเอียด</th>
      <th>แก้ไข</th>

    </tr>
    <!--เชื่อมต่อฐานข้อมูล-->
    <?php
    $sql = "SELECT * FROM topic";
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
$sql .=" ORDER BY topic_id ASC LIMIT $Page_Start , $Per_Page";
$result=mysqli_query($conn,$sql);
    while($row=mysqli_fetch_array($result)){
    ?>
    <tr>
      <td><?=$row["topic_id"]?></td>
      <td><?=$row["topic_name"]?></td>
      <td><?=$row["topic_detail"]?></td>
      <td><a href="edit_topic.php?id=<?=$row["topic_id"]?>" class="btn btn-warning "><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a>   </td>
      
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

</body>
</html>



