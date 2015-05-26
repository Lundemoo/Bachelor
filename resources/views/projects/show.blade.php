@extends('app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">{{trans('general.project')}} {{trans('general.info')}}
                        <a id="backbutton" href="{{ URL::previous() }}"><img src="/bilder/back-button.png" width="40" height="30" align="left"></a>
                    </div>


                    <div class="panel-body2" >
                        <center>
                            <table class = "framvisning100">

                                <tr> <td class="framvisninghoved" colspan="8"><h4><b>  {!! $project->projectName !!}</b></h4> </td> </tr>

                                <nav style ="background:#FFF">
                                    <tr> <td style="text-align:center"><h4 style="color:#0e0e0e"><b> {{trans('general.projectID')}}: {!! $project->projectID !!}</b></h4></td></tr>
                                    <tr> <td style="text-align:center"><h4 style="color:#0e0e0e"><b> {{trans('general.projectName')}}: {!! $project->projectName !!}</b></h4></td></tr>
                                    <tr> <td style="text-align:center"><h4 style="color:#0e0e0e"><b> {{trans('general.projectAddress')}}: {!! $project->projectAddress !!}</b></h4></td> </tr>
                                    <tr> <td style="text-align:center"><h4 style="color:#0e0e0e"><b> {{trans('general.budget')}}: {!! $project->budget !!}</b></h4></td> </tr>
                                    <tr> <td style="text-align:center"><h4 style="color:#0e0e0e"><b> {{trans('general.startTime')}}: {!! $project->startDate !!}</b></h4></td> </tr>
                                    <tr> <td style="text-align:center"><h4 style="color:#0e0e0e"><b> {{trans('general.projectDescription')}}: {!! $project->description !!}</b></h4></td> </tr>
                                    <tr> <td style="text-align:center"><h4 style="color:#0e0e0e"><b> {{trans('general.expectedCompletion')}}: {!! $project->expectedCompletion !!}</b></h4></td> </tr>
                                    <tr> <td style="text-align:center"><h4 style="color:#0e0e0e"><b> {{trans('general.done')}}: {!! $project->done !!}</b></h4></td> </tr>
                                    <tr> <td style="text-align:center"><h4 style="color:#0e0e0e"><b> {{trans('general.active')}}: {!! $project->active !!}</b></h4></td> </tr>
                                    <tr> <td style="text-align:center"><h4 style="color:#0e0e0e"><b> {{trans('general.created_at')}}: {!! $project->created_at !!}</b></h4></td> </tr>
                                    <tr> <td style="text-align:center"><h4 style="color:#0e0e0e"><b> {!! Form::open(['url' => 'editpage']) !!}
                                                    {!! Form::label('customer', trans('general.builder')) !!}:

                                                    @foreach ($arrayo as $arrayp)
                                                        <h4 style="color:#0e0e0e"><b>  {{$arrayp}} </b></h4>
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
