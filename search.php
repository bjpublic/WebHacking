<?php
  $search_data = htmlentities($_GET['search_data']);
  echo "<b>{$search_data}</b> Search Result <br>";
  $data = addslashes($_GET['search_data']);

  $db_conn = mysqli_connect("127.0.0.1", "webhacking_db", "webhacking", "portal");
  if($db_conn == false){
    echo mysqli_connect_error();
  }

  else {
    $query = "select * from search where content like '%{$data}%'";
    $result = mysqli_query($db_conn, $query);
    echo "<table style='border:1px solid; border-collapse:collapse'>";
    echo "<th style='border:1px solid'>Search Result Contents</th>";

    if($result == false) {
      echo mysqli_error($db_conn);
    }
    else {
      while($row = mysqli_fetch_array($result)) {
        echo "<tr><td style='border:1px solid'>{$row['content']}</td></tr>";
      }
    }

    mysqli_close($db_conn);
  }
?>

        
