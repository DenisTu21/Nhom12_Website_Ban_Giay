<?php
require_once('../DB/dbhelper.php');
require_once('../common/utility.php');

require_once('../api/checkout-form.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<?php require_once "./main/main.php";
	?>
</head>

<body>
	<?php require_once "./main/header.php";

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
		//[2, 5, 6] => 2,5,6

		$sql = "select * from sanpham where id in ($idList)";
		$cartList = executeResult($sql);
	} else {
		$cartList = [];
	}
	?>

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
						<h1 class="mb-3">Thanh Toán</h1>

					</div>
				</div>
			</div>
		</div>
		<!-- Background image -->
	</section>

	<!-- body -->
	<form method="post" class="mb-5">
		<div style="margin-top:50px;" class="container">
			<div class="row">
				<div class="col-lg-6">
					<h5 class="col-lg-12 mb-3">THÔNG TIN ĐẶT HÀNG</h5>
					<div class="form-group ">
						<label for="usr">Họ tên <span style="color: red !important;" class="required">*</span></label>

						<input class="form-control" id="usr" name="fullname" type="text" required="true" />
					</div>
					<div class="form-group ">
						<label for="address">Địa chỉ <span style="color: red !important;" class="required">*</span></label>

						<input class="form-control" id="address" name="address" type="text" required="true" />

					</div>
					<div class="form-group ">
						<label for="phone_number">Số điện thoại <span style="color: red !important;" class="required">*</span></label>

						<input class="form-control " id="phone_number" name="phone_number" type="text" pattern="[0]{1}[0-9]{9}" required="true" />

					</div>
					<div class="form-group ">
						<label for="email">Email <span style="color: red !important;" class="required">*</span></label>

						<input class="form-control" id="email" name="email" type="email" required="true" />

					</div>
					<div class="form-group mt-5">
						<hr>
						<hr>
						<label for="note">Ghi chú thêm về đơn hàng</label>

						<textarea rows="3" class="form-control " id="note" name="note" placeholder="....................."></textarea>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="mb-3">
						<div class="pt-4 wish-list">

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
                                                <input style="max-width: 35px; max-height:25px; text-align: center;" type="text" readonly value = "' . $num . '">
                                            </div>
                                            
										</div>
										<div class="d-flex justify-content-between align-items-center">
                                            <div>
												<p class="mb-0 text-muted"><span>Price: ' . number_format($item['gia'], 0, ',', '.') . 'đ x ' . $num . '</span></p class="mb-0">
                                            </div>
                                            <div>
 
                                                <div>
                                                <p class="mb-0"><span><strong id="summary"> Total:   ' . number_format($num * $item['gia'], 0, ',', '.') . 'đ</strong></span></p class="mb-0">
                                                </div>
                                            </div>  
                                        </div>
                                    </div>
                                </div>
                            </div>';
							}
							?>
						</div>
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
							</div>
						</div>
						<button class="btn btn-primary btn-block">Hoàn thành</button>
					</div>
				</div>
			</div>
		</div>
	</form>


	<?php require_once "./main/footer.php"; ?>
</body>

</html>