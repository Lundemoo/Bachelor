@extends('app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Firma Informasjon
                        <a id="backbutton" href="{{ URL::previous() }}"><img src="/bilder/back-button.png" width="40" height="30" align="left"></a>
                    </div>




                    <div class="panel-body">
                        <center>
                            <table class = "helelisten">



                                <tr> <td> Company ID: {!! $company->companyID!!}</td></tr>
                                <tr> <td> Company name: {!! $company->companyname !!}</td></tr>
                                <tr> <td> Company role: {!! $company->role !!}</td> </tr>
                                <tr> <td> Active: {!! $company->active !!}</td> </tr>
                                <tr> <td> Created at: {!! $company->created_at !!}</td> </tr>

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