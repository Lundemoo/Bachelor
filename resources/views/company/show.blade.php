@extends('app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">{{trans('general.company')}} info
                        <a id="backbutton" href="{{ URL::previous() }}"><img src="/bilder/back-button.png" width="40" height="30" align="left"></a>
                    </div>




                    <div class="panel-body">
                        <center>
                            <table class = "helelisten">



                                <tr> <td> {{trans('general.companyid')}}: {!! $company->companyID!!}</td></tr>
                                <tr> <td> {{trans('general.companyname')}}: {!! $company->companyname !!}</td></tr>
                                <tr> <td> {{trans('general.companyrole')}}: {!! $company->role !!}</td> </tr>
                                <tr> <td> {{trans('general.active')}}: {!! $company->active !!}</td> </tr>
                                <tr> <td> {{trans('general.created_at')}}: {!! $company->created_at !!}</td> </tr>

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