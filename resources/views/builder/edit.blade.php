@extends('app')

@section('content')
    <style>
        #listen{
            color: #f5f5f5;
        }
    </style>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Endre Byggherre</div>
                    <div class="panel-body">

                        <h1>Endre: {!! $builder->customername !!}</h1>

                        {!! Form::model($builder, ['method' => 'PATCH', 'action' => ['BuilderController@update', $builder->customerID]]) !!}

                        <div class="form-group">
                            {!! Form::label('customername', 'Kundenavn:') !!}
                            {!! Form::text('customername', null, ['class' => 'form-control'] ) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('customeraddress', 'Kundeadresse:') !!}
                            {!! Form::text('customeraddress', null, ['class' => 'form-control'] ) !!}
                        </div>
                        <br/>
                        <div class="form-group">
                            {!! Form::label('customertelephone', 'Kundetelefon:') !!}
                            {!! Form::text('customertelephone', null, ['class' => 'form-control'] ) !!}
                        </div>
                        <br/>
                        <div class="form-group">
                            {!! Form::label('customeremail', 'Kunde epost:') !!}
                            {!! Form::text('customeremail', null, ['class' => 'form-control'] ) !!}
                        </div>
                        <br/>
                        <div class="form-group">
                        {!! Form::open(['url' => 'editpage']) !!}
                        {!! Form::label('projectName', 'Byggherre for følgende prosjekter:') !!}

                            @foreach ($arrayo as $arrayp)
                            <li id="listen"> {{$arrayp}}</li>
                        @endforeach
                            </div>
                        <div class="form-group">
                            {!! Form::submit('Oppdater Byggherre', ['class' => 'btn btn-primary form-control'] ) !!}
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