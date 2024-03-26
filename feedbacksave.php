<?PHP
include 'condb.php'
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link rel="shortcut icon" href="img/logo.jpg">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}
body {
    width: 100%;
    background: #4fc3f7;
}

.card {
    max-width: 1500px;
    background: #FFF;
    padding: 10px;
    margin: 100px auto;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0,0,0, 0.2);

    display: flex;
    flex-direction: column;
    align-items: center;
}
.form-control {
    width: 50%;
    margin: 10px 0;
}
.txt {
    font-size: 1rem;
    padding: 10px;
    background: #F7F7F7;
    border: 1px solid #E5E5E5;
    border-radius: 5px;
    width: 100%;
}
.btn-submit {
    width: 50%;
    font-size: 1rem;
    padding: 10px 0;
    border: none;
    background: #333;
    color: #FFF;
    cursor: pointer;
    border-radius: 5px;
}
.txtarea {
    height: 100px;
}
</style>
</head>
<body>

<?php
include 'navuser.php'
?>
<?PHP
    $id_member = $_SESSION['id_member'];
    $namect = $_POST['namect'];
    $deptct = $_POST['deptct'];
    $headerct = $_POST['headerct'];
    $detailct = $_POST['detailct'];
    $statusct = "0";

    $sql ="INSERT INTO contactadmin (id_member,name_ct,dept_ct,topic_ct,detail_ct,status_ct)
    values('$id_member','$namect','$deptct','$headerct','$detailct','$statusct')";
    $result=mysqli_query($conn,$sql);

    //ทำการเช็ค result
    if($result){
    echo "<script> alert('ส่งข้อมูลเรียบร้อยแล้ว'); </script> ";
    echo "<script> window.location='feedbackold.php'; </script> ";
    }else{
    echo "Error:" . $sql . "<br>" . mysqli_error($conn);
    echo "<script> alert('ส่งข้อมูลไม่ได้'); </script> ";
    }
    mysqli_close($conn);

?>
</body>
</html>
