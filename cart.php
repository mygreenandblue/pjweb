<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>totoro1998</title>
	<link rel="stylesheet" href="./css/cart.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

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

	<!--Container-->
	<div class="cart-container">
		<div class="column-labels">
			<label class="product-image">Ảnh</label>
			<label class="product-details">Sản phẩm</label>
			<label class="product-price">Đơn giá</label>
			<label class="product-quantity">Số lượng</label>
			<label class="product-removal">Xóa</label>
			<label class="product-line-price">Tổng tiền</label>
		</div>

		<div class="product-cart">
			<div class="product-image">
				<img src="https://mcdn.nhanh.vn/store/7239/ps/20220306/14_800x800.jpg">
			</div>
			<div class="product-details">
				<div class="product-title">Dingo Dog Bones</div>
				<p class="product-description">The best dog bones of all time. Holy crap. Your dog will be begging
					for
					these
					things! I got curious once and ate one myself. I'm a fan.</p>
			</div>
			<div class="product-price">12.99</div>
			<div class="product-quantity">
				<input type="number" value="2" min="1">
			</div>
			<div class="product-removal">
				<button class="remove-product">
					Xóa
				</button>
			</div>
			<div class="product-line-price">25.98</div>
		</div>

		<div class="product-cart">
			<div class="product-image">
				<img src="https://mcdn.nhanh.vn/store/7239/ps/20220306/15_800x798.jpg">
			</div>
			<div class="product-details">
				<div class="product-title">Nutro™ Adult Lamb and Rice Dog Food</div>
				<p class="product-description">Who doesn't like lamb and rice? We've all hit the halal cart at 3am
					while
					quasi-blackout after a night of binge drinking in Manhattan. Now it's your dog's turn!</p>
			</div>
			<div class="product-price">45.99</div>
			<div class="product-quantity">
				<input type="number" value="1" min="1">
			</div>
			<div class="product-removal">
				<button class="remove-product">
					Xóa
				</button>
			</div>
			<div class="product-line-price">45.99</div>
		</div>

		<div class="totals">
			<div class="totals-item">
				<label>Tổng tiền</label>
				<div class="totals-value" id="cart-subtotal">71.97</div>
			</div>
			<div class="totals-item">
				<label>Thuế (5%)</label>
				<div class="totals-value" id="cart-tax">3.60</div>
			</div>
			<div class="totals-item">
				<label>Phí vận chuyển</label>
				<div class="totals-value" id="cart-shipping">15.00</div>
			</div>
			<div class="totals-item totals-item-total">
				<label>Tổng thanh toán</label>
				<div class="totals-value" id="cart-totals">90.57</div>
			</div>
		</div>
		<script src="./js/cart.js"></script>
		<button class="checkout">Đặt hàng</button>

	</div>
	<!--footer-->
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