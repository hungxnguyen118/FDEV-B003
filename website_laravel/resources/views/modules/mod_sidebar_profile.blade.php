<div class="side_bar_profile col-xs-12 col-md-3">
    <div class="sidebar_title">
        Chức năng
    </div>
    <ul>
        @if(session('user_info')->id_loai_user >= 5)
        <li class=""><a href="/admin">Quản lý admin</a></li>
        @endif
        <li><a href="/tai-khoan">Thông tin tài khoản</a></li>
        <li><a href="/don-hang/{{session('user_info')->email}}">Đơn hàng của bạn</a></li>
        <li class=""><a href="/logout">Đăng xuất</a></li>
    </ul>
</div>