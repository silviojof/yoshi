<?php
  session_start();
  require('partials/connection.php');
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Yoshi Hair - Login</title>
  <link rel="stylesheet" href="css/styles.css">
  <script src="https://use.fontawesome.com/983b5cbe32.js"></script>
</head>
  <body class="login-page">
    <img src="images/color-logo-black.svg" alt="logo" />
    <form class="login-form" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
      <h4>Admin Area</h4>
      <p><i class="fa fa-exclamation-circle" aria-hidden="true"> </i><?php echo loginPage(); ?></p>
      <label for="login-user">Username</label>
      <input type="text" name="login-user" id="login-user" placeholder="Username"><br>
      <label for="login-password">Password</label>
      <input type="password" name="login-password" id="login-password" placeholder="Password"><br>
      <input type="submit" name="login-submit" value="Log In">
    </form>
<?php
  function loginPage() {
    if(connect_db()) {
      if(isset($_POST['login-submit']) AND !empty($_POST['login-user'])) {
        $username = mysqli_real_escape_string(connect_db(), $_POST['login-user']);
        $password = mysqli_real_escape_string(connect_db(), $_POST['login-password']);

        $query = "SELECT * FROM users_tb WHERE password='" . $password . "' AND username='" . $username . "'";
        $queryResult = mysqli_query(connect_db(), $query);
        $rows = mysqli_num_rows($queryResult);

        if($rows == 1) {
          $_SESSION['uname'] = $username;
          header('location:blog_admin.php');
        } else {
          return "Your username or password is wrong.";
        }
      } else {
        return "Please type in your username and password.";
      }
    } else {
      die( connect_db() );
    }

    // Close Connection
    close_db(connect_db());
  }

?>
  </body>
</html>
