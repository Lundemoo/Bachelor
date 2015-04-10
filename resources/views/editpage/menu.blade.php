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


        .button {
            width: 10px;
            padding: 5px 8px;
            display: inline;
            background: #777 url(button.png) repeat-x bottom;
            border: none;
            color: #fff;
            cursor: pointer;
            border-radius: 5px;
            -moz-border-radius: 5px;
            -webkit-border-radius: 5px;

        }
        .button:hover {
            background-position: 0 center;
            text-decoration: none;
            opacity: 0.75;

        }
        .button:active {
            background-position: 0 top;
            position: relative;
            top: 1px;
            padding: 6px 10px 4px;
        }

        .button.orange { background-color: #ff9c00; }



    </style>

    <script type=text/javascript>
        function validate(){
            var remember = document.getElementById('remember');
            if (remember.checked){
                alert("checked") ;
                $verdi = document.getElementById("remember").getAttribute("value");
                alert("verdien er" + $verdi);
            }else{
                alert("You didn't check it! Let me check it for you.")
            }
        }
    </script>

    <script>
        function CustomAlert(){
            this.render = function(dialog){
                var winW = window.innerWidth;
                var winH = window.innerHeight;
                var dialogoverlay = document.getElementById('dialogoverlay');
                var dialogbox = document.getElementById('dialogbox');
                dialogoverlay.style.display = "block";
                dialogoverlay.style.height = winH+"px";
                dialogbox.style.left = (winW/2) - (550 * .5)+"px";
                dialogbox.style.top = "100px";
                dialogbox.style.display = "block";
                document.getElementById('dialogboxhead').innerHTML = "Acknowledge This Message";
                document.getElementById('dialogboxbody').innerHTML = dialog;
                document.getElementById('dialogboxfoot').innerHTML = '<button onclick="Alert.ok()">OK</button>';
            }
            this.ok = function(){
                document.getElementById('dialogbox').style.display = "none";
                document.getElementById('dialogoverlay').style.display = "none";
            }
        }
        var Alert = new CustomAlert();
    </script>

    <style>
        #dialogoverlay{
            display: none;
            opacity: .8;
            position: fixed;
            top: 0px;
            left: 0px;
            background: #FFF;
            width: 100%;
            z-index: 10;
        }
        #dialogbox{
            display: none;
            position: fixed;
            background: #000;
            border-radius:7px;
            width:550px;
            z-index: 10;
        }
        #dialogbox > div{ background:#666;; margin:8px; }
        #dialogbox > div > #dialogboxhead{ background: #666; font-size:19px; padding:10px; color:#CCC; }
        #dialogbox > div > #dialogboxbody{ background: orangered; padding:20px; color:#FFF; }
        #dialogbox > div > #dialogboxfoot{ background: #666; padding:10px; text-align:right; }
    </style>



    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Redigering oversikt</div>
                    <div class="panel-body2">

                        <!-- alertboks -->
                        <div id="dialogoverlay"></div>
                        <div id="dialogbox">
                            <div>
                                <div id="dialogboxhead"></div>
                                <div id="dialogboxbody"></div>
                                <div id="dialogboxfoot"></div>
                            </div>
                        </div>


                        <table class="easynav" width="100%">

                            @if($siden==0)
                            <tr><td class="besokerikke" width="12%" onclick="oc('/editpage?side=1'),$siden=1">Brukere</td>
                                <td class="besokerikke" width="12%" onclick="oc('/editpage?side=2'),$siden=2">Prosjekter</td>
                                <td class="besokerikke" width="12%" onclick="oc('/editpage?side=3'),$siden=3">Byggherrer</td>
                                <td class="besokerikke" width="12%" onclick="oc('/editpage?side=4'),$siden=4">Kontaktpersoner</td>
                                <td class="besoker" width="12%"onclick="oc('/editpage?side=0'),$siden=0">Biler</td>
                                <td class="tom" width="40%">&nbsp;</td></tr>



                            <tr><td colspan="3" class="innholdeasynav">


                                    @foreach ($cars as $car)

                                        <article class="col-md-6">

                                            <h4> {{$car->registrationNR}}</h4>
                                            <h4>  {{$car->nickname}}</h4>

                                        <!--    <button id="editknapp"><a href= "{{ URL::to("/car/{$car->registrationNR}/edit")}} " onclick="if(!confirm('Are you sure to delete this item?')){return false;};"><i class="redigere"> </i> Redigere</a></button> -->
                                            <div class="form-group">
                                <a href="{{ URL::to("/car/{$car->registrationNR}/edit")}} " class='button orange'  onclick="if(!confirm('Are you sure to edit this item?')){return false;};">Rediger</a>
                                            </div>
                                             {!! Form::open(['method' => 'DELETE', 'url' =>['car/destroy', $car->registrationNR],'onsubmit'=>"Alert.render('Sikker på at du vil slette?');"]) !!}
                                            <div class="form-group">
                                                    {!! Form::submit('Slette', ['class' => 'btn btn-danger']) !!}

                                                    {!! Form::hidden('registrationNR', $car->registrationNR) !!}
                                                </div>
                                       </article>
                                                {!! Form::close() !!}


                                    @endforeach

                                    {!! $cars->render()!!}


                                </td></tr>

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