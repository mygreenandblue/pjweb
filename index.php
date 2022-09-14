<?php
// require_once("config.php");
require_once("functions/functions.php");
require_once("classes/dbConnection.php");

$products = json_decode('
[
    {
        "id": 100,
        "name": "Đệm Doraemon",
        "image": {
            "source": "images/6_720x960.jpg",
            "width": 200,
            "height": 200
        },
        "price": "349.00"
    },
    {
        "id": 101,
        "name": "Lego Doraemon",
        "image": {
            "source": "images/9_thumb_400x400.jpg",
            "width": 200,
            "height": 200
        },
        "price": "449.00"
    },
    {
        "id": 102,
        "name": "Đệm Totoro",
        "image": {
            "source": "images/0a_thumb_400x267.jpg",
            "width": 200,
            "height": 200
        },
        "price": "449.00"
    },
    {
        "id": 103,
        "name": "Gấu bông Totoro",
        "image": {
            "source": "images/1_750x750.jpg",
            "width": 157,
            "height": 200
        },
        "price": "549.00"
    },
    {
        "id": 104,
        "name": "Đèn ngủ Totoro",
        "image": {
            "source": "images/14_thumb_400x400.jpg",
            "width": 200,
            "height": 200
        },
        "price": "549.00"
    },
    {
        "id": 105,
        "name": "Sạc dự phòng",
        "image": {
            "source": "images/22_thumb_400x400.jpg",
            "width": 200,
            "height": 200
        },
        "price": "649.00"
    }, 
    {
        "id": 106,
        "name": "Vỏ gối",
        "image": {
            "source": "images/00203_thumb_600x399.jpg",
            "width": 200,
            "height": 200
        },
        "price": "549.00"
    }, 
    {
        "id": 107,
        "name": "Vòng tay may mắn",
        "image": {
            "source": "images/anh3_thumb_400x400.jpg",
            "width": 200,
            "height": 200
        },
        "price": "649.00"
    }, 
    {
        "id": 108,
        "name": "Gấu bông Totoro che mưa",
        "image": {
            "source": "images/camla_740x458.jpg",
            "width": 200,
            "height": 200
        },
        "price": "669.00"
    }, 
    {
        "id": 109,
        "name": "Gấu bông Totoro che mưa",
        "image": {
            "source": "images/camla_740x458.jpg",
            "width": 200,
            "height": 200
        },
        "price": "669.00"
    }, 
    {
        "id": 110,
        "name": "Gấu bông Totoro che mưa",
        "image": {
            "source": "images/camla_740x458.jpg",
            "width": 200,
            "height": 200
        },
        "price": "669.00"
    },  
    {
        "id": 111,
        "name": "Gấu bông Totoro che mưa",
        "image": {
            "source": "images/camla_740x458.jpg",
            "width": 200,
            "height": 200
        },
        "price": "669.00"
    },  
    {
        "id": 112,
        "name": "Gấu bông Totoro che mưa",
        "image": {
            "source": "images/camla_740x458.jpg",
            "width": 200,
            "height": 200
        },
        "price": "669.00"
    }
]');

$colors = [
	'black'      => 'Black',
	'space-gray' => 'Space Gray',
	'jet-black'  => 'Jet Black',
	'silver'     => 'Silver',
	'gold'       => 'Gold',
	'rose-gold'  => 'Rose Gold',
];

$a = (isset($_GET['a'])) ? $_GET['a'] : 'home';

require_once("classes/Cart.php");

// Initialize cart object
$cart = new Cart([
	// Maximum item can added to cart, 0 = Unlimited
	'cartMaxItem' => 0,

	// Maximum quantity of a item can be added to cart, 0 = Unlimited
	'itemMaxQuantity' => 5,

	// Do not use cookie, cart items will gone after browser closed
	'useCookie' => false,
]);

// Shopping Cart Page
if ($a == 'cart') {
	$cartContents = '
	<div class="alert alert-warning">
		<i class="fa fa-info-circle"></i> There are no items in the cart.
	</div>';

	// Empty the cart
	if (isset($_POST['empty'])) {
		$cart->clear();
	}

	// Add item
	if (isset($_POST['add'])) {
		foreach ($products as $product) {
			if ($_POST['id'] == $product->id) {
				break;
			}
		}

		$cart->add($product->id, $_POST['qty'], [
			'price' => $product->price,
		]);
	}

	// Update item
	if (isset($_POST['update'])) {
		foreach ($products as $product) {
			if ($_POST['id'] == $product->id) {
				break;
			}
		}

		$cart->update($product->id, $_POST['qty'], [
			'price' => $product->price,
		]);
	}

	// Remove item
	if (isset($_POST['remove'])) {
		foreach ($products as $product) {
			if ($_POST['id'] == $product->id) {
				break;
			}
		}

		$cart->remove($product->id, [
			'price' => $product->price,
		]);
	}

	if (!$cart->isEmpty()) {
		$allItems = $cart->getItems();

		$cartContents = '
		<table class="table table-striped table-hover">
			<thead>
				<tr>
					<th class="col-md-2">Product</th>
                    <th class="col-md-5">Image</th>
					<th class="col-md-3 text-center">Quantity</th>
					<th class="col-md-2 text-right">Price</th>
				</tr>
			</thead>
			<tbody>';

		foreach ($allItems as $id => $items) {
			foreach ($items as $item) {
				foreach ($products as $product) {
					if ($id == $product->id) {
						break;
					}
				}

				$cartContents .= '
				<tr>
					<td>' . $product->name .'</td>
                    <td><img src="' . $product->image->source . '" border="0" width="' . $product->image->width . '" height="' . $product->image->height . '" /></td>
					<td class="text-center"><div class="form-group">
                        <input type="number" value="' . $item['quantity'] . '" class="form-control quantity pull-left" style="width:100px"><div class="pull-right">
                        <button class="btn btn-default btn-update" data-id="' . $id . '" data-color="' . ((isset($item['attributes']['color'])) ? $item['attributes']['color'] : '') . '">
                            <i class="fa fa-refresh"></i> Update</button>
                        <button class="btn btn-danger btn-remove" data-id="' . $id . '" data-color="' . ((isset($item['attributes']['color'])) ? $item['attributes']['color'] : '') . '">
                            <i class="fa fa-trash"></i></button>
                        </div></div>
                    </td>
					<td class="text-right">$' . $item['attributes']['price'] . '</td>
				</tr>';
			}
		}

		$cartContents .= '
			</tbody>
		</table>

		<div class="text-right">
			<h3>Total:<br />$' . number_format($cart->getAttributeTotal('price'), 2, '.', ',') . '</h3>
		</div>

		<p>
			<div class="pull-left">
				<button class="btn btn-danger btn-empty-cart">Empty Cart</button>
			</div>
			<div class="pull-right text-right">
				<a href="?a=home" class="btn btn-default">Continue Shopping</a>
				<a href="./vnpay_php/index.php" class="btn btn-danger">Checkout</a>
			</div>
		</p>';
	}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>totoro1998</title>
    <link rel="stylesheet" href="./css/mystyle.css">
    
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/cosmo/bootstrap.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

</head>

<body>
    <!--Header-->
    <div>
        <div class="topbar">
            <div class="container">
                <div class="row">
                    <div id="logo-theme" class="logo">
                        <a href="/index.php">
                            <img src="./images/store_1619521261_277.png" class="img-responsive" alt="LOGO">
                        </a>
                    </div>
                    <div class="topbar-list">
                        <div class="search">
                            <form action="/search" method="get" style="padding-top: 2px;">
                                <div id="search" class="box-search input-group">
                                    <input type="text" name="q" placeholder="Tìm kiếm ...." class="form-control" id="edit_search">
                                    <span class="input-group-btn">
                                        <button type="button" class="button-search" onClick="" value="find"><i class="fa fa-search"></i></button>
                                    </span>
                                </div>
                            </form>
                        </div>
                        <div>
                            <ul class="login links">
                                <li>
                                    <a rel="nofollow" href="/Login.php"><i class="fa-fw fa fa-user"></i> Đăng
                                        nhập</a>
                                </li>
                                <li>
                                    <a rel="nofollow" href="./user_management/themmoi.php"><i class="fa-fw fa fa-unlock-alt"></i>
                                        Đăng ký </a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="shopping-cart pull-right">
                        <a href="?a=cart" id="li-cart">
                            <div id="cart" class="clearfix">
                                <i class="fa fa-shopping-cart icon-cart"></i>
                                <div class="cart-inner media-body">
                                    <span id="cart-total" style="color: #fff; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;">
                                        <?php echo $cart->getTotalItem(); ?>
                                        <span class="text" style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; font-size: 13px; color: #fff;">
                                            Sản Phẩm</span></span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <?php if ($a == 'cart'): ?>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                        <?php echo $cartContents; ?>
                        </div>
                    </div>
                </div>
            </div>
        <!-- <?php elseif ($a == 'checkout'): ?>
		<div class="container">
			<h1>Checkout</h1>
			<div class="row">
				<div class="col-md-12">
					 <div class="table-responsive">
					 	<pre><?php print_r($cart->getItems()); ?></pre>
					 </div>
				</div>
			</div>
		</div> -->
        <?php else: ?>
        <div class="header">
            <div class="container">
                <div class="menu">
                    <ul id="mainmenu">
                        <?php
                            // query menu from db
                            $dbConnection = new dbConnection();
                            $conn = $dbConnection->getConnection();

                            $sql = "SELECT menu_title FROM menu_list";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                $stt = 0;
                                while ($row = $result->fetch_assoc()) {
                                    $stt++;
                            ?>
                                    <li><a href='./product_management/themmoi.php'> <?= $row["menu_title"] ?></a></li>
                            <?php
                                }
                            }
                        ?>
                    </ul>
                </div>
            </div>
        </div>        
        <div>
        <!--Corousel-->
        <div>
            <div id="mySlider"></div>
            <div id="sliderNav">
                <div id="sliderPrev" onclick="prevSlide();">
                    <i class="fa fa-angle-left" style="color: #e5e5e5; font-size: 50px;"></i>
                </div>
                <div id="sliderNext" onclick="nextSlide();">
                    <i class="fa fa-angle-right" style="color: #e5e5e5;font-size: 50px;"></i>
                </div>
            </div>
            <script src="./js/main.js"></script>
        </div>
    </div>
            
        <!--Floating-->
    <a href="#" id="back_to_top" class="scrollup" style="display: block;"><i class="fa fa-angle-double-up" aria-hidden="true"></i></a>
       
    <!--Product-->
    <div class="product-container">
            <div class="product product-row">
                <div class="container-fluid text-center">
                    <h1 class="section-title">
                        Sản phẩm mới
                    </h1>
                </div>

				<?php
				foreach ($products as $product) {
					echo '
					<div class="col-md-6">
						<h3>' . $product->name . '</h3>

						<div>
							<div class="pull-left">
								<img src="' . $product->image->source . '" border="0" width="' . $product->image->width . '" height="' . $product->image->height . '" title="' . $product->name . '" />
							</div>
							<div class="pull-right">
								<h4>$' . $product->price . '</h4>
								<form>
									<input type="hidden" value="' . $product->id . '" class="product-id" />';
					echo '
									<div class="form-group">
										<label>Quantity:</label>
										<input type="number" value="1" class="form-control quantity" />
									</div>
									<div class="form-group">
										<button class="btn btn-danger add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
									</div>
								</form>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>';
				}
				?>
			</div>
		</div>
    </div>
    <footer id="footer" class="tp_footer">
        <div class="footer-top" id="pavo-footer-top">
            <div class="slider">
                <div class="slides">
                    <div id="">
                        <img class="img-responsive cloudzoom-gallery-active" alt="im Baymax" src="images/image_1506226079_276.jpg">
                    </div>
                    <div id="">
                        <img class="img-responsive cloudzoom-gallery-active" alt="Vô Diện" src="/images/image_1506225691_236.jpg">
                    </div>
                    <div id="">
                        <img class="img-responsive cloudzoom-gallery-active" alt="Siêu Anh Hùng" src="/images/image_1506225434_491.jpg">
                    </div>
                    <div id="">
                        <img class="img-responsive cloudzoom-gallery-active" alt="Minion" src="/images/image_1506226445_537.jpg">
                    </div>
                    <div id="">
                        <img class="img-responsive cloudzoom-gallery-active" alt="Chi's Sweet Home" src="/images/image_1506220068_289.jpg">
                    </div>
                    <div id="">
                        <img class="img-responsive cloudzoom-gallery-active" alt="Pusheen" src="/images/image_1506224780_44.jpg">
                    </div>
                    <div id="">
                        <img class="img-responsive cloudzoom-gallery-active" alt="Hello Kitty" src="/images/image_1506224150_188.jpg">
                    </div>
                    <div id="">
                        <img class="img-responsive cloudzoom-gallery-active" alt="Anime" src="/images/image_1506224538_262.jpg">
                    </div>
                    <div id="">
                        <img class="img-responsive cloudzoom-gallery-active" alt="Pokemon" src="/images/image_1506226379_179.jpg">
                    </div>
                    <div id="">
                        <img class="img-responsive cloudzoom-gallery-active" alt="Kumamon" src="/images/image_1506223637_288.jpg">
                    </div>
                    <div id="">
                        <img class="img-responsive cloudzoom-gallery-active" alt="Rilakkuma" src="/images/image_1506223487_889.jpg">
                    </div>
                    <div id="">
                        <img class="img-responsive cloudzoom-gallery-active" alt="Kanahei" src="/images/image_1506223124_406.jpg">
                    </div>
                    <div id="">
                        <img class="img-responsive cloudzoom-gallery-active" alt="Kakaotalk" src="images/image_1506223487_889.jpg">
                    </div>
                    <div id="">
                        <img class="img-responsive cloudzoom-gallery-active" alt="LINE: Brown &amp; Cony" src="/images/image_1506222682_414.jpg">
                    </div>
                    <div id="">
                        <img class="img-responsive cloudzoom-gallery-active" alt="Doraemon" src="/images/image_1506222395_70.jpg">
                    </div>
                    <div id="">
                        <img class="img-responsive cloudzoom-gallery-active" alt="Lilo &amp; Stitch" src="images/image_1506222243_276.jpg">
                    </div>
                    <div id="">
                        <img class="img-responsive cloudzoom-gallery-active" alt="Ghibli" src="/images/image_1439886587_156.gif">
                    </div>
                    <div id="">
                        <img class="img-responsive cloudzoom-gallery-active" alt="We Bare Bear" src="/images/image_1566142941_610.jpg">
                    </div>
                    <div id="">
                        <img class="img-responsive cloudzoom-gallery-active" alt="PUBG" src="/images/image_1566142814_208.jpg">
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
                            <p>- 90 Xã Đàn, Q. Đống Đa &ensp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<img alt="" src="https://bucket.nhanh.vn/website/template/200/contentKey/133/mobile.png" style="width:12px;"> 096.247.1988</p>
                            <p><b>HẢI PHÒNG</b></p>
                            <p>- 233 Lê Lợi, Q. Ngô Quyền &ensp;&emsp;&emsp;&emsp;&emsp;&emsp;<img alt="" src="https://bucket.nhanh.vn/website/template/200/contentKey/133/mobile.png" style="width:12px;"> 092.247.1988</p>
                            <p><b>ĐÀ NẴNG</b></p>
                            <p>- 123a Nguyễn Chí Thanh, Q. Hải Châu &emsp;<img alt="" src="https://bucket.nhanh.vn/website/template/200/contentKey/133/mobile.png" style="width:12px;"> 082.247.1988</p>
                            <p><b>TP HỒ CHÍ MINH</b></p>
                            <p>- 560 Nguyễn Đình Chiểu, P.4, Q.3 &emsp;&emsp;&emsp;<img alt="" src="https://bucket.nhanh.vn/website/template/200/contentKey/133/mobile.png" style="width:12px;"> 090.247.1988</p>
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
                            <div style="margin-top: 20px;"><a href="https://facebook.com/totoro1988" target="_blank" rel="noreferrer noopener"><img alt="Facebook" src="https://mcdn.nhanh.vn/website/template/200/contentKey/320/f.png" style="width:40px;"></a> &nbsp;<a href="https://instagram.com/totoro.vn" target="_blank" rel="noreferrer noopener"><img alt="Instagram" src="https://mcdn.nhanh.vn/website/template/200/contentKey/320/i.png" style="width:40px;"></a> &nbsp; <a href="/gian-hang-totoro-tren-cac-trang-tmdt-shopee-tiki-n86058.html" target="_blank" rel="noreferrer noopener"> <img alt="" src="https://mcdn.nhanh.vn/website/template/200/contentKey/7429/shopee.png" style="width:40px;"></a></div>
                            <div><br></div>
                            <p><b>CÔNG TY TNHH TOTORO VIỆT NAM</b><br>
                                Mã số doanh nghiệp: 0108628706<br>
                                Địa chỉ: 90 Xã Đàn, Q Đống Đa, Tp. Hà Nội</p>
                            <div><a href="https://online.gov.vn/HomePage/CustomWebsiteDisplay.aspx?DocId=53561" target="_blank" rel="noreferrer noopener"><img alt="" src="https://mcdn.nhanh.vn/website/template/200/contentKey/3710/nkvhgbocongthuong.png" style="height:68px;"><img alt="" src="https://mcdn.nhanh.vn/boCongThuong.png" style="height:68px;"></a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
    </footer>
    <?php endif; ?>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script>
        $(document).ready(function(){
            $('.add-to-cart').on('click', function(e){
                e.preventDefault();

                var $btn = $(this);
                var id = $btn.parent().parent().find('.product-id').val();
                
                var qty = $btn.parent().parent().find('.quantity').val();

                var $form = $('<form action="?a=cart" method="post" />').html('<input type="hidden" name="add" value=""><input type="hidden" name="id" value="' + id + '"><input type="hidden" name="qty" value="' + qty + '">');

                $('body').append($form);
                $form.submit();
            });

            $('.btn-update').on('click', function(){
                var $btn = $(this);
                var id = $btn.attr('data-id');
                var qty = $btn.parent().parent().find('.quantity').val();
              

                var $form = $('<form action="?a=cart" method="post" />').html('<input type="hidden" name="update" value=""><input type="hidden" name="id" value="'+id+'"><input type="hidden" name="qty" value="'+qty+'">');

                $('body').append($form);
                $form.submit();
            });

            $('.btn-remove').on('click', function(){
                var $btn = $(this);
                var id = $btn.attr('data-id');
               
                var $form = $('<form action="?a=cart" method="post" />').html('<input type="hidden" name="remove" value=""><input type="hidden" name="id" value="'+id+'">');

                $('body').append($form);
                $form.submit();
            });

            $('.btn-empty-cart').on('click', function(){
                var $form = $('<form action="?a=cart" method="post" />').html('<input type="hidden" name="empty" value="">');

                $('body').append($form);
                $form.submit();
            });
        });
    </script>
</body>
</html>