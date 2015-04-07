@extends('app')
@section('content')



 <script>
$(function() {
$( "#datepicker" ).datepicker();
});
</script>

<div id="grey" onclick="test()">&nbsp;</div>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">

<div class="panel panel-default">
				<div class="panel-heading">Register Project</div>
				<div class="panel-body">
                                    
                     
                                    
                                    
                                    
                                    <table class="easynav" width="100%">
                                        
                                        <tr>
                                            @if($siden == 0)
                                            <td class="besoker" width="10%" onclick="oc('/oversikt?side=0')">Timelister</td>
                                            <td class="besokerikke" width="10%" onclick="oc('/oversikt?side=1')">Kjørebok</td>
                                            @else
                                            <td class="besokerikke" width="10%" onclick="oc('/oversikt?side=0')">Timelister</td>
                                            <td class="besoker" width="10%" onclick="oc('/oversikt?side=1')">Kjørebok</td>
                                            @endif
                                            
                                            <td class="tom" width="80%">&nbsp;</td></tr>
                                        
                                        <tr><td colspan="3" class="innholdeasynav">
                                                
                                        <center>
                                            <select name="month" onchange="oc('/oversikt?side={{$siden}}&valg=' + this.value)">
                                                <option value="-1">Velg måned</option>
                                                <option value="0">Januar</option>
                                                <option value="1">Februar</option>
                                                <option value="2">Mars</option>
                                                <option value="3">April</option>
                                                <option value="4">Mai</option>
                                                <option value="5">Juni</option>
                                                <option value="6">Juli</option>
                                                <option value="7">August</option>
                                                <option value="8">September</option>
                                                <option value="9">Oktober</option>
                                                <option value="10">November</option>
                                                <option value="11">Desember</option>
                                                
                                            </select>
                                            
                                            
                                        </center></br><h4>BIL</h4>
                                                </br><h4>BIL</h4></br><h4>BIL</h4></br><h4>BIL</h4></br><h4>BIL</h4></br><h4>BIL</h4></br><h4>BIL</h4></br><h4>BIL</h4>
                                                </br></br>
                                                {{ $siden }}
                                                
                                                {{ Lang::get('general.main') }}
                                    </table>
                                    

</div>
</div>
</div>
</div>
</div>
@endsection


















@stop
