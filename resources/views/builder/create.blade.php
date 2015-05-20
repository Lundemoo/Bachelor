@extends('app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">{{trans('general.registerBuilder')}}</div>
                    <div class="panel-body">

                        {!! Form::open(['url' => 'builder']) !!}

                        <div class="form-group">
                            {!! Form::label('customername', trans('general.customerName')) !!}
                            {!! Form::text('customername', null, ['placeholder'=>trans('general.customerName'), 'class' => 'form-control'] ) !!}
                        </div>
                        <br/>
                        <div class="form-group">
                            {!! Form::label('customeraddress', trans('general.customerAddress')) !!}
                            {!! Form::text('customeraddress', null, ['placeholder'=> trans('general.customerAddress'), 'class' => 'form-control'] ) !!}
                        </div>
                        <br/>
                        <div class="form-group">
                            {!! Form::label('customertelephone', trans('general.customerTelephone')) !!}
                            {!! Form::text('customertelephone', null, ['placeholder'=>'12345678', 'class' => 'form-control'] ) !!}
                        </div>
                        <br/>
                        <div class="form-group">
                            {!! Form::label('customeremail', trans('general.customerEmail')) !!}
                            {!! Form::text('customeremail', null, ['placeholder'=>'johndoe@mail.com','class' => 'form-control'] ) !!}
                        </div>
                        <br/>

                        <div class="form-group">
                            {!! Form::submit('Registrer byggherre', ['class' => 'btn btn-primary form-control'] ) !!}
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