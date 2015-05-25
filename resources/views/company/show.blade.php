@extends('app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">{{trans('general.company')}} {{trans('general.info')}}
                        <a id="backbutton" href="{{ URL::previous() }}"><img src="/bilder/back-button.png" width="40" height="30" align="left"></a>
                    </div>




                    <div class="panel-body2" >
                        <center>
                            <table class = "framvisning100">

                                <tr> <td class="framvisninghoved" colspan="8"><h4><b> {!! $company->companyname !!} </b></h4></td> </tr>

                                <nav style ="background:#FFF">

                                    <tr> <td style="text-align:center"><h4 style="color:#0e0e0e"><b> {{trans('general.companyid')}}: {!! $company->companyID!!}</b></h4></td></tr>
                                    <tr> <td style="text-align:center"><h4 style="color:#0e0e0e"><b> {{trans('general.companyname')}}: {!! $company->companyname !!}</b></h4></td></tr>
                                    <tr> <td style="text-align:center"><h4 style="color:#0e0e0e"><b>{{trans('general.active')}}: {!! $company->active !!}</b></h4></td> </tr>
                                    <tr> <td style="text-align:center"><h4 style="color:#0e0e0e"><b> {{trans('general.created_at')}}: {!! $company->created_at !!}</b></h4></td> </tr>

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