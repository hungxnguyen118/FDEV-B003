<div class="container">

    {{-- {!! '<pre>',print_r($errors->all()),'</pre>' !!} --}}

    @if(count($errors->all()) > 0)
        <div class="panel panel-danger">
            <div class="panel-heading">
                <h3 class="panel-title">You Must check your data</h3>
            </div>
            <div class="panel-body">
                @foreach($errors->all() as $error)
                    <div class="error text-danger">
                        {{$error}}
                    </div>
                @endforeach
            </div>
    </div>
    @endif

    {!! Form::open(['route' => 'save_lien_he', 'class' => 'form_lien_he']) !!}

        <div class="input_item">
            <div class="title_input">
                {!! Form::label('email', 'Email:') !!}
            </div>
            <div class="include_input">
                {!! Form::text('email', null, ['class' => 'form-control','placeholder' => 'Email']) !!}
            </div>
        </div>

        <div class="input_item">
            <div class="title_input">
                {!! Form::label('title', 'Title:') !!}
            </div>
            <div class="include_input">
                {!! Form::text('title', null, ['class' => 'form-control','placeholder' => 'Title']) !!}
            </div>
        </div>

        <div class="input_item">
            <div class="title_input">
                {!! Form::label('content', 'Content:') !!}
            </div>
            <div class="include_input">
                {!! Form::textarea('content', null, ['class' => 'form-control','placeholder' => 'Content']) !!}
            </div>
        </div>

        <div class="include_submit_btn">
            {!! Form::submit('Submit',array('class'=>'btn btn-primary')) !!}
        </div>

    {!! Form::close() !!}
</div>