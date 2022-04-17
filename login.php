<?php
  $id = $_GET['id_param'];
  $pw = $_GET['pw_param'];

  $db_conn = mysqli_connect("127.0.0.1", "webhacking_db", "webhacking", "login");
  if($db_conn == false){
    echo mysqli_connect_error();
  }

  else {
    $query = "select * from user where id='{$id}' and pw='{$pw}'";
    $result = mysqli_query($db_conn, $query);
    echo "query : {$query}<br>";

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

        
