@extends('app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">{{trans('general.editContactperson')}}</div>
                    <div class="panel-body">

                        <h1>{{trans('general.edit')}} {!! $contactperson->contactname !!}</h1>

                        {!! Form::model($contactperson, ['method' => 'PATCH', 'action' => ['ContactpersonController@update', $contactperson->contactpersonID]]) !!}
                        <div class="form-group">
                            {!! Form::label('contactname', trans('general.firstname')) !!}
                            {!! Form::text('contactname', null, ['class' => 'form-control'] ) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('contactsurname', trans('general.surname')) !!}
                            {!! Form::text('contactsurname', null, ['class' => 'form-control'] ) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('contactemail', trans('general.email')) !!}
                            {!! Form::text('contactemail', null, ['class' => 'form-control'] ) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('contacttelephone', trans('general.telephone')) !!}
                            {!! Form::text('contacttelephone', null, ['class' => 'form-control'] ) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('companyid', trans('general.companyId')) !!}
                            {!! Form::text('companyid', null, ['class' => 'form-control'] ) !!}
                        </div>
                        <br/>

                        <div class="form-group">
                            {!! Form::submit(trans('general.updateContactp'), ['class' => 'btn btn-primary form-control'] ) !!}
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