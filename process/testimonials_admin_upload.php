<?php
  require('../partials/connection.php');

  if(connect_db()) {
    if(isset($_POST['test-submit'])) {

      // Create variables - Blog Information
      $name = mysqli_real_escape_string(connect_db(), $_POST['test-name']);
      $area = mysqli_real_escape_string(connect_db(), $_POST['test-area']);
      $testimonial = mysqli_real_escape_string(connect_db(), $_POST['test-text']);
      if($_FILES['imageToUpload']['error'] == 4) {
        $insert = "INSERT INTO testimonials_tb (testimonial, name, area, image) VALUES ('" . $testimonial . "', '" . $name . "', '" . $area . "', '')";
        $resultInsert = mysqli_query(connect_db(), $insert);
        header('location:../testimonials_admin.php');
      } else {
        $folder = "../images/";
        $fileLoc = $folder . basename($_FILES['imageToUpload']['name']);
        $fileName = basename($_FILES['imageToUpload']['name']);
        $isCorrect = true;
        $extension = pathinfo($fileLoc, PATHINFO_EXTENSION);

        if( !getimagesize($_FILES['imageToUpload']['tmp_name']) ) {
          echo "<p>It is not an image</p>";
          $isCorrect = false;
        }

        if( file_exists($fileLoc) ) {
          echo "<p>This file already exists</p>";
          $isCorrect = false;
        }

        if($extension !== "jpg" && $extension !== "jpeg" && $extension !== "png") {
          echo "<p>This is not the correct extension</p>";
          $isCorrect = false;
        }

        if($_FILES['imageToUpload']['size'] > 1000000) {
          echo "<p>File too big</p>";
          $isCorrect = false;
        }

        if($isCorrect === true) {
          if( move_uploaded_file($_FILES['imageToUpload']['tmp_name'], $fileLoc) ) {
            echo "<p>The testimonial was uploaded</p>";
            $insert = "INSERT INTO testimonials_tb (testimonial, name, area, image) VALUES ('" . $testimonial . "', '" . $name . "', '" . $area . "', '" . $fileName . "')";
            $resultInsert = mysqli_query(connect_db(), $insert);
            header('location:../testimonials_admin.php');
          } else {
            echo "<p>We could not upload your blog testimonial. Try again later!</p>";
          }
        } else {
          echo "<p>There was a problem with you testimonial. Try another file</p>";
        }
      }
      // Create variables - Image Information

    } else {
      echo "<p>Page not permitted. Please return to www.yoshi.com</p>";
      header('location:../index.php');
    }
  } else {
    die( connect_db() );
  }

  // Close Connection
  close_db(connect_db());
?>
