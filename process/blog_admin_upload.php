<?php
  require('../partials/connection.php');

  if(connect_db()) {
    if(isset($_POST['blog-submit'])) {

      // Create variables - Blog Information
      $title = mysqli_real_escape_string(connect_db(), $_POST['blog-title']);
      $description = mysqli_real_escape_string(connect_db(), $_POST['blog-desc']);
      $author = mysqli_real_escape_string(connect_db(), $_POST['blog-author']);
      $alt = mysqli_real_escape_string(connect_db(), $_POST['blog-alt']);
      $date = date("M d, Y");

      // Create variables - Image Information
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

      if($extension !== "jpg" && $extension !== "jpeg") {
        echo "<p>This is not the correct extension</p>";
        $isCorrect = false;
      }

      if($_FILES['imageToUpload']['size'] > 1000000) {
        echo "<p>File too big</p>";
        $isCorrect = false;
      }

      if($isCorrect === true) {
        if( move_uploaded_file($_FILES['imageToUpload']['tmp_name'], $fileLoc) ) {
          echo "<p>The blog was uploaded</p>";
          $insert = "INSERT INTO blog_tb (description, title, date, author, image, alt) VALUES ('" . $description . "', '" . $title . "', '" . $date . "', '" . $author . "', '" . $fileName .  "', '" . $alt . "')";
          $resultInsert = mysqli_query(connect_db(), $insert);
          header('location:../blog_admin.php');
        } else {
          echo "<p>We could not upload your blog post. Try again later!</p>";
        }
      } else {
        echo "<p>There was a problem with you post. Try another file</p>";
      }
    }else {
      echo "<p>Page not permitted. Please return to www.yoshi.com</p>";
      header('location:../index.php');
    }
  } else {
    die( connect_db() );
  }

  // Close Connection
  close_db(connect_db());
?>
