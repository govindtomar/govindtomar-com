@extends('layouts.admin')


@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Edit Package</h4>
                <a href="{{ url('admin/package') }}" class="btn btn-info float-right"><i class="{{ config('crud.back_icon') }}"></i></a>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ url('admin/package/'.$package->id) }}" id="package-form-submit">
                    @csrf
                    @method('PUT')
					<div class="form-group row">
					    <label for="name" class="col-form-label col-lg-4">{{ __('Name') }}</label>
					    <div class="col-lg-8">
					        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $package->name }}">
					        @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
					    </div>
					</div>
                    <div class="form-group row">
                        <label for="user_id" class="col-form-label col-lg-4">{{ __('User') }}</label>
                        <div class="col-lg-8">
                            <select class="form-control single-select @error('user') is-invalid @enderror" id="user_id" name="user_id">
                                <option value="0" selected="selected" disabled="disabled">Select User</option>
                                @foreach($users as $key => $user)
                                    @if($user->id == $package->user_id)
                                    <option value="{{ $user->id }}" selected="selected">{{ $user->name }}</option>
                                    @else
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('user')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
					<div class="form-group row">
					    <label for="slug" class="col-form-label col-lg-4">{{ __('Slug') }}</label>
					    <div class="col-lg-8">
					        <input id="slug" type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" value="{{ $package->slug }}">
					        @error('slug')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
					    </div>
					</div>
					<div class="form-group row">
					    <label for="path" class="col-form-label col-lg-4">{{ __('Path') }}</label>
					    <div class="col-lg-8">
					        <input id="path" type="text" class="form-control @error('path') is-invalid @enderror" name="path" value="{{ $package->path }}">
					        @error('path')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
					    </div>
					</div>
					<div class="form-group row">
				    	<label for="description" class="col-form-label col-lg-4">{{ __('Description') }}</label>
				    	<div class="col-lg-8">
					    	<textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description" rows="5" cols="30" required=">{{ $package->description }}</textarea>
					    	@error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
					    </div>
					</div>						<div class="form-group row">
					    <label for="meta_title" class="col-form-label col-lg-4">{{ __('Meta title') }}</label>
					    <div class="col-lg-8">
					        <input id="meta_title" type="text" class="form-control @error('meta_title') is-invalid @enderror" name="meta_title" value="{{ $package->meta_title }}">
					        @error('meta_title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
					    </div>
					</div>
					<div class="form-group row">
				    	<label for="meta_description" class="col-form-label col-lg-4">{{ __('Meta description') }}</label>
				    	<div class="col-lg-8">
					    	<textarea id="meta_description" class="form-control @error('meta_description') is-invalid @enderror" name="meta_description" rows="5" cols="30" required=">{{ $package->meta_description }}</textarea>
					    	@error('meta_description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
					    </div>
					</div>						<div class="form-group row">
				    	<label for="meta_keyword" class="col-form-label col-lg-4">{{ __('Meta keyword') }}</label>
				    	<div class="col-lg-8">
					    	<textarea id="meta_keyword" class="form-control @error('meta_keyword') is-invalid @enderror" name="meta_keyword" rows="5" cols="30" required=">{{ $package->meta_keyword }}</textarea>
					    	@error('meta_keyword')
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
                    <button type="submit" class="btn btn-primary float-right" form="package-form-submit">
                        <i class="{{ config('crud.save_icon') }}"></i>
                        {{ __('Save Package') }}
                    </button>                        
                </div>
                					<div class="form-group mt-4">
                    <div class="upload-image-div">
                        <label class="w-100">
                            <img class="w-100 upload-img-output" src="{{ asset($package->image) }}">
                            <input type="file" class="get-upload-img d-none">
                            <input type="hidden" name="image" class="update-upload-img" form="package-form-submit">
                        </label>
                    </div>
                </div>@include('includes.crud-file-upload-modal')
            </div>
        </div>
    </div> 
</div>
@endsection