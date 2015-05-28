@extends('app')


<link href="//netdna.bootstrapcdn.com/bootstrap.3.0.3/css/bootstrap.min.css/" rel="stylesheet">

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">{{trans('general.administration')}}</div>
                    <div class="panel-body2">

                        <table class="easynav"> <!--easynav start -->

                            @if($siden==0)
                                <!--forste tr-->            <tr><td class="besokerikke12" width="12%" onclick="oc('/editpage?side=1'),$siden=1">{{trans('general.users')}}</td>
                                    <td class="besokerikke12" onclick="oc('/editpage?side=2'),$siden=2">{{trans('general.projects')}}</td>
                                    <td class="besokerikke12" onclick="oc('/editpage?side=3'),$siden=3">{{trans('general.builders')}}</td>
                                    <td class="besokerikke12" onclick="oc('/editpage?side=4'),$siden=4">{{trans('general.contactpersons')}}</td>
                                    <td class="besoker12" onclick="oc('/editpage?side=0'),$siden=0">{{trans('general.cars')}}</td>
                                    <td class="besokerikke12" onclick="oc('/editpage?side=5'),$siden=5">{{trans('general.companies')}}</td>
                                    <td class="tom28" width="28%">&nbsp;</td></tr>


                                <!--start td innholdeasynavn --> <tr> <td colspan="7" class="innholdeasynav">

                                        <nav style="padding-left: 20px">
                                            <table class="tablesmall95grey">
                                                <br>
                                                <tr>
                                                    <th class="width20" >{{trans('general.registrationNrLarge')}}</th>
                                                    <th class="width20" >{{trans('general.nicknameLarge')}}</th>
                                                    <th class="width20" >{{trans('general.modelLarge')}}</th>
                                                    <th class="width30" ></th>

                                                </tr>

                                            </table>
                                        </nav>



                                        @foreach ($cars as $car)

                                            <nav class = "navet">
                                                <table class="tablesmall95grey2">

                                                    <tr style="color:grey">
                                                        <td class="utlisting20" > {{$car->registrationNR}}</td>
                                                        <td class="utlisting20"> {{$car->nickname}}<br /></td>
                                                        <td class="utlisting20"> {{$car->brand}}<br /><br /></td>

                                                        @if($car->active == "1")
                                                            <td class="utlisting30">

                                                                <!--deaktivere knapp -->

                                                                {!! Form::open(['method' => 'DELETE','style' => 'display:inline', 'url' =>['car/destroy', $car->registrationNR]])!!}
                                                                {!! Form::button(trans('general.deactivate'), array(
                                                                'class' => 'btn btn-danger', 'onclick' => "func('car/destroy/$car->registrationNR')",
                                                                'data-toggle' => 'modal',
                                                                'data-target' => '#confirmDelete'
                                                                ))
                                                                !!}
                                                                {!! Form::close() !!}


                                                                {!! Form::open(['method' => 'get','style' => 'display:inline', 'action' =>['CarController@edit', $car->registrationNR]]) !!}
                                                                {!! Form::submit(trans('general.edit'), ['class' => 'btn']) !!}
                                                                {!! Form::close() !!}

                                                                {!! Form::open(['method' => 'get','style' => 'display:inline', 'action' =>['CarController@show', $car->registrationNR]]) !!}
                                                                {!! Form::submit(trans('general.seeMore'), ['class' => 'btn ']) !!}
                                                                {!! Form::close() !!}

                                                        @else

                                                            <td class="utlisting30">
                                                                <!--aktivere knapp-->
                                                                {!! Form::open(['method' => 'PATCH','style' => 'display:inline', 'url' =>['car/aktiver', $car->registrationNR]])!!}
                                                                {!! Form::button(trans('general.activate'), array(
                                                                'class' => 'btn btn-success', 'onclick' => "func('car/aktiver/$car->registrationNR')",
                                                                'data-toggle' => 'modal',
                                                                'data-target' => '#confirmDelete'
                                                                ))
                                                                !!}
                                                                {!! Form::close() !!}

                                                                {!! Form::open(['method' => 'get','style' => 'display:inline', 'action' =>['CarController@edit', $car->registrationNR]]) !!}
                                                                {!! Form::submit(trans('general.edit'), ['class' => 'btn ']) !!}
                                                                {!! Form::close() !!}

                                                                {!! Form::open(['method' => 'get','style' => 'display:inline', 'action' =>['CarController@show', $car->registrationNR]]) !!}
                                                                {!! Form::submit(trans('general.seeMore'), ['class' => 'btn ']) !!}
                                                                {!! Form::close() !!}


                                                                @endif

                                                            </td> </tr>
                                                    @endforeach
                                                </table>
                                            </nav>



                                            <input type='hidden' value='' id='gjemt'>
                                            <script>
                                                function func(variabelen){
                                                    var knapp= document.getElementById('gjemt').value = variabelen;

                                                }
                                            </script>



                                            {!! $cars->render()!!}
                                            @include('includes.jara_confirm')




                                    </td>  </tr>

                                <!-- REDIGERE BRUKERE -->

                            @elseif($siden==1)

                                <tr><td class="besoker12" onclick="oc('/editpage?side=1'),$siden=1">{{trans('general.users')}}</td>
                                    <td class="besokerikke12" onclick="oc('/editpage?side=2'),$siden=2">{{trans('general.projects')}}</td>
                                    <td class="besokerikke12" onclick="oc('/editpage?side=3'),$siden=3">{{trans('general.builders')}}</td>
                                    <td class="besokerikke12" onclick="oc('/editpage?side=4'),$siden=4">{{trans('general.contactpersons')}}</td>
                                    <td class="besokerikke12" onclick="oc('/editpage?side=0'),$siden=0">{{trans('general.cars')}}</td>
                                    <td class="besokerikke12" onclick="oc('/editpage?side=5'),$siden=5">{{trans('general.companies')}}</td>
                                    <td class="tom28">&nbsp;</td></tr>


                                <tr> <td colspan="7" class="innholdeasynav">

                                        <nav style="padding-left: 20px">
                                            <table class="tablesmall95grey" id="brukervisning">
                                                <br />
                                                <tr>
                                                    <th class="width20">{{trans('general.nameLarge')}}</th>
                                                    <th class="width20">{{trans('general.tlfLarge')}}</th>
                                                    <th class="width20">{{trans('general.addressLarge')}}</th>
                                                    <th class="width30"></th>

                                                </tr>

                                            </table>
                                        </nav>



                                        @foreach ($users as $user)

                                            <nav class = "navet">
                                                <table class="tablesmall95grey2">

                                                    <tr style="color:grey">
                                                        <td class="utlisting20"> {{$user->firstname}} {{$user->lastname}}</td>
                                                        <td class="utlisting20"> {{$user->telephone}}<br /></td>
                                                        <td class="utlisting20"> {{$user->address}}<br /><br /></td>

                                                        @if($user->active == "1")
                                                            <td class="utlisting30">

                                                                <!--deaktivere knapp -->

                                                                {!! Form::open(['method' => 'DELETE','style' => 'display:inline', 'url' =>['/editpage/destroy', $user->id]])!!}

                                                                {!! Form::button(trans('general.deactivate'), array(
                                                                'class' => 'btn btn-danger', 'onclick' => "func('/editpage/destroy/$user->id')",
                                                                'data-toggle' => 'modal',
                                                                'data-target' => '#confirmDelete'
                                                                ))
                                                                !!}
                                                                {!! Form::close() !!}

                                                                {!! Form::open(['method' => 'get','style' => 'display:inline', 'action' =>['EditpageController@edit', $user->id]]) !!}
                                                                {!! Form::submit(trans('general.edit'), ['class' => 'btn ']) !!}
                                                                {!! Form::close() !!}

                                                                {!! Form::open(['method' => 'get','style' => 'display:inline', 'action' =>['EditpageController@showuser', $user->id]]) !!}
                                                                {!! Form::submit(trans('general.seeMore'), ['class' => 'btn ']) !!}
                                                                {!! Form::close() !!}



                                                        @else

                                                            <td id="utlisting30">
                                                                <!--aktivere knapp-->

                                                                {!! Form::open(['method' => 'PATCH','style' => 'display:inline', 'url' =>['/editpage/aktiver', $user->id]])!!}
                                                                {!! Form::button(trans('general.activate'), array(
                                                                'class' => 'btn btn-success', 'onclick' => "func('/editpage/aktiver/$user->id')",
                                                                'data-toggle' => 'modal',
                                                                'data-target' => '#confirmDelete'
                                                                ))
                                                                !!}
                                                                {!! Form::close() !!}

                                                                {!! Form::open(['method' => 'get','style' => 'display:inline', 'action' =>['EditpageController@edit', $user->id]]) !!}
                                                                {!! Form::submit(trans('general.edit'), ['class' => 'btn ']) !!}
                                                                {!! Form::close() !!}

                                                                {!! Form::open(['method' => 'get','style' => 'display:inline', 'action' =>['EditpageController@showuser', $user->id]]) !!}
                                                                {!! Form::submit(trans('general.seeMore'), ['class' => 'btn ']) !!}
                                                                {!! Form::close() !!}

                                                                @endif

                                                            </td>



                                                    </tr></table></nav>


                                        @endforeach
                                        <input type='hidden' value='' id='gjemt'>
                                        <script>
                                            function func(variabelen){
                                                var knapp= document.getElementById('gjemt').value = variabelen;

                                            }
                                        </script>





                                        {!! $users->render()!!}
                                        @include('includes.jara_confirm')





                                        <!-- REDIGERE Prosjekter -->

                                        @elseif($siden == 2)

                                <tr><td class="besokerikke12" onclick="oc('/editpage?side=1'),$siden=1">{{trans('general.users')}}</td>
                                    <td class="besoker12" onclick="oc('/editpage?side=2'),$siden=2">{{trans('general.projects')}}</td>
                                    <td class="besokerikke12" onclick="oc('/editpage?side=3'),$siden=3">{{trans('general.builders')}}</td>
                                    <td class="besokerikke12" onclick="oc('/editpage?side=4'),$siden=4">{{trans('general.contactpersons')}}</td>
                                    <td class="besokerikke12" onclick="oc('/editpage?side=0'),$siden=0">{{trans('general.cars')}}</td>
                                    <td class="besokerikke12" onclick="oc('/editpage?side=5'),$siden=5">{{trans('general.companies')}}</td>
                                    <td class="tom28">&nbsp;</td></tr>


                                <tr> <td colspan="7" class="innholdeasynav">

                                        <nav style="padding-left: 20px">
                                            <table class="tablesmall95grey" id="prosjektvisning">
                                                <br />
                                                <tr>
                                                    <th class="width20">{{trans('general.projectnameLarge')}}</th>
                                                    <th class="width20">{{trans('general.projectaddressLarge')}}</th>
                                                    <th class="width20">{{trans('general.startTimeLarge')}}</th>
                                                    <th class="width30"></th>
                                                </tr>
                                            </table>
                                        </nav>



                                        @foreach ($projects as $project)

                                            <nav class = "navet">
                                                <table class="tablesmall95grey2">

                                                    <tr style="color:grey">
                                                        <td class="utlisting20"> {{$project->projectName}}</td>
                                                        <td class="utlisting20"> {{$project->projectAddress}}<br /></td>
                                                        <td class="utlisting20"> {{$project->startDate}}<br /><br /></td>

                                                        @if($project->active == "1")
                                                            <td class="utlisting30">

                                                                <!--deaktivere knapp -->


                                                                {!! Form::open(['method' => 'DELETE','style' => 'display:inline', 'url' =>['project/destroy', $project->projectID]])!!}

                                                                {!! Form::button(trans('general.deactivate'), array(
                                                                'class' => 'btn btn-danger', 'onclick' => "func('project/destroy/$project->projectID')",
                                                                'data-toggle' => 'modal',
                                                                'data-target' => '#confirmDelete'
                                                                ))
                                                                !!}
                                                                {!! Form::close() !!}

                                                                {!! Form::open(['method' => 'get','style' => 'display:inline', 'action' =>['PagesController@edit', $project->projectID]]) !!}
                                                                {!! Form::submit(trans('general.edit'), ['class' => 'btn ']) !!}
                                                                {!! Form::close() !!}

                                                                {!! Form::open(['method' => 'get','style' => 'display:inline', 'action' =>['PagesController@show', $project->projectID]]) !!}
                                                                {!! Form::submit(trans('general.seeMore'), ['class' => 'btn ']) !!}
                                                                {!! Form::close() !!}


                                                        @else

                                                            <td class="utlisting30">
                                                                <!--aktivere knapp-->

                                                                {!! Form::open(['method' => 'PATCH','style' => 'display:inline', 'url' =>['project/aktiver', $project->projectID]])!!}
                                                                {!! Form::button(trans('general.activate'), array(
                                                                'class' => 'btn btn-success', 'onclick' => "func('project/aktiver/$project->projectID')",
                                                                'data-toggle' => 'modal',
                                                                'data-target' => '#confirmDelete'
                                                                ))
                                                                !!}
                                                                {!! Form::close() !!}

                                                                {!! Form::open(['method' => 'get','style' => 'display:inline', 'action' =>['PagesController@edit', $project->projectID]]) !!}
                                                                {!! Form::submit(trans('general.edit'), ['class' => 'btn ']) !!}
                                                                {!! Form::close() !!}

                                                                {!! Form::open(['method' => 'get','style' => 'display:inline', 'action' =>['PagesController@show', $project->projectID]]) !!}
                                                                {!! Form::submit(trans('general.seeMore'), ['class' => 'btn ']) !!}
                                                                {!! Form::close() !!}

                                                                @endif

                                                            </td> </tr></table></nav>

                                        @endforeach
                                        <input type='hidden' value='' id='gjemt'>
                                        <script>
                                            function func(variabelen){
                                                var knapp= document.getElementById('gjemt').value = variabelen;

                                            }
                                        </script>


                                        {!! $projects->render()!!}
                                        @include('includes.jara_confirm')




                                        <!-- REDIGERE BYGGHERRER -->

                                        @elseif($siden == 3)

                                <tr><td class="besokerikke12" onclick="oc('/editpage?side=1'),$siden=1">{{trans('general.users')}}</td>
                                    <td class="besokerikke12" onclick="oc('/editpage?side=2'),$siden=2">{{trans('general.projects')}}</td>
                                    <td class="besoker12" onclick="oc('/editpage?side=3'),$siden=3">{{trans('general.builders')}}</td>
                                    <td class="besokerikke12" onclick="oc('/editpage?side=4'),$siden=4">{{trans('general.contactpersons')}}</td>
                                    <td class="besokerikke12" onclick="oc('/editpage?side=0'),$siden=0">{{trans('general.cars')}}</td>
                                    <td class="besokerikke12" onclick="oc('/editpage?side=5'),$siden=5">{{trans('general.companies')}}</td>
                                    <td class="tom28">&nbsp;</td></tr>


                                <tr> <td colspan="7" class="innholdeasynav">

                                        <nav style="padding-left: 20px">
                                            <table class="tablesmall95grey" id="byggherrevisning">
                                                <br />
                                                <tr>
                                                    <th class="width20">{{trans('general.customerNameLarge')}}</th>
                                                    <th class="width20">{{trans('general.customerAddressLarge')}}</th>
                                                    <th class="width20">{{trans('general.customerTelephoneLarge')}}</th>
                                                    <th class="width30"></th>

                                                </tr>

                                            </table>
                                        </nav>



                                        @foreach ($builders as $builder)

                                            <nav class = "navet">
                                                <table class="tablesmall95grey2">

                                                    <tr style="color:grey">
                                                        <td class="utlisting20"> {{$builder->customername}}</td>
                                                        <td class="utlisting20"> {{$builder->customeraddress}}<br /></td>
                                                        <td class="utlisting20"> {{$builder->customertelephone}}<br /><br /></td>
                                                        <!-- <td>{!! Form::open(['url' => 'editpage']) !!}

                                                            @foreach ($posts as $post)

                                                                @if($post->customerID == $builder->customerID)
                                                                    <p style="color:lightblue";>{{ $post->projectName }}</p>

                                                                @endif

                                                        @endforeach

                                                                {!! Form::close() !!}
                                                                <br /></td>   -->

                                                        @if($builder->active == "1")
                                                            <td class="utlisting30">

                                                                <!--deaktivere knapp -->

                                                                {!! Form::open(['method' => 'DELETE','style' => 'display:inline', 'url' =>['builder/destroy', $builder->customerID]])!!}

                                                                {!! Form::button(trans('general.deactivate'), array(
                                                                'class' => 'btn btn-danger', 'onclick' => "func('builder/destroy/$builder->customerID')",
                                                                'data-toggle' => 'modal',
                                                                'data-target' => '#confirmDelete'
                                                                ))
                                                                !!}
                                                                {!! Form::close() !!}

                                                                {!! Form::open(['method' => 'get','style' => 'display:inline', 'action' =>['BuilderController@edit', $builder->customerID]]) !!}
                                                                {!! Form::submit(trans('general.edit'), ['class' => 'btn ']) !!}
                                                                {!! Form::close() !!}

                                                                {!! Form::open(['method' => 'get','style' => 'display:inline', 'action' =>['BuilderController@show', $builder->customerID]]) !!}
                                                                {!! Form::submit(trans('general.seeMore'), ['class' => 'btn ']) !!}
                                                                {!! Form::close() !!}
                                                        @else

                                                            <td class="utlisting30">
                                                                <!--aktivere knapp-->
                                                                {!! Form::open(['method' => 'PATCH','style' => 'display:inline', 'url' =>['builder/aktiver', $builder->customerID]])!!}

                                                                {!! Form::button(trans('general.activate'), array(
                                                                'class' => 'btn btn-success', 'onclick' => "func('builder/aktiver/$builder->customerID')",
                                                                'data-toggle' => 'modal',
                                                                'data-target' => '#confirmDelete'
                                                                ))
                                                                !!}
                                                                {!! Form::close() !!}

                                                                {!! Form::open(['method' => 'get','style' => 'display:inline', 'action' =>['BuilderController@edit', $builder->customerID]]) !!}
                                                                {!! Form::submit(trans('general.edit'), ['class' => 'btn ']) !!}
                                                                {!! Form::close() !!}

                                                                {!! Form::open(['method' => 'get','style' => 'display:inline', 'action' =>['BuilderController@show', $builder->customerID]]) !!}
                                                                {!! Form::submit(trans('general.seeMore'), ['class' => 'btn ']) !!}
                                                                {!! Form::close() !!}

                                                                @endif

                                                            </td> </tr>


                                                    @endforeach
                                                </table> </nav>
                                            <input type='hidden' value='' id='gjemt'>
                                            <script>
                                                function func(variabelen){
                                                    var knapp= document.getElementById('gjemt').value = variabelen;

                                                }
                                            </script>





                                            {!! $builders->render()!!}
                                            @include('includes.jara_confirm')





                                            <!-- REDIGERE KONTAKTPERSONER -->

                                            @elseif($siden == 4)

                                <tr><td class="besokerikke12" onclick="oc('/editpage?side=1'),$siden=1">{{trans('general.users')}}</td>
                                    <td class="besokerikke12" onclick="oc('/editpage?side=2'),$siden=2">{{trans('general.projects')}}</td>
                                    <td class="besokerikke12" onclick="oc('/editpage?side=3'),$siden=3">{{trans('general.builders')}}</td>
                                    <td class="besoker12" onclick="oc('/editpage?side=4'),$siden=4">{{trans('general.contactpersons')}}</td>
                                    <td class="besokerikke12" onclick="oc('/editpage?side=0'),$siden=0">{{trans('general.cars')}}</td>
                                    <td class="besokerikke12" onclick="oc('/editpage?side=5'),$siden=5">{{trans('general.companies')}}</td>
                                    <td class="tom28">&nbsp;</td></tr>

                                <tr> <td colspan="7" class="innholdeasynav">

                                        <nav style="padding-left: 20px">
                                            <table class="tablesmall95grey">
                                                <br>
                                                <tr>
                                                    <th class="width20">{{trans('general.firstnameLarge')}}</th>
                                                    <th class="width20">{{trans('general.surnameLarge')}}</th>
                                                    <th class="width20">{{trans('general.telephoneLarge')}}</th>
                                                    <th class="width30"></th>

                                                </tr>

                                            </table>
                                        </nav>


                                        @foreach ($contactpersons as $contactperson)

                                            <nav class = "navet">
                                                <table class="tablesmall95grey2">

                                                    <tr style="color:grey">
                                                        <td class="utlisting20"> {{$contactperson->contactname}}</td>
                                                        <td class="utlisting20"> {{$contactperson->contactsurname}}<br /></td>
                                                        <td class="utlisting20"> {{$contactperson->contacttelephone}}<br /><br /></td>

                                                        @if($contactperson->active == "1")
                                                            <td class="utlisting30">

                                                                <!--deaktivere knapp -->

                                                                {!! Form::open(['method' => 'DELETE','style' => 'display:inline', 'url' =>['contactperson/destroy', $contactperson->contactpersonID]])!!}

                                                                {!! Form::button(trans('general.deactivate'), array(
                                                                'class' => 'btn btn-danger', 'onclick' => "func('contactperson/destroy/$contactperson->contactpersonID')",
                                                                'data-toggle' => 'modal',
                                                                'data-target' => '#confirmDelete'
                                                                ))
                                                                !!}
                                                                {!! Form::close() !!}

                                                                {!! Form::open(['method' => 'get','style' => 'display:inline', 'action' =>['ContactpersonController@edit', $contactperson->contactpersonID]]) !!}
                                                                {!! Form::submit(trans('general.edit'), ['class' => 'btn ']) !!}
                                                                {!! Form::close() !!}

                                                                {!! Form::open(['method' => 'get','style' => 'display:inline', 'action' =>['ContactpersonController@show', $contactperson->contactpersonID]]) !!}
                                                                {!! Form::submit(trans('general.seeMore'), ['class' => 'btn ']) !!}
                                                                {!! Form::close() !!}



                                                        @else

                                                            <td class="utlisting30">
                                                                <!--aktivere knapp-->

                                                                {!! Form::open(['method' => 'PATCH','style' => 'display:inline', 'url' =>['contactperson/aktiver', $contactperson->contactpersonID]])!!}
                                                                {!! Form::button(trans('general.activate'), array(
                                                                'class' => 'btn btn-success', 'onclick' => "func('contactperson/aktiver/$contactperson->contactpersonID')",
                                                                'data-toggle' => 'modal',
                                                                'data-target' => '#confirmDelete'
                                                                ))
                                                                !!}
                                                                {!! Form::close() !!}

                                                                {!! Form::open(['method' => 'get','style' => 'display:inline', 'action' =>['ContactpersonController@edit', $contactperson->contactpersonID]]) !!}
                                                                {!! Form::submit(trans('general.edit'), ['class' => 'btn ']) !!}
                                                                {!! Form::close() !!}

                                                                {!! Form::open(['method' => 'get','style' => 'display:inline', 'action' =>['ContactpersonController@show', $contactperson->contactpersonID]]) !!}
                                                                {!! Form::submit(trans('general.seeMore'), ['class' => 'btn ']) !!}
                                                                {!! Form::close() !!}



                                                                @endif

                                                            </td> </tr>


                                                    @endforeach
                                                </table>

                                            </nav>
                                            <input type='hidden' value='' id='gjemt'>
                                            <script>
                                                function func(variabelen){
                                                    var knapp= document.getElementById('gjemt').value = variabelen;

                                                }
                                            </script>





                                            {!! $contactpersons->render()!!}
                                            @include('includes.jara_confirm')



                                    </td>  </tr>

                                <!-- REDIGERE FIRMA -->

                            @elseif($siden == 5)

                                <tr><td class="besokerikke12" onclick="oc('/editpage?side=1'),$siden=1">{{trans('general.users')}}</td>
                                    <td class="besokerikke12" onclick="oc('/editpage?side=2'),$siden=2">{{trans('general.projects')}}</td>
                                    <td class="besokerikke12" onclick="oc('/editpage?side=3'),$siden=3">{{trans('general.builders')}}</td>
                                    <td class="besokerikke12" onclick="oc('/editpage?side=4'),$siden=4">{{trans('general.contactpersons')}}</td>
                                    <td class="besokerikke12" onclick="oc('/editpage?side=0'),$siden=0">{{trans('general.cars')}}</td>
                                    <td class="besoker12" onclick="oc('/editpage?side=5'),$siden=5">{{trans('general.companies')}}</td>
                                    <td class="tom28">&nbsp;</td></tr>

                                <tr> <td colspan="7" class="innholdeasynav">

                                        <nav style="padding-left: 20px">
                                            <table class="tablesmall95grey" id="firmavisning">
                                                <br />
                                                <tr>
                                                    <th class="width20">{{trans('general.companyidLarge')}}</th>
                                                    <th class="width20">{{trans('general.companynameLarge')}}</th>
                                                    <th class="width20">{{trans('general.companyroleLarge')}}</th>
                                                    <th class="width30"></th>

                                                </tr>

                                            </table>
                                        </nav>


                                        @foreach ($companies as $company)

                                            <nav class = "navet">
                                                <table class="tablesmall95grey2">

                                                    <tr style="color:grey">
                                                        <td class="utlisting20"> {{$company->companyID}}</td>
                                                        <td class="utlisting20"> {{$company->companyname}}<br /></td>
                                                        <td class="utlisting20"> {{$company->role}}<br /><br /></td>

                                                        @if($company->active == "1")
                                                            <td class="utlisting30">

                                                                <!--deaktivere knapp -->

                                                                {!! Form::open(['method' => 'DELETE','style' => 'display:inline', 'url' =>['company/destroy', $company->companyID]])!!}

                                                                {!! Form::button(trans('general.deactivate'), array(
                                                                'class' => 'btn btn-danger', 'onclick' => "func('company/destroy/$company->companyID')",
                                                                'data-toggle' => 'modal',
                                                                'data-target' => '#confirmDelete'
                                                                ))
                                                                !!}
                                                                {!! Form::close() !!}

                                                                {!! Form::open(['method' => 'get','style' => 'display:inline', 'action' =>['CompanyController@edit', $company->companyID]]) !!}
                                                                {!! Form::submit(trans('general.edit'), ['class' => 'btn ']) !!}
                                                                {!! Form::close() !!}

                                                                {!! Form::open(['method' => 'get','style' => 'display:inline', 'action' =>['CompanyController@show', $company->companyID]]) !!}
                                                                {!! Form::submit(trans('general.seeMore'), ['class' => 'btn ']) !!}
                                                                {!! Form::close() !!}



                                                        @else

                                                            <td class="utlisting30">

                                                                <!--aktivere knapp-->
                                                                {!! Form::open(['method' => 'PATCH','style' => 'display:inline', 'url' =>['company/aktiver', $company->companyID]])!!}

                                                                {!! Form::button(trans('general.activate'), array(
                                                                'class' => 'btn btn-success', 'onclick' => "func('company/aktiver/$company->companyID')",
                                                                'data-toggle' => 'modal',
                                                                'data-target' => '#confirmDelete'
                                                                ))
                                                                !!}
                                                                {!! Form::close() !!}

                                                                {!! Form::open(['method' => 'get','style' => 'display:inline', 'action' =>['CompanyController@edit', $company->companyID]]) !!}
                                                                {!! Form::submit(trans('general.edit'), ['class' => 'btn ']) !!}
                                                                {!! Form::close() !!}

                                                                {!! Form::open(['method' => 'get','style' => 'display:inline', 'action' =>['CompanyController@show', $company->companyID]]) !!}
                                                                {!! Form::submit(trans('general.seeMore'), ['class' => 'btn ']) !!}
                                                                {!! Form::close() !!}

                                                                @endif

                                                            </td> </tr>


                                                    @endforeach
                                                </table>
                                            </nav>
                                            <input type='hidden' value='' id='gjemt'>
                                            <script>
                                                function func(variabelen){
                                                    var knapp= document.getElementById('gjemt').value = variabelen;

                                                }
                                            </script>





                                            {!! $companies->render()!!}
                                            @include('includes.jara_confirm')


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