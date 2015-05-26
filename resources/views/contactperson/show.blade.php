@extends('app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">{{trans('general.contactperson')}} {{trans('general.info')}}
                        <a id="backbutton" href="{{ URL::previous() }}"><img src="/bilder/back-button.png" width="40" height="30" align="left"></a>
                    </div>




                    <div class="panel-body2">
                        <center>
                            <table class = "framvisning100">

                                <tr> <td class="framvisninghoved" colspan="8"> <h4><b>{!! $contactperson->contactname !!} {!! $contactperson->contactsurname !!}</b></h4> </td> </tr>


                                <nav style ="background:#FFF">
                                    <tr> <td style="text-align:center"><h4 style="color:#0e0e0e"><b>{{trans('general.contactpersonId')}}: {!! $contactperson->contactpersonID !!}</b></h4></td></tr>
                                    <tr> <td style="text-align:center"><h4 style="color:#0e0e0e"><b>{{trans('general.firstname')}}: {!! $contactperson->contactname !!}</b></h4></td></tr>
                                    <tr> <td style="text-align:center"><h4 style="color:#0e0e0e"><b>{{trans('general.surname')}}: {!! $contactperson->contactsurname !!}</b></h4></td> </tr>
                                    <tr> <td style="text-align:center"><h4 style="color:#0e0e0e"><b>{{trans('general.telephone')}}: {!! $contactperson->contacttelephone !!}</b></h4></td> </tr>
                                    <tr> <td style="text-align:center"><h4 style="color:#0e0e0e"><b>{{trans('general.email')}}: {!! $contactperson->contactemail !!}</b></h4></td> </tr>
                                    <tr> <td style="text-align:center"><h4 style="color:#0e0e0e"><b>{{trans('general.active')}}: {!! $contactperson->active !!}</b></h4></td> </tr>
                                    <tr> <td style="text-align:center"><h4 style="color:#0e0e0e"><b>{{trans('general.created_at')}} {!! $contactperson->created_at !!}</b></h4></td> </tr>
                                    <tr> <td style="text-align:center">{!! Form::open(['url' => 'editpage']) !!}
                                            <h4 style="color:#0e0e0e"><b>   {!! Form::label('company', trans('general.company')) !!}: <h4><b>

                                                            @foreach ($arrayo as $arrayp)
                                                                <h4 style="color:#0e0e0e"> <b> {{$arrayp}} </b></h4>
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