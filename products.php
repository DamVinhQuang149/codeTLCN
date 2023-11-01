<?php
session_start();
if (isset($_SESSION['user'])) {
	include "headeruser.php";
} else {
	include "header.php";
} ?>
<!-- BREADCRUMB -->
<div id="breadcrumb" class="section">
    <!-- container -->

    <!-- /container -->
</div>
<!-- /BREADCRUMB -->

<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- STORE -->
            <div id="store" class="col-lg-12">
                <!-- store top filter -->
                <div class="store-filter clearfix">
                    <div class="store-sort">
                        <label>
                            Sắp xếp:
                            <select class="input-select select-filter" id="select-filter">
                                <option value="0">---Lọc theo---</option>
                                <option value="?type_id=<?php echo $type_id; ?>&kytu=asc">Ký tự A-Z</option>
                                <option value="?type_id=<?php echo $type_id; ?>&kytu=desc">Ký tự Z-A</option>
                                <option value="?type_id=<?php echo $type_id; ?>&gia=asc">Giá tăng dần</option>
                                <option value="?type_id=<?php echo $type_id; ?>&gia=desc">Giá giảm dần</option>
                            </select>
                        </label>

                        <label>
                            Hiển thị:
                            <select class="input-select">
                                <option value="0">20</option>
                                <option value="1">50</option>
                            </select>
                        </label>
                        <?php
							$type_id = isset($_GET['type_id']) ? $_GET['type_id'] : null;
							$min_price = $product->getMinProductPriceByCategory($type_id);
							$max_price = $product->getMaxProductPriceByCategory($type_id);
							
						?>
                        <!-- <label class="col-md-6">
                            <form method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                <p>
                                    <label for="amount">Khoảng giá:</label>
                                    <input type="text" id="amount" readonly
                                        style="border:0; color:#f6931f; font-weight:bold;">
                                </p>

                                <div id="slider-range"></div>
                                <input type="hidden" name="type_id" value="<?php echo $type_id; ?>">
                                <input type="hidden" class="price_from" name="from">
                                <input type="hidden" class="price_to" name="to">

                                <input type="submit" value="Lọc giá" class=btn btn-primary filter-price>

                            </form>
                        </label> -->
                        <div class="col-md-offset-7">
                            <form method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                <p>
                                    <label for="amount">Khoảng giá: </label>
                                    <input type="text" id="amount" readonly
                                        style="border:0; color:#f6931f; font-weight:bold;">
                                </p>

                                <div id="slider-range"></div>
                                <input type="hidden" name="type_id" value="<?php echo $type_id; ?>">
                                <input type="hidden" class="price_from" name="from">
                                <input type="hidden" class="price_to" name="to">

                                <input type="submit" value="Lọc giá" class="btn btn-primary filter-price">

                            </form>
                        </div>
                        <?php
							$getAllProtype = $protype->getAProtypeById($type_id);
							foreach ($getAllProtype as $value) :
						?>
                        <h4 class="title text-right" style="color:#f6931f;"><?php echo $value['type_name']?>
                            <?php
							if(isset($_GET['to']) && $_GET['to']){
								echo 'Giá từ: '.number_format($_GET['from'],0,',','.').'đ - '.number_format($_GET['to'],0,',','.').'đ';
							}
						?>
                        </h4>
                        <?php endforeach; ?>
                    </div>
                    <ul class="store-grid">
                        <li class="active"><i class="fa fa-th"></i></li>
                        <li><a href="#"><i class="fa fa-th-list"></i></a></li>
                    </ul>
                </div>
                <!-- /store top filter -->

                <!-- store products -->
                <div class="row">
                    <?php
					if (isset($_GET['type_id'])) :
						$type_id = $_GET['type_id'];
						$from = isset($_GET['from']) ? $_GET['from'] : null;
						$to = isset($_GET['to']) ? $_GET['to'] : null;
						$getProductsByType = $product->getProductsByType($type_id);
						// hiển thị 6 sản phẩm trên 1 trang
						$perPage = 6;
						// Lấy số trang trên thanh địa chỉ
						$page = isset($_GET['page']) ? $_GET['page'] : 1;
						// Tính tổng số dòng, ví dụ kết quả là 18
						$total = count($getProductsByType);
						// lấy đường dẫn đến file hiện hành
						$url = $_SERVER['PHP_SELF'] . "?type_id=" . $type_id;
						if(isset($_GET['kytu']))
						{
							$kytu = $_GET['kytu'] ? $_GET['kytu'] : null;
							$get3ProductsByType = $product->getProductsKytuByType($type_id, $page, $perPage, $kytu);
						}
						else if(isset($_GET['gia']))
						{
							$gia = $_GET['gia'] ? $_GET['gia'] : null;
							$get3ProductsByType = $product->getProductsPriceByType($type_id, $page, $perPage, $gia);
						}
						else
						{
						$get3ProductsByType = $product->get3ProductsByType($type_id, $page, $perPage, $from, $to);
						}
						foreach ($get3ProductsByType as $value) :
					?>
                    <!-- product -->
                    <div class="col-md-4 col-xs-6">
                        <div class="product">
                            <div class="product-img">
                                <img src="./img/<?php echo $value['pro_image'] ?>" alt="">
                                <div class="product-label">
                                </div>
                            </div>
                            <div class="product-body">
                                <p class="product-category"></p>
                                <h3 class="product-name"><a
                                        href="detail.php?id=<?php echo $value['id'] ?>&type_id=<?php echo $value['type_id'] ?>"><?php echo $value['name'] ?></a>
                                </h3>

                                <h5 class="product-price">
                                    <?php echo "<del>" . number_format($value['price']) . "VND</del>"; ?>
                                </h5>
                                <h4 class="discount-price">
                                    <?php echo number_format($value['discount_price']) ?>VND
                                </h4>
                                <div class="product-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <div class="product-btns">
                                    <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span
                                            class="tooltipp">add to wishlist</span></button>
                                    <button class="add-to-compare"><i class="fa fa-exchange"></i><span
                                            class="tooltipp">add to compare</span></button>
                                    <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick
                                            view</span></button>
                                </div>
                            </div>
                            <a href="addcart.php?id=<?php echo $value['id'] ?>&type_id=<?php echo $value['type_id'] ?>">
                                <div class="add-to-cart">
                                    <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> thêm vào
                                        giỏ</button>
                                </div>
                            </a>
                        </div>
                    </div>
                    <!-- /product -->
                    <?php endforeach; ?>
                </div>
                <!-- /store products -->

                <!-- store bottom filter -->
                <div class="store-filter clearfix">
                    <!-- <span class="store-qty">Showing 20-100 products</span> -->
                    <ul class="store-pagination">
                        <?php echo $product->paginate($url, $total, $perPage, $page); ?>
                    </ul>
                </div>
                <!-- /store bottom filter -->
                <?php endif; ?>
            </div>
            <!-- /STORE -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->
<?php include "footer.php" ?>