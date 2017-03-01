<?php include 'partials/header.php'; ?>
<div class="pages-header">
  <div class="pages-header-img">
    <img src="images/header-testimonials.jpg" />
  </div>
  <div class="pages-header-hero clearfix">
    <h1 class="pages-header-title testimonials">testi<br>monials</h1>
    <div class="pages-header-box clearfix">
      <h2>What our clients<br> <span class="text-alternative">have to say</span></h2>
    </div>
  </div>
</div>
<section class="testimonials-box clearfix">

  <?php
    require('partials/connection.php');

    if( connect_db() ) {
      $query = "SELECT * FROM testimonials_tb";
      $queryResult = mysqli_query(connect_db(), $query);
      $numOfRows = mysqli_num_rows($queryResult);
      if( $numOfRows > 0 ) {
        while($row = mysqli_fetch_assoc($queryResult)) {
          $id = $row['id'];
          $testimonial = $row['testimonial'];
          $name = $row['name'];
          $area = $row['area'];
          $image = $row['image'];
          echo "<div class='testimonials-row'>";
          echo "<div class='testimonials-img'>";
          if($image === '') {
            echo "<img src='images/testimonials_avatar.png' alt='' />";
          } else {
            echo "<img src='images/" . $image . "' alt='' />";
          }
          echo "</div>";
          echo "<div class='testimonials-content'>";
          echo "<i class='fa fa-quote-left show-for-medium' aria-hidden='true'></i>";
          echo "<div class='testimonials-text'>";
          echo "<p>" . $testimonial . "</p>";
          echo "<p class='testimonials-footer'><strong>" . $name . "</strong> | <em>" . $area . "</em></p>";
          echo "</div>";
          echo "</div>";
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
</section>

<?php include 'partials/cta.php'; ?>
<?php include 'partials/footer.php'; ?>
