<?php
include 'condb.php';
?>

<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "my_db");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
if(isset($_REQUEST["term"])){
    // Prepare a select statement

    
    $sql = "SELECT download_doc.dow_id , member.name , member.lastname , document.doc_file , download_doc.dow_date FROM (( download_doc
INNER JOIN member ON download_doc.id_member = member.id_member)
INNER JOIN document ON download_doc.doc_id = document.doc_id)
WHERE member.name LIKE ? 
ORDER BY dow_id ASC";
    
    if($stmt = mysqli_prepare($conn, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "s", $param_term);
        
        // Set parameters
        $param_term = $_REQUEST["term"] . '%';
        
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
            
            // Check number of rows in the result set
            if(mysqli_num_rows($result) > 0){
            
                ?>
        <table class="table table-hover">
            
            <tr>
                <th>ลำดับ</th>
                <th>วันที่ดาวน์โหลด</th>
                <th>ชื่อผู้โหลด</th>
                <th>ชื่อเอกสาร</th>
            </tr>
            <?php
                while($row=mysqli_fetch_array($result)){
            ?>
            <tr>
                <td><?= $row['dow_id'];?></td>
                <td><?= $row['dow_date'];?></td>
                <td><?= $row['name'];?> <?= $row['lastname'];?></td>
                <td><?= $row['doc_file'];?></td>
            </tr>
            <?php
                }
            ?>
        </table>
      <?php
            }
            else{
                ?>
                <table class="table table-hover">
                    
                        <tr>
                            <th width="20%">ลำดับ</th>
                            <th width="20%">วันที่ดาวน์โหลด</th>
                            <th width="20%">ชื่อผู้โหลด</th>
                            <th width="30%">ชื่อเอกสาร</th>
                        </tr>
                    <?php
                    echo"<tr>";
                    echo"<td colspan='8'><p>ไม่มีข้อมูลของรายชื่อนี้ในระบบ</p></td>";
                    echo"</tr>";
                    ?>
                </table>
              <?php
            }
        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
        }
    }
     
    // Close statement
    mysqli_stmt_close($stmt);
}
 
// close connection
mysqli_close($conn);
?>