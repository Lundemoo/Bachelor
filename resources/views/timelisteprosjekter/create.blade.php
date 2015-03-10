@extends('app')
@section('content')

<h1> Registrer timelister</h1>

<hr/>

{!! Form::open(['url' => 'timelisteprosjekter']) !!}
<div class="form-group">
    {!! Form::label('employeeNr', 'ansattNr:') !!}
    {!! Form::text('employeeNr', null, ['class' => 'form-control'] ) !!}
</div>
<br/>
<div class="form-group">
    {!! Form::label('projectId', 'prosjektID:') !!}
    {!! Form::text('projectId', null, ['class' => 'form-control'] ) !!}
</div>
<br/>
<div class="form-group">
    {!! Form::label('date', 'dato:') !!}
    {!! Form::text('date', null, ['class' => 'form-control'] ) !!}
</div>
<br/>
<div class="form-group">
    {!! Form::label('starttime', 'Start tid:') !!}
    {!! Form::text('starttime', null, ['class' => 'form-control'] ) !!}
</div>
<br/>
<div class="form-group">
    {!! Form::label('endtime', 'Slutt tid:') !!}
    {!! Form::text('endtime', null, ['class' => 'form-control'] ) !!}
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









@stop