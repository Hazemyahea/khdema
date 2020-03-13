<?php include 'includes/header.php'; ?>

<?php include 'includes/nav.php'; ?>
<div class="container">
  <table  class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">الخدمة</th>
      <th scope="col">الاسم بالكامل</th>
      <th scope="col">العنوان</th>
      <th scope="col">رقم الهاتف</th>
      <th scope="col">الايمل</th>
      <th scope="col">حذف</th>
    </tr>
  </thead>
  <tbody>
    <?php
      $query = "SELECT * FROM worker";
      $result = mysqli_query($con,$query);
      if (!$result) {
        die('Error');
      }

      while ($row = mysqli_fetch_array($result)) {
              $id = $row['id'];
              $server = $row['server'];
              $fullname = $row['fullname'];
              $adress = $row['adress'];
              $phone = $row['phone'];
              $email= $row['email'];?>
              <tr>
                <td scope="row"><?php echo $id ?></td>
                <td><?php echo $server?></td>
                <td><?php echo $fullname ?></td>
                <td><?php echo $adress ?></td>
                <td><?php echo $phone ?></th>
                <td ><?php echo $email?></td>
                <td> <a href="worker.php?worker=<?php echo $id ?>">حذف</a></td>
              </tr>
  <?php    } ?>
  </tbody>
</table>
<?php
// حذف الفنى

if (isset($_GET['worker'])) {
  $id = $_GET['worker'];
  $delete_query = mysqli_query($con,"DELETE FROM worker WHERE id = '$id'");
  header('Location: worker.php');
}


 ?>

</div>








<?php include 'includes/footer.php'; ?>
