<?php include 'includes/header.php'; ?>

<?php include 'includes/nav.php'; ?>
<div class="container">
<form class="add" action="" method="post" enctype="multipart/form-data">
  <?php
  $errorarray = array();
  if (isset($_GET['id'])) {
    $id = $_GET['id'];
      if (isset($_POST['submit'])) {

         $title = $_POST['title'];
          $title = strip_tags($title);

          $description = $_POST['description'];
          $description = strip_tags($description);

          $price = $_POST['price'];
          $price = strip_tags($price);


          if (empty($title) || empty($description) || empty($price)) {
            echo "<div class='alert alert-danger text-center'> برجاء عدم ترك اى بيانات فارغة  </div>";
            array_push($errorarray,'البيانات فارغه');
          }

          if (empty($errorarray)) {
            $query = "UPDATE orders SET title = '$title' ,  description = '$description' , price = '$price' WHERE id = $id ";
            $result = mysqli_query($con,$query);
            if (!$result) {
              die('Sorry');
            }else {
              echo "<div class='alert alert-success text-center'> تم تعديل الخدمة بنجاح </div>";
            }
          }

      }



     $query = "SELECT * FROM orders WHERE id = $id";
     $result = mysqli_query($con,$query);
     if (!$result) {
       die('Error');
     }
     while ($row = mysqli_fetch_array($result)) {
         $id = $row['id'];
             $title = $row['title'];
             $image = $row['image'];
             $description = $row['description'];
             $price = $row['price']; ?>


  <div class="form-group">
    <input class="form-control" type="text" name="title" value="<?php echo  $title; ?>" placeholder="نوع الخدمة">
  </div>

  <div class="form-group">
    <input class="form-control" type="text" name="description" value="<?php echo  $description; ?>" placeholder="وصف الخدمة">
  </div>
  <div class="form-group">
    <input class="form-control" type="text" name="price" value="<?php echo  $price; ?>" placeholder="سعر الخدمة">
  </div>
  <h4  style="float:right">صورة الخدمة</h4><br><br>
  <div class="form-group" style="float:right">
    <img type="text"  width="100"  src="../images/<?php echo  $image; ?>">
  </div>

<?php } ?>
<?php } ?>
  <div class="form-group">
    <input class="form-control btn btn-primary" type="submit" name="submit" value="اضافة الخدمة" >
  </div>

</form>
</div>








<?php include 'includes/footer.php'; ?>
