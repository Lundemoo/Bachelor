@extends('app')
@section('content')

<h1> Shows the projects </h1>
@foreach($projects as $project)


<p>Prosjekt:
{{ $project->projectName}}
</p>
<p>Adresse:
{{ $project->projectAddress}}
</p>
<p>Beskrivelse
{{ $project->description}}
</p>





@endforeach

@stop
