<?php
include 'condb.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="shortcut icon" href="img/logo.jpg">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    $(document).ready(function(){
    $('.search-box input[type="text"]').on("keyup input", function(){
        /* รับค่าอินพุตเมื่อมีการเปลี่ยนแปลง */
        var inputVal = $(this).val();
        var resultDropdown = $(this).siblings(".result");
        if(inputVal.length){
            $.get("Record2.php", {term: inputVal}).done(function(data){
                // แสดงข้อมูลที่ส่งคืนในเบราว์เซอร์
                resultDropdown.html(data);
            });
        } else{
            // ผลDropdown.empty();
            $.get("Record3.php", {term: inputVal}).done(function(data){
                // แสดงข้อมูลที่ส่งคืนในเบราว์เซอร์
                resultDropdown.html(data);
            });
        }
    });

    // ตั้งค่าการป้อนข้อมูลการค้นหาเมื่อคลิกรายการผลลัพธ์
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
    <div class="container" style=width:100%>
        <div class="search-box">
            <br><br>
                <h4><p style="color:red">**สามารถค้นหาจากชื่อเอกสารเท่านั้น**</p></h4>
            <input type="text" class="form-control" placeholder="ชื่อเอกสาร" name="doc_name" OnChange="JavaScript:doCallAjax(document.getElementById('txtSearch').value);" >
            <div class="result">
            <?php
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
            <td><a href="download.php?id=<?=$row["doc_id"]?>" name="download" class="btn btn-success "><i class="fa fa-arrow-circle-down" aria-hidden="true"></i>
 Download</a>   </td>
            <td><a href="doc_edit.php?id=<?=$row["doc_id"]?>" class="btn btn-warning "><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a>   </td>
            <td><a href="doc_delete.php?id=<?=$row["doc_id"]?>" class="btn btn-danger" onclick="Del(this.href);return false;"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a>   </td>
            </tr>
            <?php
            }
        
            ?>
        </table>

        <?php
        }
        mysqli_close($conn); //ปิดฐานข้อมูล
        ?>

            </div>
            </div>
        <br>
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

</body>
</html>



