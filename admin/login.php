<?php include 'includes/header.php'; ?>

<div class="container">

  <form class="admin-login"  action="" method="post">
    <?php
      if (isset($_POST['submit'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $query = "SELECT * FROM users WHERE email = '$email'";
            $result = mysqli_query($con,$query);
            if (!$result) {
              die('Sorry');
            }

       $row = mysqli_fetch_array($result);
          $email_db = $row['email'];
          $password_db = $row['password'];
          $username_db = $row['username'];
          $fullname = $row['fullname'];

          if ($email == $email_db || $password == $password_db) {
              $_SESSION["email"] = $email_db;
              $_SESSION["password"] = $password_db;
              $_SESSION["username"] = $username_db;
              $_SESSION["fullname"] = $fullname_db;

              header('Location: index.php');
              exit();

          }else {
            echo "<div class='alert alert-danger text-center'> برجاء التأكد من الايميل او الرقم السرى </div>";
          }

      }


     ?>
    <h1 class="text-center">مرحباً بك فى لوحة الإدارة</h1>
    <div class="form-group">
        <input class="form-control" type="email" name="email" value="" placeholder="ادخل بريدك الالكترونى" autocomplete="on">
    </div>
    <div class="form-group">
        <input class="form-control" type="password" name="password" value="" placeholder="ادخل الرقم السرى">
    </div>
    <div class="form-group">
        <input class="form-control btn btn-success" type="submit" name="submit" value="دخول">
    </div>
    <div class=" click form-group">
      <a href="regesiter.php">إذا لم تكن تمتلك حساب أضغط هنا</a>
    </div>

  </form>
</div>

<?php include 'includes/footer.php'; ?>
