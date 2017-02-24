<?php include 'partials/header_admin.php'; ?>

    <div class="row">
      <button class="upload-blog">Upload a new blog post <i class="fa fa-upload" aria-hidden="true"></i></button>
    </div>

    <div class="upload-div">
      <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data">
        <i class="fa-close fa fa-times-circle" aria-hidden="true"></i>
        <p class="form-warning"></p>
        <label for="blog-title">Title</label>
        <input type="text" name="blog-title" id="blog-title" maxlength="30" required /><br>
        <label for="blog-author">Author</label>
        <input type="text" name="blog-author" id="blog-author" maxlength="30" required/><br>
        <label for="blog-alt">Alt</label>
        <input type="text" name="blog-alt" id="blog-alt" maxlength="100" required/><br>
        <label for="blog-desc">Description</label>
        <textarea name="blog-desc" id="blog-desc" maxlength="140" required></textarea><br>
        <input type="file" name="imageToUpload" size="120" required ><br>
  			<input type="submit" name="blog-submit" value="Upload Post">
      </form>
    </div>

    <div class="update-div">
      <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
        <i class="fa-close fa fa-times-circle" aria-hidden="true"></i>
        <p class="form-warning"></p>
        <label for="up-blog-title">Title</label>
        <input type="text" name="up-blog-title" id="up-blog-title" maxlength="30" required /><br>
        <label for="up-blog-author">Author</label>
        <input type="text" name="up-blog-author" id="up-blog-author" maxlength="30" required/><br>
        <label id="translate-label" for="up-blog-desc">Description</label>
        <textarea name="up-blog-desc" id="up-blog-desc" maxlength="100" required></textarea><br>
        <label for="up-blog-id">ID</label>
        <input type="text" name="up-blog-id" id="up-blog-id" maxlength="2" readonly /><br>
  			<input type="submit" name="up-blog-submit" value="Upload Post" id="up-blog-submit">
      </form>
    </div>

    <div class="row">
    <?php
      require('partials/connection.php');



      if(connect_db()) {

        if(!empty($_GET['delete'])) {
          $idToDel = $_GET['delete'];
          $fileToDel = $_GET['image'];
          $delQuery= "DELETE FROM blog_tb WHERE id='" . $idToDel . "'";
          $delResult = mysqli_query(connect_db(), $delQuery);
          unlink($fileToDel);
          header('location:blog_admin.php');
        }

        $query = "SELECT * FROM blog_tb";
        $queryResult = mysqli_query(connect_db(), $query);
        $numOfRows = mysqli_num_rows($queryResult);
        if( $numOfRows > 0 ) {
          echo "<table class='blog-form-table'>";
          echo "<tr><th>ID</th><th>Title</th><th>Author</th><th>Date</th><th>Description</th><th>Image</th><th>Delete</th><th>Update</th></tr>";
          while($row = mysqli_fetch_assoc($queryResult)) {
            $id = $row['id'];
            $description = $row['description'];
            $title = $row['title'];
            $date = $row['date'];
            $author = $row['author'];
            $image = $row['image'];
            $alt = $row['alt'];
            echo "<tr>";
            echo "<td>" . $id . "</td>";
            echo "<td>" . $title . "</td>";
            echo "<td>" . $author . "</td>";
            echo "<td>" . $date . "</td>";
            echo "<td>" . $description . "</td>";
            echo "<td><img class='admin-blog-img' src='images/" . $image . "' alt='" . $alt . "'</td>";
            echo "<td><a href='blog_admin.php?delete=" . $id . "&image=images/" . $image . "'><i class='fa fa-trash' aria-hidden='true'></i></a></td>";
            echo "<td><a class='del-btn'><i class='fa fa-pencil' aria-hidden='true'></i>
</a></td>";
            echo "</tr>";


          }
          echo "</table>";
        } else {
          echo "<p>There is no data to display</p>";
        }

        if(isset($_POST['up-blog-submit'])) {
          $title = mysqli_real_escape_string(connect_db(), $_POST['up-blog-title']);
          $description = mysqli_real_escape_string(connect_db(), $_POST['up-blog-desc']);
          $author = mysqli_real_escape_string(connect_db(), $_POST['up-blog-author']);
          $id = intval($_POST['up-blog-id']);

          $upQuery = "UPDATE blog_tb SET description='" . $description . "', title='" . $title . "', author='" . $author . "' WHERE id=" . $id;
          $UplResult = mysqli_query(connect_db(), $upQuery);
          // header('location:blog_admin.php');
          echo "<script type='text/javascript'>
window.onload = function () { top.location.href = 'blog_admin.php'; };
</script>";
        }

        if(isset($_POST['blog-submit'])) {

          // Create variables - Blog Information
          $title = mysqli_real_escape_string(connect_db(), $_POST['blog-title']);
          $description = mysqli_real_escape_string(connect_db(), $_POST['blog-desc']);
          $author = mysqli_real_escape_string(connect_db(), $_POST['blog-author']);
          $alt = mysqli_real_escape_string(connect_db(), $_POST['blog-alt']);
          $date = date("M d, Y");

          // Create variables - Image Information
          $folder = "images/";
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
              // header('location:blog_admin.php');
              echo "<script type='text/javascript'>
    window.onload = function () { top.location.href = 'blog_admin.php'; };
    </script>";
            } else {
              echo "<p>We could not upload your blog post. Try again later!</p>";
            }
          } else {
            echo "<p>There was a problem with you post. Try another file</p>";
          }
        }
      } else {
        die( connect_db() );
      }

      // Close Connection
      close_db(connect_db());



     ?>

   </div>
<?php include('partials/footer_admin.php') ?>
