<div class="list_user">
    @forelse($list_user as $user)
    <div class="user_info">
        <div class="ten">
            {{$user->fullname}}
        </div>
        <div class="email">
            {{$user->email}}
        </div>
    </div>
    @empty
    <div class="panel panel-primary">
        <div class="panel-heading">
            Thông báo
        </div>
        <div class="panel-body">
            Không tìm thấy user nào
        </div>
    </div>
    @endforelse
</div>