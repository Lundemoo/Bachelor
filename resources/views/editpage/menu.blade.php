@extends('app')
@section('content')
<style>


</style>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Redigering oversikt</div>
                    <div class="panel-body">


                        <table class="easynav" width="100%">

                            <tr><td class="besokerikke" width="10%">Brukere</td><td class="besokerikke" width="10%">Prosjekter</td><td class="besokerikke" width="10%">Byggherrer</td><td class="besokerikke" width="10%">Kontaktpersoner</td><td class="besoker" width="10%">Biler</td><td class="tom" width="70%">&nbsp;</td></tr>

                            <tr><td colspan="3" class="innholdeasynav"></br>


                                    @foreach ($cars as $car)

                                        <article id="jada" class="col-md-6">
                                            <h4> {{$car->registrationNR}}</h4>
                                            <h4>  {{$car->nickname}}</h4>
                                            <a href= "{{ URL::to("/car/{$car->registrationNR}/edit")}} "><i class="redigere"> </i> Redigere</a>
                                            Slette <input name="agree" type="checkbox" value="1">
                                        </article>



                                    @endforeach

                                    {!! $cars->render()!!}

                                </td></tr> </table>











                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection