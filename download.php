<?php
include 'condb.php';
$name = $_SESSION['name'];
$lastname = $_SESSION['lastname'];
$phone = $_POST['phone'];
$doc_id=$_GET['id'];
$sql = "SELECT * FROM document WHERE doc_id =". $doc_id ;
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($result);
$folder="fileup";
$file=$folder   ."/".$row['doc_file'];

// fix for IE catching or PHP bug issue
header("Pragma: public");
header("Expires: 0"); // set expiration time
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
// browser must download file from server instead of cache

// force download dialog
header("Content-Type: application/force-download");
header("Content-Type: application/octet-stream");
header("Content-Type: application/download");


// การดาวน์โหลดไฟล์
header("Content-Disposition: attachment; filename=".basename($file).";");

/*
กำหนดขนาดไฟล์
*/
header("Content-Transfer-Encoding: binary");
header("Content-Length: ".filesize($file));

readfile("$file");


$id_member = $_SESSION['id_member'];
date_default_timezone_set("Asia/Bangkok");
$dow_date = date('Y-m-d h:i:sa');

//เพิ่มข้อมูลลงใน DB
$sql="INSERT INTO download_doc(doc_id,id_member,dow_date) 
values ( '$doc_id' , '$id_member' , '$dow_date')";
$result=mysqli_query($conn,$sql);

//line notify
$sToken = "bIgyD3G074e0c9oBALvN3FGs9pMBQYOhjKGnnn00Vip";
$sMessage = "แจ้งเตือนการดาวน์โหลดเอกสาร\r\n";
$sMessage .= "Full Name: " . $name . " " . $lastname . " \r\n";
$sMessage .= "File: " . $row['doc_file'] . " \r\n";

$chOne = curl_init(); 
curl_setopt( $chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify"); 
curl_setopt( $chOne, CURLOPT_SSL_VERIFYHOST, 0); 
curl_setopt( $chOne, CURLOPT_SSL_VERIFYPEER, 0); 
curl_setopt( $chOne, CURLOPT_POST, 1); 
curl_setopt( $chOne, CURLOPT_POSTFIELDS, "message=".$sMessage); 
$headers = array( 'Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer '.$sToken.'', );
curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers); 
curl_setopt( $chOne, CURLOPT_RETURNTRANSFER, 1); 
$result = curl_exec( $chOne ); 

mysqli_close($conn);
exit();
?>