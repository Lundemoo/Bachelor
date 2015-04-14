@extends('app')
@section('content')

<h1>{{trans('general.allBuilders')}}</h1>

@foreach ($builders as $builder)
    <h2> <li> CustomerID: {{$builder->customerID}}</li> </h2>

    <div class="innholdet"> {{trans('general.customerName')}} {{ $builder->customername }}</div>
    <div class="innholdet"> {{trans('general.customerAddress')}} {{ $builder->customeraddress }}</div>
    <div class="innholdet"> {{trans('general.customerTelephone')}} {{ $builder->customertelephone}}</div>
    <div class="innholdet"> {{trans('general.customerEmail')}} {{ $builder->customeremail }}</div>

    <!-- <li>{{ link_to("/builder/{$builder->customername}", $builder->customeraddress)}}</li>  -->

@endforeach

@endsection
