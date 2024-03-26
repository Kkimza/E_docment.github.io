<?php
include 'condb.php';
?>

<?php
/* เข้าฐานข้อมูล */
$link = mysqli_connect("localhost", "root", "", "my_db");
 
// เช็คว่าเชื่อมต่อฐานข้อมูลสำเร็จไหม
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
if(isset($_REQUEST["term"])){
    // เตรียมคำสั่ง term 

    $sql = "SELECT * FROM document WHERE doc_file LIKE ? AND delete_doc = '0' ";
    
    if($stmt = mysqli_prepare($conn, $sql)){
        // ผูกตัวแปรกับคําสั่งที่เตรียมไว้เป็นพารามิเตอร์ 
        mysqli_stmt_bind_param($stmt, "s", $param_term);
        
        // ตั้งค่าพารามิเตอร์
        $param_term = $_REQUEST["term"] . '%';
        
        // ดําเนินการตามคําสั่งที่เตรียมไว้
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
            
            // ตรวจสอบจํานวนแถว 
            if(mysqli_num_rows($result) > 0){

$strSQLv = "SELECT * FROM topic";
$objQueryv = mysqli_query($conn,$strSQLv);
while ($objResultv = mysqli_fetch_array($objQueryv,MYSQLI_ASSOC)){
    $topic_id = $objResultv['topic_id'];
?>

<br>
    <div class="h4 text-center alert alert-primary mb-4 mt-2" role="alert"><?php echo $objResultv['topic_name'];?></div>

    <br><br>
<div class="result"></div>
<table class="table table-hover">
    <tr>
      <th>รหัสเอกสาร</th>
      <th>หัวข้อเอกสาร</th>
      <th>ชื่อผู้เขียน</th>
      <th>รายละเอียด</th>
      <th>ชื่อไฟล์</th>
      <th>ดาวน์โหลด</th>
      <th>Edit</th>
      <th>Delete</th>
    </tr>

<!--เชื่อมต่อฐานข้อมูล-->
<?php
    while($row=mysqli_fetch_array($result)){
    ?>
    <tr>
      <td><?=$row["doc_id"]?></td>
      <td><?=$objResultv['topic_name']?></td>
      <td><?=$row["doc_nameplot"]?></td>
      <td><?=$row["doc_detail"]?></td>
      <td><?=$row["doc_file"]?></td>
      <td><a href="download.php?id=<?=$row["doc_id"]?>" name="download" class="btn btn-success ">Download</a>   </td>
      <td><a href="doc_edit.php?id=<?=$row["doc_id"]?>" class="btn btn-warning ">Edit</a>   </td>
      <td><a href="doc_delete.php?id=<?=$row["doc_id"]?>" class="btn btn-danger" onclick="Del(this.href);return false;">Delete</a>   </td>
    </tr>
    <?php
    }
  
    ?>
</table>

<?php
}

?>
 <?php
            

            } 
            
            
            else{


$strSQLv = "SELECT * FROM topic";
$objQueryv = mysqli_query($conn,$strSQLv);
while ($objResultv = mysqli_fetch_array($objQueryv,MYSQLI_ASSOC)){
    $topic_id = $objResultv['topic_id'];
?>

<br>
    <div class="h4 text-center alert alert-primary mb-4 mt-2" role="alert"><?php echo $objResultv['topic_name'];?></div>

    <br><br>
<div class="result"></div>
<table class="table table-hover">
    <tr>
      <th>รหัสเอกสาร</th>
      <th>หัวข้อเอกสาร</th>
      <th>ชื่อผู้เขียน</th>
      <th>รายละเอียด</th>
      <th>ชื่อไฟล์</th>
      <th>ดาวน์โหลด</th>
      <th>Edit</th>
      <th>Delete</th>
    </tr>

<!--เชื่อมต่อฐานข้อมูล-->
<?php
    
    echo"<tr>";
    echo"<td colspan='8'><p>ไม่พบเอกสารที่ค้นหา</p></td>";
    echo"</tr>";

  
?>
</table>

 <?php
}
            }
        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
        }
    }
     
    // ปิดคำสั่ง
    mysqli_stmt_close($stmt);
}
 

mysqli_close($conn);
?>