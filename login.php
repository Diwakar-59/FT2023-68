<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    <?php
      include 'login.css'; 
    ?>
  </style>
  <script>
    <?php include 'script.php'; ?>
  </script>
  <title>Login</title>

</head>
<body>

  <?php
  // Creating session variables and storing the user credentials.
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $user = $_POST['email'];
      $pass = $_POST['password'];
      $_SESSION['username'] = $user;
      $_SESSION['password'] = $pass;
      if (!isset($_SESSION['password'])) {
        header(('location:login.php'));
      }
      else if (!empty($_SESSION['password'])) {
        header('location:Assignment-4/index.php');
      }
    }
  ?>

  <div class="back">
    <div class="container">
      <div class="contents">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post">
          Username:
          <input type="text" class="box" id="email" name="email" required placeholder="Enter your registered email address" onblur="validateEmail()">
          <span style="color: red;">*</span>
          <br>
          <span id="checkemail" class="checkemail" style="color: red;"></span>
          <br><br>
          Password:
          <input type="password" class="box" id="password" name="password" required password placeholder="Enter a password">
          <span style="color: red;">*</span>
          <br><br>
          <div class="flex">
            <input class="login" type="submit" name="submit" id="submit" value="Login">
          </div>
        </form>
      </div>
    </div>
  </div>
</body>
</html>
