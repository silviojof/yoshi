<?php
  require('../partials/connection.php');

  if(connect_db()) {
    if(isset($_POST['users-submit'])) {

      // Create variables - Gallery Information
      $username = mysqli_real_escape_string(connect_db(), $_POST['users-name']);
      $password = mysqli_real_escape_string(connect_db(), $_POST['users-password']);
      $insert = "INSERT INTO users_tb (username, password) VALUES ('" . $username . "', '" . $password . "')";
      $resultInsert = mysqli_query(connect_db(), $insert);
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
