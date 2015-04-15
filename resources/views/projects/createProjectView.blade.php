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
				<div class="panel-heading"> {{trans('general.registrateProject')}} </div>
				<div class="panel-body">
                                    
                                    <div id="newcontact">
                                       
                                        <table class="newcontact"><tr><td>
                                        <table><tr><td class="newcontact">{{trans('general.firstname')}} </td><td class="newcontact"><input type="text" id="fornavn"></td></tr>
                                            <tr><td class="newcontact">{{trans('general.surname')}} </td><td class="newcontact"><input type="text" id="etternavn"></td></tr>
                                            <tr><td class="newcontact">{{trans('general.telephone')}}</td><td class="newcontact"><input type="text" id="telefon"></td></tr>
                                            <tr><td class="newcontact">{{trans('general.email')}} </td><td class="newcontact"><input type="email" id="email"></td></tr>
                                        
                                            <tr><td colspan="2">
                                                <input type="submit" name="store" id="store" value="Lagre!" onclick="lagre()"></br>
                                                <a href="#" onclick="test()">{{trans('general.finish')}}</a><div id="result"><td></tr>
                                            
                                        </table>
                                        </div>
                                                </td><td valign="top" width="50%">
                                                    <table width="100%" style="border: 0px solid red;"><tr><td>
                                        {!! Form::select('companyid', $company_list, null, array('size' => '5', 'id' => 'companyid')) !!}
                                                            </td></tr>
                                                        <tr>
                                                            <td>
                                                                <p id="gjem" style="display: none;">
                                                                {{trans('general.name')}} <input type="text" name="nyttfirmanavn" id="nyttfirmanavn"></br>
                                                                {{trans('general.role')}} <input type="text" name="nyttfirmarolle" id="nyttfirmarolle"></p>
                                                                <p id="gjemandre"><a href="#" id="linkborte" onclick="leggtil()">+ {{trans('general.newFirm')}}</a></p>
                                                            </td>
                                                        </tr></table>
                                            </td></tr></table>

                                        
                                    </div>
                                    <script>
                                    
                                    function leggtil(){
                                        
                                    if(document.getElementById('gjem').style.display == "none"){
                                        document.getElementById('gjem').style.display = "block";
                                        
                                        
                                        document.getElementById('gjemandre').innerHTML = "<a href=\"#\" id=\"linkborte\" onclick=\"leggtil()\"> {{trans('general.cancel')}} </a> - <input type=submit onclick=\"lagrefirma()\" value=\"Lagre\">";
                                    } else {
                                        
                                        document.getElementById('gjem').style.display = "none";
                                        document.getElementById('gjemandre').innerHTML = "<a href=\"#\" id=\"linkborte\" onclick=\"leggtil()\">+ {{trans('general.newFirm')}} </a>";
                                    }
                                    
                                        
                                    }
                                    </script>

                                    
{!! Form::open(['url' => 'project']) !!}

<div class="form-group">

 {!! Form::label('projectName', trans('general.projectName') ) !!}
 {!! Form::text('projectName', null, ['placeholder'=> trans('general.wprojectName') ,'class' => 'form-control']) !!}

</div>

<br>

<div class="form-group">

 {!! Form::label('projectAddress', trans('general.projectAddress') ) !!}

 {!! Form::text('projectAddress', null, ['placeholder'=> trans('general.wprojectAddress') ,'class' => 'form-control']) !!}

</div>

<br>

<div class="form-group">

 {!! Form::label('budget', trans('general.estimatedHours')) !!}

 {!! Form::text('budget', null, ['placeholder'=> trans('general.westimatedHours') ,'class' => 'form-control']) !!}

</div>

<br>

<div class="form-group">

 {!! Form::label('description', trans('general.projectDescription')) !!}

 {!! Form::textarea('description', null, ['placeholder'=> trans('general.wprojectDescription'),'class' => 'form-control']) !!}

</div>


<br>




 {!! Form::label('contactpersonID',trans('general.contactPersons')) !!}




<center><table width="90%" style="border: 1px solid black;"><tr><td class="over">{{trans('general.contactPerson')}}</td><td class="over">{{trans('general.builder')}}</td></tr><tr><td width="50%" class="oppdeltprosjekt">
                
<div class="form-group" >

</br><a href="#" onclick="test()">+ {{trans('general.newContactPerson')}}</a>
</div>


<div style='height: 80px; width: auto; overflow: auto;'>
    <table>
@foreach ($contactperson_list as $con)

<tr><td><input type="checkbox" name="con[]" value="{{$con[2]}}" id='{{$con[2]}}'> <label for='{{$con[2]}}'>{{$con[0]}} {{$con[1]}}, {{$con[3]}}</label></td></tr>
    
@endforeach
</table>
</div>

</br><a href="#" onclick="test()">+ {{trans('general.newContactperson')}}</a>
</div>


            </td><td width="50%" class="oppdeltprosjekt">
                <div class="form-group" >

 

 <div style='height: 80px; width: auto; overflow: auto;'>
     <table>
     @foreach ($customer_list as $con)
    
<tr><td><input type="radio" name="byggherre"  value="{{$con[0]}}" id="f{{$con[0]}}"> <label for='f{{$con[0]}}'>{{$con[1]}}</label></td></tr>
    
@endforeach
     </table>
     
 </div>

</div>
                
 
            </td></tr><tr><td class="over">{{trans('general.startDate')}}</td><td class="over">{{trans('general.estimatedFinish')}}</td></tr>
                <tr><td class="oppdeltprosjekt">
            
           
    
    {!! Form::text('startdate', date('Y-m-d'), array('class' => 'datepicker') ) !!}
           
                        
                        
            </td>
            <td class="oppdeltprosjekt">
                
               
    
    {!! Form::text('sluttdate', date('Y-m-d'), array('class' => 'datepicker') ) !!}
              
                <div id="container"></div>
                <script>
    var minimal = 0;
    </script>
            </td></tr></table>
</center></br></br>



{!! Form::open(['url' => 'project']) !!}

<div class="form-group">


 {!! Form::submit(trans('general.registrateNewproject'), ['class' => 'btn btn-primary form-control']) !!}

</div>





{!! Form::close() !!}


<br>



<br>







{!! Form::close() !!}

</div>
</div>
</div>
</div>
</div>



<script>
    var on = false;
function test(){
    if(on == false){
        document.getElementById('newcontact').style.display = 'block';
        document.getElementById('grey').style.display = 'block';
        on = true;
    } else {
        document.getElementById('newcontact').style.display = 'none';
        document.getElementById('grey').style.display = 'none';
        on = false;
    }
    
}
</script>




<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>


<script>
function lagre() {
    var firstname = document.getElementById('fornavn').value;
    var lastname = document.getElementById('etternavn').value;
    var phone = document.getElementById('telefon').value;
    var email = document.getElementById('email').value;
       var companyid = document.getElementById('companyid').value;
       
   


 
    var her = "{{ url('/storecontact/') }}";
    
    her += "/" + firstname + "|" + lastname + "|" + phone + "|" + email + "|" + companyid + "";
    

    $.get(her, 
    
    function(data, status){
        
        if(isNaN(data.charAt(0))) {
            
            
            
            var option = document.createElement("option");
            var e = document.getElementById('companyid');
            var firmanavnet = e.options[e.selectedIndex].text;
option.text = firstname + " " + lastname + ", " + firmanavnet;
option.value = data.substring(2);
var select = document.getElementById("contactpersonID");
select.appendChild(option);

test();
                 document.getElementById('fornavn').style.border = "1px solid gray";
            document.getElementById('etternavn').style.border = "1px solid gray";
            document.getElementById('telefon').style.border = "1px solid gray";
            document.getElementById('email').style.border = "1px solid gray";
            
            
                 document.getElementById('fornavn').value = "";
            document.getElementById('etternavn').value = "";
            document.getElementById('telefon').value = "";
            document.getElementById('email').value = "";
            
            
            
        } else {
            document.getElementById('fornavn').style.border = "1px solid gray";
            document.getElementById('etternavn').style.border = "1px solid gray";
            document.getElementById('telefon').style.border = "1px solid gray";
            document.getElementById('email').style.border = "1px solid gray";
            document.getElementById('companyid').style.border = "1px solid gray";
            
            for(var e = 0; e < data.length; e++){
                if(data.charAt(e) === "0") {
                    document.getElementById('fornavn').style.border = "1px solid red";
                } else if(data.charAt(e) === "1") {
                    document.getElementById('etternavn').style.border = "1px solid red";
                } else if(data.charAt(e) === "2") {
                    document.getElementById('telefon').style.border = "1px solid red";
                } else if(data.charAt(e) === "3") {
                    document.getElementById('email').style.border = "1px solid red";
                } else if(data.charAt(e) === "4") {
                    document.getElementById('companyid').style.border = "1px solid red";
                } else {
                    alert("Noe gikk galt");
                }
                
                
            }
        }
        
        
    });



}

</script>
















<script>
function lagrefirma() {
    var firmname = document.getElementById('nyttfirmanavn').value;
    var role = document.getElementById('nyttfirmarolle').value;
   
   


 
    var her = "{{ url('/storefirm/') }}";
    
    her += "/" + firmname + "|" + role + "";
  

    $.get(her, 
    
    function(data, status){
        
        if(isNaN(data.charAt(0))) {
            
            var option = document.createElement("option");
option.text = firmname;
option.value = data.substring(2);
var select = document.getElementById("companyid");
select.appendChild(option);
            
            document.getElementById('nyttfirmanavn').style.border = "1px solid gray";
            document.getElementById('nyttfirmarolle').style.border = "1px solid gray";
            
            document.getElementById('nyttfirmanavn').value = "";
            document.getElementById('nyttfirmarolle').value = "";
            
            
        } else {
            document.getElementById('nyttfirmanavn').style.border = "1px solid gray";
            document.getElementById('nyttfirmarolle').style.border = "1px solid gray";
            
            
            for(var e = 0; e < data.length; e++){
                if(data.charAt(e) === "0") {
                    document.getElementById('nyttfirmanavn').style.border = "1px solid red";
                } else if(data.charAt(e) === "1") {
                    document.getElementById('nyttfirmarolle').style.border = "1px solid red";
                } else {
                    alert("Noe gikk galt");
                }
                
                
            }
        }
        
        
    });



}

</script>
























@stop

