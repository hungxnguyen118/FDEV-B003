{!! Form::open(['route' => 'upload_file', 'class' => 'form_upload', 'files' => true]) !!}
    <div class="include_input">
        {!! Form::file('hinh') !!}
    </div>
    <div class="include_btn">
        {!! Form::submit('Upload') !!}
    </div>
{!! Form::close() !!}


{!! Form::open(['route' => 'upload_multi_file', 'class' => 'form_upload', 'files' => true]) !!}
    <div class="include_input">
        {!! Form::file('hinh[]', ['multiple' => true]) !!}
    </div>
    <div class="include_btn">
        {!! Form::submit('Upload') !!}
    </div>
{!! Form::close() !!}