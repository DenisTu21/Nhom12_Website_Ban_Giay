<?php
require_once('../DB/dbhelper.php');
require_once('../common/utility.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once "./main/main.php" ;
    
$cart = [];
if (isset($_COOKIE['cart'])) {
    $json = $_COOKIE['cart'];
    $cart = json_decode($json, true);
}
$idList = [];
foreach ($cart as $item) {
    $idList[] = $item['id'];
}
if (count($idList) > 0) {
    $idList = implode(',', $idList);
    //mảng thành chuỗi
    //[2, 5, 6] => 2,5,6

    $sql = "select * from sanpham where id in ($idList)";
    $cartList = executeResult($sql);
} else {
    $cartList = [];
    echo "
        <script type='text/javascript'> 
            var isCartEmpty = true
        </script>"; 
}
    ?>

</head>

<body>
    <?php require_once "./main/header.php"; ?>
    <section>
        <!-- Background image -->
        <div class="p-5 text-center bg-image" style="
           background-image: url('../public/image/carosel1.jpg');
           height: 150px;
           margin-top: 50px;
         ">
            <div class="mask" style="background-color: rgba(0, 0, 0, 0.6);">
                <div class="d-flex justify-content-center align-items-center h-100">
                    <div class="text-white">
                        <h1 class="mb-3">Shopping Cart</h1>
                    </div>
                </div>
            </div>
        </div>
        <!-- Background image -->
    </section>
    <div style="margin-top:50px;" class="container">
        <!--Section: Block Content-->
        <section>
            <!--Grid row-->
            <div class="row">
                <!--Grid column-->
                <div class="col-lg-6">
                    <!-- Card -->
                    <div class="mb-3">
                        <div class="pt-4 wish-list">
                            <?php
                            $cart = [];
                            if (isset($_COOKIE['cart'])) {
                                $json = $_COOKIE['cart'];
                                $cart = json_decode($json, true);
                            }
                            $count = 0;
                            foreach ($cart as $item) {
                                $count += $item['num'];
                            }
                            ?>

                            <h5 class="mb-4">Giỏ hàng (<span><?= $count ?></span> sản phẩm)</h5>

                            <?php
                            $count = 0;
                            $total = 0;
                            foreach ($cartList as $item) {
                                $num = 0;
                                foreach ($cart as $value) {
                                    if ($value['id'] == $item['id']) {
                                        $num = $value['num'];
                                        break;
                                    }
                                }
                                $total += $num * $item['gia'];
                                echo '
			                <div class="row mb-4">
                                <div class="col-md-5 col-lg-3 col-xl-3">
                                    <div class="view zoom overlay z-depth-1 rounded mb-3 mb-md-0">
                                        <img class="img-fluid w-100" src="' . $item['Hinhanh'] . '" alt="Sample">
                                        <a href="#!">
                                            <div class="mask">
                                                <img class="img-fluid w-100" src="' . $item['Hinhanh'] . '">
                                                <div class="mask rgba-black-slight"></div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-7 col-lg-9 col-xl-9">
                                    <div>
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <h5>' . $item['TenSanPham'] . '</h5>
                                                <p class="mb-3 text-muted text-uppercase small">Shoes</p>
                                                <p class="mb-2 text-muted text-uppercase small">Color: Black</p>
                                                <p class="mb-3 text-muted text-uppercase small">Size: Small</p>
                                            </div>
                                            <div>
                                                <input style="max-width: 40px; max-height:25px; text-align: center;" type="number" id="quantity' . $item['id'] . '"min="1" value = "' . $num . '">
                                            </div>
                                        </div>
                                        <div>
                                                <p class="mb-0 text-muted"><span>Price: ' . number_format($item['gia'], 0, ',', '.') . 'đ</span></p class="mb-0">
                                                </div>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <a style = "color : red!important;" href="#!" onclick="deleteCart(' . $item['id'] . ')" type="button" class="card-link-secondary small text-uppercase mr-3"><i class="fas fa-trash-alt mr-1"></i> Remove item </a>
                
                                            </div>
                                            <div>
                                                <a style = "color : blue!important;" href="#!" onclick="updateCart(' . $item['id'] . ')" type="button" class="card-link-secondary small text-uppercase mr-3"><i class="fas fa-redo-alt"></i> Update item </a>
                                            </div>
                                            <div>
 
                                                <div >
                                                <p class="mb-0"><span><strong id="summary"> Total:   ' . number_format($num * $item['gia'], 0, ',', '.') . 'đ</strong></span></p class="mb-0">
                                                </div>
                                            </div>
                      
                                           
                                        </div>
                                    </div>
                                </div>
                            </div>';
                            }
                            ?>

                            <p class="text-primary mb-0"><i class="fas fa-info-circle mr-1"></i> Đừng trì hoãn việc mua hàng, thêm các mặt hàng vào giỏ hàng của bạn không có nghĩa là đặt trước chúng.</p>

                        </div>
                    </div>

                    <!-- Card -->
                    <div class="mb-3">
                        <div class="pt-4">

                            <h6 class="mb-4">Chúng tôi hỗ trợ</h6>

                            <img class="mr-2" width="45px" src="https://mdbootstrap.com/wp-content/plugins/woocommerce-gateway-stripe/assets/images/visa.svg" alt="Visa">
                            <img class="mr-2" width="45px" src="https://mdbootstrap.com/wp-content/plugins/woocommerce-gateway-stripe/assets/images/amex.svg" alt="American Express">
                            <img class="mr-2" width="45px" src="https://mdbootstrap.com/wp-content/plugins/woocommerce-gateway-stripe/assets/images/mastercard.svg" alt="Mastercard">
                            <img class="mr-2" width="45px" src="https://mdbootstrap.com/wp-content/plugins/woocommerce/includes/gateways/paypal/assets/images/paypal.png" alt="PayPal acceptance mark">
                        </div>
                    </div>
                    <!-- Card -->

                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-lg-6">

                    <!-- Card -->
                    <div class="mb-3">
                        <div class="pt-4">

                            <h5 class="mb-3">Tổng số tiền</h5>

                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                                    Giá trị đơn hàng
                                    <span><?= number_format($total, 0, ',', '.') ?></span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                    Phí ship
                                    <span>0đ</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                                    <div>
                                        <strong>Tổng số tiền</strong>
                                        <strong>
                                            <p class="mb-0">(Bao gồm thuế VAT)</p>
                                        </strong>
                                    </div>
                                    <span><strong><?= number_format($total, 0, ',', '.') ?></strong></span>
                                </li>
                            </ul>
                            <!-- <a href="checkout.php" id="payment">
                                <button type="button" class="btn btn-primary btn-block">THANH TOÁN</button>
                            </a> -->
                            <button type="button" id="btn-payment" class="btn btn-primary btn-block" onclick="goToCheckOut()">THANH TOÁN</button>
                        </div>
                    </div>
                    <!-- Card -->

                    <!-- Card -->
                    <div class="mb-3">
                        <div class="pt-4">

                            <a class="dark-grey-text d-flex justify-content-between" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                Thêm mã khuyến mãi(nếu có)
                                <span><i class="fas fa-chevron-down pt-1"></i></span>
                            </a>

                            <div class="collapse" id="collapseExample">
                                <div class="mt-3">
                                    <div class="md-form md-outline mb-0">
                                        <input type="text" id="discount-code" class="form-control font-weight-light" placeholder="Nhập mã khuyến mãi của bạn">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Card -->

                </div>
                <!--Grid column-->

            </div>
            <!-- Grid row -->

        </section>
        <!--Section: Block Content-->
    </div>
    <div class="container text-center">
        <div class="text-center">
            <h5><strong>CÓ THỂ BẠN QUAN TÂM</strong></h5>
            <hr class="my-3" style="height: 2px; background-color: #cdcdcd;">
        </div>
        <div class="row">
            <?php
            require_once "product.php";
            ?>
        </div>
        <?= paginarion($number, $page, '') ?>
    </div>

    <script type="text/javascript">
        function deleteCart(id) {
            $.post('../api/cookie.php', {
                'action': 'delete',
                'id': id
            }, function(data) {
                location.reload()
            })
        }

        function updateCart(id) {
            $.post('../api/cookie.php', {
                'action': 'update',
                'id': id,
                'num': document.getElementById('quantity' + id).value
            }, function(data) {
                location.reload()
            })
        }

        function goToCheckOut() {
            location.assign('./checkout.php');
        }

        if (isCartEmpty == true) {
            //don't allow click button payment
            document.getElementById('btn-payment').disabled = true;
        }
    </script>

    <?php require_once "./main/footer.php"; ?>
</body>

</html>