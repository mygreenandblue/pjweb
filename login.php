<?php
session_start();
require_once("functions/functions.php");
require_once("classes/dbConnection.php");

$username = getValue("username", "POST", "str", "");
$password = getValue("password", "POST", "str", "");
$action = getValue("action", "POST", "str", "");


var_dump($_POST);
var_dump($username);
var_dump($password);

$errorMsg = "";
if ($action == "login") {
    if ($username == "") {
        $errorMsg .= "&bull; Vui lòng nhập User Name.<br />";
    }
    if ($password == "") {
        $errorMsg .= "&bull; Vui lòng nhập Password.<br />";
    }

    // Nếu có đủ dữ liệu POST thì xác thực
    if ($errorMsg == "") {

        $dbConnection = new dbConnection();
        $conn = $dbConnection->getConnection();
        
        $sql_query = "select count(*) as cntUser from users where email='".$username."' and password='".$password."'";
        $result = mysqli_query($conn,$sql_query);
        $row = mysqli_fetch_array($result);

        $count = $row['cntUser'];

        if($count > 0){
            // Success
            // echo "Success";
            $_SESSION["logged"] = 1;
            header("Location: index.php");
        } else {
            $errorMsg .= "&bull; Thông tin đăng nhập không đúng. Vui lòng thử lại.<br />";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/mystyle.css">
    <link rel="stylesheet" href="./css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">
    <title>Login</title>
</head>

<body>
    <!--Header-->
    <div>
        <div class="topbar">
            <div class="container">
                <div class="row">
                    <div id="logo-theme" class="logo">
                        <a href="/index.html">
                            <img src="./images/store_1619521261_277.png" class="img-responsive" alt="LOGO">
                        </a>
                    </div>
                    <div class="topbar-list">
                        <div class="search">
                            <form action="/search" method="get" style="padding-top: 2px;">
                                <div id="search" class="box-search input-group">
                                    <input type="text" name="q" placeholder="Tìm kiếm ...." class="form-control"
                                        id="edit_search">
                                    <span class="input-group-btn">
                                        <button type="button" class="button-search" onClick="" value="find"><i
                                                class="fa fa-search"></i></button>
                                    </span>
                                </div>
                            </form>
                        </div>
                        <div>
                            <ul class="login links">
                                <li>
                                    <a rel="nofollow" href="/Login.html"><i class="fa-fw fa fa-user"></i> Đăng
                                        nhập</a>
                                </li>
                                <li>
                                    <a rel="nofollow" href="/register.html"><i class="fa-fw fa fa-unlock-alt"></i>
                                        Đăng ký </a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="shopping-cart pull-right">
                        <a href="./cart.html">
                            <div id="cart" class="clearfix">
                                <i class="fa fa-shopping-cart icon-cart"></i>
                                <div class="cart-inner media-body">
                                    <span id="cart-total"
                                        style="color: #fff; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;">0<span
                                            class="text"
                                            style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; font-size: 13px; color: #fff;">
                                            Sản Phẩm</span></span>
                                </div>
                            </div>
                        </a>
                    </div>

                </div>
            </div>
        </div>

        <div class="header">
            <div class="container">
                <div class="menu">
                    <ul id="mainmenu">
                        <li><a>THÚ BÔNG & MÔ HÌNH</a></li>
                        <li><a>THỜI TRANG</a></li>
                        <li><a>VĂN PHÒNG PHẨM</a></li>
                        <li><a>ĐỒ CÔNG NGHỆ</a></li>
                        <li><a>ĐỒ DÙNG TIỆN ÍCH</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!--main-->

    <div class="form">
        <!--login-->
        <div class="frame">
            <div class="Login">
                <a href="Login.html">
                    <p class="pr1">ĐĂNG NHẬP</p>
                </a>
            </div>
            <!--register-->
            <div class="register">
                <a href="register.html">
                    <p class="pr2"> ĐĂNG KÝ</p>
                </a>
            </div>
        </div>

        <!--form-->
        <!-- <div class="ip1">
            <input class="in4" type="email" autofocus placeholder="Nhập emai hoặc tên đăng nhập">
            <input class="in4" type="password" placeholder="Mật khẩu">
            <div id="login">
                <a id="a" href="/index.html">
                    <div style="width: 100%; height: 100%; text-align: center;color: white;
                    position: relative;top: 12px; right: 12px; font-size: 12px;">ĐĂNG NHẬP</div>
                </a>
            </div>
            <a href="#">
                <p style="text-align:center;margin-top: 12px;
                color: black;font-size: 15px; ">Quên mật khẩu?</p>
            </a>
            <p style="text-align:center;margin-top: 10px;
            color: grey;font-size: 15px;">Hoặc đăng nhập với</p>

            <div style="width: 100%; height: 100%; background-color: #2e4b88; margin-top: 12px;">
                <a href="https://facebook.com">
                    <p style="text-align:center;color: white;
                    font-size: 13px;position: relative; top: 10px;"><i class="fa-brands fa-facebook-f"></i> Đăng nhập
                        bằng facebook</p>
                </a>
            </div>

            <div style="width: 100%; height: 100%; background-color: orangered; margin-top: 12px;">
                <a href="https://accounts.google.com/">
                    <p style="text-align:center;color: white;
                    font-size: 13px;position: relative; top: 10px;"><i class="fa-brands fa-google"></i> Đăng nhập bằng
                        google</p>
                </a>
            </div>
        </div> -->

        <form class="ip1" action="" method="post">
            <div class="form-group">
                <input class="in4" type="email" autofocus placeholder="Nhập emai hoặc tên đăng nhập" name="username" id="username" class="form-control" value="<?= $username ?>">
            </div>
            
            <div class="form-group">
                <input class="in4" type="password" placeholder="Nhập mật khẩu" name="password" id="password" class="form-control" value="<?= $password ?>">
            </div>

            <div class="form-group">
                <input type="hidden" id="action" name="action" value="login" />
                <input id="login" type="submit" name="submit" class="btn btn-info btn-md" value="Đăng nhập">
            </div>

            <a href="#">
                <p style="text-align:center;margin-top: 12px;
                color: black;font-size: 15px; ">Quên mật khẩu?</p>
            </a>

            <p style="text-align:center;margin-top: 10px;
            color: grey;font-size: 15px;">Hoặc đăng nhập với</p>

            <div style="width: 100%; height: 100%; background-color: #2e4b88; margin-top: 12px;">
                <a href="https://facebook.com">
                    <p style="text-align:center;color: white;
                    font-size: 13px;position: relative; top: 10px;"><i class="fa-brands fa-facebook-f"></i> Đăng nhập
                        bằng facebook</p>
                </a>
            </div>

            <div style="width: 100%; height: 100%; background-color: orangered; margin-top: 12px;">
                <a href="https://accounts.google.com/">
                    <p style="text-align:center;color: white;
                    font-size: 13px;position: relative; top: 10px;"><i class="fa-brands fa-google"></i> Đăng nhập bằng
                        google</p>
                </a>
            </div>
        </form>

    </div>
    <!--End main-->
    <div style="width: 40%; height: 100px;margin: auto; border-bottom: 1px black solid;"></div>
    <!--Footer-->
    <footer id="footer" class="tp_footer">
        <div class="footer-top" id="pavo-footer-top">
            <div class="slider">
                <div class="slides">
                    <div id="">
                        <img class="img-responsive cloudzoom-gallery-active" alt="im Baymax"
                            src="images/image_1506226079_276.jpg">
                    </div>
                    <div id="">
                        <img class="img-responsive cloudzoom-gallery-active" alt="Vô Diện"
                            src="/images/image_1506225691_236.jpg">
                    </div>
                    <div id="">
                        <img class="img-responsive cloudzoom-gallery-active" alt="Siêu Anh Hùng"
                            src="/images/image_1506225434_491.jpg">
                    </div>
                    <div id="">
                        <img class="img-responsive cloudzoom-gallery-active" alt="Minion"
                            src="/images/image_1506226445_537.jpg">
                    </div>
                    <div id="">
                        <img class="img-responsive cloudzoom-gallery-active" alt="Chi's Sweet Home"
                            src="/images/image_1506225068_289.jpg">
                    </div>
                    <div id="">
                        <img class="img-responsive cloudzoom-gallery-active" alt="Pusheen"
                            src="/images/image_1506224780_44.jpg">
                    </div>
                    <div id="">
                        <img class="img-responsive cloudzoom-gallery-active" alt="Hello Kitty"
                            src="/images/image_1506224150_188.jpg">
                    </div>
                    <div id="">
                        <img class="img-responsive cloudzoom-gallery-active" alt="Anime"
                            src="/images/image_1506224538_262.jpg">
                    </div>
                    <div id="">
                        <img class="img-responsive cloudzoom-gallery-active" alt="Pokemon"
                            src="/images/image_1506226379_179.jpg">
                    </div>
                    <div id="">
                        <img class="img-responsive cloudzoom-gallery-active" alt="Kumamon"
                            src="/images/image_1506223637_288.jpg">
                    </div>
                    <div id="">
                        <img class="img-responsive cloudzoom-gallery-active" alt="Rilakkuma"
                            src="/images/image_1506223487_889.jpg">
                    </div>
                    <div id="">
                        <img class="img-responsive cloudzoom-gallery-active" alt="Kanahei"
                            src="/images/image_1506223124_406.jpg">
                    </div>
                    <div id="">
                        <img class="img-responsive cloudzoom-gallery-active" alt="Kakaotalk"
                            src="images/image_1506223487_889.jpg">
                    </div>
                    <div id="">
                        <img class="img-responsive cloudzoom-gallery-active" alt="LINE: Brown &amp; Cony"
                            src="/images/image_1506222682_414.jpg">
                    </div>
                    <div id="">
                        <img class="img-responsive cloudzoom-gallery-active" alt="Doraemon"
                            src="/images/image_1506222395_70.jpg">
                    </div>
                    <div id="">
                        <img class="img-responsive cloudzoom-gallery-active" alt="Lilo &amp; Stitch"
                            src="images/image_1506222243_276.jpg">
                    </div>
                    <div id="">
                        <img class="img-responsive cloudzoom-gallery-active" alt="Ghibli"
                            src="/images/image_1439886587_156.gif">
                    </div>
                    <div id="">
                        <img class="img-responsive cloudzoom-gallery-active" alt="We Bare Bear"
                            src="/images/image_1566142941_610.jpg">
                    </div>
                    <div id="">
                        <img class="img-responsive cloudzoom-gallery-active" alt="PUBG"
                            src="/images/image_1566142814_208.jpg">
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-center" id="pavo-footer-center"></div>
        <div class="footer-bottom " id="pavo-footer-bottom">
            <div class="container">
                <div class="container-row">
                    <div class="col-md-5">
                        <div class="listFooter box">
                            <div class="box-heading" style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
                                text-transform: uppercase;
                                position: relative;
                                margin-bottom: 21px;">
                                <h3> LIÊN HỆ</h3>
                            </div>
                            <p><b>HÀ NỘI</b></p>
                            <p>- 90 Xã Đàn, Q. Đống Đa &ensp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<img alt=""
                                    src="https://bucket.nhanh.vn/website/template/250/contentKey/133/mobile.png"
                                    style="width:12px;"> 096.247.1988</p>
                            <p><b>HẢI PHÒNG</b></p>
                            <p>- 233 Lê Lợi, Q. Ngô Quyền &ensp;&emsp;&emsp;&emsp;&emsp;&emsp;<img alt=""
                                    src="https://bucket.nhanh.vn/website/template/250/contentKey/133/mobile.png"
                                    style="width:12px;"> 092.247.1988</p>
                            <p><b>ĐÀ NẴNG</b></p>
                            <p>- 123a Nguyễn Chí Thanh, Q. Hải Châu &emsp;<img alt=""
                                    src="https://bucket.nhanh.vn/website/template/250/contentKey/133/mobile.png"
                                    style="width:12px;"> 082.247.1988</p>
                            <p><b>TP HỒ CHÍ MINH</b></p>
                            <p>- 560 Nguyễn Đình Chiểu, P.4, Q.3 &emsp;&emsp;&emsp;<img alt=""
                                    src="https://bucket.nhanh.vn/website/template/250/contentKey/133/mobile.png"
                                    style="width:12px;"> 090.247.1988</p>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <h3>TIN TỨC</h3>
                        <ul>
                            <li><a class="nav-link" aria-current="page" href="#">
                                    Khuyến mãi
                                </a></li>
                            <li><a class="nav-link" aria-current="page" href="#">
                                    Tuyển dụng
                                </a></li>
                            <li><a class="nav-link" aria-current="page" href="#">Chính sách và Quy định</a></li>
                            <li><a class="nav-link" aria-current="page" href="#">Giới thiệu khách hàng</a></li>
                            <li><a class="nav-link" aria-current="page" href="#">Giới thiệu về Totoro</a></li>
                        </ul>
                    </div>

                    <div class="col-md-3">
                        <h3>SẢN PHẨM NỔI BẬT</h3>
                        <ul>
                            <li><a class="nav-link" aria-current="page" href="#">Sản phẩm mới về</a></li>
                            <li><a class="nav-link" aria-current="page" href="#">Gấu bông nhỏ xinh</a></li>
                            <li><a class="nav-link" aria-current="page" href="#">Tranh tô màu số hóa</a></li>
                            <li><a class="nav-link" aria-current="page" href="#">Đồ chơi xếp hình Lego</a></li>
                            <li><a class="nav-link" aria-current="page" href="#">Đèn ngủ-Đèn decor</a></li>
                            <li><a class="nav-link" aria-current="page" href="#">Bộ đồ liền thân hình thú</a></li>
                        </ul>
                    </div>

                    <div class="col-md-3">
                        <h3>KẾT NỐI VỚI CHÚNG TÔI</h3>
                        <div class="listFooter box">
                            <div style="margin-top: 20px;"><a href="https://facebook.com/totoro1988" target="_blank"
                                    rel="noreferrer noopener"><img alt="Facebook"
                                        src="https://mcdn.nhanh.vn/website/template/250/contentKey/320/f.png"
                                        style="width:40px;"></a> &nbsp;<a href="https://instagram.com/totoro.vn"
                                    target="_blank" rel="noreferrer noopener"><img alt="Instagram"
                                        src="https://mcdn.nhanh.vn/website/template/250/contentKey/320/i.png"
                                        style="width:40px;"></a> &nbsp; <a
                                    href="/gian-hang-totoro-tren-cac-trang-tmdt-shopee-tiki-n86058.html" target="_blank"
                                    rel="noreferrer noopener"> <img alt=""
                                        src="https://mcdn.nhanh.vn/website/template/250/contentKey/7429/shopee.png"
                                        style="width:40px;"></a></div>
                            <div><br></div>
                            <p><b>CÔNG TY TNHH TOTORO VIỆT NAM</b><br>
                                Mã số doanh nghiệp: 0108628706<br>
                                Địa chỉ: 90 Xã Đàn, Q Đống Đa, Tp. Hà Nội</p>
                            <div><a href="https://online.gov.vn/HomePage/CustomWebsiteDisplay.aspx?DocId=53561"
                                    target="_blank" rel="noreferrer noopener"><img alt=""
                                        src="https://mcdn.nhanh.vn/website/template/250/contentKey/3710/nkvhgbocongthuong.png"
                                        style="height:68px;"><img alt="" src="https://mcdn.nhanh.vn/boCongThuong.png"
                                        style="height:68px;"></a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
    </footer>
</body>

</html>