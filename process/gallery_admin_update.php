<?php
  require('../partials/connection.php');



  if(connect_db()) {

    if(isset($_POST['up-gallery-submit'])) {
      $stylist = mysqli_real_escape_string(connect_db(), $_POST['up-gallery-name']);
      $id = intval($_POST['up-test-id']);

      $upQuery = "UPDATE gallery_tb SET stylist='" . $stylist . "' WHERE id=" . $id;
      $UplResult = mysqli_query(connect_db(), $upQuery);
      header('location:../gallery_admin.php');
    } else {
      header('location:../index.php');
    }


  } else {
    die( connect_db() );
  }

  // Close Connection
  close_db(connect_db());



 ?>
