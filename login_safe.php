<?php
$id = $_GET['id_param'];
$pw = $_GET['pw_param'];

$db_conn = mysqli_connect("127.0.0.1", "webhacking_db", "webhacking", "login");
if($db_conn == false){
    echo mysqli_connect_error();
}
else {
    $query = "select * from user where id=? and pw=?";
    $stmt = mysqli_prepare($db_conn, $query);
    if($stmt == false) {
        echo mysqli_error($db_conn);
        exit();
    }
    $bind = mysqli_stmt_bind_param($stmt, "ss", $id, $pw);
    if($bind == false) {
        echo mysqli_error($db_conn);
        exit();
    }
     $exec = mysqli_stmt_execute($stmt);
    if($exec == false) {
        echo mysqli_error($db_conn);
        exit();
    }
     $result = mysqli_stmt_get_result($stmt);
     if($result == false) {
         echo mysqli_error($db_conn);
     }
     else {
         $row = mysqli_fetch_array($result);
         if($row) {
             echo "Hello {$row['id']}, login success!";
         }
         else {
             echo "login failed";
         }
     }
     mysqli_close($db_conn);
}
?>

        
