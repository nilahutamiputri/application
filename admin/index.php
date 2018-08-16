<!DOCTYPE html>
<html>
<head>
    <?php require '../header.php';?>
    <?php
        session_start();
        if (isset($_SESSION['username'])) {
            header("location:dashboard.php");
        }
     ?>
    <link rel="stylesheet" href="../assets/css/login.css">
</head>
<body>
<!--
    you can substitue the span of reauth email for a input with the email and
    include the remember me checkbox
    -->
    <div class="login-page">
  <div class="form">
  <img class="responsive-img" style="border-radius:50%;width: 50%;margin-bottom: 20px;" src="../assets/img/user.png">
    <form class="login-form" action="login.php" method="POST">
      <input type="text" placeholder="username" name="username" />
      <input type="password" placeholder="password" name="password" />
      <button type="submit">login</button>
    </form>
  </div>
</div>
    <?php require '../script.php';?>
    <script type="text/javascript">
        $('.message a').click(function(){
   $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
});
    </script>
</body>
</html>