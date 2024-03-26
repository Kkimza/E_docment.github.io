<?php
include 'condb.php';
$id=$_GET['id'];
$sql="UPDATE document SET delete_doc = '1' WHERE doc_id='$id' ";

if(mysqli_query($conn,$sql)){
    echo "<script> alert('ลบข้อมูลเรียบร้อยแล้ว'); </script> ";
    echo "<script> window.location='document.php'; </script> ";
}else{
    echo "Error : " .$sql. "<br>" . mysqli_error($conn);
    echo "<script> alert('ไม่สามารถลบข้อมูลได้'); </script> ";
}

mysqli_close($conn);

?>