<?php include 'partials/header_admin.php'; ?>

    <div class="row">
      <button class="upload-open">Upload a new blog post <i class="fa fa-upload" aria-hidden="true"></i></button>
    </div>

    <div class="upload-div">
      <form action="process/blog_admin_upload.php" method="post" enctype="multipart/form-data">
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
      <form action="process/blog_admin_update.php" method="post">
        <i class="fa-close fa fa-times-circle" aria-hidden="true"></i>
        <p class="form-warning"></p>
        <label for="up-blog-title">Title</label>
        <input type="text" name="up-blog-title" id="up-blog-title" maxlength="30" required /><br>
        <label for="up-blog-author">Author</label>
        <input type="text" name="up-blog-author" id="up-blog-author" maxlength="30" required/><br>
        <label id="translate-label" for="up-blog-desc">Description</label>
        <textarea name="up-blog-desc" id="up-blog-desc" maxlength="100" required></textarea><br>
        <!-- <label for="up-blog-id">ID</label> -->
        <input type="text" name="up-blog-id" id="up-blog-id" maxlength="2" readonly /><br>
  			<input type="submit" name="up-blog-submit" value="Upload Post" id="up-blog-submit">
      </form>
    </div>

    <div class="row">
    <?php
      require('partials/connection.php');



      if(connect_db()) {



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
            echo "<td><a href='process/blog_admin_delete.php?delete=" . $id . "&image=images/" . $image . "'><i class='fa fa-trash' aria-hidden='true'></i></a></td>";
            echo "<td><a class='up-blog-btn'><i class='fa fa-pencil' aria-hidden='true'></i>
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
