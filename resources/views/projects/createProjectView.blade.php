@extends('app')
@section('content')

 <script>
$(function() {
$( "#datepicker" ).datepicker();
});
</script>



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

 {!! Form::label('description', 'Project description:') !!}

 {!! Form::textarea('description', null, ['class' => 'form-control']) !!}

</div>


<br>

<div class="form-group" >

 {!! Form::label('contactpersonID', 'Contact personer') !!}

  <!--<input type="text", id="datepicker">-->

{!! Form::select('contactpersonID', $contactperson_list) !!}


</div>

<br>

<div class="form-group">


 {!! Form::submit('Registrate', ['class' => 'btn btn-primary form-control']) !!}

</div>





{!! Form::close() !!}




@stop
