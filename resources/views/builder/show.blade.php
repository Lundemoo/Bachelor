@extends('app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Byggherre info
                        <a id="backbutton" href="{{ URL::previous() }}"><img src="/bilder/back-button.png" width="40" height="30" align="left"></a>
                    </div>




                    <div class="panel-body">
                        <center>
                            <table class = "helelisten">



                                <tr> <td> Customer ID: {!! $builder->customerID !!}</td></tr>
                                <tr> <td> Customer Name: {!! $builder->customername !!}</td></tr>
                                <tr> <td> Customer Address: {!! $builder->customeraddress !!}</td> </tr>
                                <tr> <td> Customer Telephone: {!! $builder->customertelephone !!}</td> </tr>
                                <tr> <td> Customer Email: {!! $builder->customeremail !!}</td> </tr>
                                <tr> <td> Active: {!! $builder->active !!}</td> </tr>
                                <tr> <td> Created: {!! $builder->created_at !!}</td> </tr>

                                <tr><td>{!! Form::open(['url' => 'editpage']) !!}
                                {!! Form::label('projectName', 'Byggherre for følgende prosjekter:') !!}

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
