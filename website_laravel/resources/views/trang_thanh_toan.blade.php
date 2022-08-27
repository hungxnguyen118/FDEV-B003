@extends('templates.template_green')

@section('main-content')
<form action="" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
    @include('modules.mod_form_thanh_toan')
    @include('modules.mod_form_gio_hang')
</form>
@stop