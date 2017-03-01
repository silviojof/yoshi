<?php
  include('partials/header_admin.php');
  require('partials/connection.php');
?>

<div class="row">
    <button class="upload-open">Upload a new image <i class="fa fa-upload" aria-hidden="true"></i></button>
    <div class="gallery-upload-div">
      <form action="process/gallery_admin_upload.php" method="post" enctype="multipart/form-data">
        <i class="fa-close fa fa-times-circle" aria-hidden="true"></i>
        <p class="form-warning"></p>
        <label for="gallery-name">Stylist</label>
        <input type="text" name="gallery-name" id="gallery-name" maxlength="50" required /><br>
        <input type="file" name="imageToUpload" required/><br>
        <input type="submit" name="gallery-submit" value="Upload Image">
      </form>
    </div>

    <div class="update-div">
      <form action="process/gallery_admin_update.php" method="post">
        <i class="fa-close fa fa-times-circle" aria-hidden="true"></i>
        <p class="form-warning"></p>
        <label for="up-gallery-name">Stylist</label>
        <input type="text" name="up-gallery-name" id="up-gallery-name" maxlength="50" required /><br>
        <input type="text" name="up-test-id" id="up-test-id" maxlength="2" readonly /><br>
        <input type="submit" name="up-gallery-submit" value="Update Stylist" id="up-gallery-submit">
      </form>
    </div>


<?php
    if( connect_db() ) {
      $query = "SELECT * FROM gallery_tb";
      $queryResult = mysqli_query(connect_db(), $query);
      $numOfRows = mysqli_num_rows($queryResult);
      if( $numOfRows > 0 ) {
        echo "<table class='gallery-form-table'>";
        echo "<tr><th>ID</th><th>Stylist</th><th>Image</th><th>Delete</th><th>Update</th></tr>";
        while($row = mysqli_fetch_assoc($queryResult)) {
          $id = $row['id'];
          $image = $row['image'];
          $stylist = $row['stylist'];
          echo "<tr>";
          echo "<td>" . $id . "</td>";
          echo "<td>" . $stylist . "</td>";
          echo "<td><img class='admin-gallery-img' src='images/" . $image . "' alt='gallery image'</td>";
          echo "<td><a href='process/gallery_admin_delete.php?delete=" . $id . "&image=images/" . $image . "'><i class='fa fa-trash' aria-hidden='true'></i></a></td>";
          echo "<td><a class='up-gal-btn'><i class='fa fa-pencil' aria-hidden='true'></i>
</a></td>";
          echo "</tr>";


        }
        echo "</table>";
      } else {
        echo "<p>There is no data to display</p>";
      }
    } else {
      die( connect_db() );
    }

    // Close Connection
    close_db(connect_db());
 ?>

</div>


 <?php include('partials/footer_admin.php') ?>
