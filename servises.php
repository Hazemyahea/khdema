<?php include 'public/header.php'; ?>

<?php include 'public/nav.php'; ?>

<div class="container">
  <div class="row">

    <?php
        $query = "SELECT * FROM orders";
        $result = mysqli_query($con,$query);
        while ($row = mysqli_fetch_array($result)) {
                $title = $row['title'];
                $image = $row['image'];
                $description = $row['description'];
                $price = $row['price']; ?>

                <div class="col-lg-4 ser">
                  <h3><?php echo $title ; ?></h3>

                    <img   src="images/<?php echo $image; ?>" alt="">


                <p><?php echo $description; ?></p>
                  <span class="price"><?php echo $price;?> جنية </span>
                </div>

      <?php  }?>
  </div>
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
