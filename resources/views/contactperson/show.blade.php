@extends('app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Kontaktperson Informasjon
                        <a id="backbutton" href="{{ URL::previous() }}"><img src="/bilder/back-button.png" width="40" height="30" align="left"></a>
                    </div>




                    <div class="panel-body">
                        <center>
                            <table class = "helelisten">



                                <tr> <td> Contactperson ID: {!! $contactperson->contactpersonID !!}</td></tr>
                                <tr> <td> Contact Firstname: {!! $contactperson->contactname !!}</td></tr>
                                <tr> <td> Contact Lastname: {!! $contactperson->contactsurname !!}</td> </tr>
                                <tr> <td> Contact Telephone: {!! $contactperson->contacttelephone !!}</td> </tr>
                                <tr> <td> Contact Email: {!! $contactperson->contactemail !!}</td> </tr>
                                <tr> <td> Aktiv: {!! $contactperson->active !!}</td> </tr>
                                <tr> <td> Created at: {!! $contactperson->created_at !!}</td> </tr>
                                <tr><td>{!! Form::open(['url' => 'editpage']) !!}
                                        {!! Form::label('company', 'Tilhører firma:') !!}

                                        @foreach ($arrayo as $arrayp)
                                            {{$arrayp}}
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