<?php
include 'condb.php';
?>

<table class="table table-hover">
  
    <tr>
      <th width="20%">ลำดับ</th>
      <th width="20%">วันที่ดาวน์โหลด</th>
      <th width="20%">ชื่อผู้โหลด</th>
      <th width="30%">ชื่อเอกสาร</th>
    </tr>
<?php
    $sql = "SELECT download_doc.dow_id , member.name , member.lastname , document.doc_file , download_doc.dow_date FROM (( download_doc
INNER JOIN member ON download_doc.id_member = member.id_member)
INNER JOIN document ON download_doc.doc_id = document.doc_id)
";
$result=mysqli_query($conn,$sql);
      $Num_Rows = mysqli_num_rows($result);

$Per_Page = 10;   // Per Page

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
$sql .=" ORDER BY dow_id ASC LIMIT $Page_Start , $Per_Page";
$result=mysqli_query($conn,$sql);
while($row=mysqli_fetch_array($result)){
?>
 <tr>
      <td><?= $row['dow_id'];?></td>
      <td><?= $row['dow_date'];?></td>
      <td><?= $row['name'];?> <?= $row['lastname'];?></td>
      <td><?= $row['doc_file'];?></td>
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
      echo " <a href='record_document.php?Page=$Prev_Page'><input type='button' value='ย้อนกลับ' class='btn btn-default'></a> ";
  }

  for($i=1; $i<=$Num_Pages; $i++){
      if($i != $Page)
      {
          echo "[ <a href='record_document.php?Page=$i'>$i</a> ]";
      }
      else
      {
          echo "<b> $i </b>";
      }
  }
  if($Page!=$Num_Pages)
  {
      echo " <a href ='record_document.php?Page=$Next_Page'><input type='button' value='ถัดไป' class='btn btn-default'></a> ";
  }
          mysqli_close($conn); //ปิดฐานข้อมูล
          ?>
</div>