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
                                    

                        <table class="easynav">
                                        
                                        <tr>
                                            @if($siden == 0)
                                            <td class="besoker10" onclick="oc('/admin?side=0')">{{trans('general.timesheets')}}</td>
                                            <td class="besokerikke10" onclick="oc('/admin?side=1')">{{trans('general.logbook')}}</td>
                                             <td class="besokerikke10" onclick="oc('/admin?side=2')">{{trans('general.exporttimesheet')}}</td>
                                             <td class="besokerikke10" onclick="oc('/admin?side=3')">{{trans('general.exportlogbook')}}</td>
                                              
                                            @elseif($siden == 1)
                                            <td class="besokerikke10" onclick="oc('/admin?side=0')">{{trans('general.timesheets')}}</td>
                                            <td class="besoker10" onclick="oc('/admin?side=1')">{{trans('general.logbook')}}</td>
                                            <td class="besokerikke10" onclick="oc('/admin?side=2')">{{trans('general.exporttimesheet')}}</td>
                                             <td class="besokerikke10" onclick="oc('/admin?side=3')">{{trans('general.exportlogbook')}}</td> 
                                              @elseif($siden == 2)
                                            <td class="besokerikke10" onclick="oc('/admin?side=0')">{{trans('general.timesheets')}}</td>
                                            <td class="besokerikke10" onclick="oc('/admin?side=1')">{{trans('general.logbook')}}</td>
                                             <td class="besoker10" onclick="oc('/admin?side=2')">{{trans('general.exporttimesheet')}}</td>
                                             <td class="besokerikke10" onclick="oc('/admin?side=3')">{{trans('general.exportlogbook')}}</td>  
                                              @else
                                            <td class="besokerikke10" onclick="oc('/admin?side=0')">{{trans('general.timesheets')}}</td>
                                            <td class="besokerikke10" onclick="oc('/admin?side=1')">{{trans('general.logbook')}}</td>
                                             <td class="besokerikke10" onclick="oc('/admin?side=2')">{{trans('general.exporttimesheet')}}</td>
                                             <td class="besoker10" onclick="oc('/admin?side=3')">{{trans('general.exportlogbook')}}</td> 
                                              
                                              
                                            @endif
                                            
                                            <td class="tom60">&nbsp;</td></tr>
                                        
                                        <tr><td colspan="5" class="innholdeasynav">
                                                
                                                
                                            <br />
                                            <?PHP
                                          
                                            ?>
                                            
                                            
                                       @if($siden == 0)
                                       @if(count($totaltimer[0]) != 0)
                                       
                                       
                                       
                                       
                                       <table class='framvisning1002'>
                                           <tr><td class="framvisninghoved" colspan="8">{{trans('general.showOverOversikt')}}</td></tr>
                                           <tr><td colspan="7"><br />
                                            <!--
                                                   <table width="100%"><tr><td>
                                                               <table><tr><td>
                               <canvas id="graph" width="400" height="300">  
                               </canvas></td><td> <p id='infoen'></p></td></tr></table></td><td>
                                   <table><tr><td>                        
                                   
                                   <canvas id="andregraf" height="300" width="300"></canvas>
                                           </td>
                                   
                                   
                                   <td><p id="andregrafinfo"></p></td></tr></table></td></tr>
                                                   
                                                       <tr><td colspan="2" style="padding-left: 20px"> {{trans('general.hourPay')}} <br /><input onchange="refreshit(this.value)" type="text" name="lonn"></td></tr>
                                                   </table>
                                                   
                                            -->
                                            
                                            
                                            
                                                    </td></tr>
                                                <tr><td colspan="8">
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                     
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
                                               <table class="midtstill"><tr><td class="framvisninghoved" colspan="<?PHP echo $vis; ?>">Valg</td></tr>
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
                                               <br />
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
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
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    <br /></td></tr>
                                       
                                       
                                       
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




                                               
                                               
                                               
                                               
                                               
                                               
                                                
                                             
                   
                                 
                                 
                                 
                                 
                                 
                                 
                                 
                                 
                                 
                                 
                                 
                                 
                                                    
                                               
                                               
                                               
                                               
                                               
                                              
                                           
                                           
                                           <tr><td class='framvisninghoved'>#</td><td class="framvisninghoved">{{trans('general.employee')}}</td><td class='framvisninghoved'>{{trans('general.project')}}</td><td class='framvisninghoved20'> {{trans('general.comment')}} </td><td class='framvisninghoved'> {{trans('general.date')}} </td><td class='framvisninghoved'>Start</td><td class='framvisninghoved'>Stop</td><td class='framvisninghoved'> {{trans('general.hourCount')}} </td></tr>
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
                                       <tr><td class="framvisning"><h3>{{trans('general.noresults')}}</h3></td></tr>
                                       @endif


                                       </table>



                                                        {!! $resultatene->render()!!}
                                   

                                        
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
                                       
                                           <tr><td colspan="5">
                                                   <table class='framvisning1002'>
                                           <tr><td class="framvisninghoved" colspan="7">{{trans('general.showOverOversikt')}}</td></tr>
                                           <tr><td colspan="7"><br />
                                            
                                                  
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                       <script>
                                        
                                       
  
    var obj = <?php echo json_encode($totaltimer); ?>;
    
    
    
    tegn("graph", "infoen", obj[1], obj[0]);
                                          
                                          
                                     
                                     
                                     </script>
                                                   
                             <script>
                                 
                                     var alle = <?php echo json_encode($totaltimer); ?>;
                                     
                                     tegnpai("andregraf", "andregrafinfo", alle[1], alle[0],2,0.7);
                                     </script>
                                 
                                           <br />
                                               
                                               
                                               @if(count($resultatene) != 0)
                                               
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
                                               <table class="midtstill"><tr><td class="framvisninghoved" colspan="<?PHP echo $vis; ?>">Valg</td></tr>
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
                                               <br />
                                                    
                                                    
                                                    
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
                                                var bruker = "-1";
                                                if(document.getElementById('brukere') != null){
                                                    var f = document.getElementById('brukere');
                                                    bruker = f.options[f.selectedIndex].value;
                                                }
                                                    oc('/admin?side=1&car=' + strDato + '&maned=' + strProject + '&bruker=' + bruker);
                                                    }
                                                    </script>
                                               
                                          
                               </td></tr>
                                           
                                           
                                         @if(count($resultatene) != 0)
                                          <?PHP
                                          $a = 1;
                                          ?>
                                          <tr><td class="framvisninghoved">#</td><td class="framvisninghoved">{{trans('general.employee')}}</td><td class="framvisninghoved">{{trans('general.car')}}</td><td class="framvisninghoved">{{trans('general.date')}}</td><td class="framvisninghoved">{{trans('general.startdestination')}}</td><td class="framvisninghoved">{{trans('general.stopdestination')}}</td><td class="framvisninghoved">{{trans('general.kilometer')}}</td></tr>
                                          @foreach($resultatene as $res)
                                          
                                          
                                          <tr><td class="framvisningrows"><?PHP echo $a; $a++; ?></td><td class="framvisningrows">{{$res->firstname}} {{$res->lastname}}</td><td class="framvisningrows">{{$res->registrationNR}}</td><td class="framvisningrows">{{$res->date}}</td><td class="framvisningrows">{{$res->startdestination}}</td><td class="framvisningrows">{{$res->stopdestination}}</td><td class="framvisningrows">{{$res->totalkm}} km</td></tr>
                                          @endforeach
                                          
                                          
                                          
                                           @else
                                           <tr><td class="framvisning"><h3>{{trans('general.noresults')}}</h3></td></tr>
                                    @endif
                                          
                                          
                                          
                                          @endif
                                    
                                    
                                    
                                    
                                    
                                    
                                       </table>
                                    
                                    
                                    {!! $resultatene->render()!!}
                                   
                                    
                                    
                                    
                                    
                                    @else
                                    <h3>{{trans('general.noresults')}}</h3>
                                    @endif

                                    <!-- timelister excel -->  <!-- ............................................................................ -->
                                       @elseif($siden == 2)
                                       
                                       <table class="width80">
                                           @if(isset($error))
                                           <tr><td class="error">{{$error}}</td><td class="invisible" colspan="2">&nbsp;</td></tr>
                                           @endif
                                           @if(isset($error2))
                                           <tr><td class="invisible">&nbsp;</td><td class="error" colspan="2">{{$error2}}</td></tr>
                                           @endif
                                           <tr><td class="framvisninghoved50">{{trans('general.timelisterlonn')}}</td><td class="framvisninghoved50" colspan="2">{{trans('general.timelisterfaktura')}}</td></tr>
                                               
                                           
                                           
                                           <tr><td class="sammesomframvisning">
                                                   <form action="/admin/export" method="post">
                                                 
                                                       
                                                           
                                                           <select name="month" id="month">
                                                               <option value="-1">{{trans('general.chooseMonth')}}</option>
                                                               @foreach($months as $month)
                                                               
                                                               <option value="{{$month->dateshow}}">{{$month->dateshowtext}}</option>
                                                               @endforeach
                                                           </select>
                                                           <input type="hidden" name="_token" value="{{ csrf_token() }}"><input type="hidden" name="hvilken" id="hvilken" value="0">    <input type="submit" value="Hent!">
                                                      
                                                   
                                       </form>
                                               </td>
                                               
                                               <td class="sammesomframvisning25">
                                                   
                                               <form method="post" action="/admin/export">
                                                       
                                                       
                                             
                                                       
                                                       
                                                       <select name="project" id="project">
                                                               <option value="-1">{{trans('general.chooseProject')}}</option>
                                                               @foreach($projects as $project)
                                                               
                                                               <option value="{{$project->projectID}}">{{$project->projectName}}</option>
                                                               @endforeach
                                                           </select>
                                                       
                                                       
                                                 
                                       
                                                   
                                       </td><td class="sammesomframvisning25"">
                                       
                                       
                                       
                                           <select name="time" id="time" onChange="vis()"><option value="-1">{{trans('general.choosetimeperiode')}}</option>
                                               <option value="0">{{trans('general.year')}}</option>
                                               <option value="1">{{trans('general.month')}}</option>
                                               <option value="2">{{trans('general.week')}}</option>
                                           </select>
                                               
                                      
                                       
                                           <br />
                                       <select name="year" id="year" style="display:none;">
                                           @if(count($years) > 1)
                                           <option value="-1">{{trans('general.chooseYear')}}</option>
                                       @foreach($years as $year)
                                       <option value="{{$year->dateshow}}">{{$year->dateshow}}</option>
                                       @endforeach
                                       
                                       
                                       @else
                                       @foreach($years as $year)
                                       <option value="{{$year->dateshow}}">{{$year->dateshow}}</option>
                                       @endforeach
                                       
                                       @endif
                                       </select>
                                           
                                           
                                           
                                           
                                           
                                               
                                       <select name="month2" id="month2" style="display:none;">
                                           @if(count($months2) > 1)
                                           <option value="-1">{{trans('general.chooseMonth')}}</option>
                                       @foreach($months2 as $month)
                                       <option value="{{$month->dateshow}}">{{$month->dateshowtext}}</option>
                                       @endforeach
                                       
                                       
                                       @else
                                       @foreach($months2 as $month)
                                       <option value="{{$month->dateshow}}">{{$month->dateshowtext}}</option>
                                       @endforeach
                                       
                                       @endif
                                       </select>
                                               
                                               
                                               
                                               
                                               
                                                  
                                       <select name="week" id="week" style="display:none;">
                                           @if(count($weeks) > 1)
                                           <option value="-1">{{trans('general.chooseWeek')}}</option>
                                       @foreach($weeks as $week)
                                       <option value="{{$week->weeknumber}}">{{$week->weeknumbershow}}</option>
                                       @endforeach
                                       
                                       
                                       @else
                                       @foreach($weeks as $week)
                                       <option value="{{$week->weeknumber}}">{{$week->weeknumbershow}}</option>
                                       @endforeach
                                       
                                       @endif
                                       </select>
                                                   
                                       <br />
                                       
                                       <br />
                                       <input type="hidden" name="_token" value="{{ csrf_token() }}"><input type="hidden" name="hvilken" id="hvilken" value="1"><input type="submit" value="Hent!"></form>
                                           </td></tr>
                                           
                                                       
                                       <tr><td class="framvisning">
                                       
                                           </td><td colspan="2">
                                               
                                                   </td></tr>       
                                           
                                           
                                           
                                       </table>
                                     
                                       <script>
                                           function vis(){
                                               
                                                   var a = "-1";
                                                    if(document.getElementById("time") != null){    
                                                    var e = document.getElementById("time");
                                                    a = e.options[e.selectedIndex].value;
                                                    
                                                    if(a == "0"){
                                                        
                                                        document.getElementById("year").style.display = "block";
                                                        document.getElementById("month2").style.display = "none";
                                                        document.getElementById("week").style.display = "none";
                                                    }else if(a == 1){
                                                        document.getElementById("year").style.display = "none";
                                                        document.getElementById("month2").style.display = "block";
                                                        document.getElementById("week").style.display = "none";
                                                    }else if(a == 2){
                                                        document.getElementById("year").style.display = "none";
                                                        document.getElementById("month2").style.display = "none";
                                                        document.getElementById("week").style.display = "block";
                                                    }
                                                }
                                               
                                           }
                                           
                                           </script>


@elseif($siden == 3)
















 
                                       <table class="width80" >
                                           @if(isset($error))
                                           <tr><td class="error">{{$error}}</td><td class="invisible" colspan="2">&nbsp;</td></tr>
                                           @endif
                                           @if(isset($error2))
                                           <tr><td class="invisible">&nbsp;</td><td class="error" colspan="2">{{$error2}}</td></tr>
                                           @endif
                                           <tr><td class="framvisninghoved50">{{trans('general.logbook1')}}</td><td class="framvisninghoved50" colspan="2">{{trans('general.logbook2')}}</td></tr>
                                               
                                           
                                           
                                           <tr><td class="sammesomframvisning">
                                                   <form action="/admin/export2" method="post">
                                                 <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                       
                                                           
                                                           <select name="month" id="month">
                                                               <option value="-1">{{trans('general.chooseMonth')}}</option>
                                                               @foreach($months as $month)
                                                               
                                                               <option value="{{$month->dateshow}}">{{$month->dateshowtext}}</option>
                                                               @endforeach
                                                           </select>
                                                         <input type="hidden" name="hvilken" value="0">    <input type="submit" value="Hent!">
                                                      
                                                   
                                       </form>
                                               </td>
                                               
                                               <td class="sammesomframvisning25">
                                                   
                                               <form method="post" action="/admin/export2">
                                                       <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                       
                                               
                                                       
                                                       
                                                       <select name="project" id="project">
                                                               <option value="-1">{{trans('general.chooseProject')}}</option>
                                                               @foreach($projects as $project)
                                                               
                                                               <option value="{{$project->projectID}}">{{$project->projectName}}</option>
                                                               @endforeach
                                                           </select>
                                                       
                                                       
                                                  
                                       
                                                   
                                       </td><td class="sammesomframvisning25">
                                       
                                       
                                       
                                           <select name="time" id="time" onChange="vis()"><option value="-1">{{trans('general.choosetimeperiode')}}</option>
                                               <option value="0">{{trans('general.year')}}</option>
                                               <option value="1">{{trans('general.month')}}</option>
                                               <option value="2">{{trans('general.week')}}</option>
                                           </select>
                                               
                                      
                                       
                                           <br />
                                       <select name="year" id="year" style="display:none;">
                                           @if(count($years) > 1)
                                           <option value="-1">{{trans('general.chooseYear')}}</option>
                                       @foreach($years as $year)
                                       <option value="{{$year->dateshow}}">{{$year->dateshow}}</option>
                                       @endforeach
                                       
                                       
                                       @else
                                       @foreach($years as $year)
                                       <option value="{{$year->dateshow}}">{{$year->dateshow}}</option>
                                       @endforeach
                                       
                                       @endif
                                       </select>
                                           
                                           
                                           
                                           
                                           
                                               
                                       <select name="month2" id="month2" style="display:none;">
                                           @if(count($months2) > 1)
                                           <option value="-1">{{trans('general.chooseMonth')}}</option>
                                       @foreach($months2 as $month)
                                       <option value="{{$month->dateshow}}">{{$month->dateshowtext}}</option>
                                       @endforeach
                                       
                                       
                                       @else
                                       @foreach($months2 as $month)
                                       <option value="{{$month->dateshow}}">{{$month->dateshowtext}}</option>
                                       @endforeach
                                       
                                       @endif
                                       </select>
                                               
                                               
                                               
                                               
                                               
                                                  
                                       <select name="week" id="week" style="display:none;">
                                           @if(count($weeks) > 1)
                                           <option value="-1">{{trans('general.chooseWeek')}}</option>
                                       @foreach($weeks as $week)
                                       <option value="{{$week->weeknumber}}">{{$week->weeknumbershow}}</option>
                                       @endforeach
                                       
                                       
                                       @else
                                       @foreach($weeks as $week)
                                       <option value="{{$week->weeknumber}}">{{$week->weeknumbershow}}</option>
                                       @endforeach
                                       
                                       @endif
                                       </select>
                                                   
                                       <br />
                                       
                                       <br />
                                       <input type="hidden" name="_token" value="{{ csrf_token() }}"><input type="hidden" name="hvilken" value="1"><input type="submit" value="Hent!"></form>
                                           </td></tr>
                                           
                                                       
                                       <tr><td class="framvisning">
                                       
                                           </td><td colspan="2">
                                               
                                                   </td></tr>       
                                           
                                           
                                           
                                       </table>
                                     
                                       <script>
                                           function vis(){
                                               
                                                   var a = "-1";
                                                    if(document.getElementById("time") != null){    
                                                    var e = document.getElementById("time");
                                                    a = e.options[e.selectedIndex].value;
                                                    
                                                    if(a == "0"){
                                                        
                                                        document.getElementById("year").style.display = "block";
                                                        document.getElementById("month2").style.display = "none";
                                                        document.getElementById("week").style.display = "none";
                                                    }else if(a == 1){
                                                        document.getElementById("year").style.display = "none";
                                                        document.getElementById("month2").style.display = "block";
                                                        document.getElementById("week").style.display = "none";
                                                    }else if(a == 2){
                                                        document.getElementById("year").style.display = "none";
                                                        document.getElementById("month2").style.display = "none";
                                                        document.getElementById("week").style.display = "block";
                                                    }
                                                }
                                               
                                           }
                                           
                                           </script>





















                                                @endif
                                    
                                       
                                       
                                    
                                    </table>
                                        <br />
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@stop
