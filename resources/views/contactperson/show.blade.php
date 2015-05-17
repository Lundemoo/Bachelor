@extends('app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">{{trans('general.contactperson')}} info
                        <a id="backbutton" href="{{ URL::previous() }}"><img src="/bilder/back-button.png" width="40" height="30" align="left"></a>
                    </div>




                    <div class="panel-body">
                        <center>
                            <table class = "helelisten">



                                <tr> <td> {{trans('general.contactpersonId')}}: {!! $contactperson->contactpersonID !!}</td></tr>
                                <tr> <td> {{trans('general.firstname')}}: {!! $contactperson->contactname !!}</td></tr>
                                <tr> <td> {{trans('general.surname')}}: {!! $contactperson->contactsurname !!}</td> </tr>
                                <tr> <td> {{trans('general.telephone')}}: {!! $contactperson->contacttelephone !!}</td> </tr>
                                <tr> <td> {{trans('general.email')}}: {!! $contactperson->contactemail !!}</td> </tr>
                                <tr> <td> {{trans('general.active')}}: {!! $contactperson->active !!}</td> </tr>
                                <tr> <td> {{trans('general.created_at')}} {!! $contactperson->created_at !!}</td> </tr>
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