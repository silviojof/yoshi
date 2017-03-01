<?php
  require('../partials/connection.php');
  if(connect_db()) {
    if(!empty($_GET['delete'])) {
      $idToDel = $_GET['delete'];
      $delQuery= "DELETE FROM users_tb WHERE id='" . $idToDel . "'";
      $delResult = mysqli_query(connect_db(), $delQuery);
      header('location:../users_admin.php');
    }
  } else {
    die( connect_db() );
  }

  // Close Connection
  close_db(connect_db());
 ?>
