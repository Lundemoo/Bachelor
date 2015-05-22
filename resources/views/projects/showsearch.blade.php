@extends('app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">{{trans('general.searchresults') }}
                        <a id="backbutton" href="{{ URL::previous() }}"><img src="/bilder/back-button.png" width="40" height="30" align="left"></a>
                    </div>


                    <div class="panel-body">
                        <center>
                            <table class = "helelisten">

                                @if($projects->count())
                                    <p id="treff" style="color:lightblue">{{trans('general.hits') }}: {!! $projects->count(); !!}  </p>

                                    @foreach($projects as $project)
                                        <tr> <td> {{trans('general.projectID')}}: {!! $project->projectID !!}</td></tr>
                                        <tr> <td> {{trans('general.projectName')}}: {!! $project->projectName !!}</td></tr>
                                        <tr> <td> {{trans('general.projectAddress')}}: {!! $project->projectAddress !!}</td> </tr>
                                        <tr> <td> {{trans('general.budget')}}: {!! $project->budget !!}</td> </tr>
                                        <tr> <td> {{trans('general.startTime')}}: {!! $project->startDate !!}</td> </tr>
                                        <tr> <td> {{trans('general.projectDescription')}}: {!! $project->description !!}</td> </tr>
                                        <tr> <td> {{trans('general.expectedCompletion')}}: {!! $project->expectedCompletion !!}</td> </tr>
                                        <tr> <td> {{trans('general.done')}}: {!! $project->done !!}</td> </tr>
                                        <tr> <td> {{trans('general.active')}}: {!! $project->active !!}</td> </tr>
                                        <tr> <td> {{trans('general.created_at')}}: {!! $project->created_at !!}</td> </tr>
                                        <tr> <td> {{trans('general.builder')}}: {!! $project->customerID !!}</td> </tr>
                                        <tr> <td>&nbsp; </td><br /> </tr>

                                    @endforeach

                                @else
                                    <p>{{trans('general.no_result')}}:</p>
                                @endif
                            </table>
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@stop
