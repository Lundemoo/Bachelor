@extends('app')
@section('content')


  
    <script src="http://maps.google.com/maps?file=api&v=2&key=ABQIAAAA7j_Q-rshuWkc8HyFI4V2HxQYPm-xtd00hTQOC0OXpAMO40FHAxT29dNBGfxqMPq5zwdeiDSHEPL89A" type="text/javascript"></script>
  

    <script src="/js/kjorerute.js"></script>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
<div class="panel panel-default">
				<div class="panel-heading">{{trans('general.registrateDriving')}}</div>
				<div class="panel-body">
                    
    <!--fra min index blade fil -->
    {!! Form::open(['url' => 'logbookaddition', ]) !!}

    <div class="form-group">

        {!! Form::label('projectID', trans('general.project')) !!} <br />
        {!! Form::select('projectID', $projects, ['class' => 'form-control']) !!}
    </div>

<div class="form-group">

    {!! Form::label('registrationNR', trans('general.car')) !!} <br />
    {!! Form::select('registrationNR', $cars) !!}
</div>
<div class="form-group">
    {!! Form::label('date', trans('general.date')) !!} <br />
    {!! Form::text('date', date('Y-m-d'), ['class' => 'datepicker'] ) !!}
</div>
    <script>
    var minimal = 0;
    </script>
<div id="container"></div>


    <div class="form-group">
        {!! Form::label('startdestination', trans('general.startdestination')) !!}
        {!! Form::text('startdestination', null, ['placeholder'=>'Start address','class' => 'form-control'] ) !!}
    </div>
    <div class="form-group" onload="initialize()">
        {!! Form::label('stopdestination', trans('general.stopdestination')) !!}
        {!! Form::text('stopdestination', null, ['placeholder'=>'Stop address','class' => 'form-control', 'onblur' => 'showLocation()'] ) !!}
    </div>
    <div class="form-group">
        {!! Form::label('totalkm', trans('general.kilometer')) !!}
        {!! Form::text('totalkm', null, ['placeholder'=>'Click here to find totalt km','class' => 'form-control'] ) !!}
    </div>
    <br/>
    <div class="form-group">
        {!! Form::submit(trans('general.registrateLogbook'), ['class' => 'btn btn-primary form-control'] ) !!}
    </div>

</form>
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
    <script>
         initialize();
        </script>
@stop

