@extends('app')
@section('content')

<h1> Registrate a project </h1>


{!! Form::open() !!}

<div class="form-group">

 {!! Form::label('projectName', 'Project Name:') !!}

 {!! Form::text('projectName', null, ['class' => 'form-control']) !!}

</div>

<div class="form-group">

 {!! Form::label('projectAddress', 'Project address:') !!}

 {!! Form::text('projectAddress', null, ['class' => 'form-control']) !!}

</div>
{!! Form::close() !!}




@stop
