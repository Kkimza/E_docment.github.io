<?php 
include 'condb.php';
$id=$_POST['id'];
$name=$_POST['firstname'];
$lastname=$_POST['lastname'];
$phone=$_POST['phone'];
$username=$_POST['username'];
$m_password=$_POST['m_password'];

$sql = "UPDATE member set name ='$name', lastname ='$lastname', phone ='$phone', username ='$username', m_password ='$m_password' WHERE id_member ='$id' " ;
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