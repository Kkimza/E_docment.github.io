<?php
include 'condb.php';

//รับค่าตัวแปรมาจากไฟล์ adduser.php
$name = $_POST['firstname'];
$lastname = $_POST['lastname'];


//คำสั่งเพิ่มข้อมูลลงตาราง member 

$sql ="INSERT INTO topic (topic_name,topic_detail)
values('$name','$lastname')";
$result=mysqli_query($conn,$sql);

//ทำการเช็ค result
if($result){
    echo "<script> alert('บันทึกข้อมูลเรียบร้อยแล้ว'); </script> ";
    echo "<script> window.location='topic.php?Page=1'; </script> ";
}else{
    echo "Error:" . $sql . "<br>" . mysqli_error($conn);
    echo "<script> alert('บันทึกข้อมูลไม่ได้'); </script> ";
}
mysqli_close($conn);
?>