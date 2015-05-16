@extends('app')
<style>
    #utlisting{
        border:transparent;
        cellpadding: 20px;

    }
    #tablesmall{
        border-top:5px;
        border-bottom:5px;
        border:transparent;

        cellspacing: 20px;
        cellpadding:20px;

    }

    #tablesmall2{
        border-top:5px;
        border:transparent;
        margin-left: 50px;
        cellspacing: 20px;
        cellpadding:20px;
        border-color:grey;

    }



    .innholdeasynav{
        align:center;
        border: 0px;
    }
    th{
        text-align:center;
        margin-left: 50px;
    }
    td{
        border-color: grey;
        padding:20px;
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
                       
                        <table class="easynav" width="100%"> <!--easynav start -->

                            @if($siden==0)
                <!--forste tr-->            <tr><td class="besokerikke" width="12%" onclick="oc('/editpage?side=1'),$siden=1">{{trans('general.users')}}</td>
                                <td class="besokerikke" width="12%" onclick="oc('/editpage?side=2'),$siden=2">{{trans('general.projects')}}</td>
                                <td class="besokerikke" width="12%" onclick="oc('/editpage?side=3'),$siden=3">{{trans('general.builders')}}</td>
                                <td class="besokerikke" width="12%" onclick="oc('/editpage?side=4'),$siden=4">{{trans('general.contactpersons')}}</td>
                                <td class="besoker" width="12%"onclick="oc('/editpage?side=0'),$siden=0">{{trans('general.cars')}}</td>
                                <td class="besokerikke" width="12%"onclick="oc('/editpage?side=5'),$siden=5">Firmaer</td>
                                <td class="tom" width="28%">&nbsp;</td></tr>




                        <!--start td innholdeasynavn --> <tr> <td colspan="7" class="innholdeasynav">

                                        <center>
                                  <table class="tablesmall" width="95%" id="bilvisning" style="color:grey";>
<br>
                                        <tr>
                                            <th   width="20%" align="left" >{{trans('general.registrationNrLarge')}}</th>
                                            <th   width="20%" align="left" >{{trans('general.nicknameLarge')}}</th>
                                            <th   width="20%" align="left" >{{trans('general.modelLarge')}}</th>
                                            <th width="30%" align="left"></th>

                                        </tr>

                                    </table>
                                            <br>
                                        </center>

                                    @foreach ($cars as $car)

                                            <center>
                                          <table class="tablesmall2"  width="95%" align="center" style="color:grey">

                                              <tr style="color:grey">
                                            <td id="utlisting" width="20%" align="left" style="color:burlywood"> {{$car->registrationNR}}</td>
                                            <td id="utlisting" width="20%" align="left" style="color:burlywood"> {{$car->nickname}}<br></td>
                                            <td id="utlisting" width="20%" align="left" style="color:burlywood"> {{$car->brand}}<br><br></td>

                                                @if($car->active == "1")
                                            <td id="utlisting" width="30%" align="center" style="color: #E26300">

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
                                                {!! Form::submit('Endre', ['class' => 'btn']) !!}
                                                {!! Form::close() !!}

                                                {!! Form::open(['method' => 'get','style' => 'display:inline', 'action' =>['CarController@show', $car->registrationNR]]) !!}
                                                {!! Form::submit('Se mer', ['class' => 'btn ']) !!}
                                                {!! Form::close() !!}

                                                @else

                                                    <td id="utlisting" width="30%" align="center">
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

                                                        {!! Form::open(['method' => 'get','style' => 'display:inline', 'action' =>['CarController@show', $car->registrationNR]]) !!}
                                                        {!! Form::submit('Se mer', ['class' => 'btn ']) !!}
                                                        {!! Form::close() !!}


                                                    @endif

                                                    </td> </tr>


                                            @endforeach
                                            <input type='hidden' value='' id='gjemt'>
                                            <script>
                                            function func(variabelen){
                                                var knapp= document.getElementById('gjemt').value = variabelen;

                                            }
                                            </script>




                            </table>
                                                {!! $cars->render()!!}
                                                @include('includes.jara_confirm')
                                                </center>

                        <!--slutttd innholdeasynavn -->
                        </td>  </tr>  <!--slutt forste tr  -->






                            <!-- REDIGERE BRUKERE -->

                                @elseif($siden==1)

                                <tr><td class="besoker" width="12%" onclick="oc('/editpage?side=1'),$siden=1">{{trans('general.users')}}</td>
                                    <td class="besokerikke" width="12%" onclick="oc('/editpage?side=2'),$siden=2">{{trans('general.projects')}}</td>
                                    <td class="besokerikke" width="12%" onclick="oc('/editpage?side=3'),$siden=3">{{trans('general.builders')}}</td>
                                    <td class="besokerikke" width="12%" onclick="oc('/editpage?side=4'),$siden=4">{{trans('general.contactpersons')}}</td>
                                    <td class="besokerikke" width="12%"onclick="oc('/editpage?side=0'),$siden=0">{{trans('general.cars')}}</td>
                                    <td class="besokerikke" width="12%"onclick="oc('/editpage?side=5'),$siden=5">Firmaer</td>
                                    <td class="tom" width="28%">&nbsp;</td></tr>


                                <!--start td innholdeasynavn --> <tr> <td colspan="7" class="innholdeasynav">

                                        <center>
                                            <table class="tablesmall" width="95%" id="brukervisning" style="color:grey";>
                                                <br>
                                                <tr>
                                                    <th   width="20%" align="left" >brukernavn</th>
                                                    <th   width="20%" align="left" >telefon</th>
                                                    <th   width="20%" align="left" >adresse</th>
                                                    <th width="30%" align="left"></th>

                                                </tr>

                                            </table>
                                            <br>
                                        </center>

                                        @foreach ($users as $user)

                                            <center>
                                                <table class="tablesmall2"  width="95%" align="center" style="color:grey">

                                                    <tr style="color:grey">
                                                        <td id="utlisting" width="20%" align="left" style="color:burlywood"> {{$user->firstname}}</td>
                                                        <td id="utlisting" width="20%" align="left" style="color:burlywood"> {{$user->lastname}}<br></td>
                                                        <td id="utlisting" width="20%" align="left" style="color:burlywood"> {{$user->telephone}}<br><br></td>

                                                        @if($user->active == "1")
                                                            <td id="utlisting" width="30%" align="center" style="color: #E26300">

                                                                <!--deaktivere knapp -->







                                                        @else

                                                            <td id="utlisting" width="30%" align="center">
                                                                <!--aktivere knapp-->





                                                                @endif

                                                            </td> </tr>


                                                    @endforeach
                                                    <input type='hidden' value='' id='gjemt'>
                                                    <script>
                                                        function func(variabelen){
                                                            var knapp= document.getElementById('gjemt').value = variabelen;

                                                        }
                                                    </script>




                                                </table>
                                                {!! $users->render()!!}
                                                @include('includes.jara_confirm')
                                            </center>


                                    </td>  </tr>


                                <!-- REDIGERE Prosjekter -->

                            @elseif($siden == 2)

                                <tr><td class="besokerikke" width="12%" onclick="oc('/editpage?side=1'),$siden=1">{{trans('general.users')}}</td>
                                    <td class="besoker" width="12%" onclick="oc('/editpage?side=2'),$siden=2">{{trans('general.projects')}}</td>
                                    <td class="besokerikke" width="12%" onclick="oc('/editpage?side=3'),$siden=3">{{trans('general.builders')}}</td>
                                    <td class="besokerikke" width="12%" onclick="oc('/editpage?side=4'),$siden=4">{{trans('general.contactpersons')}}</td>
                                    <td class="besokerikke" width="12%"onclick="oc('/editpage?side=0'),$siden=0">{{trans('general.cars')}}</td>
                                    <td class="besokerikke" width="12%"onclick="oc('/editpage?side=5'),$siden=5">Firmaer</td>
                                    <td class="tom" width="28%">&nbsp;</td></tr>


                                <!--start td innholdeasynavn --> <tr> <td colspan="7" class="innholdeasynav">

                                        <center>
                                            <table class="tablesmall" width="95%" id="prosjektvisning" style="color:grey";>
                                                <br>
                                                <tr>
                                                    <th   width="20%" align="left" >PROSJEKTNAVN</th>
                                                    <th   width="20%" align="left" >PROSJEKTADRESSE</th>
                                                    <th   width="20%" align="left" >BUDSJETT</th>
                                                    <th width="30%" align="left"></th>



                                                </tr>

                                            </table>
                                            <br>
                                        </center>

                                        @foreach ($projects as $project)

                                            <center>
                                                <table class="tablesmall2"  width="95%" align="center" style="color:grey">

                                                    <tr style="color:grey">
                                                        <td id="utlisting" width="20%" align="left" style="color:burlywood"> {{$project->projectName}}</td>
                                                        <td id="utlisting" width="20%" align="left" style="color:burlywood"> {{$project->projectAddress}}<br></td>
                                                        <td id="utlisting" width="20%" align="left" style="color:burlywood"> {{$project->budget}}<br><br></td>

                                                        @if($project->active == "1")
                                                            <td id="utlisting" width="30%" align="center" style="color: #E26300">

                                                                <!--deaktivere knapp -->


                                                                {!! Form::open(['method' => 'DELETE','style' => 'display:inline', 'url' =>['project/destroy', $project->projectID]])!!}

                                                                {!! Form::button('Deaktivere', array(
                                                                'class' => 'btn btn-danger', 'onclick' => "func('project/destroy/$project->projectID')",
                                                                'data-toggle' => 'modal',
                                                                'data-target' => '#confirmDelete'
                                                                ))
                                                                !!}
                                                                {!! Form::close() !!}

                                                                {!! Form::open(['method' => 'get','style' => 'display:inline', 'action' =>['PagesController@edit', $project->projectID]]) !!}
                                                                {!! Form::submit('Endre', ['class' => 'btn ']) !!}
                                                                {!! Form::close() !!}

                                                                {!! Form::open(['method' => 'get','style' => 'display:inline', 'action' =>['PagesController@show', $project->projectID]]) !!}
                                                                {!! Form::submit('Se mer', ['class' => 'btn ']) !!}
                                                                {!! Form::close() !!}





                                                        @else

                                                            <td id="utlisting" width="30%" align="center" style="color: #E26300">
                                                                <!--aktivere knapp-->

                                                                {!! Form::open(['method' => 'PATCH','style' => 'display:inline', 'url' =>['project/aktiver', $project->projectID]])!!}
                                                                {!! Form::button('Aktivere', array(
                                                                'class' => 'btn btn-success', 'onclick' => "func('project/aktiver/$project->projectID')",
                                                                'data-toggle' => 'modal',
                                                                'data-target' => '#confirmDelete'
                                                                ))
                                                                !!}
                                                                {!! Form::close() !!}

                                                                {!! Form::open(['method' => 'get','style' => 'display:inline', 'action' =>['PagesController@edit', $project->projectID]]) !!}
                                                                {!! Form::submit('Endre', ['class' => 'btn ']) !!}
                                                                {!! Form::close() !!}

                                                                {!! Form::open(['method' => 'get','style' => 'display:inline', 'action' =>['PagesController@show', $project->projectID]]) !!}
                                                                {!! Form::submit('Se mer', ['class' => 'btn ']) !!}
                                                                {!! Form::close() !!}




                                                                @endif

                                                            </td> </tr>


                                                    @endforeach
                                                    <input type='hidden' value='' id='gjemt'>
                                                    <script>
                                                        function func(variabelen){
                                                            var knapp= document.getElementById('gjemt').value = variabelen;

                                                        }
                                                    </script>




                                                </table>
                                                {!! $projects->render()!!}
                                                @include('includes.jara_confirm')
                                            </center>


                                    </td>  </tr>


                                <!-- REDIGERE BYGGHERRER -->

                            @elseif($siden == 3)

                                <tr><td class="besokerikke" width="12%" onclick="oc('/editpage?side=1'),$siden=1">{{trans('general.users')}}</td>
                                    <td class="besokerikke" width="12%" onclick="oc('/editpage?side=2'),$siden=2">{{trans('general.projects')}}</td>
                                    <td class="besoker" width="12%" onclick="oc('/editpage?side=3'),$siden=3">{{trans('general.builders')}}</td>
                                    <td class="besokerikke" width="12%" onclick="oc('/editpage?side=4'),$siden=4">{{trans('general.contactpersons')}}</td>
                                    <td class="besokerikke" width="12%"onclick="oc('/editpage?side=0'),$siden=0">{{trans('general.cars')}}</td>
                                    <td class="besokerikke" width="12%"onclick="oc('/editpage?side=5'),$siden=5">Firmaer</td>
                                    <td class="tom" width="28%">&nbsp;</td></tr>


                                <tr> <td colspan="7" class="innholdeasynav">

                                        <center>
                                            <table class="tablesmall" width="95%" id="byggherrevisning" style="color:grey";>
                                                <br>
                                                <tr>
                                                    <th   width="20%" align="left" >{{trans('general.customerName')}}</th>
                                                    <th   width="20%" align="left" >{{trans('general.customerAddress')}}</th>
                                                    <th   width="20%" align="left" >{{trans('general.customerTelephone')}}</th>
                                                    <th width="30%" align="left"></th>

                                                </tr>

                                            </table>
                                            <br>
                                        </center>

                                        @foreach ($builders as $builder)

                                            <center>
                                                <table class="tablesmall2"  width="95%" align="center" style="color:grey">

                                                    <tr style="color:grey">
                                                        <td id="utlisting" width="20%" align="left" style="color:burlywood"> {{$builder->customername}}</td>
                                                        <td id="utlisting" width="20%" align="left" style="color:burlywood"> {{$builder->customeraddress}}<br></td>
                                                        <td id="utlisting" width="20%" align="left" style="color:burlywood"> {{$builder->customertelephone}}<br><br></td>
                                                       <!-- <td>{!! Form::open(['url' => 'editpage']) !!}

                                                            @foreach ($posts as $post)

                                                                @if($post->customerID == $builder->customerID)
                                                                    <p style="color:lightblue";>{{ $post->projectName }}</p>

                                                                @endif

                                                            @endforeach

                                                            {!! Form::close() !!}
                                                            <br></td>   -->

                                                        @if($builder->active == "1")
                                                            <td id="utlisting" width="30%" align="center" style="color: #E26300">

                                                                <!--deaktivere knapp -->

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

                                                                {!! Form::open(['method' => 'get','style' => 'display:inline', 'action' =>['BuilderController@show', $builder->customerID]]) !!}
                                                                {!! Form::submit('Se mer', ['class' => 'btn ']) !!}
                                                                {!! Form::close() !!}
                                                        @else

                                                            <td id="utlisting" width="30%" align="center" style="color: #E26300">
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

                                                                {!! Form::open(['method' => 'get','style' => 'display:inline', 'action' =>['BuilderController@show', $builder->customerID]]) !!}
                                                                {!! Form::submit('Se mer', ['class' => 'btn ']) !!}
                                                                {!! Form::close() !!}

                                                                @endif

                                                            </td> </tr>


                                                    @endforeach
                                                    <input type='hidden' value='' id='gjemt'>
                                                    <script>
                                                        function func(variabelen){
                                                            var knapp= document.getElementById('gjemt').value = variabelen;

                                                        }
                                                    </script>




                                                </table>
                                                {!! $builders->render()!!}
                                                @include('includes.jara_confirm')
                                            </center>


                                    </td>  </tr>

                                <!-- REDIGERE KONTAKTPERSONER -->

                            @elseif($siden == 4)

                                <tr><td class="besokerikke" width="12%" onclick="oc('/editpage?side=1'),$siden=1">{{trans('general.users')}}</td>
                                    <td class="besokerikke" width="12%" onclick="oc('/editpage?side=2'),$siden=2">{{trans('general.projects')}}</td>
                                    <td class="besokerikke" width="12%" onclick="oc('/editpage?side=3'),$siden=3">{{trans('general.builders')}}</td>
                                    <td class="besoker" width="12%" onclick="oc('/editpage?side=4'),$siden=4">{{trans('general.contactpersons')}}</td>
                                    <td class="besokerikke" width="12%"onclick="oc('/editpage?side=0'),$siden=0">{{trans('general.cars')}}</td>
                                    <td class="besokerikke" width="12%"onclick="oc('/editpage?side=5'),$siden=5">Firmaer</td>
                                    <td class="tom" width="28%">&nbsp;</td></tr>

                                <!--start td innholdeasynavn --> <tr> <td colspan="7" class="innholdeasynav">

                                        <center>
                                            <table class="tablesmall" width="95%" id="kontaktvisning" style="color:grey";>
                                                <br>
                                                <tr>
                                                    <th   width="20%" align="left" >{{trans('general.firstname')}}</th>
                                                    <th   width="20%" align="left" >{{trans('general.surname')}}</th>
                                                    <th   width="20%" align="left" >{{trans('general.telephone')}}</th>
                                                    <th width="30%" align="left"></th>

                                                </tr>

                                            </table>
                                            <br>
                                        </center>

                                        @foreach ($contactpersons as $contactperson)

                                            <center>
                                                <table class="tablesmall2"  width="95%" align="center" style="color:grey">

                                                    <tr style="color:grey">
                                                        <td id="utlisting" width="20%" align="left" style="color:burlywood"> {{$contactperson->contactname}}</td>
                                                        <td id="utlisting" width="20%" align="left" style="color:burlywood"> {{$contactperson->contactsurname}}<br></td>
                                                        <td id="utlisting" width="20%" align="left" style="color:burlywood"> {{$contactperson->contacttelephone}}<br><br></td>

                                                        @if($contactperson->active == "1")
                                                            <td id="utlisting" width="30%" align="center" style="color: #E26300">

                                                                <!--deaktivere knapp -->

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

                                                                {!! Form::open(['method' => 'get','style' => 'display:inline', 'action' =>['ContactpersonController@show', $contactperson->contactpersonID]]) !!}
                                                                {!! Form::submit('Se mer', ['class' => 'btn ']) !!}
                                                                {!! Form::close() !!}



                                                        @else

                                                            <td id="utlisting" width="30%" align="center" style="color: #E26300">
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

                                                                {!! Form::open(['method' => 'get','style' => 'display:inline', 'action' =>['ContactpersonController@show', $contactperson->contactpersonID]]) !!}
                                                                {!! Form::submit('Se mer', ['class' => 'btn ']) !!}
                                                                {!! Form::close() !!}



                                                                @endif

                                                            </td> </tr>


                                                    @endforeach
                                                    <input type='hidden' value='' id='gjemt'>
                                                    <script>
                                                        function func(variabelen){
                                                            var knapp= document.getElementById('gjemt').value = variabelen;

                                                        }
                                                    </script>




                                                </table>
                                                {!! $contactpersons->render()!!}
                                                @include('includes.jara_confirm')
                                            </center>


                                    </td>  </tr>

                                <!-- REDIGERE FIRMA -->

                        @elseif($siden == 5)

                            <tr><td class="besokerikke" width="12%" onclick="oc('/editpage?side=1'),$siden=1">{{trans('general.users')}}</td>
                                <td class="besokerikke" width="12%" onclick="oc('/editpage?side=2'),$siden=2">{{trans('general.projects')}}</td>
                                <td class="besokerikke" width="12%" onclick="oc('/editpage?side=3'),$siden=3">{{trans('general.builders')}}</td>
                                <td class="besokerikke" width="12%" onclick="oc('/editpage?side=4'),$siden=4">{{trans('general.contactpersons')}}</td>
                                <td class="besokerikke" width="12%"onclick="oc('/editpage?side=0'),$siden=0">{{trans('general.cars')}}</td>
                                <td class="besoker" width="12%"onclick="oc('/editpage?side=5'),$siden=5">Firmaer</td>
                                <td class="tom" width="28%">&nbsp;</td></tr>

                                <tr> <td colspan="7" class="innholdeasynav">

                                        <center>
                                            <table class="tablesmall" width="95%" id="firmavisning" style="color:grey";>
                                                <br>
                                                <tr>
                                                    <th   width="20%" align="left" >{{trans('general.companyid')}}</th>
                                                    <th   width="20%" align="left" >{{trans('general.companyname')}}</th>
                                                    <th   width="20%" align="left" >{{trans('general.companyrole')}}</th>
                                                    <th width="30%" align="left"></th>

                                                </tr>

                                            </table>
                                            <br>
                                        </center>

                                        @foreach ($companies as $company)

                                            <center>
                                                <table class="tablesmall2"  width="95%" align="center" style="color:grey">

                                                    <tr style="color:grey">
                                                        <td id="utlisting" width="20%" align="left" style="color:burlywood"> {{$company->companyID}}</td>
                                                        <td id="utlisting" width="20%" align="left" style="color:burlywood"> {{$company->companyname}}<br></td>
                                                        <td id="utlisting" width="20%" align="left" style="color:burlywood"> {{$company->role}}<br><br></td>

                                                        @if($company->active == "1")
                                                            <td id="utlisting" width="30%" align="center" style="color: #E26300">

                                                                <!--deaktivere knapp -->

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

                                                                {!! Form::open(['method' => 'get','style' => 'display:inline', 'action' =>['CompanyController@show', $company->companyID]]) !!}
                                                                {!! Form::submit('Se mer', ['class' => 'btn ']) !!}
                                                                {!! Form::close() !!}



                                                        @else

                                                            <td id="utlisting" width="30%" align="center" style="color: #E26300">

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

                                                                {!! Form::open(['method' => 'get','style' => 'display:inline', 'action' =>['CompanyController@show', $company->companyID]]) !!}
                                                                {!! Form::submit('Se mer', ['class' => 'btn ']) !!}
                                                                {!! Form::close() !!}

                                                                @endif

                                                            </td> </tr>


                                                    @endforeach
                                                    <input type='hidden' value='' id='gjemt'>
                                                    <script>
                                                        function func(variabelen){
                                                            var knapp= document.getElementById('gjemt').value = variabelen;

                                                        }
                                                    </script>




                                                </table>
                                                {!! $companies->render()!!}
                                                @include('includes.jara_confirm')
                                            </center>

                                    </td>  </tr>

                            @endif

                            </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@stop