<?php

require './api/productData.php';

include 'src/header.php';
?>

<div class="container">
<?php
$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';

// Lọc sản phẩm theo từ khóa tìm kiếm
$matchedProducts = array();
foreach ($products as $product) {
    // Kiểm tra nếu tên sản phẩm hoặc mô tả sản phẩm chứa từ khóa tìm kiếm
    if (stripos($product['tenSanPham'], $keyword) !== false || stripos($product['desc'], $keyword) !== false || stripos($product['theLoai'], $keyword) !== false) {
        $matchedProducts[] = $product;
    }
}

$countMatchedProduct = count($matchedProducts);

// Hiển thị kết quả tìm kiếm
if (!empty($matchedProducts)) {
    echo "<h2>Kết quả tìm kiếm cho từ khóa '$keyword' có $countMatchedProduct sản phẩm </h2>";
    echo "<div class='item-sort'>";
    foreach ($matchedProducts as $product) :
    echo '<div class="item">
        <h3 class="item-header">
        <a href="">'.$product['tenSanPham'] .'</a>
        </h3>
        <div class="img-item">
        <a href=""><img src="'.$product['src'] .'" alt="" /></a>
        </div>
        <p class="item--old__price">' .number_format($product['giaBan'],0,',', '.') .'đ</p>
        <div class="item--new__price">
        <span>' .number_format($product['giaBan']-($product['giaBan']*$product['giamGia']), 0,',', '.') .'</span
        ><span style="text-decoration: underline">đ</span>
        </div>
    </div>';
    endforeach;
    echo "</div>";
} else {
    echo "Không tìm thấy sản phẩm nào phù hợp với từ khóa '$keyword'";
}
?>
</div>

<?php
include 'src/footer.php';
?>
