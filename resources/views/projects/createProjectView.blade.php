@extends('app')
@section('content')

<style>
    #newcontact {
        position: absolute;
        top: 30%;
        left: 50%;
        width: 40%;
        height: 200px;
        border: 2px solid black;
        background-color: white;
        margin-left: -20%;
        
        display:none;
        z-index: 9999;
        max-width: 800px;
        color: black;
        padding: 20px;
        border: 2px solid gray;
        
        
        
    }
    #grey {
        z-index: 9998;
        width: 100%;
        height: 100%;
        background-color: black;
        opacity: 0.8;
        display: none;
        left: 0;
        right: 0;
        position: fixed;
        border: 1px solid grey;
        
    }
</style>

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
                                        <table><tr><td>
                                        <table><tr><td>Fornavn: </td><td><input type="text" id="fornavn"></td></tr>
                                            <tr><td>Etternavn: </td><td><input type="text" id="etternavn"></td></tr>
                                            <tr><td>Telefon: </td><td><input type="text" id="telefon"></td></tr>
                                            <tr><td>Email: </td><td><input type="email" id="email"></td></tr>
                                        
                                            <tr><td colspan="2">
                                                    <input type="submit" name="store" id="store" value="Lagre!" onclick="lagre()"></td></tr>
                                            
                                        </table>
                                        <a href="#" onclick="test()">Avslutt</a><div id="result"></div>
                                                </td><td valign="top">
                                        
                                        {!! Form::select('companyid', $company_list, null, array('size' => '5')) !!}
                                        
                                                </td></tr></table>

                                        
                                    </div>
                                    

                                    
{!! Form::open(['url' => 'project']) !!}

<div class="form-group">

 {!! Form::label('projectName', 'Project name:') !!}

 {!! Form::text('projectName', null, ['class' => 'form-control']) !!}

</div>

<br>

<div class="form-group">

 {!! Form::label('projectAddress', 'Project address:') !!}

 {!! Form::text('projectAddress', null, ['class' => 'form-control']) !!}

</div>

<br>

<div class="form-group">

 {!! Form::label('budget', 'Estimated hours:') !!}

 {!! Form::text('budget', null, ['class' => 'form-control']) !!}

</div>

<br>

<div class="form-group">

 {!! Form::label('description', 'Project description:') !!}

 {!! Form::textarea('description', null, ['class' => 'form-control']) !!}

</div>


<br>



<div class="form-group" >

 {!! Form::label('contactpersonID', 'Contact personer') !!}

  <!--<input type="text", id="datepicker">-->

{!! Form::select('contactpersonID', $contactperson_list) !!}

</br><a href="#" onclick="test()">+ Ny kontaktperson</a>
</div>

{!! Form::open(['url' => 'project']) !!}

<div class="form-group">


 {!! Form::submit('Registrer ny contact', ['class' => 'btn btn-primary form-control']) !!}

</div>


{!! Form::close() !!}


<br>


<div class="form-group" >

 {!! Form::label('customerID', 'Byggherre') !!}

  <!--<input type="text", id="datepicker">-->

{!! Form::select('customerID', $customer_list) !!}


</div>

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
    
 alert("HEI!");   


 var test = "hahaha";
    var her = "{{ url('/storecontact/') }}";
    
    her += "/" + firstname + "|" + lastname + "|" + phone + "|" + email + "";
    

    $.get(her, 
    
    function(data, status){
        
        if(isNaN(data.chatAr(0))) {
            alert("Suksess");
        } else {
            alert("Noe er galt");
        }
        
        alert("Data: " + data + "\nStatus: " + status);
    });



}

</script>




@stop
