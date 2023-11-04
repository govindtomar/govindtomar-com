@extends('layouts.admin')


@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Edit Word Meaning</h4>
                <a href="{{ url('admin/word-meaning') }}" class="btn btn-info float-right"><i class="{{ config('crud.back_icon') }}"></i></a>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ url('admin/word-meaning/'.$word-meaning->id) }}" id="word-meaning-form-submit">
                    @csrf
                    @method('PUT')
					<div class="form-group row">
					    <label for="word" class="col-form-label col-lg-4">{{ __('Word') }}</label>
					    <div class="col-lg-8">
					        <input id="word" type="text" class="form-control @error('word') is-invalid @enderror" name="word" value="{{ $word_meaning->word }}">
					        @error('word')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
					    </div>
					</div>
					<div class="form-group row">
					    <label for="meaning" class="col-form-label col-lg-4">{{ __('Meaning') }}</label>
					    <div class="col-lg-8">
					        <input id="meaning" type="text" class="form-control @error('meaning') is-invalid @enderror" name="meaning" value="{{ $word_meaning->meaning }}">
					        @error('meaning')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
					    </div>
					</div>
					<div class="form-group row">
					    <label for="detail" class="col-form-label col-lg-4">{{ __('Detail') }}</label>
					    <div class="col-lg-8">
					        <input id="detail" type="text" class="form-control @error('detail') is-invalid @enderror" name="detail" value="{{ $word_meaning->detail }}">
					        @error('detail')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
					    </div>
					</div>
					<div class="form-group row">
				    	<label for="sentence" class="col-form-label col-lg-4">{{ __('Sentence') }}</label>
				    	<div class="col-lg-8">
					    	<textarea id="sentence" class="form-control @error('sentence') is-invalid @enderror" name="sentence" rows="5" cols="30" required=">{{ $word_meaning->sentence }}</textarea>
					    	@error('sentence')
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
                    <button type="submit" class="btn btn-primary float-right" form="word-meaning-form-submit">
                        <i class="{{ config('crud.save_icon') }}"></i>
                        {{ __('Save WordMeaning') }}
                    </button>                        
                </div>
                @include('includes.crud-file-upload-modal')
            </div>
        </div>
    </div> 
</div>
@endsection