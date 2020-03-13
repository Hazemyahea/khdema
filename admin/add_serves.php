<?php include 'includes/header.php'; ?>

<?php include 'includes/nav.php'; ?>
<div class="container">
<form class="add" action="" method="post" enctype="multipart/form-data">
  <?php
  $errorarray =  array();
      if (isset($_POST['submit'])) {
        $title = $_POST['title'];
        $title = strip_tags($title);

        $description = $_POST['description'];
        $description = strip_tags($description);

        $price = $_POST['price'];
        $price = strip_tags($price);

        $image = $_FILES['image']['name'];
        $image_temp  = $_FILES['image']['tmp_name'];
        move_uploaded_file($image_temp, 'C:\xampp\htdocs\khedma\images/' . $image);

        if (empty($title) || empty($description) || empty($price)) {
          echo "<div class='alert alert-danger text-center'> برجاء عدم ترك اى بيانات فارغة  </div>";
          array_push($errorarray,'البيانات فارغه');
        }

        if (empty($errorarray)) {
          $query = "INSERT INTO orders(title,image,description,price) VALUES ('$title','$image','$description','$price')";
        $result = mysqli_query($con,$query);
        if (!$result) {
          die('Sorry');
        }else {
          echo "<div class='alert alert-success text-center'> تم اضافة الخدمة بنجاح </div>";
        }
        }
      }
   ?>
  <div class="form-group">
    <input class="form-control" type="text" name="title" value="" placeholder="نوع الخدمة">
  </div>

  <div class="form-group">
    <input class="form-control" type="text" name="description" value="" placeholder="وصف الخدمة">
  </div>
  <div class="form-group">
    <input class="form-control" type="text" name="price" value="" placeholder="سعر الخدمة">
  </div>
  <h4  style="float:right">صورة الخدمة</h4><br><br>
  <div class="form-group" style="float:right">
    <input type="file" name="image" >
  </div>
  <div class="form-group">
    <input class="form-control btn btn-primary" type="submit" name="submit" value="اضافة الخدمة" >
  </div>
</form>
</div>








<?php include 'includes/footer.php'; ?>
