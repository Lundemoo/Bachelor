@extends('app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">{{trans('general.builder')}} info
                        <a id="backbutton" href="{{ URL::previous() }}"><img src="/bilder/back-button.png" width="40" height="30" align="left"></a>
                    </div>




                    <div class="panel-body">
                        <center>
                            <table class = "helelisten">



                                <tr> <td> {{trans('general.customerId')}}: {!! $builder->customerID !!}</td></tr>
                                <tr> <td> {{trans('general.customerName')}}: {!! $builder->customername !!}</td></tr>
                                <tr> <td> {{trans('general.customerAddress')}}: {!! $builder->customeraddress !!}</td> </tr>
                                <tr> <td> {{trans('general.customerTelephone')}}: {!! $builder->customertelephone !!}</td> </tr>
                                <tr> <td> {{trans('general.customerEmail')}}: {!! $builder->customeremail !!}</td> </tr>
                                <tr> <td> {{trans('general.active')}}: {!! $builder->active !!}</td> </tr>
                                <tr> <td> {{trans('general.created_at')}}: {!! $builder->created_at !!}</td> </tr>

                                <tr><td>{!! Form::open(['url' => 'editpage']) !!}
                                {!! Form::label('projectName', trans('general.builderFor')) !!}

                                @foreach ($arrayo as $arrayp)
                                    <li id="listen" style="color:lightblue";> {{$arrayp}}</li>
                        @endforeach
                                        {!! Form::close() !!}
                    </td> </tr>


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
