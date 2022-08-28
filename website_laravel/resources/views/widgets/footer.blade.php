<!-- footer -->
<footer class="footer-content">
    <div class="container duong_ngang">
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-7">
                <div class="footer-address">
                    <p>© 2016 - Bản quyền của Trung Tâm Tin Học - ĐHKHTN</p>
                    <p>Địa chỉ: 357 Lê Hồng Phong, phường 2, Quận 10, TP. Hồ Chí Minh</p>
                    <p>Số ĐT: 38337980</p>
                    <p>Designer/Coder: Hùng Nguyễn</p>
                    <!--p>Designer By: Hùng Nguyễn(hungnguyenxuan118@gmail.com)</p-->
                </div>
            </div>
            <div class="col-md-5 visible-md-block visible-lg-block">
                <div class="footer-certificate-box">
                    <a class="footer-trust" href="#" title="Chứng nhận sàn giao dịch TMĐT">
                        <span>Được chứng nhận</span>
                        <img class="img-responsive" src="https://vcdn.tikicdn.com/assets/img/seal-ecommerce.png"
                            alt="Chứng nhận sàn giao dịch TMĐT">
                    </a>
                    <a class="footer-payment" href="#" title="Thanh toán an toàn trên Tiki.vn">
                        <span>Cách thức thanh toán</span>
                        <img class="img-responsive" src="https://vcdn.tikicdn.com/assets/media/safe.jpg"
                            alt="Thanh toán an toàn trên Tiki.vn">
                    </a>
                </div>
            </div>
        </div>
    </div>
</footer>
{{-- <script type="text/javascript"
    data-cfasync="false">window.purechatApi = { l: [], t: [], on: function () { this.l.push(arguments); } }; (function () { var done = false; var script = document.createElement('script'); script.async = true; script.type = 'text/javascript'; script.src = 'https://app.purechat.com/VisitorWidget/WidgetScript'; document.getElementsByTagName('HEAD').item(0).appendChild(script); script.onreadystatechange = script.onload = function (e) { if (!done && (!this.readyState || this.readyState == 'loaded' || this.readyState == 'complete')) { var w = new PCWidget({ c: 'd06f0104-ea42-4785-a77e-4051603c51ed', f: true }); done = true; } }; })();</script> --}}
<!-- END footer -->

@include('modules.mod_chat')

@csrf
<script src="/js/main.js"></script>