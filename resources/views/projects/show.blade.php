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
                            
                            
                            
                            
                                <table class = "framvisning502">

                                <tr> <td class="framvisninghoved" colspan="8"><h4><b> {!! $project->projectName !!}</b></h4></td> </tr>

                                

                                <tr> <td class="understrektag"><h4><b> {{trans('general.projectID')}}:</b></h4></td><td class="understrektag"><h4><b> {!! $project->projectID!!}</b></h4></td></tr>
                                <tr> <td class="understrektag"><h4><b> {{trans('general.projectName')}}:</b></h4></td><td class="understrektag"><h4><b> {!! $project->projectName!!}</b></h4></td></tr>
                                <tr> <td class="understrektag"><h4><b> {{trans('general.projectAddress')}}:</b></h4></td><td class="understrektag"><h4><b> {!! $project->projectAddress!!}</b></h4></td></tr>
                                <tr> <td class="understrektag"><h4><b> {{trans('general.budget')}}:</b></h4></td><td class="understrektag"><h4><b> {!! $project->budget!!}</b></h4></td></tr>
                                <tr> <td class="understrektag"><h4><b> {{trans('general.startTime')}}:</b></h4></td><td class="understrektag"><h4><b> {!! $project->startDate!!}</b></h4></td></tr>
                                <tr> <td class="understrektag"><h4><b> {{trans('general.projectDescription')}}:</b></h4></td><td class="understrektag"><h4><b> {!! $project->description!!}</b></h4></td></tr>
                                <tr> <td class="understrektag"><h4><b> {{trans('general.expectedCompletion')}}:</b></h4></td><td class="understrektag"><h4><b> {!! $project->expectedCompletion!!}</b></h4></td></tr>
                                <tr> <td class="understrektag"><h4><b> {{trans('general.done')}}:</b></h4></td><td class="understrektag"><h4><b> {!! $project->done!!}</b></h4></td></tr>
                                <tr> <td class="understrektag"><h4><b> {{trans('general.active')}}:</b></h4></td><td class="understrektag"><h4><b> {!! $project->active!!}</b></h4></td></tr>
                                <tr> <td class="understrektag"><h4><b> {{trans('general.created_at')}}:</b></h4></td><td class="understrektag"><h4><b> {!! $project->created_at!!}</b></h4></td></tr>
                                
                                                       <tr> <td class="understrektag"><h4><b> {!! Form::open(['url' => 'editpage']) !!}
                                                    {!! Form::label('customer', trans('general.builder')) !!}:

                                                    @foreach ($arrayo as $arrayp)
                                                        <h4><b>  {{$arrayp}} </b></h4>
                                                    @endforeach
                                                    {!! Form::close() !!}
                                        </td> </tr>
                        
                                
                                </table>
                            
                            
                            
                        
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@stop
