@extends('app')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">{{trans('general.registerUser')}}</div>
				<div class="panel-body">
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							{{trans('general.inputProblems')}}
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif
                                        
                                      

					<form class="form-horizontal" role="form" method="POST" action="/auth/register">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                
                                                
                                                 
						<div class="form-group">
                                                    <label class="col-md-4 control-label">{{trans('general.userIDregistrering')}}</label>
							<div class="col-md-6">
								<input type="text" class="form-control-required" name="userid" value="{{ old('userid') }}">
							</div>
						</div>
                                                
                                                
						<div class="form-group">
                                                    <label class="col-md-4 control-label">{{trans('general.firstname')}}</label>
							<div class="col-md-6">
								<input type="text" class="form-control-required" name="firstname" value="{{ old('firstname') }}">
							</div>
						</div>
                                        
                                                <div class="form-group">
							<label class="col-md-4 control-label">{{trans('general.surname')}}</label>
							<div class="col-md-6">
								<input type="text" class="form-control-required" name="lastname" value="{{ old('lastname') }}">
							</div>
						</div>
                                        
                                                  <div class="form-group">
							<label class="col-md-4 control-label">{{trans('general.telephone')}}</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="telephone" value="{{ old('telephone') }}">
							</div>
						</div>
                                        
                                                <div class="form-group">
							<label class="col-md-4 control-label">{{trans('general.address')}}</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="address" value="{{ old('address') }}">
							</div>
						</div>
                                        
						<div class="form-group">
							<label class="col-md-4 control-label">{{trans('general.email')}} (Brukernavnet)</label>
							<div class="col-md-6">
								<input type="email" class="form-control-required" name="email" value="{{ old('email') }}">
							</div>
						</div>
                                        
						<div class="form-group">
							<label class="col-md-4 control-label">{{trans('general.password')}}</label>
							<div class="col-md-6">
								<input type="password" class="form-control-required" name="password">
							</div>
						</div>
                                        
						<div class="form-group">
							<label class="col-md-4 control-label">{{trans('general.ensurePass')}}</label>
							<div class="col-md-6">
								<input type="password" class="form-control-required" name="password_confirmation">
							</div>
						</div>

						<div class="form-group">

                        	<label class="col-md-4 control-label">{{trans('general.language')}}</label>

                           <input type="radio" name="language" id="1" value="en"><label for="1"><img src="/bilder/eng.png" alt="English" height="30" width="30"></label>
                           <input type="radio" name="language" id="2" value="no"><label for="2"><img src="/bilder/nor.png" alt="English" height="30" width="30"></label>
                           <input type="radio" name="language" id="3" value="es"><label for="3"><img src="/bilder/est.png" alt="English" height="30" width="30"></label>
                           

                                                </div>
                                           

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								
                                                            <table><tr><td> Administrator? </td><td><input type="checkbox" id="admin" name="admin"></td></tr></table>
                                                
							</div>
                                                </div>
                                                
                                                
						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									{{trans('general.registrate')}}
								</button>
							</div>
                                                    
                                                    
                                                    
                                                    
						</div>
                                        
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
