@extends('app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">{{trans('general.editProject')}}
                        <a id="backbutton" href="{{ URL::previous() }}"><img src="/bilder/back-button.png" width="40" height="30" align="left"></a>
                    </div>



                    <div class="panel-body">

                        <h1>{{trans('general.edit') }}: {!! $project->projectName !!}</h1>

                        {!! Form::model($project, ['method' => 'PATCH', 'action' => ['PagesController@update', $project->projectID]]) !!}
                        <div class="form-group">
                            {!! Form::label('projectID', trans('general.projectID')) !!}
                            {!! Form::text('projectID', null, ['class' => 'form-control'] ) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('projectName', trans('general.projectName')) !!}
                            {!! Form::text('projectName', null, ['class' => 'form-control'] ) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('projectAddress', trans('general.projectAddress')) !!}
                            {!! Form::text('projectAddress', null, ['class' => 'form-control'] ) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('budget', trans('general.budget')) !!}
                            {!! Form::text('budget', null, ['class' => 'form-control'] ) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('startDate', trans('general.startTime')) !!}
                            {!! Form::text('startDate', null, ['class' => 'form-control'] ) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('description', trans('general.projectDescription')) !!}
                            {!! Form::text('description', null, ['class' => 'form-control'] ) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('expectedCompletion', trans('general.expectedCompletion')) !!}
                            {!! Form::text('expectedCompletion', null, ['class' => 'form-control'] ) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('done', trans('general.done')) !!}
                            {!! Form::text('done', null, ['class' => 'form-control'] ) !!}
                        </div>
                        <br/>

                        <div class="form-group">
                            {!! Form::submit(trans('general.updateProject'), ['class' => 'btn btn-primary form-control'] ) !!}
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
