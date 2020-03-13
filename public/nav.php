<nav class="navbar navbar-expand-lg   nav">
  <a class="navbar-brand" href="index.php">خدماتك</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">الرئيسية <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="about.php">عن الشركة</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="servises.php">الخدمات</a>
      </li>

      <?php if (isset($_SESSION["username"])): ?>
        <li class="nav-item">
          <a class="nav-link" >مرحباً بك <?php echo $_SESSION["username"]; ?></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php">تسجيل الخروج</a>
        </li>
        <li class="nav-item">
      <?php endif; ?>
      <?php if (isset($_SESSION["role"])): ?>
      <?php if ($_SESSION["role"] == "مدير"): ?>
        <li class="nav-item">
          <a class="nav-link" href="admin/index.php">لوحة الادارة</a>
        </li>
      <?php endif; ?>
      <?php endif; ?>

      <?php if (!isset($_SESSION["username"])): ?>
        <li class="nav-item">
          <a class="nav-link" href="login.php"> تسجيل الدخول </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="regesiter.php"> تسجيل حساب جديد </a>
        </li>
      <?php endif; ?>





    </ul>
  </div>
</nav>
