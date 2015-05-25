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
                            <table class = "framvisning100">

                                <tr> <td class="framvisninghoved" colspan="8"><h4><b> {!! $user->firstname !!} {!! $user->lastname !!}</b></h4> </td> </tr>

                                <nav style ="background:#FFF">

                                    <tr><td style="text-align:center"><h4 style="color:#0e0e0e"><b>{{trans('general.id')}}: {!! $user->id !!}</b></h4></td></tr>
                                    <tr><td style="text-align:center"><h4 style="color:#0e0e0e"><b>{{trans('general.firstname')}}:  {!! $user->firstname !!}</b></h4></td></tr>
                                    <tr><td style="text-align:center"><h4 style="color:#0e0e0e"><b>{{trans('general.surname')}}: {!! $user->lastname !!}</b></h4></td></tr>
                                    <tr><td style="text-align:center"><h4 style="color:#0e0e0e"><b>{{trans('general.address')}}: {!! $user->address !!}</b></h4></td></tr>
                                    <tr><td style="text-align:center"><h4 style="color:#0e0e0e"><b>{{trans('general.telephone')}}: {!! $user->telephone !!}</b></h4></td></tr>
                                    <tr><td style="text-align:center"><h4 style="color:#0e0e0e"><b>{{trans('general.email')}}: {!! $user->email !!}</b></h4></td></tr>
                                    <tr><td style="text-align:center"><h4 style="color:#0e0e0e"><b>{{trans('general.language')}}: {!! $user->language !!}</b></h4></td></tr>
                                    <tr><td style="text-align:center"><h4 style="color:#0e0e0e"><b>{{trans('general.active')}}: {!! $user->active !!}</b></h4></td></tr>

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
