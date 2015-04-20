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
				<div class="panel-heading">{{trans('general.overview')}}</div>
				    <div class="panel-body">
                                    

                        <table class="easynav" width="100%" cellspacing="0" cellpadding="0">
                                        
                                        <tr>
                                            @if($siden == 0)
                                            <td class="besoker" width="10%" onclick="oc('/oversikt?side=0')">{{trans('general.timesheets')}}</td>
                                            <td class="besokerikke" width="10%" onclick="oc('/oversikt?side=1')">{{trans('general.logbook')}}</td>
                                            @else
                                            <td class="besokerikke" width="10%" onclick="oc('/oversikt?side=0')">{{trans('general.timesheets')}}</td>
                                            <td class="besoker" width="10%" onclick="oc('/oversikt?side=1')">{{trans('general.logbook')}}</td>
                                            @endif
                                            
                                            <td class="tom" width="80%">&nbsp;</td></tr>
                                        
                                        <tr><td colspan="3" class="innholdeasynav">
                                                
                                        <center>
                                            
                                            
                                            
                                            
                                       @if($siden == 0)
                                       
                                       
                                       
                                       
                                       
                                       <table width='100%' class='framvisning' cellspacing='1' cellpadding='1'>
                                           <tr><td class="framvisninghoved" colspan="7">{{trans('general.showOverOversikt')}}</td></tr>
                                           <tr><td colspan="7"></br>
                                            
                                                   <table><tr><td>
                               <canvas id="graph" width="400" height="300">  
                               </canvas> </td><td><p id='infoen'></p></br> {{trans('general.hourPay')}} </br><input onchange="refreshit(this.value)" type="text" name="lonn"></td><td>
                                                               
                                   
                                   <canvas id="andregraf" height="300" width="300" style="border: 1px solid black;"></canvas>
                                   
                                   
                                   
                               </td><td class="infograf"><p id="andregrafinfo"></p></td></tr></table>
                                                   
                                            
                                            
                                            
                                            
                                                    </td></tr>
                                                <tr><td colspan="7"><center>
                                                    
                                                    
                                                    
                                                    <table><tr><td><h5>{{trans('general.chooseMonth')}}</h5></td><td><h5>{{trans('general.chooseProject')}}</h5></td></tr>
                                                                
                                                        <tr><td>
                                                    @if(count($selecten) > 0)
                                                    
                                        <select name="dato" id="dato" class='months'>
                                            <option value="-1">{{trans('general.chooseMonth')}}</option>
                                        @foreach ($selecten as $select)
                                        
                                        <option value="{{ $select->date }}">{{$select->dateshow}}</option>
                                        
                                        
                                        @endforeach
                                        
                                        </select>
                                                    
                                                    @endif
                                                 </td><td>   
                                                    
                                                    @if(count($projects) > 0)
                                                    
                                        <select name="projects" id="projects" class='months'>
                                            <option value="-1">{{trans('general.chooseProject')}}</option>
                                        @foreach ($projects as $project)
                                        
                                        <option value="{{ $project->projectID }}">{{$project->projectName}}</option>
                                        
                                        
                                        @endforeach
                                        
                                        </select>
                                                    @endif
                                                    
                                                    
                                                 </td><td><button onclick="send()">Change</button></td></tr></table>
                                                       
                                                    
                                                    <script>
                                                    function send(){
                                                        
                                                        var e = document.getElementById("dato");
                                                    var strDato = e.options[e.selectedIndex].value;
                                                        var a = document.getElementById("projects");
                                                    var strProject = a.options[a.selectedIndex].value;
                                                    oc('/oversikt?siden=0&dato=' + strDato + '&project=' + strProject);
                                                    }
                                                    </script>
                                                    
                                                    
                                                    </br></br></center></td></tr>
                                       
                                       
                                       
                                       
                                       
                                                
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
                                       
                                       <tr><td colspan='7' class='framvisninghoved'>{{trans('general.statistic')}}</td></tr>
                                           <tr><td class='framvisningrows' colspan='7'>{{trans('general.totalHoursMonth')}} <?PHP echo $totalt; ?>
                                                   </br>{{trans('general.avgPerDay')}}: <?PHP if($a != 0)echo round($totalt/$a, 2); ?>
                                               
                                               
                                               
                                               
                                               
                                               
                                               
                                               
                                                
                                             
                   
                                 
                                 
                                 
                                 
                                 
                                 
                                 
                                 
                                 
                                 
                                 
                                 
                                                    
                                               
                                               
                                               
                                               
                                               
                                               
                                               </td></tr>
                                           
                                           
                                           
                                           <tr><td class='framvisninghoved'>#</td><td class='framvisninghoved'>{{trans('general.project')}}</td><td width='20%' class='framvisninghoved'> {{trans('general.comment')}} </td><td class='framvisninghoved'> {{trans('general.date')}} </td><td class='framvisninghoved'>Start</td><td class='framvisninghoved'>Stop</td><td class='framvisninghoved'> {{trans('general.hourCount')}} </td></tr>
                                           <?PHP
                                           $i = 1;
                                           $totalt = 0;
                                           ?>
                                       @foreach($resultatene as $resultat)
                                       
                                       <tr><td class='framvisningrows'>{{$i}}</td><td class='framvisningrows'>{{$resultat->projectName}}</td><td class='framvisningrows'>{{$resultat->comment}}<td class='framvisningrows'>{{$resultat->dateshow}}</td><td class='framvisningrows'>{{$resultat->starttime}}</td><td class='framvisningrows'>{{$resultat->endtime}}</td><td class='framvisningrows'><?PHP $antall = (strtotime($resultat->endtime) - strtotime($resultat->starttime)) / 3600; echo $antall; $totalt += $antall;   ?></td></tr>
                                       
                                               
                                               <?PHP
                                               $i++;
                                               ?>
                                               
                                       @endforeach
                                       <tr><td class='framvisningsiste'> {{trans('general.total')}} </td><td class='framvisningsiste'>{{$totalt}}</td></tr>
                                       @endif
                                       
                                       </table>
                                            
                                        </center>
                                   
                                        
                                   
                                        
                                        
                                          <script>
                                        
                                        
  
    var obj = <?php echo json_encode($totaltimer); ?>;
    
    tegn("graph", "infoen", obj[1], obj[0]);</script>       
                                          
                                          
                                                                         
                                                   
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
                                     tegnpai("andregraf", "andregrafinfo", alle[1], alle[0],2,0.7);
                                     </script>
                                 
                                 
                                          
                                          
                                    
                                     
                                     
                                     
                                     
                                     
                                     
                                     
                                     
                                     
                                     
                                     
                                     
                                     
                                     
                                     
                                     
                                     
                                     
                                     
                                     
                                     
                                          
                                          
                                          
                                    
                                    @elseif($siden == 1)
                                       
                                    
                                 
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                       
                                       @endif
                                    
                                    
                                    
                                    </table>
                                   
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@stop
