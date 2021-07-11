<section>
        <header class="">
            <!-- header-top -->
            <div class="mesthead">
                <div class="container d-flex ">
                    <!-- left -->
                    <div style="color: #fff; font-weight:300" class="login mesthead-item">
                        <!-- <a style="color: #fff; font-weight:300" href="../../../webbangiay/user/login.php">Đăng nhập</a> <span>/</span> <a style="color: #fff; font-weight:300" href="../../../webbangiay/user/register.php">Đăng ký</a> -->
                        <?php 
                            session_start();
                            if(isset($_SESSION["login"]))
                                // echo "<span>" . strtoupper($_SESSION["username"]) ."</span>";
                                echo '
                                <div class="dropdown">
                                <a style="color: #fff; font-weight:300" href="">'. strtoupper($_SESSION["username"]) .'</a>
                                <div class="dropdown-menu">
                                <a class="dropdown-item" href="./changepassword.php">Đổi mật khẩu</a>
                                    <a class="dropdown-item" href="./logout.php">Đăng Xuất</a>
                                </div>
                                </div>
                                ';
                            else
                                echo '
                                <a style="color: #fff; font-weight:300" href="../../../webbangiay/user/login.php">Đăng nhập</a> <span>/</span> <a style="color: #fff; font-weight:300" href="../../../webbangiay/user/register.php">Đăng ký</a>
                            ';
                            ?>
                        </a>
                    </div>
                    <!-- center -->
                    <div class="logo mesthead-item">
                        <a href="../index.php">
                        <img style="width:80px;"
                            src="../public/image/logo.png" alt="">
                    </a>
                    </div>
                    <!-- right -->
                    <div class="right mesthead-item">
                        <ul class="d-flex my-0">
                            <li class="hide-respon dropdown ">
                                <a href="#"><i class="fas fa-search search-item"></i></a>
                                <div class="dropdown-menu dropdown-menu-1">
                                    <form action="" class="d-flex dropdown-item">
                                        <input type="text" width="150px">
                                        <button type="submit"><i class="fas fa-search search-item mx-1"></i></button>
                                    </form>
                                </div>
                            </li>
                            <li class="line hide-respon"></li>
                            <li class="cart">
                            <?php
		  	$cart = [];
			if(isset($_COOKIE['cart'])) {
				$json = $_COOKIE['cart'];
				$cart = json_decode($json, true);
			}
			$count = 0;
			foreach ($cart as $item) {
				$count += $item['num'];
			}
		  ?>
                                <a href="../../../webbangiay/user/cart.php">
                                    <span class="hide-respon">Giỏ hàng</span>
                                    <i class="fas fa-shopping-cart"></i>
                                    <span style="color: red;" class="badge badge-light"><?=$count?></span>

                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- navbar -->
            <div class="navigation">
                <nav class="navbar navbar-expand-lg navbar-dark" id="mainNav">
                    <div class="container nav-responsive">
                        <button style="background-color: red;" class="navbar-toggler bar-respon" type="button"
                            data-toggle="collapse" data-target="#navbarResponsive" aria-expanded="false"
                            aria-controls="collapseExample">
                            <i class="fas fa-bars"></i>
                        </button>
                        <div class="collapse navbar-collapse justify-content-center" id="navbarResponsive">
                            <ul class="navbar-nav ">
                                <!-- search respon -->
                                <li class="search d-none">
                                    <div class="d-flex justify-content-center my-3">
                                        <form action="" class="d-flex " style="width: 202px">
                                            <input type="text" width="150px">
                                            <button type="submit"><i
                                                    class="fas fa-search search-item mx-1"></i></button>
                                        </form>
                                    </div>
                                </li>
                                <!--  -->
                                <li class="nav-item"><a class="nav-link text-uppercase " href="../../webbangiay/user/index.php">Trang chủ</a></li>
                                <li class="nav-item"><a class="nav-link text-uppercase " href="../../webbangiay/user/introduce.php">Giới thiệu</a></li>
                                <!-- nữ -->
                                <li class="nav-item d-flex align-items-center dropdown">
                                    <a class="nav-link text-uppercase " href="../../webbangiay/user/female.php">Nữ </a>

                                    <i style="font-size: 12px; opacity: .5;" class="fas fa-chevron-down"></i>
                                  

                                </li>
                                <!-- nam -->
                                <li class="nav-item d-flex align-items-center dropdown">
                                    <a class="nav-link text-uppercase " href="../../webbangiay/user/male.php">Nam
                                    </a>
                                    <i style="font-size: 12px; opacity: .5;" class="fas fa-chevron-down"></i>
                                </li>
                                <li class="nav-item"><a class="nav-link text-uppercase " href="../../webbangiay/user/news.php">Tin Tức</a></li>
                                <li class="nav-item"><a class="nav-link text-uppercase " href="../../webbangiay/user/contact.php">Liên hệ</a></li>
                                <!-- login respon -->
                                <li class="nav-item d-none login-res"><a class="nav-link text-uppercase " href="#">Đăng
                                        Nhập</a></li>
                                <span class="d-none font-weight-bold connet ml-5 my-3">HOTLINE: 0707 658 572</span>

                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </header>
    </section>





