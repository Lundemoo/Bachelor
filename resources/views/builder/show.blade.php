@extends('app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">{{trans('general.builder')}} {{trans('general.info')}}
                        <a id="backbutton" href="{{ URL::previous() }}"><img src="/bilder/back-button.png" width="40" height="30" align="left"></a>
                    </div>




                    <div class="panel-body2" >
                        <center>
                            <table class = "framvisning100">

                                <tr> <td class="framvisninghoved" colspan="8"><h4><b> {!! $builder->customername !!}<h4><b> </td> </tr>

                                <nav style ="background:#FFF">
                                    <tr> <td style="text-align:center"><h4 style="color:#0e0e0e"><b> {{trans('general.customerId')}}: {!! $builder->customerID !!} </b></h4></td></tr>
                                    <tr> <td style="text-align:center"><h4 style="color:#0e0e0e"><b> {{trans('general.customerName')}}: {!! $builder->customername !!} </b></h4></td></tr>
                                    <tr> <td style="text-align:center"><h4 style="color:#0e0e0e"><b> {{trans('general.customerAddress')}}: {!! $builder->customeraddress !!}</b></h4></td> </tr>
                                    <tr> <td style="text-align:center"><h4 style="color:#0e0e0e"><b> {{trans('general.customerTelephone')}}: {!! $builder->customertelephone !!}</b></h4></td> </tr>
                                    <tr> <td style="text-align:center"><h4 style="color:#0e0e0e"><b> {{trans('general.customerEmail')}}: {!! $builder->customeremail !!}</b></h4></td> </tr>
                                    <tr> <td style="text-align:center"><h4 style="color:#0e0e0e"><b> {{trans('general.active')}}: {!! $builder->active !!}</b></h4></td> </tr>
                                    <tr> <td style="text-align:center"><h4 style="color:#0e0e0e"><b> {{trans('general.created_at')}}: {!! $builder->created_at !!}</b></h4> </tr>

                                    <tr><td <td style="color:black; text-align:center; font-weight:bold ">{!! Form::open(['url' => 'editpage']) !!}
                                            {!! Form::label('projectName', trans('general.builderFor')) !!}

                                            @foreach ($arrayo as $arrayp)
                                                <li id="listen" style="color:#324aff; font-weight: bold"> <h4 ><b>{{$arrayp}}</b></h4></li>
                                            @endforeach
                                            {!! Form::close() !!}
                                        </td> </tr>


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
