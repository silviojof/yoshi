<?php
  require('../partials/connection.php');



  if(connect_db()) {

    if(isset($_POST['up-users-submit'])) {
      $password = mysqli_real_escape_string(connect_db(), $_POST['up-users-password']);
      $id = intval($_POST['up-users-id']);

      $upQuery = "UPDATE users_tb SET password='" . $password . "' WHERE id=" . $id;
      $UplResult = mysqli_query(connect_db(), $upQuery);
      header('location:../users_admin.php');
    } else {
      header('location:../index.php');
    }


  } else {
    die( connect_db() );
  }

  // Close Connection
  close_db(connect_db());



 ?>
