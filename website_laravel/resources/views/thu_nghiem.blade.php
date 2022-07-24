@if($status_info)
    <h1>
        Chào bạn {{$user_info->fullname}}
    </h1>
    <div class="email">
        {{$user_info->email}}
    </div>
    <div class="gioi_thieu">
        {!! $user_info->introduction !!}
        {{--@{{$user_info->fullname}}--}}
    </div>
@else
    <h1>Không tìm thấy user</h1>
@endif