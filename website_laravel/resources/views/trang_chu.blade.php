@extends('templates.template_green')

@section('main-content')

    @if(session('NoticeSuccess'))
        <script>
            alert("{{ session('NoticeSuccess') }}");
        </script>
    @endif

    @if(session('permission_error'))
        <script>
            alert("{{ session('permission_error') }}");
        </script>
    @endif

    @include('modules.mod_sach_ban_chay')
    @include('modules.mod_sach_noi_bat')
    @include('modules.mod_sach_moi')
@stop