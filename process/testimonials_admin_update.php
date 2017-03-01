<?php
  require('../partials/connection.php');



  if(connect_db()) {

    if(isset($_POST['up-test-submit'])) {
      $name = mysqli_real_escape_string(connect_db(), $_POST['up-test-name']);
      $area = mysqli_real_escape_string(connect_db(), $_POST['up-test-area']);
      $testimonial = mysqli_real_escape_string(connect_db(), $_POST['up-test-text']);
      $id = intval($_POST['up-test-id']);

      $upQuery = "UPDATE testimonials_tb SET testimonial='" . $testimonial . "', name='" . $name . "', area='" . $area . "' WHERE id=" . $id;
      $UplResult = mysqli_query(connect_db(), $upQuery);
      header('location:../testimonials_admin.php');
    } else {
      header('location:../index.php');
    }


  } else {
    die( connect_db() );
  }

  // Close Connection
  close_db(connect_db());



 ?>
