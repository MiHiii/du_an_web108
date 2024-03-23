<?php
require './api/productData.php';
//Hàm phân trang
function paginateArray($dataArray, $itemsPerPage, $currentPage) {
  $offset = ($currentPage - 1) * $itemsPerPage;
  return array_slice($dataArray, $offset, $itemsPerPage);
}
$currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
$itemsPerPage = 6; // Số lượng mục trên mỗi trang
//Array đã phân trang
$currentPageData = paginateArray($products, $itemsPerPage, $currentPage);
$totalItems = count($products);
//Chia tổng số sản phẩm cho số sản phẩm trên mỗi trang làm tròn lên
$totalPages = ceil($totalItems / $itemsPerPage);



//Sản phẩm hot
usort($products, function($a, $b) {
  return $a['giamGia'] < $b['giamGia'];
});
$hotProducts = array_slice($products, 0, 4);



?>
<main>
      <div class="container">
        <div class="banner">
          <img
            src="https://cdn.tgdd.vn/Files/2021/08/01/1372170/dong-hanh-mua-dich-tro-gia-het-minh-giam-ngay-5.png"
            alt=""
          />
        </div>
        <h1 class="heading">KHUYẾN MÃI HOT NHẤT</h1>
        <div class="item-hot">
            <?php foreach($hotProducts as $product): ?>
              <div class="item">
              <h3 class="item-header">
                <a href=""><?php echo$product['tenSanPham'];?></a>
              </h3>
              <div class="img-item">
                <a href=""
                  ><img
                    src="<?php echo $product['src'];?>"
                    alt=""
                /></a>
              </div>
              <p class="item--old__price"><?php echo number_format($product['giaBan'],0,',', '.'); ?>đ</p>
              <div class="item--new__price">
                <span><?php echo number_format($product['giaBan']-($product['giaBan']*$product['giamGia']), 0,',', '.'); ?></span
                ><span style="text-decoration: underline">đ</span>
              </div>
            </div>
            <?php endforeach; ?>
        </div>
        <h1 class="heading">SẢN PHẨM MỚI</h1>
        <div class="content">
          <div class="sidebar">
            <form id="sortForm" action="process.php" method="get">
              <label for="sort">Sắp xếp theo:</label>
              <select name="sort" id="sort" onchange="this.form.submit()">
              <option value="" selected disabled hidden>Giá từ cao đến thấp</option>
                  <option value="desc">Giá từ cao đến thấp</option>
                  <option value="asc">Giá từ thấp đến cao</option>
                  <option value="nameAZ">Sắp xếp từ A đến Z</option>
                  <option value="nameZA">Sắp xếp từ Z đến A</option>
              </select>
            </form>
          </div>
          <div class="items">
            <div class="item-rows">
              <?php foreach ($currentPageData as $product): ?>
                <div class="item">
                  <h3 class="item-header">
                    <a href=""><?php echo $product['tenSanPham']; ?></a>
                  </h3>
                  <div class="img-item">
                    <a href=""><img src="<?php echo $product['src']; ?>" alt="" /></a>
                  </div>
                  <p class="item--old__price"><?php echo number_format($product['giaBan'],0,',', '.'); ?>đ</p>
                  <div class="item--new__price">
                    <span><?php echo number_format($product['giaBan']-($product['giaBan']*$product['giamGia']), 0,',', '.'); ?></span
                    ><span style="text-decoration: underline">đ</span>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>
          </div>
        </div>
        <div class="pagination">
        <?php 
        for ($page = 1; $page <= $totalPages; $page++) {
          echo "<a href='?page=$page'>$page</a> ";
        }
        ?>
        </div>
      </div>
    </main>