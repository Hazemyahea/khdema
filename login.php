<?php include 'public/header.php'; ?>

<?php
$errorarray  = array();

if (isset($_POST['submit'])) {
  $email = $_POST['email'];
  $email = strip_tags($email);
  $password = $_POST['password'];
  $password = md5($password);

  $query = mysqli_query($con,"SELECT * FROM users WHERE email = '$email' AND password = '$password'");
  if (mysqli_num_rows($query) > 0) {
      echo "<div class='alert alert-success'> Login success </div>";
      $query = mysqli_query($con,"SELECT * FROM users WHERE email = '$email' AND password = '$password'");
      $user = mysqli_fetch_array($query);
    $username_db = $user['username'];
    $role_db = $user['role'];
    //$email = $user['email'];
      $_SESSION["username"] = $username_db;
      $_SESSION['role'] = $role_db;



      // جعل العضو ONline
      $online_query = mysqli_query($con,"UPDATE users SET online = 'yes' WHERE email = '$email'");
      header('Location: index.php');
      exit();

  }else {

    array_push($errorarray,"<div class='alert alert-danger text-center'> هناك خطأ فى البريد او الباسورد </div>");
  }
}



 ?>



<div class="container">
  <form class="login" action="" method="post">
    <h1 class="text-center">مرحباً بك فى خدماتك</h1>
    <?php if (in_array("<div class='alert alert-danger text-center'> هناك خطأ فى البريد او الباسورد </div>",$errorarray) ) {
      echo "<div class='alert alert-danger text-center'> هناك خطأ فى البريد او الباسورد </div>" ;
    } ?>
    <div class="form-group">

        <input class="form-control" type="email" name="email" value="" placeholder="ادخل بريدك الالكترونى" autocomplete="off">
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






<?php include 'public/footer.php'; ?>
