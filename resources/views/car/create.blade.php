@extends('app')
@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
<div class="panel panel-default">
				<div class="panel-heading">{{trans('general.registerCar')}}</div>
				<div class="panel-body">

<br/>

{!! Form::open(['url' => 'car']) !!}
<div class="form-group">
    {!! Form::label('registrationNR', trans('general.registrationNr')) !!}
    {!! Form::text('registrationNR', null, [ 'placeholder'=>'NN12345', 'pattern' =>'^[A-Za-z]{2}[0-9]{5}$', 'class' => 'form-control'] ) !!}
</div>
<br/>
<div class="form-group">
    {!! Form::label('nickname', trans('general.nickname')) !!}
    {!! Form::text('nickname', null, ['placeholder'=>trans('general.nicknamePlaceholder'), 'class' => 'form-control'] ) !!}
</div>
<br/>
<div class="form-group">
    {!! Form::label('brand', trans('general.model')) !!}
    {!! Form::text('brand', null, ['placeholder'=>trans('general.modelPlaceholder'), 'class' => 'form-control'] ) !!}
</div>
<br/>

<div class="form-group">
    {!! Form::submit(trans('general.registerCar'), ['class' => 'btn btn-primary form-control'] ) !!}
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


