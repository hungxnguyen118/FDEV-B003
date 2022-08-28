<div class="container-fluid">
    <!-- slide banner -->
    <div id="carousel-id" class="carousel slide" data-ride="carousel" style="margin-bottom: 0;">
        <ol class="carousel-indicators">
            <li data-target="#carousel-id" data-slide-to="0" class=""></li>
            <li data-target="#carousel-id" data-slide-to="1" class=""></li>
            <li data-target="#carousel-id" data-slide-to="2" class="active"></li>
            <li data-target="#carousel-id" data-slide-to="3" class=""></li>
            <li data-target="#carousel-id" data-slide-to="4" class=""></li>
        </ol>
        <div class="carousel-inner">
            <div class="item">
                <img data-src="holder.js/900x500/auto/#777:#7a7a7a/text:First slide" alt="First slide"
                    src="images/slide_banner/slide_1.jpg">
                <!--div class="container">
            <div class="carousel-caption">
                <h1>Example headline.</h1>
                <p>Note: If you're viewing this page via a <code>file://</code> URL, the "next" and "previous" Glyphicon buttons on the left and right might not load/display properly due to web browser security rules.</p>
                <p><a class="btn btn-lg btn-primary" href="#" role="button">Sign up today</a></p>
            </div>
        </div-->
            </div>
            <div class="item">
                <img data-src="holder.js/900x500/auto/#777:#7a7a7a/text:First slide" alt="First slide"
                    src="images/slide_banner/slide_2.jpg">
                <!--div class="container">
            <div class="carousel-caption">
                <h1>Example headline.</h1>
                <p>Note: If you're viewing this page via a <code>file://</code> URL, the "next" and "previous" Glyphicon buttons on the left and right might not load/display properly due to web browser security rules.</p>
                <p><a class="btn btn-lg btn-primary" href="#" role="button">Sign up today</a></p>
            </div>
        </div-->
            </div>
            <div class="item active">
                <img data-src="holder.js/900x500/auto/#777:#7a7a7a/text:First slide" alt="First slide"
                    src="images/slide_banner/slide_3.jpg">
                <!--div class="container">
            <div class="carousel-caption">
                <h1>Example headline.</h1>
                <p>Note: If you're viewing this page via a <code>file://</code> URL, the "next" and "previous" Glyphicon buttons on the left and right might not load/display properly due to web browser security rules.</p>
                <p><a class="btn btn-lg btn-primary" href="#" role="button">Sign up today</a></p>
            </div>
        </div-->
            </div>
            <div class="item ">
                <img data-src="holder.js/900x500/auto/#777:#7a7a7a/text:First slide" alt="First slide"
                    src="images/slide_banner/File-1456730913.jpg">
                <!--div class="container">
            <div class="carousel-caption">
                <h1>Example headline.</h1>
                <p>Note: If you're viewing this page via a <code>file://</code> URL, the "next" and "previous" Glyphicon buttons on the left and right might not load/display properly due to web browser security rules.</p>
                <p><a class="btn btn-lg btn-primary" href="#" role="button">Sign up today</a></p>
            </div>
        </div-->
            </div>
            <div class="item ">
                <img data-src="holder.js/900x500/auto/#777:#7a7a7a/text:First slide" alt="First slide"
                    src="images/slide_banner/File-1440692711.jpg">
                <!--div class="container">
            <div class="carousel-caption">
                <h1>Example headline.</h1>
                <p>Note: If you're viewing this page via a <code>file://</code> URL, the "next" and "previous" Glyphicon buttons on the left and right might not load/display properly due to web browser security rules.</p>
                <p><a class="btn btn-lg btn-primary" href="#" role="button">Sign up today</a></p>
            </div>
        </div-->
            </div>
        </div>
        <a class="left carousel-control" href="#carousel-id" data-slide="prev"><span
                class="glyphicon glyphicon-chevron-left"></span></a>
        <a class="right carousel-control" href="#carousel-id" data-slide="next"><span
                class="glyphicon glyphicon-chevron-right"></span></a>
    </div> <!-- END slide banner -->

    <!-- menu bar -->
    <nav class="navbar navbar-inverse" style="border-radius: 0px;">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php" style="padding: 0px 15px 0 15px; margin: 0;">
                    <div><img src="images/logo.png" style="height: 50px;" alt=""> Bookstore</div>
                </a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="index.php">Trang chủ</a></li>
                    <li class="dropdown">
                        <a href="#" data-toggle="dropdown" class="dropdown-toggle">Danh mục sách</a>
                        <ul class="dropdown-menu" id="menu1">
                            @foreach ($ds_loai_sach as $loai_sach)
                            <li 
                            @if(isset($loai_sach->ds_con))
                                @if(count($loai_sach->ds_con) > 0)
                                    class="dropdown-submenu"
                                @endif
                            @endif>
                                <a href="/sach-theo-loai/{{$loai_sach->id}}">{{$loai_sach->ten_loai_sach}}</a>
                                @if(isset($loai_sach->ds_con))
                                <ul class="dropdown-menu hidden-xs hidden-sm">
                                    @foreach($loai_sach->ds_con as $loai_con)
                                    <li><a href="/sach-theo-loai/{{$loai_con->id}}">{{$loai_con->ten_loai_sach}}</a></li>
                                    @endforeach
                                </ul>
                                @endif
                            </li>
                            @endforeach
                        </ul>
                    </li>
                    <li><a href="/tin-tuc">Tin tức</a></li>
                    <li><a href="/lien-he">Liên hệ</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        
                        <div class="number_item_in_cart" style="@if(session()->has('gio_hang'))display: block @else display: none @endif">{{session('tong_so_luong')}}</div>
                        
                        <a href="/gio-hang">
                            <span class="glyphicon glyphicon-shopping-cart"></span>
                        </a>
                    </li>
                    <li>
                        {{-- {{session('user_info')->ho_ten}} --}}
                    </li>
                    @if(session()->has('user_info'))
                        <li class="dropdown">
                            <a href="#"  data-toggle="dropdown" class="dropdown-toggle"><span class="glyphicon glyphicon-user"></span>{{session('user_info')->ho_ten}}</a>
                            <ul class="dropdown-menu hidden-xs hidden-sm">
                                @if(session('user_info')->id_loai_user >= 5)
                                <li class=""><a href="/admin">Quản lý admin</a></li>
                                @endif
                                <li class=""><a href="/logout">Đăng xuất</a></li>
                            </ul>
                        </li>
                    @else
                        <li><a href="#" id="myBtn"><span class="glyphicon glyphicon-user"></span> Đăng nhập</a></li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <!-- Modal -->
    @include('modules.mod_login_form')
    <script>
        $(document).ready(function () {
            $("#myBtn").click(function () {
                $("#myModal").modal();
            });
        });
    </script>
    <!-- END menu bar -->
</div>