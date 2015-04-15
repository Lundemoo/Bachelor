@extends('app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit Contactperson</div>
                    <div class="panel-body">

                        <h1>Edit: {!! $contactperson->contactname !!}</h1>

                        {!! Form::model($contactperson, ['method' => 'PATCH', 'action' => ['ContactpersonController@update', $contactperson->contactpersonID]]) !!}
                        <div class="form-group">
                            {!! Form::label('contactname', 'Contact firstname:') !!}
                            {!! Form::text('contactname', null, ['class' => 'form-control'] ) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('contactsurname', 'Contact surname:') !!}
                            {!! Form::text('contactsurname', null, ['class' => 'form-control'] ) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('contactemail', 'Contact email:') !!}
                            {!! Form::text('contactemail', null, ['class' => 'form-control'] ) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('contacttelephone', 'Contact phone:') !!}
                            {!! Form::text('contacttelephone', null, ['class' => 'form-control'] ) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('companyid', 'Company id:') !!}
                            {!! Form::text('companyid', null, ['class' => 'form-control'] ) !!}
                        </div>
                        <br/>

                        <div class="form-group">
                            {!! Form::submit('Update contactperson', ['class' => 'btn btn-primary form-control'] ) !!}
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