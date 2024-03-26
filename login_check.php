<?php
include 'condb.php';
session_start();

$username =$_POST['username'];
$password =$_POST['m_password'];

$sql="SELECT * FROM member WHERE username='$username' and m_password ='$password' ";
$result=mysqli_query($conn,$sql);
$row =mysqli_fetch_array($result);

//เช็ค status
$status=$row['status'];


if($row > 0){
    $_SESSION["id_member"]=$row['id_member'];
    $_SESSION["username"]=$row['username'];
    $_SESSION["password"]=$row['m_password'];
    $_SESSION["name"]=$row['name'];
    $_SESSION["lastname"]=$row['lastname'];

    if($status== '0'){
        $show=header("location:indexuser.php");
    }else if($status=='1'){
        $show=header("location:indexadmin.php?Page=1");
    }
}
else{
    $_SESSION["Error"] = "<p style='color:red'> ชื่อผู้ใช้งาน หรือ รหัสผ่านไม่ถูกต้อง </p>";
    $show=header("location:login.php");
}

echo $show;

?>
