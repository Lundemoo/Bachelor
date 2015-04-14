@extends('app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Register User</div>
                    <div class="panel-body">

    <h1>Edit: {!! $user->firstname !!}</h1>

    {!! Form::model($user, ['method' => 'PATCH', 'action' => ['UserController@update', $user->email]]) !!}
    <div class="form-group">
        {!! Form::label('email', 'email:') !!}
        {!! Form::text('email', null, ['class' => 'form-control'] ) !!}
    </div>

    <div class="form-group">
        {!! Form::label('firstname', 'Navn:') !!}
        {!! Form::text('firstname', null, ['class' => 'form-control'] ) !!}
    </div>

    <div class="form-group">
        {!! Form::label('surname', 'Etternavn:') !!}
        {!! Form::text('surname', null, ['class' => 'form-control'] ) !!}
    </div>
    <br/>
     <div class="form-group">
            {!! Form::label('telephone', 'Telefon:') !!}
            {!! Form::text('telephone', null, ['class' => 'form-control'] ) !!}
        </div>
        <br/>
         <div class="form-group">
                {!! Form::label('address', 'Addresse:') !!}
                {!! Form::text('address', null, ['class' => 'form-control'] ) !!}
            </div>
            <br/>

    <div class="form-group">
        {!! Form::submit('Oppdater brukeren', ['class' => 'btn btn-primary form-control'] ) !!}
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