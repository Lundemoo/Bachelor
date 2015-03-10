@extends('app')
@section('content')

<h1> Registrer timelister</h1>

<hr/>

{!! Form::open(['url' => 'timelisteprosjekter']) !!}

<div class="form-group">
    {!! Form::label('projectId', 'prosjektID:') !!}
    {!! Form::text('projectId', null, ['class' => 'form-control'] ) !!}
</div>
@foreach ($projects as $project)
    <h2> <li> Prosjekter: {{$project->projectId}}</li> </h2>
@endforeach
<br/>
<div class="form-group">
    {!! Form::label('date', 'dato:') !!}
    {!! Form::text('date', date('Y-m-d'), ['class' => 'form-control'] ) !!}
</div>
<br/>
<div class="form-group">
    {!! Form::label('starttime', 'Start tid:') !!}
    {!! Form::text('starttime', '07:00:00', ['class' => 'form-control'] ) !!}
</div>
<br/>
<div class="form-group">
    {!! Form::label('endtime', 'Slutt tid:') !!}
    {!! Form::text('endtime', '15:00:00', ['class' => 'form-control'] ) !!}
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