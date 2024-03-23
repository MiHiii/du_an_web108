<?php
require_once './api/productData.php';
include './src/header.php';

// Nhận tham số từ URL
$sort = $_GET['sort'];

// Hàm so sánh để sắp xếp theo giá từ cao đến thấp
function sortByPriceDesc($a, $b) {
  if (($a['giaBan']-($a['giaBan'] * $a['giamGia'])) == ($b['giaBan']-($b['giaBan'] * $b['giamGia']))) {
      return 0;
  }
  return (($a['giaBan']-($a['giaBan'] * $a['giamGia'])) > ($b['giaBan']-($b['giaBan'] * $b['giamGia']))) ? -1 : 1;
}

// Hàm so sánh để sắp xếp theo giá từ thấp đến cao
function sortByPriceAsc($a, $b) {
  if (($a['giaBan']-($a['giaBan'] * $a['giamGia'])) == ($b['giaBan']-($b['giaBan'] * $b['giamGia']))) {
      return 0;
  }
  return (($a['giaBan']-($a['giaBan'] * $a['giamGia'])) < ($b['giaBan']-($b['giaBan'] * $b['giamGia']))) ? -1 : 1;
}

//Lấy chữ cái đầu tiên của tên sản phẩm


// Hàm so sánh để sắp xếp theo tên sản phẩm từ a đến z
function sortByNameAZ($a, $b) {
  return strcmp($a['tenSanPham'], $b['tenSanPham']);
}

// Hàm so sánh để sắp xếp theo tên sản phẩm từ z đến a
function sortByNameZA($a, $b) {
  return strcmp($b['tenSanPham'], $a['tenSanPham']);
}

// Sắp xếp sản phẩm
if ($sort === 'desc') {
  usort($products, 'sortByPriceDesc');
} elseif ($sort === 'asc') {
  usort($products, 'sortByPriceAsc');
} elseif ($sort === 'nameAZ') {
  usort($products, 'sortByNameAZ');
} elseif ($sort === 'nameZA') {
  usort($products, 'sortByNameZA');
}

?>

<div class="container">
  <div class="content" style="margin-top: 50px;">
    <div class="items">
      <div class="item-sort">
        <?php foreach ($products as $product): ?>
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
    <div class="sidebar" pos>
    <form id="sortForm" style="margin-left: auto;"  action="process.php" method="get">
      <label for="sort">Sắp xếp theo:</label>
      <select name="sort" id="sort" onchange="this.form.submit()">
          <option value="desc">Giá từ cao đến thấp</option>
          <option value="asc">Giá từ thấp đến cao</option>
          <option value="nameAZ">Sắp xếp từ A đến Z</option>
          <option value="nameZA">Sắp xếp từ Z đến A</option>
      </select>
    </form>
  </div>
  </div>
</div>
<script>
    // Lấy giá trị được chọn từ localStorage (hoặc một nơi lưu trữ khác nếu cần)
    var selectedOption = localStorage.getItem('selectedOption');

    // Nếu có một giá trị được chọn từ trước, thiết lập lựa chọn mặc định cho select
    if (selectedOption) {
        document.getElementById('sort').value = selectedOption;
    }

    // Xử lý sự kiện onchange của select
    document.getElementById('sort').onchange = function() {
        // Lưu giá trị được chọn vào localStorage
        localStorage.setItem('selectedOption', this.value);
        // Gửi form khi có thay đổi
        document.getElementById('sortForm').submit();
    };
</script>



<?php
include './src/footer.php';
?>


