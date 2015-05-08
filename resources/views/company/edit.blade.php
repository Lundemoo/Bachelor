@extends('app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit company
                    <a id="backbutton" href="{{ URL::previous() }}"><img src="/bilder/back-button.png" width="40" height="30" align="left"></a>
                    </div>
                    <div class="panel-body">

                        <h1>Edit: {!! $company->companyname !!}</h1>

                        {!! Form::model($company, ['method' => 'PATCH', 'action' => ['CompanyController@update', $company->companyID]]) !!}
                        <div class="form-group">
                            {!! Form::label('companyname', 'Company name:') !!}
                            {!! Form::text('companyname', null, ['class' => 'form-control'] ) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('role', 'Role:') !!}
                            {!! Form::text('role', null, ['class' => 'form-control'] ) !!}
                        </div>

                        <br/>

                        <div class="form-group">
                            {!! Form::submit('Update company' , ['class' => 'btn btn-primary form-control'] ) !!}
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