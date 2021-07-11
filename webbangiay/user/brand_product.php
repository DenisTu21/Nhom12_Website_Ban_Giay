<?php
$sql         = "select  * from sanpham";
$productList = executeResult($sql);
$limit = 9;
$page  = 1;
if (isset($_GET['page'])) {
    $page = $_GET['page'];
}
if ($page <= 0) {
    $page = 1;
}
$firstIndex = ($page - 1) * $limit;

$sql         = 'select sanpham.id, sanpham.TenSanPham, sanpham.gia, sanpham.Hinhanh, sanpham.updated_at, danhmucsanpham.name category_name from sanpham left join danhmucsanpham on sanpham.ID_DanhMuc = danhmucsanpham.id ' . ' limit ' . $firstIndex . ', ' . $limit;
$productList = executeResult($sql);

$sql         = 'select count(id) as total from sanpham where 1 ';
$countResult = executeSingleResult($sql);
$number      = 0;
if ($countResult != null) {
    $count  = $countResult['total'];
    $number = ceil($count / $limit);
}
$index = 1;
foreach ($productList as $item) {

    echo '<div class="col-12 col-md-6 col-lg-4">
        <div class="product card ">
        <div class=" banner-fill text-center">
        <a href="detailproduct.php?id=' . $item['id'] . '">
            <img class="card-img-top" src="' . $item['Hinhanh'] . '" class="img-fluid">
        </a>
        </div>
            <div class="card-body">
                <h4 class="card-title"><a href="detailproduct.php?id=' . $item['id'] . '">' . $item['TenSanPham'] . '</a></h4>
                <div class="row">
                    <div class="col">
                        <p class="btn btn-block">'.number_format($item['gia'], 0, ',', '.').'đ</p>
                    </div>
                    <div class="col">
                    <ul style="display: flex; margin-left: 65px; " class="rating">
                    <li>
                        <i  class="fas fa-star fa-sm text-primary"></i>
                    </li>
                    <li>
                        <i class="fas fa-star fa-sm text-primary"></i>
                    </li>
                    <li>
                        <i class="fas fa-star fa-sm text-primary"></i>
                    </li>
                    <li>
                        <i class="fas fa-star fa-sm text-primary"></i>
                    </li>
                    <li>
                        <i class="far fa-star fa-sm text-primary"></i>
                    </li>
                </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>';
}
?>

<style>

.fa-star:before{
    color: orange !important;
}
</style>
