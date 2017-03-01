<?php
  include('partials/header_admin.php');
  require('partials/connection.php');
?>

<div class="row">

    <button class="upload-open">Upload a new testimonial <i class="fa fa-upload" aria-hidden="true"></i></button>

  <div class="testimonials-upload-div">
    <form action="process/testimonials_admin_upload.php" method="post" enctype="multipart/form-data">
      <i class="fa-close fa fa-times-circle" aria-hidden="true"></i>
      <p class="form-warning"></p>
      <label for="test-name">Name</label>
      <input type="text" name="test-name" id="test-name" maxlength="50" required /><br>
      <label for="test-area">Area</label>
      <input type="text" name="test-area" id="test-area" maxlength="50" required/><br>
      <label for="test-text">Testimonial</label>
      <textarea name="test-text" id="test-text" maxlength="220" required></textarea><br>
      <input type="file" name="imageToUpload"/><br>
      <input type="submit" name="test-submit" value="Upload Image">
    </form>
  </div>

  <div class="update-div">
    <form action="process/testimonials_admin_update.php" method="post">
      <i class="fa-close fa fa-times-circle" aria-hidden="true"></i>
      <p class="form-warning"></p>
      <label for="up-test-name">Name</label>
      <input type="text" name="up-test-name" id="up-test-name" maxlength="50" required /><br>
      <label for="up-test-area">Area</label>
      <input type="text" name="up-test-area" id="up-test-area" maxlength="50" required/><br>
      <label id="translate-label" for="up-test-text">Testimonial</label>
      <textarea name="up-test-text" id="up-test-text" maxlength="220" required></textarea><br>
      <input type="text" name="up-test-id" id="up-test-id" maxlength="2" readonly /><br>
      <input type="submit" name="up-test-submit" value="Update Post" id="up-test-submit">
    </form>
  </div>


<?php
    if( connect_db() ) {
      $query = "SELECT * FROM testimonials_tb";
      $queryResult = mysqli_query(connect_db(), $query);
      $numOfRows = mysqli_num_rows($queryResult);
      if( $numOfRows > 0 ) {
        echo "<table class='testimonials-form-table'>";
        echo "<tr><th>ID</th><th>Name</th><th>Area</th><th>Testimonials</th><th>Image</th><th>Delete</th><th>Update</th></tr>";
        while($row = mysqli_fetch_assoc($queryResult)) {
          $id = $row['id'];
          $testimonial = $row['testimonial'];
          $name = $row['name'];
          $area = $row['area'];
          $image = $row['image'];
          echo "<tr>";
          echo "<td>" . $id . "</td>";
          echo "<td>" . $name . "</td>";
          echo "<td>" . $area . "</td>";
          echo "<td>" . $testimonial . "</td>";
          if($image === '') {
            echo "<td><img class='admin-blog-img' src='images/testimonials_avatar.png' alt='client image'</td>";
          } else {
            echo "<td><img class='admin-blog-img' src='images/" . $image . "' alt='client image'</td>";
          }
          echo "<td><a href='process/testimonials_admin_delete.php?delete=" . $id . "&image=images/" . $image . "'><i class='fa fa-trash' aria-hidden='true'></i></a></td>";
          echo "<td><a class='up-test-btn'><i class='fa fa-pencil' aria-hidden='true'></i>
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
