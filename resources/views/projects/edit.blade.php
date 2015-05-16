@extends('app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">edit project
                        <a id="backbutton" href="{{ URL::previous() }}"><img src="/bilder/back-button.png" width="40" height="30" align="left"></a>
                    </div>



                    <div class="panel-body">

                        <h1>Edit: {!! $project->projectName !!}</h1>

                        {!! Form::model($project, ['method' => 'PATCH', 'action' => ['PagesController@update', $project->projectID]]) !!}
                        <div class="form-group">
                            {!! Form::label('projectID', 'ProjectID') !!}
                            {!! Form::text('projectID', null, ['class' => 'form-control'] ) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('projectName', 'ProjectName') !!}
                            {!! Form::text('projectName', null, ['class' => 'form-control'] ) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('projectAddress', 'ProjectAddress') !!}
                            {!! Form::text('projectAddress', null, ['class' => 'form-control'] ) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('budget', 'Budget') !!}
                            {!! Form::text('budget', null, ['class' => 'form-control'] ) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('startDate', 'Start Date') !!}
                            {!! Form::text('startDate', null, ['class' => 'form-control'] ) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('description', 'Description') !!}
                            {!! Form::text('description', null, ['class' => 'form-control'] ) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('expectedCompletion', 'Expected Completion') !!}
                            {!! Form::text('expectedCompletion', null, ['class' => 'form-control'] ) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('done', 'Done') !!}
                            {!! Form::text('done', null, ['class' => 'form-control'] ) !!}
                        </div>
                        <br/>

                        <div class="form-group">
                            {!! Form::submit('Update', ['class' => 'btn btn-primary form-control'] ) !!}
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
