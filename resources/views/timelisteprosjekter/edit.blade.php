@extends('app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit Timesheet</div>
                    <div class="panel-body">

                        <h1>Edit: {!! $timelisteprosjekt->projectID !!}</h1>

                        {!! Form::model($timelisteprosjekt, ['method'=> 'PATCH', 'action' => ['TimelisteprosjektController@update', $timelisteprosjekt->projectID]]) !!}

                        <div class="form-group">

                            {!! Form::label('projectID', 'Prosjekter') !!}

                            <!--<input type="text", id="datepicker">-->

                            {!! Form::select('projectID', $projects) !!}
                        </div>
                        <br/>
                        <div class="form-group">
                            {!! Form::label('date', 'Date:') !!}
                            {!! Form::text('date', date('Y-m-d'), ['class' => 'form-control'] ) !!}
                        </div>
                        <br/>
                        <div class="form-group">
                            {!! Form::label('starttime', 'Start time:') !!}
                            {!! Form::text('starttime', '07:00:00', ['class' => 'form-control'] ) !!}
                        </div>
                        <br/>
                        <div class="form-group">
                            {!! Form::label('endtime', 'Stop time:') !!}
                            {!! Form::text('endtime', '15:00:00', ['class' => 'form-control'] ) !!}
                        </div>
                        <br/>
                        <div class="form-group">
                            {!! Form::label('comment', 'Comment:') !!}
                            {!! Form::textarea('comment', null, ['class' => 'form-control'] ) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::submit('Update timesheet', ['class' => 'btn btn-primary form-control'] ) !!}
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
@stop