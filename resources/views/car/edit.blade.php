@extends('app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Register Car</div>
                    <div class="panel-body">

    <h1>Edit: {!! $car->nickname !!}</h1>

    {!! Form::model($car, ['method' => 'PATCH', 'action' => ['CarController@update', $car->registrationNr]]) !!}
    <div class="form-group">
        {!! Form::label('registrationNr', 'registrationNr:') !!}
        {!! Form::text('registrationNr', null, ['class' => 'form-control'] ) !!}
    </div>

    <div class="form-group">
        {!! Form::label('nickname', 'Kallenavn:') !!}
        {!! Form::text('nickname', null, ['class' => 'form-control'] ) !!}
    </div>

    <div class="form-group">
        {!! Form::label('brand', 'Modell/merke:') !!}
        {!! Form::text('brand', null, ['class' => 'form-control'] ) !!}
    </div>
    <br/>

    <div class="form-group">
        {!! Form::submit('Oppdater bilen', ['class' => 'btn btn-primary form-control'] ) !!}
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
