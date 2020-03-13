<?php include 'includes/header.php'; ?>

<?php include 'includes/nav.php'; ?>
<div class="container">
  <table  class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">اسم المستخدم</th>
      <th scope="col">الاسم بالكامل</th>
      <th scope="col">البريد الالكترونى</th>
      <th scope="col">العضوية</th>
      <th scope="col">متواجد الان</th>
      <th scope="col">حذف</th>
    </tr>
  </thead>
  <tbody>

      <?php
        $query = "SELECT * FROM users";
        $result = mysqli_query($con,$query);
        if (!$result) {
          die ('erro');
        }
        while ($row = mysqli_fetch_assoc($result)) {
          $id = $row['id'];
            $username = $row['username'];
              $fullname = $row['fullname'];
                $email = $row['email'];
                  $role = $row['role'];
                  $online = $row['online'];
                   ?>
                  <tr>
                  <th scope="row"><?php echo $id;  ?></th>
                  <th><?php echo $username;  ?></th>
                  <th><?php echo $fullname ;  ?></th>
                  <th ><?php echo $email;  ?></th>
                  <th ><?php echo $role;  ?></th>
                  <th ><?php echo $online;  ?></th>
                  <td> <a href="members.php?delete=<?php echo $id; ?>">حذف</a> </td>
                    </tr>
    <?php    }
        ?>

<?php
// حذف الخدمه
if (isset($_GET['delete'])) {
  $id = $_GET['delete'];
  $delete_query = mysqli_query($con,"DELETE FROM users WHERE id = $id");
  header("Location: members.php");
}



?>



  </tbody>
</table>
</div>








<?php include 'includes/footer.php'; ?>
