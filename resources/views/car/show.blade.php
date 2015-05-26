@extends('app')
<style>
    .panel-body2{
        padding: 12px;
        background-color: #FFF;
        text-align: center;
        align:center;
        margin-left: auto;
        margin-right: auto;
        width: 500px;


    }
    .midt{
        text-align: center;
    }


</style>

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">{{trans('general.car')}} {{trans('general.info')}}
                        <a id="backbutton" href="{{ URL::previous() }}"><img src="/bilder/back-button.png" width="40" height="30" align="left"></a>
                    </div>


                    <div class="panel-body2" >
                        <center>
                            <table class = "framvisning100">

                                <tr> <td class="framvisninghoved" colspan="8"><h4><b> {!! $car->nickname !!}</b></h4> </td> </tr>

                                <nav style ="background:#FFF">

                                    <tr><td style="text-align:center"><h4 style="color:#0e0e0e"><b>{{trans('general.registrationNr')}}: {!! $car->registrationNR !!}</b></h4></td></tr>
                                    <tr><td style="text-align:center"><h4 style="color:#0e0e0e"><b>{{trans('general.nickname')}}:  {!! $car->nickname !!}</b></h4></td></tr>
                                    <tr><td style="text-align:center"><h4 style="color:#0e0e0e"><b>{{trans('general.model')}}: {!! $car->brand !!}</b></h4></td></tr>
                                    <tr><td style="text-align:center"><h4 style="color:#0e0e0e"><b>{{trans('general.active')}}: {!! $car->active !!}</b></h4></td></tr>
                                    <tr><td style="text-align:center"><h4 style="color:#0e0e0e"><b>{{trans('general.created_at')}}: {!! $car->created_at !!}</b></h4></td></tr>

                                    </tr> </nav>

                            </table>
                        </center>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

@stop
