@extends('layouts.admin')


@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Create New Contact Me</h4>
                    <a href="{{ url('admin/contact-me') }}" class="btn btn-info float-right"><i class="{{ config('crud.back_icon') }}"></i></a>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ url('admin/contact-me') }}" id="contact-me-form-submit">
                        @csrf
						<div class="form-group row">
					        <label for="name" class="col-form-label col-lg-4">{{ __('Name') }}</label>
						    <div class="col-lg-8">
						        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" >
						        @error('name')
	                                <span class="invalid-feedback" role="alert">
	                                    <strong>{{ $message }}</strong>
	                                </span>
	                            @enderror
						    </div>
						</div>
                        <div class="form-group row">
					        <label for="email" class="col-form-label col-lg-4">{{ __('Email') }}</label>
					        <div class="col-lg-8">
						        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" >
						        @error('email')
	                                <span class="invalid-feedback" role="alert">
	                                    <strong>{{ $message }}</strong>
	                                </span>
	                            @enderror
						    </div>
						</div>
						<div class="form-group row">
					        <label for="subject" class="col-form-label col-lg-4">{{ __('Subject') }}</label>
						    <div class="col-lg-8">
						        <input id="subject" type="text" class="form-control @error('subject') is-invalid @enderror" name="subject" value="{{ old('subject') }}" >
						        @error('subject')
	                                <span class="invalid-feedback" role="alert">
	                                    <strong>{{ $message }}</strong>
	                                </span>
	                            @enderror
						    </div>
						</div>
                        <div class="form-group row">
					        <label for="message" class="col-lg-4 col-form-label">{{ __('Message') }}</label>
					        <div class="col-lg-8">
						    	<textarea id="message" class="form-control @error('message') is-invalid @enderror" name="message" rows="5" cols="30">{{ old('message') }}</textarea>
						    	@error('message')
	                                <span class="invalid-feedback" role="alert">
	                                    <strong>{{ $message }}</strong>
	                                </span>
	                            @enderror
						    </div>
						</div>
					</form>
                </div>
            </div>            
	    </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <div class="form-group clearfix"> 
                        <button type="submit" class="btn btn-primary float-right" form="contact-me-form-submit">
                            <i class="{{ config('permission.save_icon') }}"></i>
                            {{ __('Save ContactMe') }}
                        </button>
                    </div>
                    @include('includes.crud-file-upload-modal')
                </div>
            </div>            
        </div>
    </div>
</div>
@endsection
