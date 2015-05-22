@extends('app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">{{Lang::get('general.registerUser')}}</div>
                    <div class="panel-body">
                        
@if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>

                        @endif
    <h1>{{Lang::get('general.edit')}} {!! $user->firstname !!}</h1>

    <form method="post" action="/editpage/{{$user->id}}/editpress">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<input type="hidden" name="idhidden" value="{{$user->id}}">
<div class="form-group">
    <label>{{trans('general.email')}}</label>
    <input type="text" name="email" class="form-control" value="{{$user->email}}">
    </div>

<div class="form-group">
    <label>{{trans('general.firstname')}}</label>
    <input type="text" name="firstname" class="form-control" value="{{$user->firstname}}">
    </div>

<div class="form-group">
    <label>{{trans('general.surname')}}</label>
    <input type="text" name="lastname" class="form-control" value="{{$user->lastname}}">
    </div>

<div class="form-group">
    <label>{{trans('general.telephone')}}</label>
    <input type="text" name="telephone" class="form-control" value="{{$user->telephone}}">
    </div>

<div class="form-group">
    <label>{{trans('general.address')}}</label>
    <input type="text" name="address" class="form-control" value="{{$user->address}}">
    </div>

<div class="form-group">
    <label>{{trans('general.newpassword')}} </label><p style="color: red">{{trans('general.nbwarning')}}</p>
    <input type="text" name="newpassword" class="form-control">
    </div>

<div class="form-group"> 
    <label>{{trans('general.confirmnewpassword')}}</label><p style="color: red">{{trans('general.nbwarning')}}</p>
    <input type="text" name="newpasswordconfirm" class="form-control">
    </div>



<br />
    <div class="form-group">
        {!! Form::submit(trans('general.updateUserbtn'), ['class' => 'btn btn-primary form-control'] ) !!}
    </div>

    </form>

                       
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@stop