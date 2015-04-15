@extends('app')
@section('content')

    <center>
        <h1>contactpersons</h1>

        @foreach ($contactpersons as $contactperson)
            <h2> <li> contactperson:  {{$contactperson->contactpersonID}}</li> </h2>


            <li> <a href= "{{ URL::to("/contactpersons/{$contactperson->contactpersonID}/edit")}} "><i class="redigere"> </i>/a> </li>



        @endforeach
    </center>
@endsection