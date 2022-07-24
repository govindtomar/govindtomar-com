@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Show Package</h4>
                <a href="{{ url('admin/package') }}" class="btn btn-info float-right"><i class="{{ config('crud.back_icon') }}"></i></a>
            </div>
            <div class="card-body">                        
                <div class="row pb-4">                           
                    <div class="col-lg-3">Name</div>
                    <div class="col-lg-9">{{ $package->name }}</div>
                </div> 
                                        <div class="row pb-4">                           
                                            <div class="col-lg-3">User</div>
                                            <div class="col-lg-9">{{ $package->user->name }}</div>
                                        </div> 
                <div class="row pb-4">                           
                    <div class="col-lg-3">Slug</div>
                    <div class="col-lg-9">{{ $package->slug }}</div>
                </div> 
                <div class="row pb-4">                           
                    <div class="col-lg-3">Path</div>
                    <div class="col-lg-9">{{ $package->path }}</div>
                </div> 
                <div class="row pb-4">                           
                    <div class="col-lg-3">Description</div>
                    <div class="col-lg-9">{{ $package->description }}</div>
                </div> 
                <div class="row pb-4">                           
                    <div class="col-lg-3">Publish</div>
                    <div class="col-lg-9">
                        <label class='checkbox-inline pl-4'>
							<input type='checkbox' @if($package->publish == 1) checked @endif data-toggle_id='{{ $package->id }}' data-toggle='toggle' data-onstyle='success' class='package-publish-toggle' data-offstyle='danger' name='publish' data-size='xs'>
						</label>
					</div>
                </div> 
                <div class="row pb-4">                           
                    <div class="col-lg-3">Meta title</div>
                    <div class="col-lg-9">{{ $package->meta_title }}</div>
                </div> 
                <div class="row pb-4">                           
                    <div class="col-lg-3">Meta description</div>
                    <div class="col-lg-9">{{ $package->meta_description }}</div>
                </div> 
                <div class="row pb-4">                           
                    <div class="col-lg-3">Meta keyword</div>
                    <div class="col-lg-9">{{ $package->meta_keyword }}</div>
                </div> 
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <ul style="display: inline-flex; float:right;">
                    <li>
                        <a href="{{ url('admin/package/create') }}" class="btn btn-primary"><i class="{{ config('crud.plus_icon') }}"></i></a>
                    </li>
                    <li>
                        <a href="{{ url('admin/package/'. $package->id.'/edit') }}" class="btn btn-success"><i class="{{ config('crud.edit_icon') }}"></i></a>
                    </li>
                    <li>
                        <form id="back-delete-form" action="{{ url('admin/package', [$package->id]) }}" method="POST">
                            @csrf
                            {{method_field('DELETE')}}
                            <button type="submit" class="btn btn-danger"><i class="{{ config('crud.delete_icon') }}"></i></button>
                        </form>
                    </li>
                </ul>
                					<div class="form-group mt-4">
                    <div class="upload-image-div">
                        <label class="w-100">
                            <img class="w-100 upload-img-output" src="{{ asset($package->image) }}">
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div> 
</div>
@endsection
@section('script-last')
<script type='text/javascript'>
jQuery(document).ready(function() {
	var token = jQuery('meta[name="csrf-token"]').attr('content')
	var site_url = jQuery('meta[name="site-url"]').attr('content')
    jQuery(document).on('change', '.package-publish-toggle', function(){
        var isThis = this;
        $.ajax({
            type:'post',
            url: site_url+'/admin/package/publish',
            data:{
                'id': jQuery(this).data('toggle_id'),
                'publish': jQuery(this).prop('checked'),
                _token:token
            },
            success:function(data){
                change__toggle(data, isThis);
            }
        });
    });
    function change__toggle(data, isThis){
        if (data.status == true || data.status == false) {
        }else{
            if (jQuery(isThis).parents('.btn.toggle').attr('class') == 'toggle btn btn-xs btn-success') {
                jQuery(isThis).parents('.btn.toggle').removeClass('btn-success');
                jQuery(isThis).parents('.btn.toggle').addClass('btn-danger off');
            }
            else if(jQuery(isThis).parents('.btn.toggle').attr('class') == 'toggle btn btn-xs btn-danger off'){
                jQuery(isThis).parents('.btn.toggle').removeClass('btn-danger off');
                jQuery(isThis).parents('.btn.toggle').addClass('btn-success');
            }
            $(isThis).bootstrapToggle('disable')
        }
    }
});
</script>
@endsection
