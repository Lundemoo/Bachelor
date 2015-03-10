@extends('app')
@section('content')

<h1> Registrate a project </h1>


{!! Form::open(['url' => 'project']) !!}

<div class="form-group">

 {!! Form::label('projectName', 'Project name:') !!}

 {!! Form::text('projectName', null, ['class' => 'form-control']) !!}

</div>

<br>

<div class="form-group">

 {!! Form::label('projectAddress', 'Project address:') !!}

 {!! Form::text('projectAddress', null, ['class' => 'form-control']) !!}

</div>

<br>

<div class="form-group">

 {!! Form::label('budget', 'Project budget:') !!}

 {!! Form::text('budget', null, ['class' => 'form-control']) !!}

</div>

<br>

<div class="form-group">

 {!! Form::label('projectDescription', 'Project description:') !!}

 {!! Form::textarea('projectDescription', null, ['class' => 'form-control']) !!}

</div>


<br>

<div class="form-group">

 {!! Form::label('startDate', 'Project startup:') !!}

 {!! Form::input('date','startDate', date('Y-m-d'), ['class' => 'form-control']) !!}

</div>

<br>

<div class="form-group">


 {!! Form::submit('Registrate', ['class' => 'btn btn-primary form-control']) !!}

</div>





{!! Form::close() !!}




@stop
