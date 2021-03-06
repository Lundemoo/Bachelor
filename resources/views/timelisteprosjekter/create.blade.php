@extends('app')
@section('content')


<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
<div class="panel panel-default">
				<div class="panel-heading">{{trans('general.registrateTimesheet')}}</div>
                                <div class="panel-body">
                                        @if(isset($idag))
                                        
                                        
                                        @if(count($idag) > 0)
                                        {{trans('general.registerettoday')}}<br />
                                        @foreach($idag as $dag)
                                        {{trans('general.startTime')}}: {{$dag->starttime}}, {{trans('general.stopTime')}}: {{$dag->endtime}}<br />
                                    @endforeach
                                    @endif
                                    @endif
 @if ($errors->any())
                        <ul class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>

                    @endif


{!! Form::open(['url' => 'timelisteprosjekter']) !!}

<div class="form-group">

{!! Form::label('projectID', trans('general.project')) !!} <br />
<!--<input type="text", id="datepicker">-->
{!! Form::select('projectID', $projects, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('date', trans('general.date')) !!}<br />
    {!! Form::text('date', date('Y-m-d'), array('class' => 'datepicker') ) !!}
</div>
<div id="container"></div>

<script>
    var minimal = 0;
    </script>


<div class="form-group">
    {!! Form::label('start', trans('general.startTime')) !!} <br />
    {!! Form::text('start', '7:00 AM', ['class' => 'timepicker'] ) !!}
</div>

<div class="form-group">
    {!! Form::label('slutt', trans('general.stopTime')) !!} <br />
    {!! Form::text('slutt', '3:00 PM', ['class' => 'timepicker'] ) !!}
</div>

<div class="form-group">
    {!! Form::label('comment', trans('general.comment')) !!} <br />
    {!! Form::textarea('comment', null, ['class' => 'form-control'] ) !!}
</div>

<div class="form-group">
    {!! Form::submit( trans('general.registrateTimesheet'), ['class' => 'btn btn-primary form-control'] ) !!}
</div>

{!! Form::close() !!}

                   
                </div>
</div>
        </div>
    </div>
</div>


    

@stop
