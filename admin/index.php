<?php include 'includes/header.php'; ?>

<?php include 'includes/nav.php'; ?>

<?php

if (isset($_SESSION["role"])) {
  if ($_SESSION["role"] == "مستخدم") {
      header('Location: ../index.php');
  }
}

if (!isset($_SESSION["role"])) {
  header('Location: ../index.php');
}


 ?>
<div class="container">
  <div class="row  text-center">
    <div class="members col-lg-3">
      <?php
          $query = "SELECT * FROM users";
          $result = mysqli_query($con,$query);
          $count = mysqli_num_rows($result); ?>
          <h4>المستخدمين</h4>
          <i class="fas fa-user icon fa-4x"></i>
          <h5><?php echo $count; ?></h5>
    </div>
    <div class="servises col-lg-3">
      <?php
          $query = "SELECT * FROM service";
          $result = mysqli_query($con,$query);
          $count = mysqli_num_rows($result); ?>
      <h4>الطلبات</h4>
      <i class="fas fa-street-view fa-4x"></i>
      <h5><?php echo $count; ?></h5>
    </div>
    <div class="orders col-lg-3">
      <?php
          $query = "SELECT * FROM orders";
          $result = mysqli_query($con,$query);
          $count = mysqli_num_rows($result); ?>
      <h4>الخدمات</h4>
      <i class="fas fa-concierge-bell fa-4x"></i>
      <h5><?php echo $count; ?></h5>
    </div>
    <div class="worker col-lg-3">
      <?php
          $query = "SELECT * FROM worker";
          $result = mysqli_query($con,$query);
          $count = mysqli_num_rows($result); ?>
      <h4>الفنين</h4>
      <i class="fas fa-users-cog fa-4x"></i>
      <h5><?php echo $count; ?></h5>
    </div>
  </div>
</div>

<?php include 'includes/footer.php'; ?>
