@extends('app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Register Company</div>
                    <div class="panel-body">

                        <br/>

                        {!! Form::open(['url' => 'company']) !!}
                        <div class="form-group">
                            {!! Form::label('companyname', 'Companyname:') !!}
                            {!! Form::text('companyname', null, [ 'placeholder'=>'companyname', 'class' => 'form-control'] ) !!}
                        </div>
                        <br/>
                        <div class="form-group">
                            {!! Form::label('role', 'Role:') !!}
                            {!! Form::text('role', null, ['placeholder'=>'role', 'class' => 'form-control'] ) !!}
                        </div>
                        <br/>

                        <div class="form-group">
                            {!! Form::submit('Register Company', ['class' => 'btn btn-primary form-control'] ) !!}
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