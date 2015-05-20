@extends('app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">{{trans('general.car')}} {{trans('general.info')}}
                        <a id="backbutton" href="{{ URL::previous() }}"><img src="/bilder/back-button.png" width="40" height="30" align="left"></a>
                    </div>




                    <div class="panel-body">
                        <center>
<table class = "helelisten">

    <tr> <td><h4>{{trans('general.registrationNr')}}: {!! $car->registrationNR !!}</h4></td></tr>
    <tr> <td><h4>{{trans('general.nickname')}}:  {!! $car->nickname !!}</h4></td></tr>
    <tr> <td><h4>{{trans('general.model')}}: {!! $car->brand !!}</h4></td></tr>
    <tr> <td><h4>{{trans('general.active')}}: {!! $car->active !!}</h4></td></tr>
    <tr> <td><h4>{{trans('general.created_at')}}: {!! $car->created_at !!}</h4></td></tr>

    </tr>

</table>
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@stop
