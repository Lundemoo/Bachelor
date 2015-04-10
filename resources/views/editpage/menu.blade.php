@extends('app')
<link href="//netdna.bootstrapcdn.com/bootstrap.3.0.3/css/bootstrap.min.css/" rel="stylesheet">
@section('content')
    <style>
        .panel-body2 {
            padding: 0px;
            background-color: rgba(0, 0, 0, 0.72);
        }

        #editknapp{

            border-radius:2em;
        }

    </style>





    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Redigering oversikt</div>
                    <div class="panel-body2">




                        <table class="easynav" width="100%">

                            @if($siden==0)
                            <tr><td class="besokerikke" width="12%" onclick="oc('/editpage?side=1'),$siden=1">Brukere</td>
                                <td class="besokerikke" width="12%" onclick="oc('/editpage?side=2'),$siden=2">Prosjekter</td>
                                <td class="besokerikke" width="12%" onclick="oc('/editpage?side=3'),$siden=3">Byggherrer</td>
                                <td class="besokerikke" width="12%" onclick="oc('/editpage?side=4'),$siden=4">Kontaktpersoner</td>
                                <td class="besoker" width="12%"onclick="oc('/editpage?side=0'),$siden=0">Biler</td>
                                <td class="tom" width="40%">&nbsp;</td></tr>



                            <tr><td colspan="3" class="innholdeasynav">

                                   <tr><table class="table" cellspacing="5" id="bilvisning">
                                        <thead>
                                        <tr>
                                            <th>regNR: </th>
                                            <th>kallenavn: </th>
                                            <th>slette: </th>

                                        </tr>

                                        </thead>

                                    @foreach ($cars as $car)

                                            <tbody>
                                            <tr>

                                            <td> {{$car->registrationNR}}<br></td>
                                            <td>  {{$car->nickname}}<br></td>
                                            <td>
                                                {!! Form::open(['method' => 'DELETE','style' => 'display:inline', 'url' =>['car/destroy', $car->registrationNR]]) !!}

                                                {!! Form::button('Slette', ['class' => 'btn btn-danger', 'data-target' => '#confirmDelete', 'data-title' => 'Slette', 'data-message' => 'Er du sikker på sletting?', 'data-btncancel' => 'btn-default', 'data-btnaction' => 'btn-danger', 'data-btntxt' => 'Slette', 'data-toggle'=> 'modal']) !!}

                                                {!! Form::close() !!}







                                            </td>


                                            </tr>
                                            @endforeach
                                            </tbody>

                                    </table></tr>





                                    {!! $cars->render()!!}


                                </td></tr>

                            <!--include på jara confirm knapp

                               ['includes.jara_confirm.blade'] -->

                            <!-- REDIGERE BRUKERE -->

                                @elseif($siden==1)

                                <tr><td class="besoker" width="12%" onclick="oc('/editpage?side=1'),$siden=1">Brukere</td>
                                    <td class="besokerikke" width="12%" onclick="oc('/editpage?side=2'),$siden=2">Prosjekter</td>
                                    <td class="besokerikke" width="12%" onclick="oc('/editpage?side=3'),$siden=3">Byggherrer</td>
                                    <td class="besokerikke" width="12%" onclick="oc('/editpage?side=4'),$siden=4">Kontaktpersoner</td>
                                    <td class="besokerikke" width="12%"onclick="oc('/editpage?side=0'),$siden=0">Biler</td>
                                    <td class="tom" width="40%">&nbsp;</td></tr>

                                    <tr><td colspan="3" class="innholdeasynav">

                                            @foreach ($users as $user)



                                            <h4> {{$user->firstname}}</h4>

                                                {!! Form::open(['method' => 'DELETE', 'url' =>['editpage/destroy', $user->id]]) !!}
                                                <div class="form-group">
                                                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}

                                                    {!! Form::hidden('id', $user->id) !!}
                                                </div>

                                                </span>
                                                {!! Form::close() !!}


                                            @endforeach


                                        </td></tr>




                                        <!-- REDIGERE Prosjekter -->

                            @elseif($siden == 2)

                                <tr><td class="besokerikke" width="12%" onclick="oc('/editpage?side=1'),$siden=1">Brukere</td>
                                    <td class="besoker" width="12%" onclick="oc('/editpage?side=2'),$siden=2">Prosjekter</td>
                                    <td class="besokerikke" width="12%" onclick="oc('/editpage?side=3'),$siden=3">Byggherrer</td>
                                    <td class="besokerikke" width="12%" onclick="oc('/editpage?side=4'),$siden=4">Kontaktpersoner</td>
                                    <td class="besokerikke" width="12%"onclick="oc('/editpage?side=0'),$siden=0">Biler</td>
                                    <td class="tom" width="40%">&nbsp;</td></tr>

                                <tr><td colspan="3" class="innholdeasynav">


                                        @foreach ($projects as $project)

                                            <article class="col-md-6">
                                                <h4> {{$project->projectName}}</h4>

                                            </article>



                                        @endforeach

                                        {!! $projects->render()!!}


                                    </td></tr>



                                    <!-- REDIGERE BYGGHERRER -->

                            @elseif($siden == 3)

                                <tr><td class="besokerikke" width="12%" onclick="oc('/editpage?side=1'),$siden=1">Brukere</td>
                                    <td class="besokerikke" width="12%" onclick="oc('/editpage?side=2'),$siden=2">Prosjekter</td>
                                    <td class="besoker" width="12%" onclick="oc('/editpage?side=3'),$siden=3">Byggherrer</td>
                                    <td class="besokerikke" width="12%" onclick="oc('/editpage?side=4'),$siden=4">Kontaktpersoner</td>
                                    <td class="besokerikke" width="12%"onclick="oc('/editpage?side=0'),$siden=0">Biler</td>
                                    <td class="tom" width="40%">&nbsp;</td></tr>

                                <tr><td colspan="3" class="innholdeasynav">


                                        @foreach ($builders as $builder)

                                            <article class="col-md-6">
                                                <h4> {{$builder->customername}}</h4>
                                                <a href= "{{ URL::to("/builder/{$builder->customerID}/edit")}} "><i class="redigere"> </i> Redigere</a>

                                                {!! Form::open(['method' => 'DELETE', 'url' =>['builder/destroy', $builder->customerID]]) !!}
                                                <div class="form-group">
                                                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}

                                                    {!! Form::hidden('customerID', $builder->customerID) !!}
                                                </div>

                                                </article>
                                                {!! Form::close() !!}


                                                @endforeach

                                                {!! $builders->render()!!}


                                    </td></tr>



                                    <!-- REDIGERE KONTAKTPERSONER -->

                            @elseif($siden == 4)

                                <tr><td class="besokerikke" width="12%" onclick="oc('/editpage?side=1'),$siden=1">Brukere</td>
                                    <td class="besokerikke" width="12%" onclick="oc('/editpage?side=2'),$siden=2">Prosjekter</td>
                                    <td class="besokerikke" width="12%" onclick="oc('/editpage?side=3'),$siden=3">Byggherrer</td>
                                    <td class="besoker" width="12%" onclick="oc('/editpage?side=4'),$siden=4">Kontaktpersoner</td>
                                    <td class="besokerikke" width="12%"onclick="oc('/editpage?side=0'),$siden=0">Biler</td>
                                    <td class="tom" width="40%">&nbsp;</td></tr>

                                <tr><td colspan="3" class="innholdeasynav">


                                        @foreach ($contactpersons as $contactperson)

                                            <article class="col-md-6">
                                                <h4> {{$contactperson->contactname}}</h4>

                                                {!! Form::open(['method' => 'DELETE', 'url' =>['editpage/destroy_contact', $contactperson->contactpersonID]]) !!}
                                                <div class="form-group">
                                                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}

                                                    {!! Form::hidden('contactpersonID', $contactperson->contactpersonID) !!}
                                                </div>

                                                </article>

                                                {!! Form::close() !!}

                                        @endforeach

                                        {!! $contactpersons->render()!!}


                                    </td></tr>


                            @endif



                            </table>







                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@stop