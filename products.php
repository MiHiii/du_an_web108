<?php

include 'api/productData.php';
include 'src/header.php';
// Kiểm tra xem biến $_GET['brand'] đã được định nghĩa và không rỗng
if (isset($_GET['brand']) && !empty($_GET['brand'])) {
  $brand = $_GET['brand'];

  // Hàm lọc sản phẩm theo brand
  function filterByBrand($product)
  {
    global $brand;
    return $product['brand'] == $brand;
  }

  // Lọc sản phẩm theo brand
  $filterProducts = array_filter($products, 'filterByBrand');
} else {
  $filterProducts = $products;
}

?>

<div class="container">
  <div class="content" style="margin-top: 50px;">
    <div class="items">
      <div class="item-sort">
        <?php foreach ($filterProducts as $product) : ?>
          <div class="item">
            <h3 class="item-header">
              <a href=""><?php echo $product['tenSanPham']; ?></a>
            </h3>
            <div class="img-item">
              <a href=""><img src="<?php echo $product['src']; ?>" alt="" /></a>
            </div>
            <p class="item--old__price"><?php echo number_format($product['giaBan'], 0, ',', '.'); ?>đ</p>
            <div class="item--new__price">
              <span><?php echo number_format($product['giaBan'] - ($product['giaBan'] * $product['giamGia']), 0, ',', '.'); ?></span><span style="text-decoration: underline">đ</span>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
    <div class="sidebar" style="position: relative;">
      <div class="category category-right">
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
        <div class="brand-list">
          <h2>Danh mục</h2>
          <ul>
            <li><a href="products.php?brand=Apple">Apple</a></li>
            <li><a href="products.php?brand=Samsung">Samsung</a></li>
            <li><a href="products.php?brand=Oppo">Oppo</a></li>
            <li><a href="products.php?brand=Xiaomi">Xiaomi</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>