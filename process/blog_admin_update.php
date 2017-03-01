<?php
  require('../partials/connection.php');



  if(connect_db()) {

    if(isset($_POST['up-blog-submit'])) {
      $title = mysqli_real_escape_string(connect_db(), $_POST['up-blog-title']);
      $description = mysqli_real_escape_string(connect_db(), $_POST['up-blog-desc']);
      $author = mysqli_real_escape_string(connect_db(), $_POST['up-blog-author']);
      $id = intval($_POST['up-blog-id']);

      $upQuery = "UPDATE blog_tb SET description='" . $description . "', title='" . $title . "', author='" . $author . "' WHERE id=" . $id;
      $UplResult = mysqli_query(connect_db(), $upQuery);
      header('location:../blog_admin.php');
    } else {
      header('location:../blog_admin.php');
    }


  } else {
    die( connect_db() );
  }

  // Close Connection
  close_db(connect_db());



 ?>
