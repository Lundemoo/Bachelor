@extends('app')
@section('content')

<h1> {{trans('general.showprojects')}} </h1>
@foreach($projects as $project)


<p>{{trans('general.project')}}
{{ $project->projectName}}
</p>
<p>{{trans('general.projectAddress')}}
{{ $project->projectAddress}}
</p>
<p>{{trans('general.description')}}
{{ $project->description}}
</p>





@endforeach

@stop
