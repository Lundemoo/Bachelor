@extends('app')
@section('content')

<h1> Shows the projects </h1>
@foreach($projects as $project)


<h2>
{{ $project->projectName}}
</h2>
<li>
{{ $project->projectAddress}}
</li>
<li>
{{ $project->projectAddress}}
</li>





@endforeach

@stop
