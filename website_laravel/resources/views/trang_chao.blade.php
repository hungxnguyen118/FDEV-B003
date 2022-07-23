Chào mừng bạn đến với Laravel 9
<form action="/test-2" method="POST">
    @csrf
    <input type="text" name="ho_ten">
    <input type="hidden" name="_token" value="{{csrf_token()}}" />
    <button type="submit">Gửi thông tin</button>
</form>