@extends('app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">{{trans('general.editCar')}}
                        <a id="backbutton" href="{{ URL::previous() }}"><img src="/bilder/back-button.png" width="40" height="30" align="left"></a>
                         </div>



                    <div class="panel-body">

    <h1>Edit: {!! $car->nickname !!}</h1>

    {!! Form::model($car, ['method' => 'PATCH', 'action' => ['CarController@update', $car->registrationNR]]) !!}
    <div class="form-group">
        {!! Form::label('registrationNR', trans('general.registrationNr')) !!}
        {!! Form::text('registrationNR', null, ['class' => 'form-control'] ) !!}
    </div>

    <div class="form-group">
        {!! Form::label('nickname', trans('general.nickname')) !!}
        {!! Form::text('nickname', null, ['class' => 'form-control'] ) !!}
    </div>

    <div class="form-group">
        {!! Form::label('brand', trans('general.model')) !!}
        {!! Form::text('brand', null, ['class' => 'form-control'] ) !!}
    </div>
    <br/>

    <div class="form-group">
        {!! Form::submit(trans('general.updateCar'), ['class' => 'btn btn-primary form-control'] ) !!}
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
