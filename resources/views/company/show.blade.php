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
                            <table class = "framvisning502">

                                <tr> <td class="framvisninghoved" colspan="8"><h4><b> {!! $company->companyname !!} </b></h4></td> </tr>

                                

                                <tr> <td class="understrektag"><h4><b> {{trans('general.companyid')}}:</b></h4></td><td class="understrektag"><h4><b> {!! $company->companyID!!}</b></h4></td></tr>
                                <tr> <td class="understrektag"><h4><b> {{trans('general.companyname')}}:</b></h4></td><td class="understrektag"><h4><b> {!! $company->companyname!!}</b></h4></td></tr>
                                <tr> <td class="understrektag"><h4><b> {{trans('general.active')}}:</b></h4></td><td class="understrektag"><h4><b> {!! $company->active!!}</b></h4></td></tr>
                                <tr> <td class="understrektag"><h4><b> {{trans('general.created_at')}}:</b></h4></td><td class="understrektag"><h4><b> {!! $company->created_at!!}</b></h4></td></tr>
                                
                                

                                    
                            </table>
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@stop