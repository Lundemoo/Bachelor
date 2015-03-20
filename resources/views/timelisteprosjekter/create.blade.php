@extends('app')
@section('content')


<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
<div class="panel panel-default">
				<div class="panel-heading">Register Timesheet</div>
				<div class="panel-body">
 @if ($errors->any())
                        <ul class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>

                    @endif
<br/>

{!! Form::open(['url' => 'timelisteprosjekter']) !!}

<div class="form-group">

{!! Form::label('projectIDs', 'Prosjekter') !!}

<!--<input type="text", id="datepicker">-->

{!! Form::select('projectID', $projects) !!}
</div>
<br/>
<div class="form-group">
    {!! Form::label('date', 'dato:') !!}
    {!! Form::text('date', date('Y-m-d'), array('class' => 'datepicker') ) !!}
</div>
<div id="container"></div>

<script>
    var minimal = 0;
    </script>

<br/>
<div class="form-group">
    {!! Form::label('start', 'Start tid:') !!}
    {!! Form::text('start', '7:00 AM', ['class' => 'timepicker'] ) !!}
</div>
<br/>
<div class="form-group">
    {!! Form::label('slutt', 'Slutt tid:') !!}
    {!! Form::text('slutt', '3:00 PM', ['class' => 'timepicker'] ) !!}
</div>
<br/>
<div class="form-group">
    {!! Form::label('comment', 'Kommentar:') !!}
    {!! Form::textarea('comment', null, ['class' => 'form-control'] ) !!}
</div>

<div class="form-group">
    {!! Form::submit('Registrer timelisten', ['class' => 'btn btn-primary form-control'] ) !!}
</div>

{!! Form::close() !!}

                   
                </div>
</div>
        </div>
    </div>
</div>


    

@stop
