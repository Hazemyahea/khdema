<?php include 'public/header.php'; ?>

<?php include 'public/nav.php'; ?>

<!-- Start Header -->

<div class=" order container">
  <form class="" action="" method="post">
    <?php
    $errorarray = array();
      if (isset($_POST['submit'])) {
          $server = $_POST['server'];
          $server = strip_tags($server);
          $fullname = $_POST['fullname'];
          $fullname = strip_tags($fullname);
          $adress = $_POST['adress'];
          $adress = strip_tags($adress);
          $phone = $_POST['phone'];
          $phone = strip_tags($phone);
          $email= $_POST['email'];
          $email = strip_tags($email);

          // التاكد من أختيار الخدمة
          if (empty($server )) {
            echo "<div class='alert alert-danger text-center'>برجاء اختيار الخدمة</div>";
              array_push($errorarray,'Servies Empty');
          // التاكد من كتابة العنوان
          }elseif (empty($adress)) {
            echo "<div class='alert alert-danger text-center'>برجاء كتابةالعنوان</div>";
            array_push($errorarray,'adrees Empty');
            // التاكد من كتابة رقم الهاتف
          }elseif (empty($phone)) {
            echo "<div class='alert alert-danger text-center'>برجاء كتابة رقم الهاتف</div>";
            array_push($errorarray,'phone Empty');
            // الـتاكد من كتابة البريد الالكترونى
          }elseif (empty($email)) {
              echo "<div class='alert alert-danger text-center'>برجاء كتابة بريدك الالكترونى</div>";
              array_push($errorarray,'email Empty');
          }

          if (empty($errorarray)) {
            $query = "INSERT INTO worker (server,fullname,adress,email) VALUES('$server','$fullname','$adress','$email')";
            $result = mysqli_query($con,$query);
            if (!$result) {
                die("Sorry");
            }else {
              echo "<div class='alert alert-success text-center'> تم إرسال الطلب بنجاح </div>";
            }
          }


      }



     ?>
    <div class="form-group">
      <h5>الاسم بالكامل</h5>
        <input class="form-control" type="text" name="fullname" value="" placeholder="برجاء كتابة الاسم بالتفصيل">
    </div>
    <div class="form-group">
      <h5>نوع الخدمة</h5>
      <select id="service" class="form-control" name="server">
        <option value="">اختيار الخدمة</option>
      <?php
        $query = "SELECT * FROM orders";
        $result = mysqli_query($con,$query);
        if (!$result) {
              die('Error');
        }
        while ($row = mysqli_fetch_array($result)) {
            $price = $row['price'];
            $title = $row['title'];
            $id_ser = $row['id'];

             ?>


              <option value="<?php echo $title; ?>"><?php echo $title; ?></option>

        <?php } ?>
</select>
    </div>
    <div class="form-group">
      <h5>العنوان</h5>
        <input class="form-control" type="text" name="adress" value="" placeholder="برجاء كتابة العنوان بالتفصيل">
    </div>
    <div class="form-group">
      <h5>رقم الهاتف</h5>
        <input class="form-control" type="number" name="phone" value="" placeholder="برجاء كتابة رقم الهاتف للتواصل">
    </div>
    <div class="form-group">
      <h5>الإيميل الشخصى</h5>
        <input class="form-control" type="email" name="email" value="" placeholder="برجاء كتابة البريد الالكترونى للتواصل">
    </div>

  <div class="form-group">
      <input class="form-control btn btn-danger" type="submit" name="submit" value="الانضمام لفنين خدماتك">
  </div>
</form>

</div>






<!-- Start Footer -->
<footer>
<div class="container">
  <div class="row">
    <div class="col-lg-4">
        <h3>عن خدماتك</h3>
        <p class="lead">توفير خدمات منزلية فى جميع المجالات بأسعار مناسبة وبدقة</p>
    </div>
    <div class="col-lg-4">

      <ul>
        <li> <a href="index.php">الرئيسية</a></li>
          <li> <a href="servises.php">الخدمات</a></li>
            <li> <a href="how.php">كيفية الاستخدام</a></li>
              <li> <a href="about.php">عن الشركة</a></li>
                <li> <a href="join.php">الانضمام للفنين</a></li>
      </ul>
    </div>
    <div class="col-lg-4">
      <h4>للإشتراك فى النشرة البريدية : </h4>
      <form class="" action="index.html" method="post">
        <div class="form-group">
          <input class="form-control" type="email" name="" value="" placeholder="أكتب الإيميل">
        </div>
        <div class="form-group">
          <input class="form-control" type="submit" value="تأكيد"placeholder="">
        </div>
      </form>
    </div>
  </div>
</div>


</footer>


<!-- End Footer -->



<?php include 'public/footer.php'; ?>
