@extends('app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Registrer Byggherre</div>
                    <div class="panel-body">

                        <br/>

                        {!! Form::open(['url' => 'builder']) !!}

                        <br/>
                        <div class="form-group">
                            {!! Form::label('customername', 'Kundenavn') !!}
                            {!! Form::text('customername', null, ['placeholder'=>'Kundenavn/Firmanavn', 'class' => 'form-control'] ) !!}
                        </div>
                        <br/>
                        <div class="form-group">
                            {!! Form::label('customeraddress', 'Kundeadresse') !!}
                            {!! Form::text('customeraddress', null, ['placeholder'=>'Kundeadresse','class' => 'form-control'] ) !!}
                        </div>
                        <br/>
                        <div class="form-group">
                            {!! Form::label('customertelephone', 'Kundetelefon') !!}
                            {!! Form::text('customertelephone', null, ['placeholder'=>'12345678','class' => 'form-control'] ) !!}
                        </div>
                        <br/>
                        <div class="form-group">
                            {!! Form::label('customeremail', 'Kunde epost') !!}
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