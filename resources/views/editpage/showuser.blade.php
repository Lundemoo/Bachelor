@extends('app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">{{trans('general.user')}} {{trans('general.info')}}
                        <a id="backbutton" href="{{ URL::previous() }}"><img src="/bilder/back-button.png" width="40" height="30" align="left"></a>
                    </div>


                    <div class="panel-body2" >
                        <center>
                            
                            
                            
                            
                            
                                    <table class = "framvisning502">

                                <tr> <td class="framvisninghoved" colspan="8"><h4><b> {!! $user->firstname !!} {!! $user->lastname !!}</b></h4></td> </tr>

                                

                                <tr> <td class="understrektag"><h4><b> {{trans('general.id')}}:</b></h4></td><td class="understrektag"><h4><b> {!! $user->id!!}</b></h4></td></tr>
                                <tr> <td class="understrektag"><h4><b> {{trans('general.firstname')}}:</b></h4></td><td class="understrektag"><h4><b> {!! $user->firstname!!}</b></h4></td></tr>
                                <tr> <td class="understrektag"><h4><b> {{trans('general.surname')}}:</b></h4></td><td class="understrektag"><h4><b> {!! $user->lastname!!}</b></h4></td></tr>
                                <tr> <td class="understrektag"><h4><b> {{trans('general.address')}}:</b></h4></td><td class="understrektag"><h4><b> {!! $user->address!!}</b></h4></td></tr>
                                <tr> <td class="understrektag"><h4><b> {{trans('general.telephone')}}:</b></h4></td><td class="understrektag"><h4><b> {!! $user->telephone!!}</b></h4></td></tr>
                                <tr> <td class="understrektag"><h4><b> {{trans('general.email')}}:</b></h4></td><td class="understrektag"><h4><b> {!! $user->email!!}</b></h4></td></tr>
                                <tr> <td class="understrektag"><h4><b> {{trans('general.language')}}:</b></h4></td><td class="understrektag"><h4><b> {!! $user->language!!}</b></h4></td></tr>
                                <tr> <td class="understrektag"><h4><b> {{trans('general.active')}}:</b></h4></td><td class="understrektag"><h4><b> {!! $user->active!!}</b></h4></td></tr>
                                
                                
                                         
                                </table>
                            
                            
                            
                            
                            
                            
                            
                            
                            

                        </center>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

@stop
