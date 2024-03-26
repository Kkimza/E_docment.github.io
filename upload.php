<?php
include 'condb.php';


session_start();

//ประกาศตัวแปร
$doc_topic = $_POST['doc_topic'];
$nameplot = $_POST['nameplot'];
$doc_detail = $_POST['doc_detail'];
$doc_delete = "0";

//อัปโหลดไฟล์เข้าfolder fileup
$upfile = $_FILES['doc_file']['name'];
$temp = $_FILES['doc_file']['tmp_name'];
$locate = "fileup/";

//เพิ่มข้อมูลลงใน DB
$sql="INSERT INTO document(doc_topic,doc_nameplot,doc_detail,doc_file,delete_doc) 
values ( '$doc_topic' , '$nameplot' , '$doc_detail' , '$upfile' , '$doc_delete' )";
$result=mysqli_query($conn,$sql);
copy($temp,$locate.$upfile);

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