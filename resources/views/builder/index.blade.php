<!DOCTYPE html>
<html>
<head>
    <meta charset = "utf-8">

</head>

<body>

<h1> Alle byggherrer</h1>

@foreach ($builders as $builder)
    <h2> <li> CustomerID: {{$builder->customerID}}</li> </h2>

    <div class="innholdet"> Kundenavn: {{ $builder->customername }}</div>
    <div class="innholdet"> Kundeadresse: {{ $builder->customeraddress }}</div>
    <div class="innholdet"> Kundetelefon: {{ $builder->customertelephone}}</div>
    <div class="innholdet"> Kunde epost: {{ $builder->customeremail }}</div>

    <!-- <li>{{ link_to("/builder/{$builder->customername}", $builder->customeraddress)}}</li>  -->

@endforeach


</body>

</html>