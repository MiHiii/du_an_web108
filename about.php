<?php
define("MASV", 'PH48277');
define("HOTEN", "Phạm Minh Hiếu");
$diaChi = "Viet Nam, Thai Binh";
$chuyenNganh = "Web Developer - Full-Stack";
$major = <<<Chuoi
 <p>Web Developer - Full-Stack</p>
 <p>FPT Polytechnic - Hà Nội</p>
Chuoi;
$soBuoiVang = 0;
$diem = 10;
$ca = 3;
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./asset/css/about.css">
  <title><?php echo HOTEN; ?></title>
</head>

<body>
  <main>
    <div class="container">
      <div class="header">
        <a href="index.php">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
            <path fill="currentColor" d="M192 256A112 112 0 1 0 80 144a111.94 111.94 0 0 0 112 112zm76.8 32h-8.3a157.53 157.53 0 0 1-68.5 16c-24.6 0-47.6-6-68.5-16h-8.3A115.23 115.23 0 0 0 0 403.2V432a48 48 0 0 0 48 48h288a48 48 0 0 0 48-48v-28.8A115.23 115.23 0 0 0 268.8 288z"></path>
          </svg>
          <span>Home</span>
        </a>
        <div>
          <img src="https://zpsocial-f51-org.zadn.vn/c5da0bb40ae6ebb8b2f7.jpg" alt="">
        </div>
        <a href="#">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
            <path fill="currentColor" d="M208 352c-41 0-79.1-9.3-111.3-25-21.8 12.7-52.1 25-88.7 25a7.83 7.83 0 0 1-7.3-4.8 8 8 0 0 1 1.5-8.7c.3-.3 22.4-24.3 35.8-54.5-23.9-26.1-38-57.7-38-92C0 103.6 93.1 32 208 32s208 71.6 208 160-93.1 160-208 160z"></path>
          </svg>
          <span>Message</span>
        </a>
      </div>
      <div class="content">
        <div class="content__name">
          <?php
          echo HOTEN;
          ?>
        </div>
        <div class="content__id">
          <?php
          echo MASV;
          ?>
        </div>
        <div class="content__address">
          <?php
          echo $diaChi;
          ?>
        </div>
        <div class="content__major">
          <?php
          echo $major
          ?>
        </div>
        <ul class="content__list">
          <li><span><?php echo $soBuoiVang; ?></span>Vắng</li>
          <li><span><?php echo $diem; ?></span>Điểm</li>
          <li><span><?php echo $ca; ?></span>Ca</li>
        </ul>
        <div class="content__button">
          <span>Show more</span>
        </div>
      </div>
  </main>

</body>

</html>