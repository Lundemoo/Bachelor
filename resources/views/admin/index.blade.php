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
				    <div class="panel-body2">
                                    

                        <table class="easynav" width="100%" cellspacing="0" cellpadding="0" style="border: 2px solid pink;">
                                        
                                        <tr>
                                            @if($siden == 0)
                                            <td class="besoker" width="10%" onclick="oc('/admin?side=0')">{{trans('general.timesheets')}}</td>
                                            <td class="besokerikke" width="10%" onclick="oc('/admin?side=1')">{{trans('general.logbook')}}</td>
                                             <td class="besokerikke" width="10%" onclick="oc('/admin?side=2')">{{trans('general.exporttimesheet')}}</td>
                                              <td class="besokerikke" width="10%" onclick="oc('/admin?side=3')">{{trans('general.exportlogbook')}}</td>
                                            @elseif($siden == 1)
                                            <td class="besokerikke" width="10%" onclick="oc('/admin?side=0')">{{trans('general.timesheets')}}</td>
                                            <td class="besoker" width="10%" onclick="oc('/admin?side=1')">{{trans('general.logbook')}}</td>
                                            <td class="besokerikke" width="10%" onclick="oc('/admin?side=2')">{{trans('general.exporttimesheet')}}</td>
                                              <td class="besokerikke" width="10%" onclick="oc('/admin?side=3')">{{trans('general.exportlogbook')}}</td>
                                              @elseif($siden == 2)
                                            <td class="besokerikke" width="10%" onclick="oc('/admin?side=0')">{{trans('general.timesheets')}}</td>
                                            <td class="besokerikke" width="10%" onclick="oc('/admin?side=1')">{{trans('general.logbook')}}</td>
                                             <td class="besoker" width="10%" onclick="oc('/admin?side=2')">{{trans('general.exporttimesheet')}}</td>
                                              <td class="besokerikke" width="10%" onclick="oc('/admin?side=3')">{{trans('general.exportlogbook')}}</td>  
                                              @else
                                            <td class="besokerikke" width="10%" onclick="oc('/admin?side=0')">{{trans('general.timesheets')}}</td>
                                            <td class="besokerikke" width="10%" onclick="oc('/admin?side=1')">{{trans('general.logbook')}}</td>
                                             <td class="besokerikke" width="10%" onclick="oc('/admin?side=2')">{{trans('general.exporttimesheet')}}</td>
                                              <td class="besoker" width="10%" onclick="oc('/admin?side=3')">{{trans('general.exportlogbook')}}</td>  
                                              
                                              
                                            @endif
                                            
                                            <td class="tom" width="60%">&nbsp;</td></tr>
                                        
                                        <tr><td colspan="5" class="innholdeasynav">
                                                
                                        <center>
                                            </br>
                                            <?PHP
                                          
                                            ?>
                                            
                                            
                                       @if($siden == 0)
                                       @if(count($totaltimer[0]) != 0)
                                       
                                       
                                       
                                       
                                       <table width='100%' class='framvisning' cellspacing='1' cellpadding='1'>
                                           <tr><td class="framvisninghoved" colspan="8">{{trans('general.showOverOversikt')}}</td></tr>
                                           <tr><td colspan="7"></br>
                                            <!--
                                                   <table width="100%"><tr><td>
                                                               <table><tr><td>
                               <canvas id="graph" width="400" height="300">  
                               </canvas></td><td> <p id='infoen'></p></td></tr></table></td><td>
                                   <table><tr><td>                        
                                   
                                   <canvas id="andregraf" height="300" width="300"></canvas>
                                           </td>
                                   
                                   
                                   <td><p id="andregrafinfo"></p></td></tr></table></td></tr>
                                                   
                                                       <tr><td colspan="2" style="padding-left: 20px"> {{trans('general.hourPay')}} </br><input onchange="refreshit(this.value)" type="text" name="lonn"></td></tr>
                                                   </table>
                                                   
                                            -->
                                            
                                            
                                            
                                                    </td></tr>
                                                <tr><td colspan="8"><center>
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                     
                                               <?PHP $vis = 1; ?>
                                               @if (count($selecten) > 1)
                                               <?PHP $vis++; ?>
                                               @endif
                                               @if (count($projects) > 1)
                                               <?PHP $vis++; ?>
                                               @endif
                                               @if (count($brukere) > 1)
                                               <?PHP $vis++; ?>
                                               @endif
                                               
                                               
                                               <?PHP if($vis > 1){ ?>
                                               <table><tr><td class="framvisninghoved" colspan="<?PHP echo $vis; ?>">Valg</td></tr>
                                                   <tr>
                                                       @if(count($selecten) > 1)
                                                       <td class="framvisninghoved">{{trans('general.month')}}</td>
                                                       @endif
                                               @if(count($projects) > 1)
                                                       <td class="framvisninghoved">{{trans('general.project')}}</td>
                                                       @endif
                                                        @if(count($brukere) > 1)
                                                       <td class="framvisninghoved">{{trans('general.usersshowit')}}</td>
                                                       @endif
                                                       <td class="framvisninghoved">#</td></tr><tr>
                                               
                                               
                                               
                                                @if(count($selecten) > 1)
                                                <td>   
                                        <select name="dato" id="dato" class='months'>
                                            <option value="-1">{{trans('general.showAll')}}</option>
                                        @foreach ($selecten as $select)
                                        
                                        <option value="{{ $select->date }}">{{$select->dateshow}}</option>
                                        
                                        
                                        @endforeach
                                        
                                        </select></td>
                                                    @endif
                                               
                                               
                                               
                                               
                                              
                                               
                                               
                                               
                                               
                                               
                                                    @if(count($projects) > 1)
                                                    <td>
                                        <select name="projects" id="projects" class='months'>
                                            <option value="-1">{{trans('general.showAll')}}</option>
                                        @foreach ($projects as $project)
                                        
                                        <option value="{{ $project->projectID }}">{{$project->projectName}}</option>
                                        
                                        
                                        @endforeach
                                        
                                        </select></td>
                                                    @endif
                                                    
                                                    
                                                    
                                                   
                                                    @if(count($brukere) > 1)
                                                    <td>
                                        <select name="brukere" id="brukere" class='months'>
                                            <option value="-1">{{trans('general.showAll')}}</option>
                                        @foreach ($brukere as $bruker)
                                        
                                        <option value="{{ $bruker->id }}">{{$bruker->firstname}} {{$bruker->lastname}}</option>
                                        
                                        
                                        @endforeach
                                        
                                        </select></td>
                                                    @endif
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    <td>
                                                    <button onclick="send()">{{trans('general.go')}}</button>
                                                    </td></tr></table>
                                               
                                               <?PHP } ?>
                                               </br>
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    <script>
                                                    function send(){
                                                        
                                                       var strDato = "-1";
                                                    if(document.getElementById("dato") != null){    
                                                    var e = document.getElementById("dato");
                                                    strDato = e.options[e.selectedIndex].value;
                                                }
                                                var strProject = "-1";
                                                if(document.getElementById("projects") != null){
                                                        var a = document.getElementById("projects");
                                                    strProject = a.options[a.selectedIndex].value;
                                                }
                                                var bruker = "-1";
                                                if(document.getElementById('brukere') != null){
                                                    var f = document.getElementById('brukere');
                                                    bruker = f.options[f.selectedIndex].value;
                                                }
                                                    oc('/admin?side=0&dato=' + strDato + '&project=' + strProject + '&bruker=' + bruker);
                                                    }
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    </script>
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    </br></center></td></tr>
                                       
                                       
                                       
                                                                              @if(count($resultatene) != 0)

                                                
                                       
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
                                       
                                       
                                               
                                               
                                               
                                               
                                               
                                               
                                               
                                               
                                                
                                             
                   
                                 
                                 
                                 
                                 
                                 
                                 
                                 
                                 
                                 
                                 
                                 
                                 
                                                    
                                               
                                               
                                               
                                               
                                               
                                               
                                               </td></tr>
                                           
                                           
                                           
                                           <tr><td class='framvisninghoved'>#</td><td class="framvisninghoved">{{trans('general.employee')}}</td><td class='framvisninghoved'>{{trans('general.project')}}</td><td width='20%' class='framvisninghoved'> {{trans('general.comment')}} </td><td class='framvisninghoved'> {{trans('general.date')}} </td><td class='framvisninghoved'>Start</td><td class='framvisninghoved'>Stop</td><td class='framvisninghoved'> {{trans('general.hourCount')}} </td></tr>
                                           <?PHP
                                           $i = 1;
                                           $totalt = 0;
                                           ?>
                                       @foreach($resultatene as $resultat)
                                       
                                       <tr><td class='framvisningrows'>{{$i}}</td><td class="framvisningrows">{{$resultat->firstname}} {{$resultat->lastname}} </td><td class='framvisningrows'>{{$resultat->projectName}} </td><td class='framvisningrows'>{{$resultat->comment}}<td class='framvisningrows'>{{$resultat->dateshow}}</td><td class='framvisningrows'>{{$resultat->starttime}}</td><td class='framvisningrows'>{{$resultat->endtime}}</td><td class='framvisningrows'><?PHP $antall = (strtotime($resultat->endtime) - strtotime($resultat->starttime)) / 3600; echo $antall; $totalt += $antall;   ?></td></tr>
                                       
                                               
                                               <?PHP
                                               $i++;
                                               ?>
                                               
                                       @endforeach
                                       <tr><td class='framvisningsiste'> {{trans('general.total')}} </td><td class='framvisningsiste'>{{$totalt}}</td></tr>
                                       @else
                                       <tr><td class="framvisning"><center><h3>{{trans('general.noresults')}}</h3></center></td></tr>
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
                                 
                                 
                                          
                                          
                                    
                                     
                                     
                                     
                                     
                                     
                                     
                                     
                                     
                                     
                                     
                                     
                                     
                                     
                                     
                                     
                                     
                                     
                                     
                                     
                                     
                                     
                                          
                                          
                                          
                                    @else 
                                    <h3>{{trans('general.noresults')}}</h3>
                                    @endif
                                    @elseif($siden == 1)
                                       @if(count($totaltimer[0]) != 0)
                                       
                                           <tr><td colspan="6">
                                                   <table width='100%' class='framvisning' cellspacing='1' cellpadding='1'>
                                           <tr><td class="framvisninghoved" colspan="7">{{trans('general.showOverOversikt')}}</td></tr>
                                           <tr><td colspan="7"></br>
                                            
                                                  
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                       <script>
                                        
                                       
  
    var obj = <?php echo json_encode($totaltimer); ?>;
    
    
    
    tegn("graph", "infoen", obj[1], obj[0]);
                                          
                                          
                                     
                                     
                                     </script>
                                                   
                             <script>
                                 
                                     var alle = <?php echo json_encode($totaltimer); ?>;
                                     
                                     tegnpai("andregraf", "andregrafinfo", alle[1], alle[0],2,0.7);
                                     </script>
                                 
                                           <center></br>
                                               
                                               
                                               @if($resultatene != 0)
                                               
                                               <?PHP $vis = 1; ?>
                                               @if (count($biler) > 1)
                                               <?PHP $vis++; ?>
                                               @endif
                                               @if (count($maneder) > 1)
                                               <?PHP $vis++; ?>
                                               @endif
                                               @if (count($brukere) > 1)
                                               <?PHP $vis++; ?>
                                               @endif
                                               
                                               
                                               <?PHP if($vis > 1){ ?>
                                               <table><tr><td class="framvisninghoved" colspan="<?PHP echo $vis; ?>">Valg</td></tr>
                                                   <tr>
                                                       @if(count($biler) > 1)
                                                       <td class="framvisninghoved">{{trans('general.car')}}</td>
                                                       @endif
                                               @if(count($maneder) > 1)
                                                       <td class="framvisninghoved">{{trans('general.month')}}</td>
                                                       @endif
                                                        @if(count($brukere) > 1)
                                                       <td class="framvisninghoved">{{trans('general.employee')}}</td>
                                                       @endif
                                                       <td class="framvisninghoved">#</td></tr><tr>
                                               
                                               
                                               
                                                @if(count($biler) > 1)
                                                <td>   
                                        <select name="car" id="car" class='months'>
                                            <option value="-1">{{trans('general.showAll')}}</option>
                                        @foreach ($biler as $bil)
                                        
                                        <option value="{{ $bil->registrationNR }}">{{$bil->nickname}}</option>
                                        
                                        
                                        @endforeach
                                        
                                        </select></td>
                                                    @endif
                                               
                                               
                                               
                                               
                                               
                                               
                                               
                                               
                                               
                                               
                                                    @if(count($maneder) > 1)
                                                    <td>
                                        <select name="maned" id="maned" class='months'>
                                            <option value="-1">{{trans('general.showAll')}}</option>
                                        @foreach ($maneder as $maned)
                                        
                                        <option value="{{ $maned->date }}">{{$maned->dateshow}}</option>
                                        
                                        
                                        @endforeach
                                        
                                        </select></td>
                                                    @endif
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    @if(count($brukere) > 1)
                                                    <td>
                                        <select name="brukere" id="brukere" class='months'>
                                            <option value="-1">{{trans('general.showAll')}}</option>
                                        @foreach ($brukere as $bruker)
                                        
                                        <option value="{{ $bruker->id }}">{{$bruker->firstname}} {{$bruker->lastname}}</option>
                                        
                                        
                                        @endforeach
                                        
                                        </select></td>
                                                    @endif
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    <td>
                                                    <button onclick="send()">{{trans('general.go')}}</button>
                                                    </td></tr></table>
                                               
                                               <?PHP } ?>
                                               </br>
                                                    
                                                    
                                                    
                                                    <script>
                                                    function send(){
                                                        
                                                        var strDato = "-1";
                                                    if(document.getElementById("car") != null){    
                                                    var e = document.getElementById("car");
                                                    strDato = e.options[e.selectedIndex].value;
                                                }
                                                var strProject = "-1";
                                                if(document.getElementById("maned") != null){
                                                        var a = document.getElementById("maned");
                                                    strProject = a.options[a.selectedIndex].value;
                                                }
                                                    oc('/admin?side=1&car=' + strDato + '&maned=' + strProject);
                                                    }
                                                    </script>
                                               
                                           </center>
                               </td></tr>
                                           
                                           
                                         @if(count($resultatene) != 0)
                                          <?PHP
                                          $a = 1;
                                          ?>
                                          <tr><td class="framvisninghoved">#</td><td class="framvisninghoved">{{trans('general.car')}}</td><td class="framvisninghoved">{{trans('general.date')}}</td><td class="framvisninghoved">{{trans('general.startdestination')}}</td><td class="framvisninghoved">{{trans('general.stopdestination')}}</td><td class="framvisninghoved">{{trans('general.kilometer')}}</td></tr>
                                          @foreach($resultatene as $res)
                                          
                                          
                                          <tr><td class="framvisningrows"><?PHP echo $a; $a++; ?></td><td class="framvisningrows">{{$res->registrationNR}}</td><td class="framvisningrows">{{$res->date}}</td><td class="framvisningrows">{{$res->startdestination}}</td><td class="framvisningrows">{{$res->stopdestination}}</td><td class="framvisningrows">{{$res->totalkm}} km</td></tr>
                                          @endforeach
                                          
                                          
                                          
                                           @else
                                           <tr><td class="framvisning"><center><h3>{{trans('general.noresults')}}</h3></center></td></tr>
                                    @endif
                                          
                                          
                                          
                                          @endif
                                    
                                    
                                    
                                    
                                    
                                    
                                       </table>
                                    
                                    
                                    
                                   
                                    
                                    
                                    
                                    
                                    @else
                                    <h3>{{trans('general.noresults')}}</h3>
                                    @endif
                                       
                                       @endif
                                    
                                       
                                       
                                    
                                    
                                    </table>
                                   
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@stop