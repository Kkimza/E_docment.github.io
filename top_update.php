<?php

include 'condb.php';
$topic_id=$_POST['topic_id'];
$topic_name=$_POST['topic_name'];
$topic_detail=$_POST['topic_detail'];


$sql = "UPDATE topic set topic_name='$topic_name', topic_detail='$topic_detail' 
WHERE topic_id ='$topic_id' ";
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