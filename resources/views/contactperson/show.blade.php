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
                            
                            
                            
                            
                            
                            
                               <table class = "framvisning502">

                                <tr> <td class="framvisninghoved" colspan="8"><h4><b> {!! $contactperson->contactname !!} {!! $contactperson->contactsurname !!}</b></h4></td> </tr>

                                

                                <tr> <td class="understrektag"><h4><b> {{trans('general.contactpersonId')}}:</b></h4></td><td class="understrektag"><h4><b> {!! $contactperson->contactpersonID!!}</b></h4></td></tr>
                                <tr> <td class="understrektag"><h4><b> {{trans('general.firstname')}}:</b></h4></td><td class="understrektag"><h4><b> {!! $contactperson->contactname!!}</b></h4></td></tr>
                                <tr> <td class="understrektag"><h4><b> {{trans('general.surname')}}:</b></h4></td><td class="understrektag"><h4><b> {!! $contactperson->contactsurname!!}</b></h4></td></tr>
                                <tr> <td class="understrektag"><h4><b> {{trans('general.telephone')}}:</b></h4></td><td class="understrektag"><h4><b> {!! $contactperson->contacttelephone!!}</b></h4></td></tr>
                                <tr> <td class="understrektag"><h4><b> {{trans('general.email')}}:</b></h4></td><td class="understrektag"><h4><b> {!! $contactperson->contactemail!!}</b></h4></td></tr>
                                <tr> <td class="understrektag"><h4><b> {{trans('general.active')}}:</b></h4></td><td class="understrektag"><h4><b> {!! $contactperson->active!!}</b></h4></td></tr>
                                <tr> <td class="understrektag"><h4><b> {{trans('general.created_at')}}:</b></h4></td><td class="understrektag"><h4><b> {!! $contactperson->created_at!!}</b></h4></td></tr>
                                

                                    
                            </table>
                            
                            
                            
                            
                            
                            
                            
                            
                            
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@stop