<?php include 'includes/header.php'; ?>

<?php include 'includes/nav.php'; ?>
<div class="container">
  <table  class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">نوع الخدمة</th>
      <th scope="col">صورة الخدمة</th>
      <th scope="col">وصف الخدمة</th>
      <th scope="col">سعر الخدمة</th>
      <th scope="col">حذف</th>
      <th scope="col">تعديل</th>
    </tr>
  </thead>
  <tbody>
    <?php
      $query = "SELECT * FROM orders";
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

              <tr>
                <th scope="row"><?php echo $id  ; ?></th>
                <td><?php echo $title ; ?></td>
                <td> <img width="100" src="../images/<?php echo $image ; ?>" alt=""> </td>
                <td><?php echo $description ; ?></td>
                  <td><?php echo $price ; ?></td>
                <td> <a href="servses.php?id=<?php echo $id  ; ?>">حذف</a> </td>
                <td> <a href="edite_serves.php?id=<?php echo $id; ?>">تعديل</a> </td>
              </tr>
<?php     } ?>

<?php
// حذف الخدمه
if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $delete_query = mysqli_query($con,"DELETE FROM orders WHERE id = $id");
  header("Location: servses.php");
}


 ?>


  </tbody>
</table>
</div>








<?php include 'includes/footer.php'; ?>
