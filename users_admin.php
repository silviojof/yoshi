<?php
  include('partials/header_admin.php');
  require('partials/connection.php');
?>

<div class="row">

<button class="upload-open">Add User <i class="fa fa-upload" aria-hidden="true"></i></button>

<div class="users-upload-div">
  <form action="process/users_admin_upload.php" method="post">
    <i class="fa-close fa fa-times-circle" aria-hidden="true"></i>
    <p class="form-warning"></p>
    <label for="users-name">User Name</label>
    <input type="text" name="users-name" id="users-name" maxlength="10" required /><br>
    <label for="users-password">Password</label>
    <input type="text" name="users-password" id="users-password" maxlength="6" required/><br>
    <input type="submit" name="users-submit" value="Add User">
  </form>
</div>

<div class="update-div">
  <form action="process/users_admin_update.php" method="post">
    <i class="fa-close fa fa-times-circle" aria-hidden="true"></i>
    <p class="form-warning"></p>
    <label for="up-users-password">New Password</label>
    <input type="text" name="up-users-password" id="up-users-password" maxlength="6" required/><br>
    <input type="text" name="up-users-id" id="up-users-id" maxlength="2" readonly /><br>
    <input type="submit" name="up-users-submit" value="Update Post" id="up-users-submit">
  </form>
</div>



<?php
    if( connect_db() ) {
      $query = "SELECT * FROM users_tb";
      $queryResult = mysqli_query(connect_db(), $query);
      $numOfRows = mysqli_num_rows($queryResult);
      if( $numOfRows > 0 ) {
        echo "<table class='users-form-table'>";
        echo "<tr><th>ID</th><th>User</th><th>Delete</th><th>Reset Password</th></tr>";
        while($row = mysqli_fetch_assoc($queryResult)) {
          $id = $row['id'];
          $username = $row['username'];
          $password = $row['password'];
          echo "<tr>";
          echo "<td>" . $id . "</td>";
          echo "<td>" . $username . "</td>";
          echo "<td><a href='process/users_admin_delete.php?delete=" . $id . "'><i class='fa fa-trash' aria-hidden='true'></i></a></td>";
          echo "<td><a class='up-users-btn'><i class='fa fa-pencil' aria-hidden='true'></i></a></td>";
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
