<!DOCTYPE html>
<?php include 'public/header.php'; ?>


<div class="container">


  <form class="regesiter" action="" method="post">
    <h1>سجل حساب جديد الان للإستمتاع بخدمات الموقع</h1>
    <?php
    $errorarray  = array();
    if (isset($_POST['submit'])) {

      $username = $_POST['username'];
    $username   = strip_tags($username);
      $fullname = $_POST['fullname'];
      $fullname   = strip_tags($fullname);
      $email = $_POST['email'];
      $email   = strip_tags($email);
      $password = $_POST['password'];
      $password = md5($password);
      // التأكد من عدم ترك البيانات فارغه
      if (empty($username) || empty($fullname) || empty($email) || empty($password)) {
        echo "<div class='alert alert-danger text-center'> برجاء ملء جميع البيانات </div>";
        array_push($errorarray,'البيانات فارغه');
      }
      // التاكد من أن اسم المستخدم ليس موجود مسبقاً
      $username_query = mysqli_query($con,"SELECT * FROM users WHERE username = '$username'");
      $count = mysqli_num_rows($username_query);
      if ($count > 0) {
        echo "<div class='alert alert-danger text-center'>أسم المتسخدم موجود بالعفل</div>";
        array_push($errorarray,'اسم المستخدم موجود');
      }
      // التأكد من أن الايميل ليس موجوداً مسبقاً
      $email_query = mysqli_query($con,"SELECT * FROM users WHERE email = '$email'");
      $count = mysqli_num_rows($email_query);
      if ($count > 0) {
        echo "<div class='alert alert-danger text-center'>البريد الالكترونى موجود بالفعل</div>";
        array_push($errorarray,'الايميل موجود');
      }
      if (empty($errorarray)) {
        $insert_query = mysqli_query($con,"INSERT INTO users(username,fullname,email,password) VALUES('$username','$fullname','$email','$password')");
        if ($insert_query) {
          echo "<div class='alert alert-danger text-center'> تم التسجيل بنجاح </div>";
        }

      }



        }








     ?>
    <div class="form-group">
        <input class="form-control" type="name" name="username" value="" placeholder="ادخل اسم المتسخدم" autocomplete="off">
    </div>
    <div class="form-group">
        <input class="form-control" type="name" name="fullname" value="" placeholder="ادخل الاسم بالكامل" autocomplete="off">
    </div>
    <div class="form-group">
        <input class="form-control" type="email" name="email" value="" placeholder="ادخل بريدك الالكترونى" autocomplete="off">
    </div>

    <div class="form-group">
        <input class="form-control" type="password" name="password" value="" placeholder="ادخل الرقم السرى">
    </div>
    <div class="form-group">
        <input class="form-control btn btn-primary" type="submit" name="submit" value="تسجيل حساب جديد">
    </div>
    <div class=" click form-group">
      <a href="login.php">لتسجيل دخولك اضغط هنا</a>
    </div>
  </form>
</div>




<?php include 'public/footer.php'; ?>
