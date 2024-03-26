<?php

include 'condb.php';
$doc_id=$_POST['doc_id'];
$doc_topic=$_POST['doc_topic'];
$doc_nameplot=$_POST['doc_nameplot'];
$doc_detail=$_POST['doc_detail'];
if($_FILES['doc_file']['name']==""){
    $doc_file=$_POST['old_file'];
}else{
    $doc_file = $_FILES['doc_file']['name'];
    $temp = $_FILES['doc_file']['tmp_name'];
    $locate = "fileup/";
    copy($temp,$locate.$doc_file);
}


$sql = "UPDATE document set doc_topic='$doc_topic', doc_nameplot='$doc_nameplot', 
doc_detail='$doc_detail', doc_file='$doc_file' WHERE doc_id='$doc_id' ";
$result=mysqli_query($conn,$sql);

//ทำการเช็ค result
if($result){
    echo "<script> alert('บันทึกข้อมูลเรียบร้อยแล้ว'); </script> ";
    echo "<script> window.location='document.php'; </script> ";
}else{
    echo "Error:" . $sql . "<br>" . mysqli_error($conn);
    echo "<script> alert('บันทึกข้อมูลไม่ได้'); </script> ";
}
mysqli_close($conn);

?>