<?php
include 'condb.php';


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
    $sql = "SELECT * FROM document WHERE delete_doc = '0' AND doc_topic = '$topic_id' ORDER BY doc_id DESC ";
    $result=mysqli_query($conn,$sql);
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
mysqli_close($conn); //ปิดฐานข้อมูล
?>
    