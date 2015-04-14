@extends('app')
<link href="//netdna.bootstrapcdn.com/bootstrap.3.0.3/css/bootstrap.min.css/" rel="stylesheet">
@section('content')
    <style>
        .panel-body2 {
            padding: 0px;
            background-color: rgba(0, 0, 0, 0.72);
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




                            <tr><td colspan="3" class="innholdeasynav"><br>

                                   <tr><table class="table" cellspacing="5" id="bilvisning">
                                        <thead>
                                        <tr>
                                            <th>RegistreringsNr</th>
                                            <th>Kallenavn</th>
                                            <th>Modell</th>
                                            <th> </th>

                                        </tr>

                                        </thead>

                                    @foreach ($cars as $car)

                                            <tbody>
                                            <tr>

                                            <td> {{$car->registrationNR}}</td>
                                            <td>  {{$car->nickname}}<br></td>
                                            <td> {{$car->brand}}<br><br></td>
                                            <td>


                                                {!! Form::open(['method' => 'DELETE','style' => 'display:inline', 'url' =>['car/destroy', $car->registrationNR]])!!}

                                                {!! Form::button('Slette', array(
						                                'class' => 'btn btn-danger', 'onclick' => "func('$car->registrationNR')",
                                                        'data-toggle' => 'modal',
					                                	'data-target' => '#confirmDelete',
					                                	'data-title' => 'Slette',
					                                	'data-message' => 'Vil du slette ?',
					                                	'data-btncancel' => 'btn-default',
                                                        'data-btnaction' => 'btn-danger',
                                                        'data-btntxt' => 'Slette'
					                                	))
                                                !!}


                                                {!! Form::close() !!}


                                            </td>


                                            </tr>
                                            @endforeach
                                            <input type='hidden' value='' id='gjemt'>
                                            <script>
                                            function func(variabelen){
                                                document.getElementById('gjemt').value = variabelen;
                                            }
                                            </script>
                                            
                                            
                                            </tbody>

                                    </table></tr>



                                    {!! $cars->render()!!}
                                @include('includes.jara_confirm')

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

                                    <tr><td colspan="3" class="innholdeasynav"><br>
                                <tr><table class="table" cellspacing="5" id="brukervisning">
                                        <thead>
                                        <tr>
                                            <th>id </th>
                                            <th>Fornavn </th>
                                            <th>Etternavn </th>
                                            <th>Telefon </th>
                                            <th>E-post </th>
                                            <th>Aktiv </th>
                                            <th>  </th>
                                        </tr>

                                        </thead>

                                            @foreach ($users as $user)

                                            <tbody>
                                            <tr>

                                                <td> {{$user->id}}<br></td>
                                                <td>  {{$user->firstname}}<br></td>
                                                <td>  {{$user->lastname}}<br></td>
                                                <td>  {{$user->telephone}}<br></td>
                                                <td>  {{$user->email}}</td>
                                                <td>  {{$user->active}}</td>

                                                <td>
                                                    {!! Form::open(['method' => 'DELETE','style' => 'display:inline', 'url' =>['editpage/destroy', $user->id]]) !!}

                                                    {!! Form::button('Slette', ['class' => 'btn btn-danger', 'data-target' => '#confirmDelete', 'data-title' => 'Slette', 'data-message' => 'Er du sikker på sletting?', 'data-btncancel' => 'btn-default', 'data-btnaction' => 'btn-danger', 'data-btntxt' => 'Slette', 'data-toggle'=> 'modal']) !!}

                                                    {!! Form::button('Endre', ['class' => 'btn ']) !!}

                                                    {!! Form::close() !!}

                                                </td>
                                            </tr>
                                            @endforeach
                                            </tbody>

                                    </table></tr>

                                {!! $users->render()!!}


                                </td></tr>




                                        <!-- REDIGERE Prosjekter -->

                            @elseif($siden == 2)

                                <tr><td class="besokerikke" width="12%" onclick="oc('/editpage?side=1'),$siden=1">Brukere</td>
                                    <td class="besoker" width="12%" onclick="oc('/editpage?side=2'),$siden=2">Prosjekter</td>
                                    <td class="besokerikke" width="12%" onclick="oc('/editpage?side=3'),$siden=3">Byggherrer</td>
                                    <td class="besokerikke" width="12%" onclick="oc('/editpage?side=4'),$siden=4">Kontaktpersoner</td>
                                    <td class="besokerikke" width="12%"onclick="oc('/editpage?side=0'),$siden=0">Biler</td>
                                    <td class="tom" width="40%">&nbsp;</td></tr>

                                <tr><td colspan="3" class="innholdeasynav"><br>


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

                                <tr><td colspan="3" class="innholdeasynav"><br>

                                <tr><table class="table" cellspacing="5" id="byggherrevisning">
                                        <thead>
                                        <tr>
                                            <th>KundeID </th>
                                            <th>Kundenavn </th>
                                            <th>Kundeadresse </th>
                                            <th>Kundetelefon </th>
                                            <th>Kunde Epost </th>
                                            <th> </th>

                                        </tr>

                                        </thead>


                                        @foreach ($builders as $builder)


                                                <tbody>
                                                <tr>

                                                    <td> {{$builder->customerID}}<br></td>
                                                    <td>  {{$builder->customername}}<br></td>
                                                    <td>  {{$builder->customeraddress}}<br></td>
                                                    <td>  {{$builder->customertelephone}}<br></td>
                                                    <td>  {{$builder->customeremail}}</td>
                                                    <td>
                                                        {!! Form::open(['method' => 'DELETE','style' => 'display:inline', 'url' =>['builder/destroy', $builder->customerID]]) !!}

                                                        {!! Form::button('Slette', ['class' => 'btn btn-danger', 'data-target' => '#confirmDelete', 'data-title' => 'Slette', 'data-message' => 'Er du sikker på sletting?', 'data-btncancel' => 'btn-default', 'data-btnaction' => 'btn-danger', 'data-btntxt' => 'Slette', 'data-toggle'=> 'modal']) !!}

                                                        {!! Form::button('Endre', ['class' => 'btn ']) !!}

                                                        {!! Form::close() !!}


                                                    </td>
                                                </tr>
                                                @endforeach
                                                </tbody>

                                    </table></tr>

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

                                <tr><td colspan="3" class="innholdeasynav"><br>

                                <tr><table class="table" cellspacing="5" id="kontaktpersonvisning">
                                        <thead>
                                        <tr>
                                            <th>Kontaktperson ID </th>
                                            <th>Fornavn </th>
                                            <th>Etternavn </th>
                                            <th>Telefon </th>
                                            <th>E-post </th>
                                            <th> </th>

                                        </tr>

                                        </thead>


                                        @foreach ($contactpersons as $contactperson)

                                            <tbody>
                                            <tr>

                                                <td> {{$contactperson->contactpersonID}}<br></td>
                                                <td>  {{$contactperson->contactname}}<br></td>
                                                <td>  {{$contactperson->contactsurname}}<br></td>
                                                <td>  {{$contactperson->contacttelephone}}<br></td>
                                                <td>  {{$contactperson->contactemail}}<br></td>
                                                <td>
                                                    {!! Form::open(['method' => 'DELETE','style' => 'display:inline', 'url' =>['editpage/destroy_contact', $contactperson->contactpersonID]]) !!}

                                                    {!! Form::button('Slette', ['class' => 'btn btn-danger', 'data-target' => '#confirmDelete', 'data-title' => 'Slette', 'data-message' => 'Er du sikker på sletting?', 'data-btncancel' => 'btn-default', 'data-btnaction' => 'btn-danger', 'data-btntxt' => 'Slette', 'data-toggle'=> 'modal']) !!}

                                                    {!! Form::close() !!}

                                                </td>


                                            </tr>
                                            @endforeach
                                            </tbody>

                                    </table></tr>


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