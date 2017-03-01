<?php include 'partials/header.php'; ?>

<div class="pages-header">
  <div class="pages-header-img">
    <img src="images/header-blog.jpg" />
  </div>
  <div class="pages-header-hero clearfix">
    <h1 class="pages-header-title blog">our blog</h1>
    <div class="pages-header-box clearfix">
      <h2>Keep yourself<br> <span class="text-alternative">updated</span></h2>
      </ul>
    </div>
  </div>
</div>

<section class="blog-box">
  <div class="row expanded">
    
    <?php
      require('partials/connection.php');

      if(connect_db()) {
        $query = "SELECT * FROM blog_tb";
        $queryResult = mysqli_query(connect_db(), $query);
        $numOfRows = mysqli_num_rows($queryResult);
        if( $numOfRows > 0 ) {
          while($row = mysqli_fetch_assoc($queryResult)) {
            $id = $row['id'];
            $description = $row['description'];
            $title = $row['title'];
            $date = $row['date'];
            $author = $row['author'];
            $image = $row['image'];
            $alt = $row['alt'];
            echo "<div class='medium-12 large-6 column blog-correction'>";
            echo "<div class='blog-container'>";
            echo "<div class='blog-img'>";
            echo "<img src='images/" . $image . "' alt=" . $alt . " />";
            echo "</div>";
            echo "<div class='blog-text'>";
            echo "<p class='blog-details'><span>" . $date . "</span> by <span>" . $author . "</span></p>";
            echo "<h5>" . $title . "</h5>";
            echo "<p class='blog-bodytext'>" . $description . "</p>";
            echo "<a href='https://twitter.com/intent/tweet?button_hashtag=YoshiHairStylist' class='twitter-hashtag-button' data-text='A student project for Vanarts by Silvio Oliveira.' data-show-count='false'>Tweet #YoshiHairStylist</a><script async src='//platform.twitter.com/widgets.js' charset='utf-8'></script>";
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

  </div>
</section>


<?php include 'partials/cta.php'; ?>
<?php include 'partials/footer.php'; ?>
