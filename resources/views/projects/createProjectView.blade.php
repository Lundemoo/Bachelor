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
                                    
                                    <div id="newcontact">
                                       
                                        <table class="newcontact"><tr><td>
                                        <table><tr><td class="newcontact">Fornavn: </td><td class="newcontact"><input type="text" id="fornavn"></td></tr>
                                            <tr><td class="newcontact">Etternavn: </td><td class="newcontact"><input type="text" id="etternavn"></td></tr>
                                            <tr><td class="newcontact">Telefon: </td><td class="newcontact"><input type="text" id="telefon"></td></tr>
                                            <tr><td class="newcontact">Email: </td><td class="newcontact"><input type="email" id="email"></td></tr>
                                        
                                            <tr><td colspan="2">
                                                <input type="submit" name="store" id="store" value="Lagre!" onclick="lagre()"></br>
                                                <a href="#" onclick="test()">Avslutt</a><div id="result"><td></tr>
                                            
                                        </table>
                                        </div>
                                                </td><td valign="top" width="50%">
                                                    <table width="100%" style="border: 0px solid red;"><tr><td>
                                        {!! Form::select('companyid', $company_list, null, array('size' => '5', 'id' => 'companyid')) !!}
                                                            </td></tr>
                                                        <tr>
                                                            <td>
                                                                <p id="gjem" style="display: none;">
                                                                Navn: <input type="text" name="nyttfirmanavn" id="nyttfirmanavn"></br>
                                                                Rolle: <input type="text" name="nyttfirmarolle" id="nyttfirmarolle"></p>
                                                                <p id="gjemandre"><a href="#" id="linkborte" onclick="leggtil()">+ Nytt firma</a></p>
                                                            </td>
                                                        </tr></table>
                                            </td></tr></table>

                                        
                                    </div>
                                    <script>
                                    
                                    function leggtil(){
                                        
                                    if(document.getElementById('gjem').style.display == "none"){
                                        document.getElementById('gjem').style.display = "block";
                                        
                                        
                                        document.getElementById('gjemandre').innerHTML = "<a href=\"#\" id=\"linkborte\" onclick=\"leggtil()\">Avbryt</a> - <input type=submit onclick=\"lagrefirma()\" value=\"Lagre\">";
                                    } else {
                                        
                                        document.getElementById('gjem').style.display = "none";
                                        document.getElementById('gjemandre').innerHTML = "<a href=\"#\" id=\"linkborte\" onclick=\"leggtil()\">+ Nytt firma</a>";
                                    }
                                    
                                        
                                    }
                                    </script>

                                    
{!! Form::open(['url' => 'project']) !!}

<div class="form-group">

 {!! Form::label('projectName', 'Project name:') !!}

 {!! Form::text('projectName', null, ['placeholder'=>'Skriv inn prosjektnavn','class' => 'form-control']) !!}

</div>

<br>

<div class="form-group">

 {!! Form::label('projectAddress', 'Project address:') !!}

 {!! Form::text('projectAddress', null, ['placeholder'=>'Skriv inn prosjektets adresse','class' => 'form-control']) !!}

</div>

<br>

<div class="form-group">

 {!! Form::label('budget', 'Estimated hours:') !!}

 {!! Form::text('budget', null, ['placeholder'=>'Skriv inn estimerte timer til prosjektet','class' => 'form-control']) !!}

</div>

<br>

<div class="form-group">

 {!! Form::label('description', 'Project description:') !!}

 {!! Form::textarea('description', null, ['placeholder'=>'Gi en beskrivelse av prosjektet','class' => 'form-control']) !!}

</div>


<br>



<div class="form-group" >

 {!! Form::label('contactpersonID', 'Contact personer') !!}

  <!--<input type="text", id="datepicker">-->

{!! Form::select('contactpersonID', $contactperson_list) !!}

</br><a href="#" onclick="test()">+ Ny kontaktperson</a>
</div>




<div class="form-group" >

 {!! Form::label('customerID', 'Byggherre') !!}

  <!--<input type="text", id="datepicker">-->

{!! Form::select('customerID', $customer_list) !!}


</div>



{!! Form::open(['url' => 'project']) !!}

<div class="form-group">


 {!! Form::submit('Registrer ny contact', ['class' => 'btn btn-primary form-control']) !!}

</div>


{!! Form::close() !!}


<br>



<br>

<div class="form-group">


 {!! Form::submit('Registrate', ['class' => 'btn btn-primary form-control']) !!}

</div>





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
option.text = firstname + " " + lastname;
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
