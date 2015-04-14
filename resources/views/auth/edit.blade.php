@extends('app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">{{Lang::get('general.registerUser')}}</div>
                    <div class="panel-body">

    <h1>{{Lang::get('general.edit')}} {!! $user->firstname !!}</h1>

    {!! Form::model($user, ['method' => 'PATCH', 'action' => ['UserController@update', $user->email]]) !!}
    <div class="form-group">
        {!! Form::label('email', trans('general.email')) !!}
        {!! Form::text('email', null, ['class' => 'form-control'] ) !!}
    </div>

    <div class="form-group">
        {!! Form::label('firstname', trans('general.firstname')) !!}
        {!! Form::text('firstname', null, ['class' => 'form-control'] ) !!}
    </div>

    <div class="form-group">
        {!! Form::label('surname', trans('general.surname')) !!}
        {!! Form::text('surname', null, ['class' => 'form-control'] ) !!}
    </div>
    <br/>
     <div class="form-group">
            {!! Form::label('telephone', trans('general.telephone')) !!}
            {!! Form::text('telephone', null, ['class' => 'form-control'] ) !!}
        </div>
        <br/>
         <div class="form-group">
                {!! Form::label('address', trans('general.address')) !!}
                {!! Form::text('address', null, ['class' => 'form-control'] ) !!}
            </div>
            <br/>

    <div class="form-group">
        {!! Form::submit(trans('general.updateUserbtn'), ['class' => 'btn btn-primary form-control'] ) !!}
    </div>

    {!! Form::close() !!}

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>

                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@stop