<?php include 'partials/header.php'; ?>


<div class="pages-header">
  <div class="pages-header-img">
    <img src="images/header-gallery.jpg" />
  </div>
  <div class="pages-header-hero clearfix">
    <h1 class="pages-header-title gallery">gallery</h1>
    <div class="pages-header-box clearfix">
      <h2>A glimpse at<br> <span class="text-alternative">what we do</span></h2>
    </div>
  </div>
</div>


<section class="gallery-box">
  <div class="row expanded small-collapse">
    
    <?php
      require('partials/connection.php');

      if(connect_db()) {
        $query = "SELECT * FROM gallery_tb";
        $queryResult = mysqli_query(connect_db(), $query);
        $numOfRows = mysqli_num_rows($queryResult);
        if( $numOfRows > 0 ) {
          while($row = mysqli_fetch_assoc($queryResult)) {
            $id = $row['id'];
            $image = $row['image'];
            $stylist = $row['stylist'];

            echo "<div class='small-12 medium-4 large-3 column gallery-img'>";
            echo "<div class='shadow'>";
            echo "<p><span class='text-alternative'>Stylist </span><br><span>" . $stylist . "</span></p>";
            echo "</div>";
            echo "<img src='images/" . $image . "' class='thumbnail' alt='Gallery Image'>";
            echo "</div>";

          }
        } else {
          echo "<p>There is no data to display</p>";
        }
      } else {
        die( connect_db() );
      }
      close_db(connect_db());

     ?>
  </div>
</section>

<?php include 'partials/cta.php'; ?>

<?php include 'partials/footer.php'; ?>
