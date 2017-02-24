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
    <div class="medium-12 large-6 column blog-correction">
      <div class="blog-container">
        <div class="blog-img">
          <img src="images/gallery20.jpg" alt="" />
        </div>
        <div class="blog-text">
          <p class="blog-details"><span>March 01, 2017</span> by <span>MIndy Thomas</span></p>
          <h5>Fringe or no fringe?</h5>
          <p class="blog-bodytext">Nullam nec semper diam. Nunc nulla augue, tempus ut metus quis, commodo tincidunt sem. Sed congue vitae tellus sed pulvinar iaculis ex.</p>
          <a href="https://twitter.com/intent/tweet?button_hashtag=YoshiHairStylist" class="twitter-hashtag-button" data-text="A student project for Vanarts by Silvio Oliveira." data-show-count="false">Tweet #YoshiHairStylist</a><script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
        </div>
      </div>
    </div>
    <div class="medium-12 large-6 column blog-correction">
      <div class="blog-container">
        <div class="blog-img">
          <img src="images/gallery03.jpg" alt="" />
        </div>
        <div class="blog-text">
          <p class="blog-details"><span>Feb 06, 2017</span> by <span>Yoshi Takashima</span></p>
          <h5>Balayage</h5>
          <p class="blog-bodytext">Nullam nec semper diam. Nunc nulla augue, tempus ut metus quis, commodo tincidunt sem. Sed congue vitae tellus sed pulvinar iaculis ex.</p>
          <a href="https://twitter.com/intent/tweet?button_hashtag=YoshiHairStylist" class="twitter-hashtag-button" data-text="A student project for Vanarts by Silvio Oliveira." data-show-count="false">Tweet #YoshiHairStylist</a><script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
        </div>
      </div>
    </div>
    <div class="medium-12 large-6 column blog-correction">
      <div class="blog-container">
        <div class="blog-img">
          <img src="images/gallery24.jpg" alt="" />
        </div>
        <div class="blog-text">
          <p class="blog-details"><span>Feb 01, 2017</span> by <span>Miranda James</span></p>
          <h5>Extensions</h5>
          <p class="blog-bodytext">Nullam nec semper diam. Nunc nulla augue, tempus ut metus quis, commodo tincidunt sem. Sed congue vitae tellus sed pulvinar iaculis ex.</p>
          <a href="https://twitter.com/intent/tweet?button_hashtag=YoshiHairStylist" class="twitter-hashtag-button" data-text="A student project for Vanarts by Silvio Oliveira." data-show-count="false">Tweet #YoshiHairStylist</a><script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
        </div>
      </div>
    </div>
    <div class="medium-12 large-6 column blog-correction">
      <div class="blog-container">
        <div class="blog-img">
          <img src="images/gallery02.jpg" alt="" />
        </div>
        <div class="blog-text">
          <p class="blog-details"><span>Jan 25, 2017</span> by <span>Marion Wattson</span></p>
          <h5>Curls are back</h5>
          <p class="blog-bodytext">Nullam nec semper diam. Nunc nulla augue, tempus ut metus quis, commodo tincidunt sem. Sed congue vitae tellus sed pulvinar iaculis ex.</p>
          <a href="https://twitter.com/intent/tweet?button_hashtag=YoshiHairStylist" class="twitter-hashtag-button" data-text="A student project for Vanarts by Silvio Oliveira." data-show-count="false">Tweet #YoshiHairStylist</a><script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
        </div>
      </div>
    </div>
    <div class="medium-12 large-6 column blog-correction">
      <div class="blog-container">
        <div class="blog-img">
          <img src="images/gallery09.jpg" alt="" />
        </div>
        <div class="blog-text">
          <p class="blog-details"><span>Jan 02, 2017</span> by <span>Tery Young</span></p>
          <h5>What's on in Asia</h5>
          <p class="blog-bodytext">Nullam nec semper diam. Nunc nulla augue, tempus ut metus quis, commodo tincidunt sem. Sed congue vitae tellus sed pulvinar iaculis ex.</p>
          <a href="https://twitter.com/intent/tweet?button_hashtag=YoshiHairStylist" class="twitter-hashtag-button" data-text="A student project for Vanarts by Silvio Oliveira." data-show-count="false">Tweet #YoshiHairStylist</a><script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
        </div>
      </div>
    </div>
    <div class="medium-12 large-6 column blog-correction">
      <div class="blog-container">
        <div class="blog-img">
          <img src="images/gallery14.jpg" alt="" />
        </div>
        <div class="blog-text">
          <p class="blog-details"><span>Dec 16, 2016</span> by <span>Yoshi Takashima</span></p>
          <h5>Styles for Hollidays</h5>
          <p class="blog-bodytext">Nullam nec semper diam. Nunc nulla augue, tempus ut metus quis, commodo tincidunt sem. Sed congue vitae tellus sed pulvinar iaculis ex.</p>
          <a href="https://twitter.com/intent/tweet?button_hashtag=YoshiHairStylist" class="twitter-hashtag-button" data-text="A student project for Vanarts by Silvio Oliveira." data-show-count="false">Tweet #YoshiHairStylist</a><script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
        </div>
      </div>
    </div>
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
