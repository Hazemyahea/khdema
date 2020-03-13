<?php include 'includes/header.php'; ?>

<?php include 'includes/nav.php'; ?>
<div class="container">
  <table  class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">نوع الطلب</th>
      <th scope="col">رقم الهاتف</th>
      <th scope="col">الايميل</th>
      <th scope="col">العنوان</th>
        <th scope="col">وقت الطلب</th>
      <th scope="col">حذف</th>
    </tr>
  </thead>
  <tbody>
    <?php
      $query = "SELECT * FROM service";
      $result = mysqli_query($con,$query);
      if (!$result) {
        die('Error');
      }

      while ($row = mysqli_fetch_array($result)) {
              $id = $row['id'];
              $service = $row['service'];
              $adress = $row['adress'];
              $phone = $row['phone'];
              $email = $row['email'];
              $time = $row['time'];?>
              <tr>
                <td scope="row"><?php echo $id ?></td>
                <td><?php echo $service?></td>
                <td><?php echo $phone ?></td>
                <td><?php echo $email ?></td>
                <td><?php echo $adress ?></th>
                <td ><?php echo $time?></td>
                <td> <a href="orders.php?order=<?php echo $id ?>">حذف</a></td>
              </tr>
  <?php    } ?>
  </tbody>
</table>

<?php
// حذف الفنى

if (isset($_GET['order'])) {
  $id = $_GET['order'];
  $delete_query = mysqli_query($con,"DELETE FROM service WHERE id = '$id'");
  header('Location: orders.php');
}


 ?>
</div>








<?php include 'includes/footer.php'; ?>
