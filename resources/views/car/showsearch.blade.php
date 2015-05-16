@extends('app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Search results
                        <a id="backbutton" href="{{ URL::previous() }}"><img src="/bilder/back-button.png" width="40" height="30" align="left"></a>
                    </div>




                    <div class="panel-body">
                        <center>
                            <table class = "helelisten">

                                @if($cars->count())
                                    @foreach($cars as $car)
                                        <tr> <td> RegistreringsNR: {!! $car->registrationNR !!}</td></tr>
                                        <tr> <td> Kallenavn: {!! $car->nickname !!}</td></tr>
                                        <tr> <td> Merke: {!! $car->brand !!}</td> </tr>
                                        <tr> <td> Aktiv: {!! $car->active !!}</td> </tr>
                                        <tr> <td> Opprettet: {!! $car->created_at !!}</td></tr>
                                        <tr> <td>&nbsp; </td><br> </tr>

                                    @endforeach

                                @else
                                    <p> no result</p>
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
