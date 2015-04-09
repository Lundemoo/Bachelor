@extends('app')
<link href="//netdna.bootstrapcdn.com/bootstrap.3.0.3/css/bootstrap.min.css/" rel="stylesheet">
@section('content')
    <style>
        .panel-body2 {
            padding: 0px;
            background-color: rgba(0, 0, 0, 0.72);
        }

    </style>

    <script type=text/javascript>
        function validate(){
            var remember = document.getElementById('remember');
            if (remember.checked){
                alert("checked") ;
            }else{
                alert("You didn't check it! Let me check it for you.")
            }
        }
    </script>

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


                            <!--kode for å komme til den siden man var på må vel inn her en plass -->






                            <tr><td colspan="3" class="innholdeasynav">


                                    @foreach ($cars as $car)

                                        <article class="col-md-6">
                                            <h4> {{$car->registrationNR}}</h4>
                                            <h4>  {{$car->nickname}}</h4>
                                            <a href= "{{ URL::to("/car/{$car->registrationNR}/edit")}} "><i class="redigere"> </i> Redigere</a>
                                            Slette <input name="agree" type="checkbox" value="1"onclick="validate()">
                                        </article>



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


                                            @foreach ($builders as $builder)

                                                <article class="col-md-6">
                                                    <h4> {{$builder->customername}}</h4>
                                                    <a href= "{{ URL::to("/builder/{$builder->customerID}/edit")}} "><i class="redigere"> </i> Redigere</a>
                                                    Slette <input name="agree" type="checkbox" value="1">
                                                </article>



                                            @endforeach

                                            {!! $builders->render()!!}


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


                                        @foreach ($cars as $car)

                                            <article class="col-md-6">
                                                <h4> {{$car->registrationNR}}</h4>
                                                <h4>  {{$car->nickname}}</h4>
                                                <a href= "{{ URL::to("/car/{$car->registrationNR}/edit")}} "><i class="redigere"> </i> Redigere</a>
                                                Slette <input name="agree" type="checkbox" value="1">
                                            </article>



                                        @endforeach

                                        {!! $cars->render()!!}


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
                                                Slette <input name="agree" type="checkbox" value="1">
                                            </article>



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


                                        @foreach ($cars as $car)

                                            <article class="col-md-6">
                                                <h4> {{$car->registrationNR}}</h4>
                                                <h4>  {{$car->nickname}}</h4>
                                                <a href= "{{ URL::to("/car/{$car->registrationNR}/edit")}} "><i class="redigere"> </i> Redigere</a>
                                                Slette <input name="agree" type="checkbox" value="1">
                                            </article>



                                        @endforeach

                                        {!! $cars->render()!!}


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