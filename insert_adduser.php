<?php
include 'condb.php';

//รับค่าตัวแปรมาจากไฟล์ adduser.php
$name = $_POST['firstname'];
$lastname = $_POST['lastname'];
$phone = $_POST['phone'];
$username = $_POST['username'];
$password = $_POST['m_password'];
$status = $_POST['status'];

//คำสั่งเพิ่มข้อมูลลงตาราง member 

$sql ="INSERT INTO member (name,lastname,phone,username,m_password,status)
values('$name','$lastname','$phone','$username','$password','$status')";
$result=mysqli_query($conn,$sql);

//ทำการเช็ค result
if($result){
    echo "<script> alert('บันทึกข้อมูลเรียบร้อยแล้ว'); </script> ";
    echo "<script> window.location='indexadmin.php?Page=1'; </script> ";
}else{
    echo "Error:" . $sql . "<br>" . mysqli_error($conn);
    echo "<script> alert('บันทึกข้อมูลไม่ได้'); </script> ";
}
mysqli_close($conn);
?>