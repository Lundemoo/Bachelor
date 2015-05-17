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
                            <table class = "helelisten">

                                @if($cars->count())
                                    <p id="treff" style="color:lightblue">{{trans('general.hits') }}: {!! $cars->count(); !!}  </p>

                                    @foreach($cars as $car)
                                        <tr> <td>{{trans('general.registrationNr')}}: {!! $car->registrationNR !!}</td></tr>
                                        <tr> <td>{{trans('general.nickname')}}: {!! $car->nickname !!}</td></tr>
                                        <tr> <td>{{trans('general.model')}}: {!! $car->brand !!}</td> </tr>
                                        <tr> <td>{{trans('general.active')}}: {!! $car->active !!}</td> </tr>
                                        <tr> <td>{{trans('general.created_at')}}: {!! $car->created_at !!}</td></tr>
                                        <tr> <td>&nbsp; </td><br> </tr>

                                    @endforeach

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
