<?php
include 'condb.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Record_Document</title>
    <link rel="shortcut icon" href="img/logo.jpg">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    $(document).ready(function(){
    $('.search-box input[type="text"]').on("keyup input", function(){
        /* Get input value on change */
        var inputVal = $(this).val();
        var resultDropdown = $(this).siblings(".result");
        if(inputVal.length){
            $.get("Record4.php?Page=1", {term: inputVal}).done(function(data){
                // Display the returned data in browser
                resultDropdown.html(data);
            });
        } else{
            // resultDropdown.empty();
            $.get("Record5.php?Page=1", {term: inputVal}).done(function(data){
                // Display the returned data in browser
                resultDropdown.html(data);
            });
        }
    });

    // Set search input value on click of result item
    $(document).on("click", ".result p", function(){
        $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
        $(this).parent(".result").empty();
    });
});
</script>

<style>
table {
  border-collapse: collapse;
  border-spacing: 0;
  width: 100%;
  border: 0px solid #ddd;
}

th, td {
  text-align: center;
  padding: 8px;
}
</style>

</head>
<body>
 
<?php
include 'navadmin.php';
?>

<!--ตาราง-->
<div style="overflow-x:auto;">
  <div class="container" stlye=width:100%>
      <br>
          <div class="h4 text-center alert alert-warning mb-4 mt-2" role="alert">ประวัติการดาวน์โหลด</div>
      <!--ค้นหา-->
          
  
  

<div class="search-box">
 
            <input type="text" class="form-control" placeholder="ชื่อผู้ดาวน์โหลด" name="doc_name" OnChange="JavaScript:doCallAjax(document.getElementById('txtSearch').value);" >
            <div class="result">
              <br>
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

$Per_Page = 10;   // จำนวนแถวข้อมูลสูงสุดที่จะแสดงในแต่ละหน้า

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
      <br>
   <!--ปุ่มไปกลับ!-->
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
        <br>
    </div>
    </div>
</div>

</body>
</html>

