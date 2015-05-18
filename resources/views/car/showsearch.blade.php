@extends('app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">{{trans('general.searchresults') }}
                        <a id="backbutton" href="{{ URL::previous() }}"><img src="/bilder/back-button.png" width="40" height="30" align="left"></a>
                    </div>


                    <div class="panel-body">
                        <center>
                            <table class = "helelisten" style="background:#AAA" width="100%" cellspacing="0" cellpadding="0">

                                @if($cars->count())
                                    <p id="treff" style="color:lightblue">{{trans('general.hits') }}: {!! $cars->count(); !!}  </p>

                                    @foreach($cars as $car)
                                        <tr> <td>{{trans('general.registrationNr')}}: {!! $car->registrationNR !!}</td></tr>
                                        <tr> <td>{{trans('general.nickname')}}: {!! $car->nickname !!}</td></tr>
                                        <tr> <td>{{trans('general.model')}}: {!! $car->brand !!}</td> </tr>
                                        <tr> <td>{{trans('general.active')}}: {!! $car->active !!}</td> </tr>
                                        <tr> <td>{{trans('general.created_at')}}: {!! $car->created_at !!}</td></tr>

                                        @if($car->active == "1")
                                            <tr><td>


                                        {!! Form::open(['method' => 'get','style' => 'display:inline', 'action' =>['CarController@edit', $car->registrationNR]]) !!}
                                        {!! Form::submit(trans('general.edit'), ['class' => 'btn']) !!}
                                        {!! Form::close() !!}



                                                        @endif

                                                    </td> </tr>



                                            @endforeach
                                            <input type='hidden' value='' id='gjemt'>
                                            <script>
                                                function func(variabelen){
                                                    var knapp= document.getElementById('gjemt').value = variabelen;

                                                }
                                            </script>



                                            @include('includes.jara_confirm')

                                @else
                                    <p>{{trans('general.no_result')}}:</p>
                                @endif
                            </table>
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@stop
