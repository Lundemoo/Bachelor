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
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                                <table class = "framvisning502">

                                <tr> <td class="framvisninghoved" colspan="8"><h4><b> {!! $builder->customername !!}</b></h4></td> </tr>

                                

                                <tr> <td class="understrektag"><h4><b> {{trans('general.customerId')}}:</b></h4></td><td class="understrektag"><h4><b> {!! $builder->customerID!!}</b></h4></td></tr>
                                <tr> <td class="understrektag"><h4><b> {{trans('general.customername')}}:</b></h4></td><td class="understrektag"><h4><b> {!! $builder->customername!!}</b></h4></td></tr>
                                <tr> <td class="understrektag"><h4><b> {{trans('general.customerAddress')}}:</b></h4></td><td class="understrektag"><h4><b> {!! $builder->customeraddress!!}</b></h4></td></tr>
                                <tr> <td class="understrektag"><h4><b> {{trans('general.customerTelephone')}}:</b></h4></td><td class="understrektag"><h4><b> {!! $builder->customertelephone!!}</b></h4></td></tr>
                                <tr> <td class="understrektag"><h4><b> {{trans('general.customerEmail')}}:</b></h4></td><td class="understrektag"><h4><b> {!! $builder->customeremail!!}</b></h4></td></tr>
                                <tr> <td class="understrektag"><h4><b> {{trans('general.active')}}:</b></h4></td><td class="understrektag"><h4><b> {!! $builder->active!!}</b></h4></td></tr>
                                <tr> <td class="understrektag"><h4><b> {{trans('general.created_at')}}:</b></h4></td><td class="understrektag"><h4><b> {!! $builder->created_at!!}</b></h4></td></tr>
                                
                                
                                                         <tr><td <td class="understrektag">{!! Form::open(['url' => 'editpage']) !!}
                                            {!! Form::label('projectName', trans('general.builderFor')) !!}

                                            @foreach ($arrayo as $arrayp)
                                                <li id="listen" style="color:#324aff; font-weight: bold"> <h4 ><b>{{$arrayp}}</b></h4></li>
                                            @endforeach
                                            {!! Form::close() !!}
                                        </td> </tr>
                                
                                
                                

                                    
                            </table>
                            
                           
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@stop
