@extends('app')
<style>
    .panel2 {
        margin-bottom: 0px;
        background-color: black;
        border: 1px solid transparent;
        border-radius: 4px;
        box-shadow: 15px 15px 10px rgba(0, 0, 0, 1);
    }

    #firmavisning {
        color: grey;
    }

    .panel-heading {
        padding: 10px 15px;
        border-bottom: 1px solid transparent;
        border-top-right-radius: 3px;
        border-top-left-radius: 3px;
        background-color:grey;


    }

</style>

<link href="//netdna.bootstrapcdn.com/bootstrap.3.0.3/css/bootstrap.min.css/" rel="stylesheet">
@section('content')

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

                                   <tr><table class="table" cellspacing="5" id="bilvisning" style="color:grey";>
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
                                                
                                                <tr><td colspan="5"><hr>dsa</td></tr>
                                            <tr>

                                            <td id="utlisting" style="color:burlywood";> {{$car->registrationNR}}</td>
                                            <td id="utlisting" style="color:burlywood";> {{$car->nickname}}<br></td>
                                            <td id="utlisting" style="color:burlywood";> {{$car->brand}}<br><br></td>
                                            <td id="utlisting" style="color:burlywood";> {{$car->active}}<br><br></td>

                                                @if($car->active == "1")
                                            <td>

                                                <!--deaktivere knapp -->

                                                {!! Form::open(['method' => 'DELETE','style' => 'display:inline', 'url' =>['car/destroy', $car->registrationNR]])!!}
                                                {!! Form::button('Deaktivere', array(
                                                'class' => 'btn btn-danger', 'onclick' => "func('car/destroy/$car->registrationNR')",
                                                'data-toggle' => 'modal',
                                                'data-target' => '#confirmDelete'
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
                                                        'data-target' => '#confirmDelete'
                                                        ))
                                                        !!}
                                                        {!! Form::close() !!}

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
                                <tr><table class="table" cellspacing="5" id="brukervisning" style="color:grey";>
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

                                                <td id="utlisting" style="color:burlywood";> {{$user->id}}<br></td>
                                                <td id="utlisting" style="color:burlywood";>  {{$user->firstname}}<br></td>
                                                <td id="utlisting" style="color:burlywood";>  {{$user->lastname}}<br></td>
                                                <td id="utlisting" style="color:burlywood";>  {{$user->telephone}}<br></td>
                                                <td id="utlisting" style="color:burlywood";>  {{$user->email}}</td>
                                                <td id="utlisting" style="color:burlywood";>  {{$user->active}}</td>

                                                @if($user->active == "1")
                                                <td>

                                                    <!--deaktivere knapp -->
                                                    {!! Form::open(['method' => 'DELETE','style' => 'display:inline', 'url' =>['editpage/destroy', $user->id]])!!}

                                                    {!! Form::button('Deaktivere', array(
                                                    'class' => 'btn btn-danger', 'onclick' => "func('editpage/destroy/$user->id')",
                                                    'data-toggle' => 'modal',
                                                    'data-target' => '#confirmDelete'
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
                                                        'data-target' => '#confirmDelete'
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

                                <tr><table class="table" cellspacing="5" id="prosjektervisning" style="color:grey";>
                                        <thead>
                                        <tr>

                                            <th>ProsjektNavn</th>
                                            <th>Prosjekt adresse</th>
                                            <th>Budsjett</th>
                                            <th>Beskrivelse</th>
                                            <th>Forventet ferdig</th>
                                            <th> </th>

                                        </tr>
                                        </thead>

                                        @foreach ($projects as $project)

                                            <tbody>
                                            <tr>

                                                <td id="utlisting" style="color:burlywood";> {{$project->projectName}}</td>
                                                <td id="utlisting" style="color:burlywood";> {{$project->projectAddress}}<br></td>
                                                <td id="utlisting" style="color:burlywood";> {{$project->budget}}<br><br></td>
                                                <td id="utlisting" style="color:burlywood";> {{$project->description}}<br><br></td>
                                                <td id="utlisting" style="color:burlywood";> {{$project->expectedCompletion}}<br><br></td>

                                                @if($project->active == "1")
                                                    <td>

                                                        <!--deaktivere knapp -->

                                                        {!! Form::open(['method' => 'DELETE','style' => 'display:inline', 'url' =>['project/destroy', $project->projectID]])!!}

                                                        {!! Form::button('Deaktivere', array(
                                                        'class' => 'btn btn-danger', 'onclick' => "func('project/destroy/$project->projectID')",
                                                        'data-toggle' => 'modal',
                                                        'data-target' => '#confirmDelete'
                                                        ))
                                                        !!}
                                                        {!! Form::close() !!}

                                                        <!--endre knapp -->
                                                        {!! Form::open(['method' => 'get','style' => 'display:inline', 'action' =>['PagesController@edit', $project->projectID]]) !!}
                                                        {!! Form::submit('Endre', ['class' => 'btn ']) !!}
                                                        {!! Form::close() !!}

                                                @else

                                                    <td>
                                                        <!--aktivere knapp-->
                                                        {!! Form::open(['method' => 'PATCH','style' => 'display:inline', 'url' =>['project/aktiver', $project->projectID]])!!}

                                                        {!! Form::button('Aktivere', array(
                                                        'class' => 'btn btn-success', 'onclick' => "func('project/aktiver/$project->projectID')",
                                                        'data-toggle' => 'modal',
                                                        'data-target' => '#confirmDelete'
                                                        ))
                                                        !!}

                                                        {!! Form::close() !!}

                                                        {!! Form::open(['method' => 'get','style' => 'display:inline', 'action' =>['projectController@edit', $project->projectID]]) !!}
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

                                {!! $projects->render()!!}
                                @include('includes.jara_confirm')

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

                                <tr><table class="table" cellspacing="5" id="byggherrevisning" style="color:grey";>
                                        <thead>
                                        <tr>
                                          <!--  <th>{{trans('general.customerId')}} </th> -->
                                            <th>{{trans('general.customerName')}}</th>
                                            <th>{{trans('general.customerAddress')}}</th>
                                              <th>{{trans('general.customerTelephone')}}</th>
                                             <th>{{trans('general.customerEmail')}}</th>
                                            <th>Prosjekter</th>
                                            <th> </th>

                                        </tr>

                                        </thead>

                                        @foreach ($builders as $builder)

                                                <tbody>
                                                <tr>

                                                   <!-- <td> {{$builder->customerID}}</td> -->
                                                    <td id="utlisting" style="color:burlywood";>  {{$builder->customername}}</td>
                                                    <td id="utlisting" style="color:burlywood";> {{$builder->customeraddress}}<br></td>
                                                    <td id="utlisting" style="color:burlywood";>  {{$builder->customertelephone}}<br></td>
                                                    <td id="utlisting" style="color:burlywood";>  {{$builder->customeremail}}</td>
                                                    <td>{!! Form::open(['url' => 'editpage']) !!}

                                                        @foreach ($posts as $post)

                                                            @if($post->customerID == $builder->customerID)
                                                            <p style="color:lightblue";>{{ $post->projectName }}</p>

                                                            @endif

                                                        @endforeach

                                                           {!! Form::close() !!}
                                                    <br></td>

                                                    @if($builder->active == "1")
                                                    <td>

                                                        {!! Form::open(['method' => 'DELETE','style' => 'display:inline', 'url' =>['builder/destroy', $builder->customerID]])!!}

                                                        {!! Form::button('Deaktivere', array(
                                                        'class' => 'btn btn-danger', 'onclick' => "func('builder/destroy/$builder->customerID')",
                                                        'data-toggle' => 'modal',
                                                        'data-target' => '#confirmDelete'
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
                                                            'data-target' => '#confirmDelete'
                                                            ))
                                                            !!}
                                                            {!! Form::close() !!}

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

                                <tr><table class="table" cellspacing="5" id="kontaktpersonvisning" style="color:grey";>
                                        <thead>
                                        <tr>
                                            <th>{{trans('general.contactpersonId')}}</th>
                                            <th>{{trans('general.firstname')}}</th>
                                            <th>{{trans('general.surname')}}</th>
                                            <th>{{trans('general.telephone')}}</th>
                                            <th>{{trans('general.email')}}</th>
                                            <th>Active:</th>
                                            <th> </th>

                                        </tr>

                                        </thead>

                                        @foreach ($contactpersons as $contactperson)

                                            <tbody>
                                            <tr>

                                                <td id="utlisting" style="color:burlywood";> {{$contactperson->contactpersonID}}<br></td>
                                                <td id="utlisting" style="color:burlywood";>  {{$contactperson->contactname}}<br></td>
                                                <td id="utlisting" style="color:burlywood";>  {{$contactperson->contactsurname}}<br></td>
                                                <td id="utlisting" style="color:burlywood";>  {{$contactperson->contacttelephone}}<br></td>
                                                <td id="utlisting" style="color:burlywood";>  {{$contactperson->contactemail}}<br></td>
                                                <td id="utlisting" style="color:burlywood";>  {{$contactperson->active}}<br></td>

                                                @if($contactperson->active == "1")
                                                <td>

                                                    {!! Form::open(['method' => 'DELETE','style' => 'display:inline', 'url' =>['contactperson/destroy', $contactperson->contactpersonID]])!!}

                                                    {!! Form::button('Deaktivere', array(
                                                    'class' => 'btn btn-danger', 'onclick' => "func('contactperson/destroy/$contactperson->contactpersonID')",
                                                    'data-toggle' => 'modal',
                                                    'data-target' => '#confirmDelete'
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
                                                        'data-target' => '#confirmDelete'
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

                        @elseif($siden == 5)

                            <tr><td class="besokerikke" width="12%" onclick="oc('/editpage?side=1'),$siden=1">{{trans('general.users')}}</td>
                                <td class="besokerikke" width="12%" onclick="oc('/editpage?side=2'),$siden=2">{{trans('general.projects')}}</td>
                                <td class="besokerikke" width="12%" onclick="oc('/editpage?side=3'),$siden=3">{{trans('general.builders')}}</td>
                                <td class="besokerikke" width="12%" onclick="oc('/editpage?side=4'),$siden=4">{{trans('general.contactpersons')}}</td>
                                <td class="besokerikke" width="12%"onclick="oc('/editpage?side=0'),$siden=0">{{trans('general.cars')}}</td>
                                <td class="besoker" width="12%"onclick="oc('/editpage?side=5'),$siden=5">Firmaer</td>
                                <td class="tom" width="28%">&nbsp;</td></tr>

                            <tr><td colspan="3" class="innholdeasynav"><br>

                            <tr><table class="table" cellspacing="5" id="firmavisning" style="color:grey";>
                                    <thead>
                                    <tr>
                                        <th>FIRMAID</th>
                                        <th>FIRMANAVN</th>
                                        <th>ROLLE</th>
                                        <th>AKTIV</th>

                                        <th> </th>

                                    </tr>

                                    </thead>

                                    @foreach ($companies as $company)

                                        <tbody>
                                        <tr>
<div id="utlisting" style="color:white";>
                                            <td id="utlisting" style="color:burlywood";> {{$company->companyID}}<br></td>
                                            <td id="utlisting" style="color:burlywood";>  {{$company->companyname}}<br></td>
                                            <td id="utlisting" style="color:burlywood";>  {{$company->role}}<br></td>
                                            <td id="utlisting" style="color:burlywood";>  {{$company->active}}<br></td>
</div>
                                            @if($company->active == "1")
                                                <td>

                                                    {!! Form::open(['method' => 'DELETE','style' => 'display:inline', 'url' =>['company/destroy', $company->companyID]])!!}

                                                    {!! Form::button('Deaktivere', array(
                                                    'class' => 'btn btn-danger', 'onclick' => "func('company/destroy/$company->companyID')",
                                                    'data-toggle' => 'modal',
                                                    'data-target' => '#confirmDelete'
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
                                                    'data-target' => '#confirmDelete'
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

                            {!! $companies->render()!!}
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