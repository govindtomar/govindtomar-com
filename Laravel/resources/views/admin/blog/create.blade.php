@extends('layouts.admin')


@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Create New Blog</h4>
                <a href="{{ url('admin/blog') }}" class="btn btn-info float-right"><i class="{{ config('crud.back_icon') }}"></i></a>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ url('admin/blog') }}" id="blog-form-submit">
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
                        <label for="user_id" class="col-form-label col-lg-4">{{ __('User') }}</label>
                        <div class="col-lg-8">
                            <select class="form-control single-select @error('user_id') is-invalid @enderror" id="user_id" name="user_id">
                                <option value="0" selected="selected" disabled="disabled">Select User</option>
                                @foreach($users as $key => $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                            @error('user_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
					<div class="form-group row">
				        <label for="slug" class="col-form-label col-lg-4">{{ __('Slug') }}</label>
					    <div class="col-lg-8">
					        <input id="slug" type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" value="{{ old('slug') }}" >
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
					        <input id="path" type="text" class="form-control @error('path') is-invalid @enderror" name="path" value="{{ old('path') }}" >
					        @error('path')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
					    </div>
					</div>
                    <div class="form-group row">
				        <label for="description" class="col-lg-4 col-form-label">{{ __('Description') }}</label>
				        <div class="col-lg-8">
					    	<textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description" rows="5" cols="30">{{ old('description') }}</textarea>
					    	@error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
					    </div>
					</div>
					<div class="form-group row">
				        <label for="meta_title" class="col-form-label col-lg-4">{{ __('Meta title') }}</label>
					    <div class="col-lg-8">
					        <input id="meta_title" type="text" class="form-control @error('meta_title') is-invalid @enderror" name="meta_title" value="{{ old('meta_title') }}" >
					        @error('meta_title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
					    </div>
					</div>
                    <div class="form-group row">
				        <label for="meta_description" class="col-lg-4 col-form-label">{{ __('Meta description') }}</label>
				        <div class="col-lg-8">
					    	<textarea id="meta_description" class="form-control @error('meta_description') is-invalid @enderror" name="meta_description" rows="5" cols="30">{{ old('meta_description') }}</textarea>
					    	@error('meta_description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
					    </div>
					</div>
                    <div class="form-group row">
				        <label for="meta_keyword" class="col-lg-4 col-form-label">{{ __('Meta keyword') }}</label>
				        <div class="col-lg-8">
					    	<textarea id="meta_keyword" class="form-control @error('meta_keyword') is-invalid @enderror" name="meta_keyword" rows="5" cols="30">{{ old('meta_keyword') }}</textarea>
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
                    <button type="submit" class="btn btn-primary float-right" form="blog-form-submit">
                        <i class="{{ config('permission.save_icon') }}"></i>
                        {{ __('Save Blog') }}
                    </button>
                </div>
                					<div class="form-group mt-4">
                    <div class="upload-image-div">
                        <label class="w-100">
                            <img class="w-100 upload-img-output" src="{{ asset('assets/admin/img/150x75.jpg') }}">
                            <input type="file" class="get-upload-img d-none">
                            <input type="hidden" name="image" class="update-upload-img" form="blog-form-submit">
                        </label>
                    </div>
                </div>@include('includes.crud-file-upload-modal')
            </div>
        </div>            
    </div>
</div>
@endsection
