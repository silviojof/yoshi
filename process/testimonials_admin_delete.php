<?php
  require('../partials/connection.php');



  if(connect_db()) {

    if(!empty($_GET['delete'])) {
      $idToDel = $_GET['delete'];
      $fileToDel = "../" . $_GET['image'];
      $delQuery= "DELETE FROM testimonials_tb WHERE id='" . $idToDel . "'";
      $delResult = mysqli_query(connect_db(), $delQuery);
      if($fileToDel !== 'images/') {
        unlink($fileToDel);
        echo "image deleted   ";
      }
      echo "file deleted";
      header('location:../testimonials_admin.php');
    }



  } else {
    die( connect_db() );
  }

  // Close Connection
  close_db(connect_db());



 ?>
