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
                    <div class="panel-heading">{{trans('general.editOverview')}}</div>
                    <div class="panel-body2">




                        <table class="easynav" width="100%">

                            @if($siden==0)
                            <tr><td class="besokerikke" width="12%" onclick="oc('/editpage?side=1'),$siden=1">{{trans('general.users')}}</td>
                                <td class="besokerikke" width="12%" onclick="oc('/editpage?side=2'),$siden=2">{{trans('general.projects')}}</td>
                                <td class="besokerikke" width="12%" onclick="oc('/editpage?side=3'),$siden=3">{{trans('general.builders')}}</td>
                                <td class="besokerikke" width="12%" onclick="oc('/editpage?side=4'),$siden=4">{{trans('general.contactpersons')}}</td>
                                <td class="besoker" width="12%"onclick="oc('/editpage?side=0'),$siden=0">{{trans('general.cars')}}</td>
                                <td class="besokerikke" width="12%"onclick="oc('/editpage?side=5'),$siden=5">Firmaer</td>
                                <td class="tom" width="28%">&nbsp;</td></tr>




                            <tr><td colspan="3" class="innholdeasynav"><br>

                                   <tr><table class="table" cellspacing="5" id="bilvisning">
                                        <thead>
                                        <tr>
                                            <th>{{trans('general.registrationNr')}}</th>
                                            <th>{{trans('general.nickname')}}</th>
                                            <th>{{trans('general.model')}}</th>
                                            <th>Aktiv:</th>
                                            <th> </th>

                                        </tr>

                                        </thead>

                                    @foreach ($cars as $car)

                                            <tbody>
                                            <tr>

                                            <td> {{$car->registrationNR}}</td>
                                            <td> {{$car->nickname}}<br></td>
                                            <td> {{$car->brand}}<br><br></td>
                                            <td> {{$car->active}}<br><br></td>

                                                @if($car->active == "1")
                                            <td>
                                                
                                                
                                              <!--  <form method="delete" action="car/destroy/{{$car->registrationNR}}"><input type="submit" value="Slett" onClick="if(window.confirm('Hei'))">
                                                
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                </form> -->
                                                <!--deaktivere knapp -->


                                                {!! Form::open(['method' => 'DELETE','style' => 'display:inline', 'url' =>['car/destroy', $car->registrationNR]])!!}

                                                {!! Form::button('Deaktivere', array(
                                                'class' => 'btn btn-danger', 'onclick' => "func('car/destroy/$car->registrationNR')",
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


                                                {!! Form::open(['method' => 'get','style' => 'display:inline', 'action' =>['CarController@edit', $car->registrationNR]]) !!}

                                                {!! Form::submit('Endre', ['class' => 'btn ']) !!}

                                                {!! Form::close() !!}

                                                @else

                                                    <td>
                                                        <!--aktivere knapp-->
                                                        {!! Form::open(['method' => 'PATCH','style' => 'display:inline', 'url' =>['car/aktiver', $car->registrationNR]])!!}

                                                        {!! Form::button('Aktivere', array(
                                                        'class' => 'btn btn-success', 'onclick' => "func('car/aktiver/$car->registrationNR')",
                                                        'data-toggle' => 'modal',
                                                        'data-target' => '#confirmDelete',
                                                        'data-title' => 'Slette',
                                                        'data-message' => 'Vil du slette ?',
                                                        'data-btncancel' => 'btn-default',
                                                        'data-btnaction' => 'btn-danger',
                                                        'data-btntxt' => 'Slette'
                                                        ))
                                                        !!}

                                                        {!! Form::open(['method' => 'get','style' => 'display:inline', 'action' =>['CarController@edit', $car->registrationNR]]) !!}


                                                        {!! Form::submit('Endre', ['class' => 'btn ']) !!}

                                                        {!! Form::close() !!}




                                            </td>
                                                    @endif


                                            </tr>
                                            @endforeach
                                            <input type='hidden' value='' id='gjemt'>
                                            <script>
                                            function func(variabelen){
                                                var knapp= document.getElementById('gjemt').value = variabelen;

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

                                <tr><td class="besoker" width="12%" onclick="oc('/editpage?side=1'),$siden=1">{{trans('general.users')}}</td>
                                    <td class="besokerikke" width="12%" onclick="oc('/editpage?side=2'),$siden=2">{{trans('general.projects')}}</td>
                                    <td class="besokerikke" width="12%" onclick="oc('/editpage?side=3'),$siden=3">{{trans('general.builders')}}</td>
                                    <td class="besokerikke" width="12%" onclick="oc('/editpage?side=4'),$siden=4">{{trans('general.contactpersons')}}</td>
                                    <td class="besokerikke" width="12%"onclick="oc('/editpage?side=0'),$siden=0">{{trans('general.cars')}}</td>
                                    <td class="besokerikke" width="12%"onclick="oc('/editpage?side=5'),$siden=5">Firmaer</td>
                                    <td class="tom" width="28%">&nbsp;</td></tr>

                                    <tr><td colspan="3" class="innholdeasynav"><br>
                                <tr><table class="table" cellspacing="5" id="brukervisning">
                                        <thead>
                                        <tr>
                                            <th>id </th>
                                            <th>{{trans('general.firstname')}}</th>
                                            <th>{{trans('general.surname')}}</th>
                                            <th>{{trans('general.telephone')}}</th>
                                            <th>{{trans('general.email')}}</th>
                                            <th>{{trans('general.active')}}</th>
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

                                                @if($user->active == "1")
                                                <td>

                                                    <!--deaktivere knapp -->
                                                    {!! Form::open(['method' => 'DELETE','style' => 'display:inline', 'url' =>['editpage/destroy', $user->id]])!!}

                                                    {!! Form::button('Deaktivere', array(
                                                    'class' => 'btn btn-danger', 'onclick' => "func('editpage/destroy/$user->id')",
                                                    'data-toggle' => 'modal',
                                                    'data-target' => '#confirmDelete',
                                                    'data-title' => 'Slette',
                                                    'data-message' => 'Vil du slette ?',
                                                    'data-btncancel' => 'btn-default',
                                                    'data-btnaction' => 'btn-danger',
                                                    'data-btntxt' => 'Slette'
                                                    ))
                                                    !!}

                                                    {!! Form::button('Endre', ['class' => 'btn ']) !!}

                                                    {!! Form::close() !!}


                                                    @else

                                                    <td>
                                                        <!--aktivere knapp-->
                                                        {!! Form::open(['method' => 'PATCH','style' => 'display:inline', 'url' =>['editpage/aktiver', $user->id]])!!}

                                                        {!! Form::button('Aktivere', array(
                                                        'class' => 'btn btn-success', 'onclick' => "func('editpage/aktiver/$user->id')",
                                                        'data-toggle' => 'modal',
                                                        'data-target' => '#confirmDelete',
                                                        'data-title' => 'Slette',
                                                        'data-message' => 'Vil du slette ?',
                                                        'data-btncancel' => 'btn-default',
                                                        'data-btnaction' => 'btn-danger',
                                                        'data-btntxt' => 'Slette'
                                                        ))
                                                        !!}

                                                        {!! Form::button('Endre', ['class' => 'btn ']) !!}

                                                        {!! Form::close() !!}
                                                    </td>
                                                    @endif





                                            </tr>
                                            @endforeach
                                            <input type='hidden' value='' id='gjemt'>
                                            <script>
                                                function func(variabelen){
                                                    var knapp= document.getElementById('gjemt').value = variabelen;
                                                }
                                            </script>
                                            </tbody>

                                    </table></tr>

                                {!! $users->render()!!}
                                @include('includes.jara_confirm')

                                </td></tr>




                                        <!-- REDIGERE Prosjekter -->

                            @elseif($siden == 2)

                                <tr><td class="besokerikke" width="12%" onclick="oc('/editpage?side=1'),$siden=1">{{trans('general.users')}}</td>
                                    <td class="besoker" width="12%" onclick="oc('/editpage?side=2'),$siden=2">{{trans('general.projects')}}</td>
                                    <td class="besokerikke" width="12%" onclick="oc('/editpage?side=3'),$siden=3">{{trans('general.builders')}}</td>
                                    <td class="besokerikke" width="12%" onclick="oc('/editpage?side=4'),$siden=4">{{trans('general.contactpersons')}}</td>
                                    <td class="besokerikke" width="12%"onclick="oc('/editpage?side=0'),$siden=0">{{trans('general.cars')}}</td>
                                    <td class="besokerikke" width="12%"onclick="oc('/editpage?side=5'),$siden=5">Firmaer</td>
                                    <td class="tom" width="28%">&nbsp;</td></tr>

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

                                <tr><td class="besokerikke" width="12%" onclick="oc('/editpage?side=1'),$siden=1">{{trans('general.users')}}</td>
                                    <td class="besokerikke" width="12%" onclick="oc('/editpage?side=2'),$siden=2">{{trans('general.projects')}}</td>
                                    <td class="besoker" width="12%" onclick="oc('/editpage?side=3'),$siden=3">{{trans('general.builders')}}</td>
                                    <td class="besokerikke" width="12%" onclick="oc('/editpage?side=4'),$siden=4">{{trans('general.contactpersons')}}</td>
                                    <td class="besokerikke" width="12%"onclick="oc('/editpage?side=0'),$siden=0">{{trans('general.cars')}}</td>
                                    <td class="besokerikke" width="12%"onclick="oc('/editpage?side=5'),$siden=5">Firmaer</td>
                                    <td class="tom" width="28%">&nbsp;</td></tr>

                                <tr><td colspan="3" class="innholdeasynav"><br>

                                <tr><table class="table" cellspacing="5" id="byggherrevisning">
                                        <thead>
                                        <tr>
                                            <th>{{trans('general.customerId')}} </th>
                                            <th>{{trans('general.customerName')}}</th>
                                            <th>{{trans('general.customerAddress')}}</th>
                                            <th>{{trans('general.customerTelephone')}}</th>
                                            <th>{{trans('general.customerEmail')}}</th>
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

                                                    @if($builder->active == "1")
                                                    <td>

                                                        {!! Form::open(['method' => 'DELETE','style' => 'display:inline', 'url' =>['builder/destroy', $builder->customerID]])!!}

                                                        {!! Form::button('Deaktivere', array(
                                                        'class' => 'btn btn-danger', 'onclick' => "func('builder/destroy/$builder->customerID')",
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

                                                        {!! Form::open(['method' => 'get','style' => 'display:inline', 'action' =>['BuilderController@edit', $builder->customerID]]) !!}
                                                        {!! Form::submit('Endre', ['class' => 'btn ']) !!}
                                                        {!! Form::close() !!}

                                                    @else

                                                        <td>
                                                            <!--aktivere knapp-->
                                                            {!! Form::open(['method' => 'PATCH','style' => 'display:inline', 'url' =>['builder/aktiver', $builder->customerID]])!!}

                                                            {!! Form::button('Aktivere', array(
                                                            'class' => 'btn btn-success', 'onclick' => "func('builder/aktiver/$builder->customerID')",
                                                            'data-toggle' => 'modal',
                                                            'data-target' => '#confirmDelete',
                                                            'data-title' => 'Slette',
                                                            'data-message' => 'Vil du slette ?',
                                                            'data-btncancel' => 'btn-default',
                                                            'data-btnaction' => 'btn-danger',
                                                            'data-btntxt' => 'Slette'
                                                            ))
                                                            !!}

                                                            {!! Form::open(['method' => 'get','style' => 'display:inline', 'action' =>['BuilderController@edit', $builder->customerID]]) !!}
                                                            {!! Form::submit('Endre', ['class' => 'btn ']) !!}
                                                            {!! Form::close() !!}



                                                        </td>
                                                    @endif
                                                </tr>
                                                @endforeach
                                                <input type='hidden' value='' id='gjemt'>
                                                <script>
                                                    function func(variabelen){
                                                        var knapp= document.getElementById('gjemt').value = variabelen;
                                                    }
                                                </script>
                                                </tbody>

                                    </table></tr>

                                {!! $builders->render()!!}
                                @include('includes.jara_confirm')

                                </td></tr>



                                    <!-- REDIGERE KONTAKTPERSONER -->

                            @elseif($siden == 4)

                                <tr><td class="besokerikke" width="12%" onclick="oc('/editpage?side=1'),$siden=1">{{trans('general.users')}}</td>
                                    <td class="besokerikke" width="12%" onclick="oc('/editpage?side=2'),$siden=2">{{trans('general.projects')}}</td>
                                    <td class="besokerikke" width="12%" onclick="oc('/editpage?side=3'),$siden=3">{{trans('general.builders')}}</td>
                                    <td class="besoker" width="12%" onclick="oc('/editpage?side=4'),$siden=4">{{trans('general.contactpersons')}}</td>
                                    <td class="besokerikke" width="12%"onclick="oc('/editpage?side=0'),$siden=0">{{trans('general.cars')}}</td>
                                    <td class="besokerikke" width="12%"onclick="oc('/editpage?side=5'),$siden=5">Firmaer</td>
                                    <td class="tom" width="28%">&nbsp;</td></tr>

                                <tr><td colspan="3" class="innholdeasynav"><br>

                                <tr><table class="table" cellspacing="5" id="kontaktpersonvisning">
                                        <thead>
                                        <tr>
                                            <th>{{trans('general.contactpersonId')}}</th>
                                            <th>{{trans('general.firstname')}}</th>
                                            <th>{{trans('general.surname')}}</th>
                                            <th>{{trans('general.telephone')}}</th>
                                            <th>{{trans('general.email')}}</th>
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

                                                @if($contactperson->active == "1")
                                                <td>

                                                    {!! Form::open(['method' => 'DELETE','style' => 'display:inline', 'url' =>['contactperson/destroy', $contactperson->contactpersonID]])!!}

                                                    {!! Form::button('Deaktivere', array(
                                                    'class' => 'btn btn-danger', 'onclick' => "func('contactperson/destroy/$contactperson->contactpersonID')",
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

                                                    {!! Form::open(['method' => 'get','style' => 'display:inline', 'action' =>['ContactpersonController@edit', $contactperson->contactpersonID]]) !!}

                                                    {!! Form::submit('Endre', ['class' => 'btn ']) !!}

                                                    {!! Form::close() !!}

                                                @else

                                                    <td>
                                                        <!--aktivere knapp-->
                                                        {!! Form::open(['method' => 'PATCH','style' => 'display:inline', 'url' =>['contactperson/aktiver', $contactperson->contactpersonID]])!!}

                                                        {!! Form::button('Aktivere', array(
                                                        'class' => 'btn btn-success', 'onclick' => "func('contactperson/aktiver/$contactperson->contactpersonID')",
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

                                                        {!! Form::open(['method' => 'get','style' => 'display:inline', 'action' =>['ContactpersonController@edit', $contactperson->contactpersonID]]) !!}

                                                        {!! Form::submit('Endre', ['class' => 'btn ']) !!}

                                                        {!! Form::close() !!}




                                                    </td>
                                                @endif


                                            </tr>
                                            @endforeach
                                            <input type='hidden' value='' id='gjemt'>
                                            <script>
                                                function func(variabelen){
                                                    var knapp= document.getElementById('gjemt').value = variabelen;
                                                }
                                            </script>

                                            </tbody>

                                    </table></tr>


                                {!! $contactpersons->render()!!}
                                @include('includes.jara_confirm')


                                </td></tr>





                        <!-- REDIGERE FIRMA -->

                        @elseif($siden == 4)

                            <tr><td class="besokerikke" width="12%" onclick="oc('/editpage?side=1'),$siden=1">{{trans('general.users')}}</td>
                                <td class="besokerikke" width="12%" onclick="oc('/editpage?side=2'),$siden=2">{{trans('general.projects')}}</td>
                                <td class="besokerikke" width="12%" onclick="oc('/editpage?side=3'),$siden=3">{{trans('general.builders')}}</td>
                                <td class="besokerikke" width="12%" onclick="oc('/editpage?side=4'),$siden=4">{{trans('general.contactpersons')}}</td>
                                <td class="besokerikke" width="12%"onclick="oc('/editpage?side=0'),$siden=0">{{trans('general.cars')}}</td>
                                <td class="besoker" width="12%"onclick="oc('/editpage?side=5'),$siden=5">Firmaer</td>
                                <td class="tom" width="28%">&nbsp;</td></tr>

                            <tr><td colspan="3" class="innholdeasynav"><br>

                            <tr><table class="table" cellspacing="5" id="kontaktpersonvisning">
                                    <thead>
                                    <tr>
                                        <th>FirmaID:</th>
                                        <th>Firmanavn:</th>
                                        <th>Rolle:</th>
                                        <th>Aktiv:}</th>

                                        <th> </th>

                                    </tr>

                                    </thead>


                                    @foreach ($companies as $company)

                                        <tbody>
                                        <tr>

                                            <td> {{$company->companyID}}<br></td>
                                            <td>  {{$company->companyname}}<br></td>
                                            <td>  {{$company->role}}<br></td>
                                            <td>  {{$company->activ}}<br></td>


                                            @if($company->active == "1")
                                                <td>

                                                    {!! Form::open(['method' => 'DELETE','style' => 'display:inline', 'url' =>['company/destroy', $company->companyID]])!!}

                                                    {!! Form::button('Deaktivere', array(
                                                    'class' => 'btn btn-danger', 'onclick' => "func('company/destroy/$company->companyID')",
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

                                                    {!! Form::open(['method' => 'get','style' => 'display:inline', 'action' =>['CompanyController@edit', $company->companyID]]) !!}

                                                    {!! Form::submit('Endre', ['class' => 'btn ']) !!}

                                                    {!! Form::close() !!}

                                            @else

                                                <td>
                                                    <!--aktivere knapp-->
                                                    {!! Form::open(['method' => 'PATCH','style' => 'display:inline', 'url' =>['company/aktiver', $company->companyID]])!!}

                                                    {!! Form::button('Aktivere', array(
                                                    'class' => 'btn btn-success', 'onclick' => "func('company/aktiver/$company->companyID')",
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

                                                    {!! Form::open(['method' => 'get','style' => 'display:inline', 'action' =>['CompanyController@edit', $company->companyID]]) !!}

                                                    {!! Form::submit('Endre', ['class' => 'btn ']) !!}

                                                    {!! Form::close() !!}




                                                </td>
                                            @endif


                                        </tr>
                                        @endforeach
                                        <input type='hidden' value='' id='gjemt'>
                                        <script>
                                            function func(variabelen){
                                                var knapp= document.getElementById('gjemt').value = variabelen;
                                            }
                                        </script>

                                        </tbody>

                                </table></tr>


                            {!! $company->render()!!}
                            @include('includes.jara_confirm')


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