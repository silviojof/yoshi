<?php
  session_start();
  if( isset($_POST['logOut']) OR !isset($_SESSION['uname']) ) {
    session_unset();
    session_destroy();
    echo "outtttttttttttttttttttt";
    header("location:admin_login.php");
  }
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Yoshi Hair - Admin</title>
  <link rel="stylesheet" href="css/styles.css">
  <script src="https://use.fontawesome.com/983b5cbe32.js"></script>
</head>
<body>
  <header class="expanded row admin-header-box">
    <div class="row">
      <p class="header-user">Welcome, <?php echo $_SESSION['uname']; ?></p>
      <div class="admin-header clearfix">
        <a href="blog_admin.php"><img src="images/color-logo.svg" alt="Main Logo"></a>
      </div>
      <nav class="admin-nav clearfix">
        <ul class="clearfix">
          <li><a href="blog_admin.php">Blog</a></li>
          <li><a href="gallery_admin.php">Gallery</a></li>
          <li><a href="testimonials_admin.php">Testimonials</a></li>
          <li><a href="users_admin.php">Users</a></li>
          <li>
            <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
              <button name="logOut">Log Out</button>
            </form>
          </li>
        </ul>
      </nav>
    </div>
  </header>
