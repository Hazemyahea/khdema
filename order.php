<?php include 'public/header.php'; ?>

<?php include 'public/nav.php'; ?>

<!-- Start Header -->

<div class=" order container">
  <form class="" action="" method="post">
       <?php
      if (isset($_POST['submit'])) {
          $service = $_POST['service'];
            $service = strip_tags($service);
          $adress = $_POST['adress'];
          $adress = strip_tags($adress);
          $phone= $_POST['phone'];
          $phone = strip_tags($phone);
          $email = $_POST['email'];
          $email = strip_tags($email);

          if (empty($service) || empty($adress) || empty($phone) || empty($email)) {
              echo "<div class = 'alert alert-danger text-center'> برجاء ملىء جميع البيانات  </div>";
          }else {
            $order_query = mysqli_query($con,"INSERT INTO service (service,adress,phone,email,time) VALUES('$service','$adress','$phone','$email',now())");
            if ($order_query) {
                echo "<div class = 'alert alert-success text-center'> تم تقديم الطلب بنجاح ، سيتم التواصل قريبا معكم </div> ";
            }
          }

      }



     ?>
    <div class="form-group">
      <h5>نوع الخدمة</h5>
      <select id="service" class="form-control" name="service">
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
      <input class="form-control btn btn-success" type="submit" name="submit" value="متابعة الطلب">
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
