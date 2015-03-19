@extends('app')
@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
<div class="panel panel-default">
				<div class="panel-heading">Register Car</div>
				<div class="panel-body">

<br/>

{!! Form::open(['url' => 'car']) !!}
<div class="form-group">
    {!! Form::label('registrationNr', 'registrationNr:') !!}
    {!! Form::text('registrationNr', null, [ 'pattern' =>'^[A-Z]{2}[0-9]{5}$', 'class' => 'form-control'] ) !!}
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


