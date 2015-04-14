@extends('app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">{{trans('general.editBuilder')}}</div>
                    <div class="panel-body">

                        <h1>{{trans('general.edit')}} {!! $builder->customername !!}</h1>

                        {!! Form::model($builder, ['method' => 'PATCH', 'action' => ['BuilderController@update', $builder->customerID]]) !!}
                        <div class="form-group">
                            {!! Form::label('customerID', trans('general.customerId')) !!}
                            {!! Form::text('customerID', null, ['class' => 'form-control'] ) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('customername', trans('general.customerName')) !!}
                            {!! Form::text('customername', null, ['class' => 'form-control'] ) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('customeraddress', trans('general.customerAddress')) !!}
                            {!! Form::text('customeraddress', null, ['class' => 'form-control'] ) !!}
                        </div>
                        <br/>
                        <div class="form-group">
                            {!! Form::label('customertelephone', trans('general.customerTelephone')) !!}
                            {!! Form::text('customertelephone', null, ['class' => 'form-control'] ) !!}
                        </div>
                        <br/>
                        <div class="form-group">
                            {!! Form::label('customeremail', trans('general.customerEmail')) !!}
                            {!! Form::text('customeremail', null, ['class' => 'form-control'] ) !!}
                        </div>
                        <br/>

                        <div class="form-group">
                            {!! Form::submit(trans('general.updateBuilderbtn'), ['class' => 'btn btn-primary form-control'] ) !!}
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