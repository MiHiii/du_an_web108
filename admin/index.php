<style>
  a {
    text-decoration: none;
    color: black;
  }

  table {
    border-collapse: collapse;
    width: 100%;
    text-align: center;
    border-radius: 10px;
  }

  tr:first-child {
    background-color: yellow;
  }

  tr:nth-child(even) {
    background-color: #f2f2f2;
  }

  th, td {
    border: 1px solid black;
    padding: 5px;
  }
  .pagination {
    display: flex;
    justify-content: center;
    gap: 20px;
    margin-top: 50px;
  }

  .pagination a {
    font-size: 30px;
  }

  .pagination a:hover {
    color: blue;
    text-decoration: underline;
  }
</style>

<?php

require_once '../api/productData.php';
//Hàm phân trang
function paginateArray($dataArray, $itemsPerPage, $currentPage) {
  $offset = ($currentPage - 1) * $itemsPerPage;
  return array_slice($dataArray, $offset, $itemsPerPage);
}
$currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
$itemsPerPage = 5; // Số lượng mục trên mỗi trang
//Array phân trang
$currentPageData = paginateArray($products, $itemsPerPage, $currentPage);

//
echo '<h1 style="color: red;">Admin</h1>';
echo '<h2 style="text-align: center; margin: 20px 0;">Quản lý sản phẩm</h2>';

echo '<table border="2">
<tr>
  <th>ID</th>
  <th>Name</th>
  <th>Ảnh</th>
  <th>Số lượng kho</th>
  <th>Price</th>
  <th>Giảm giá</th>
  <th>Thể loại</th>
  <th>Mô tả</th>
</tr>';
foreach($currentPageData as $product) {
  echo '<tr>
  <td>' .$product['id'] .'</td>
  <td>' .$product['tenSanPham'] .'</td>
  <td>' ."<img style='width: 100px;' src='".$product['src']."'alt=''>".'</td>
  <td>' .$product['soLuongKho'] .'</td>
  <td>' .$product['giaBan'] .'</td>
  <td>' .$product['giamGia'] .'</td>
  <td>' .$product['theLoai'] .'</td>
  <td>' .$product['desc'] .'</td>
  </tr>';
}

// Hiển thị phân trang
$totalItems = count($products);
//Chia tổng số sản phẩm cho số sản phẩm trên mỗi trang làm tròn lên
$totalPages = ceil($totalItems / $itemsPerPage);

echo '</table>';
echo '<div class="pagination">';
for ($page = 1; $page <= $totalPages; $page++) {
    echo "<a href='?page=$page'>$page</a> ";
}
echo '</div>';
?>



