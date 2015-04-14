@extends('app')
@section('content')



 <script>
$(function() {
$( "#datepicker" ).datepicker();
});
</script>


<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">

<div class="panel panel-default">
				<div class="panel-heading">Oversikt</div>
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
                                       @if($siden == 0)
                                       
                                       
                                       @elseif($siden == 1)
                                       
                                       
                                       @endif
                                       
                                       
                                       
                                       <h5>Velg måned</h5>
                                        <select name="dato" class='months' onchange="oc('/oversikt?side={{$siden}}&dato=' + this.value)">
                                        @foreach ($selecten as $select)
                                        
                                        <option value="{{ $select->date }}">{{$select->dateshow}}</option>
                                        
                                        
                                        @endforeach
                                        
                                        </select></br></br>
                                                
                                       @if ($resultatene != 0)
                                       <?PHP
                                       $totalt = 0;
                                       $a = 0;
                                       ?>
                                       @foreach($resultatene as $resultat)
                                       <?PHP
                                       
                                       $totalt += (strtotime($resultat->endtime) - strtotime($resultat->starttime)) / 3600;
                                       $a++;
                                       ?>
                                       @endforeach
                                       
                                       <table width='100%' class='framvisning' cellspacing='1' cellpadding='1'><tr><td colspan='7' class='framvisninghoved'>Statistikk</td></tr>
                                           <tr><td class='framvisningrows' colspan='7'>Totalt timer denne måneden: <?PHP echo $totalt; ?>
                                               
                                               
                                               
                                               
                                               
                                               
                                               
                                               
                                                   <table><tr><td>
                               <canvas id="graph" width="400" height="300">  
                               </canvas> </td><td><p id='infoen'></p></br>Timeslønn:</br><input onchange="refreshit(this.value)" type="text" name="lonn"></td><td>
                                                               
                                   
                                   <canvas id="andregraf" height="500" width="500" style="border: 1px solid black;"></canvas>
                                   
                                   
                                   
                               </td><td class="infograf"><p id="andregrafinfo"></p></td></tr></table>
                                                   
                                                
                                             
                                                  
                                                   
                             <script>
                                 function refreshit(lonn){
                                     var alle = <?php echo json_encode($totaltimer); ?>;
                                     
                                     for(var i = 0; i < alle[0].length; i++){
                                         
                                    alle[0][i] = (alle[0][i] * lonn);     
                                    
                                    }
                                    tegn("graph","infoen", alle[1], alle[0]);
                                 }
                                 </script>
                                                   
                                                   
                                                   
                             
                                 
                                 <script>
                                     var alle = <?php echo json_encode($totaltimer); ?>;
                                     tegnpai("andregraf", "andregrafinfo", alle[1], alle[0],1,0.7);
                                     </script>
                                 
                                 
                                 
                                 
                                 
                                 
                                 
                                 
                                 
                                 
                                 
                                 
                                 
                                 
                                                    
                                               
                                               
                                               
                                               
                                               
                                               
                                               </td></tr>
                                           
                                           
                                           
                                           <tr><td class='framvisninghoved'>#</td><td class='framvisninghoved'>Prosjekt</td><td width='20%' class='framvisninghoved'>Kommentar</td><td class='framvisninghoved'>Dato</td><td class='framvisninghoved'>Start</td><td class='framvisninghoved'>Slutt</td><td class='framvisninghoved'>Antall timer</td></tr>
                                           <?PHP
                                           $i = 1;
                                           
                                           ?>
                                       @foreach($resultatene as $resultat)
                                       
                                       <tr><td class='framvisningrows'>{{$i}}</td><td class='framvisningrows'>{{$resultat->projectName}}</td><td class='framvisningrows'>{{$resultat->comment}}<td class='framvisningrows'>{{$resultat->dateshow}}</td><td class='framvisningrows'>{{$resultat->starttime}}</td><td class='framvisningrows'>{{$resultat->endtime}}</td><td class='framvisningrows'><?PHP $antall = (strtotime($resultat->endtime) - strtotime($resultat->starttime)) / 3600; echo $antall; $totalt += $antall;   ?></td></tr>
                                       
                                               
                                               <?PHP
                                               $i++;
                                               ?>
                                               
                                       @endforeach
                                       <tr><td class='framvisningsiste'>Totalt:</td><td class='framvisningsiste'>{{$totalt}}</td></tr></table>
                                       @endif
                                       
                                       
                                            
                                        </center>
                                       
                                                
                                                
                                    </table>
                                   
                                    <script>
                                        
                                        
  
    var obj = <?php echo json_encode($totaltimer); ?>;
    
    tegn("graph", "infoen", obj[1], obj[0]);</script>
</div>
</div>
</div>
</div>
</div>
@endsection


















@stop
