<!DOCTYPE html>
<html>
<head>
    <meta charset = "utf-8">

</head>

<body>

<h1> Registrer Bil</h1>

<hr/>

{!! Form::open(['url' => 'car']) !!}
<div class="form-group">
    {!! Form::label('registrationNr', 'registrationNr:') !!}
    {!! Form::text('registrationNr', null, ['class' => 'form-control'] ) !!}
</div>
<br/>
<div class="form-group">
    {!! Form::label('nickname', 'Kallenavn:') !!}
    {!! Form::text('nickname', null, ['class' => 'form-control'] ) !!}
</div>
<br/>
<div class="form-group">
    {!! Form::label('brand', 'Modell/merke:') !!}
    {!! Form::text('brand', null, ['class' => 'form-control'] ) !!}
</div>
<br/>

<div class="form-group">
    {!! Form::submit('Registrer bilen', ['class' => 'btn btn-primary form-control'] ) !!}
</div>

{!! Form::close() !!}







</body>

</html>