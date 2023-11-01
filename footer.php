<!-- NEWSLETTER -->
<div id="newsletter" class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <div class="newsletter">
                    <p>Đăng Ký Để Nhận <strong>THÔNG BÁO</strong></p>
                    <form>
                        <input class="input" type="email" placeholder="Email của bạn">
                        <button class="newsletter-btn"><i class="fa fa-envelope"></i> Đăng ký</button>
                    </form>
                    <ul class="newsletter-follow">
                        <li>
                            <a href="https://www.facebook.com/"><i class="fa fa-facebook"></i></a>
                        </li>
                        <li>
                            <a href="https://twitter.com/"><i class="fa fa-twitter"></i></a>
                        </li>
                        <li>
                            <a href="https://www.instagram.com/"><i class="fa fa-instagram"></i></a>
                        </li>
                        <li>
                            <a href="https://www.pinterest.com/"><i class="fa fa-pinterest"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /NEWSLETTER -->

<!-- FOOTER -->
<footer id="footer">
    <!-- top footer -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-3 col-xs-6">
                    <div class="footer">
                        <h3 class="footer-title">Chúng tôi</h3>
                        <p><strong>Tiểu luận chuyên ngành xây dựng website bán đồ ăn trực tuyến</strong></p>
                        <ul class="footer-links">
                            <li><i class="fa fa-map-marker"></i>01 Võ Văn Ngân - Phường Linh Chiểu- Thành phố Thủ Đức
                            </li>
                            <li><i class="fa fa-phone"></i>0935.540.795</li>
                            <li><i class="fa fa-envelope-o"></i>@student.hcmute.edu.vn</li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-3 col-xs-6">
                    <div class="footer">
                        <h3 class="footer-title">thể loại</h3>
                        <ul class="footer-links">
                            <li><a href="products.php?type_id=1"><strong>Trái cây</strong></a></li>
                            <li><a href="products.php?type_id=2"><strong>Bánh ngọt</strong></a></li>
                            <li><a href="products.php?type_id=3"><strong>Rau củ</strong></a></li>
                        </ul>
                    </div>
                </div>

                <div class="clearfix visible-xs"></div>

                <div class="col-md-3 col-xs-6">
                    <div class="footer">
                        <h3 class="footer-title">thông tin</h3>
                        <ul class="footer-links">
                            <li><strong>Hồ Duy Hoàng</strong> - <strong> 20110487
                                </strong>20110487@student.hcmute.edu.vn</li>
                            <li><strong>Đàm Vinh Quang</strong> - <strong> 20110548
                                </strong>20110548@student.hcmute.edu.vn</li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-3 col-xs-6">
                    <div class="footer">
                        <h3 class="footer-title">Dịch vụ</h3>
                        <ul class="footer-links">
                            <li><a href="login/index.php">Tài Khoản Của Tôi</a></li>
                            <li><a href="#">Xem Giỏ Hàng</a></li>
                            <li><a href="#">Yêu Thích</a></li>
                            <li><a href="#">Xem Đơn Hàng</a></li>
                            <li><a href="#">Giúp Đỡ</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /top footer -->

    <!-- bottom footer -->
    <div id="bottom-footer" class="section">
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-12 text-center">
                    <ul class="footer-payments">
                        <li><a href="#"><i class="fa fa-cc-visa"></i></a></li>
                        <li><a href="#"><i class="fa fa-credit-card"></i></a></li>
                        <li><a href="#"><i class="fa fa-cc-paypal"></i></a></li>
                        <li><a href="#"><i class="fa fa-cc-mastercard"></i></a></li>
                        <li><a href="#"><i class="fa fa-cc-discover"></i></a></li>
                        <li><a href="#"><i class="fa fa-cc-amex"></i></a></li>
                    </ul>
                    <span class="copyright">
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;<script>
                        document.write(new Date().getFullYear());
                        </script> Bản quyền giao diện thuộc <strong> Hồ Duy Hoàng </strong> </a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </span>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /bottom footer -->
</footer>
<!-- /FOOTER -->

<!-- jQuery Plugins -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/slick.min.js"></script>
<script src="js/nouislider.min.js"></script>
<script src="js/jquery.zoom.min.js"></script>
<script src="js/main.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

<script>
$('.price_from').val(<?php echo $min_price ?>);
$('.price_to').val(<?php echo $max_price ?>);
$(function() {
    $("#slider-range").slider({
        range: true,
        min: <?php echo $min_price ?>,
        max: <?php echo $max_price ?>,
        values: [<?php echo $min_price ?>, <?php echo $max_price ?>],
        slide: function(event, ui) {
            $("#amount").val(addPlus(ui.values[0]).toString() + "đ" + " - " + addPlus(ui.values[
                1]) + "đ");
            $('.price_from').val(ui.values[0]);
            $('.price_to').val(ui.values[1]);
        }

    });
    $("#slider-range").on("slidechange", function(event, ui) {
        updateUrl(); // Gọi hàm để cập nhật URL với giá trị mới
    });

    function updateUrl() {
        var from = $("#slider-range").slider("values", 0);
        var to = $("#slider-range").slider("values", 1);

        // Cập nhật URL với giá trị mới của slider và type_id
        var newUrl = '<?php echo $_SERVER['PHP_SELF']; ?>?from=' + from + '&to=' + to + '&type_id=' + type_id;
        window.history.replaceState({}, document.title, newUrl);
    }
    $("#amount").val(addPlus($("#slider-range").slider("values", 0)) + "đ" +
        " - " + addPlus($("#slider-range").slider("values", 1)) + "đ");
});

function addPlus(nStr) {
    nStr += '';
    x = nStr.split('.');
    x1 = x[0];
    x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
        x1 = x1.replace(rgx, '$1' + '.' + '$2');
    }
    return x1 + x2;
}
</script>
<script>
$(document).ready(function() {
    var active = location.search; //?kytu=asc
    $('#select-filter option[value="' + active + '"]').attr('selected', 'selected');
})

$('.select-filter').change(function() {

    var value = $(this).find(':selected').val();

    //alert(value);
    if (value != 0) {
        var url = value;
        // alert(url);
        window.location.replace(url);
    } else {
        alert('Hãy lọc sản phẩm');
    }

})
</script>

</body>

</html>