@extends('app')
<style>
    .btnexcel{
        display: block;
        width: 100%;
        height: 34px;
        padding: 6px 12px;
        font-size: 14px;
        box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
        transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;

    }
</style>
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">{{trans('general.editTimesheet')}}
                    <a id="backbutton" href="{{ URL::previous() }}"><img src="/bilder/back-button.png" width="40" height="30" align="left"></a>
                    </div>
                    <div class="panel-body">

                        <h1>{{trans('general.edit')}} {!! $timelisteprosjekt->ID !!}</h1>

                        {!! Form::model($timelisteprosjekt, ['method'=> 'PATCH', 'action' => ['TimelisteprosjektController@update', $timelisteprosjekt->ID]]) !!}

                        <div class="form-group">

                           {!! Form::label('projectID', trans('general.projects')) !!} </br>
                            {!! Form::select('projectID', $projects) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('date', trans('general.date')) !!}
                            {!! Form::text('date', date('Y-m-d'), ['class' => 'form-control'] ) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('starttime', 'Start time') !!}
                            {!! Form::text('starttime', '07:00:00', ['class' => 'form-control'] ) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('endtime', 'Stop time') !!}
                            {!! Form::text('endtime', '15:00:00', ['class' => 'form-control'] ) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('comment', trans('general.comment')) !!}
                            {!! Form::textarea('comment', null, ['class' => 'form-control'] ) !!}
                        </div>
                        <div class="form-group">

                        </div>
                        <br/>
                        <div class="form-group">
                            {!! Form::submit(trans('general.updateTimesheet'), ['class' => 'btn btn-primary form-control'] ) !!}
                        </div>

                       {!! Form::close() !!}

                        <!--Export Excel -->
                        {!! Form::open(['method' => 'get', 'style' => 'display:inline', 'action' =>['TimelisteprosjektController@export', $timelisteprosjekt->ID]]) !!}
                        <div class="form-group">
                        {!! Form::submit('Export', ['class' => 'btnexcel' ]) !!}
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