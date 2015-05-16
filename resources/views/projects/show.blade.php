@extends('app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Prosjekt Informasjon
                        <a id="backbutton" href="{{ URL::previous() }}"><img src="/bilder/back-button.png" width="40" height="30" align="left"></a>
                    </div>


                    <div class="panel-body">
                        <center>
                            <table class = "helelisten">

                                <tr> <td> Project ID: {!! $project->projectID !!}</td></tr>
                                <tr> <td> ProjectName: {!! $project->projectName !!}</td></tr>
                                <tr> <td> Project Address: {!! $project->projectAddress !!}</td> </tr>
                                <tr> <td> Budget: {!! $project->budget !!}</td> </tr>
                                <tr> <td> Start Date: {!! $project->startDate !!}</td> </tr>
                                <tr> <td> Description: {!! $project->description !!}</td> </tr>
                                <tr> <td> Expected Completion: {!! $project->expectedCompletion !!}</td> </tr>
                                <tr> <td> Done: {!! $project->Done !!}</td> </tr>
                                <tr> <td> Active: {!! $project->active !!}</td> </tr>
                                <tr> <td> created at: {!! $project->created_at !!}</td> </tr>
                                <tr> <td> Byggherre for prosjektet: {!! $project->customerID !!}</td> </tr>

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
