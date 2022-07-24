@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Show Contact Me</h4>
                    <a href="{{ url('admin/contact-me') }}" class="btn btn-info float-right"><i class="{{ config('crud.back_icon') }}"></i></a>
                </div>
                <div class="card-body">                        
                    <div class="row pb-4">                           
                        <div class="col-lg-3">Name</div>
                        <div class="col-lg-9">{{ $contact_me->name }}</div>
                    </div> 
                    <div class="row pb-4">                           
                        <div class="col-lg-3">Email</div>
                        <div class="col-lg-9">{{ $contact_me->email }}</div>
                    </div> 
                    <div class="row pb-4">                           
                        <div class="col-lg-3">Subject</div>
                        <div class="col-lg-9">{{ $contact_me->subject }}</div>
                    </div> 
                    <div class="row pb-4">                           
                        <div class="col-lg-3">Message</div>
                        <div class="col-lg-9">{{ $contact_me->message }}</div>
                    </div> 
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <ul style="display: inline-flex; float:right;">
                        <li>
                            <a href="{{ url('admin/contact-me/create') }}" class="btn btn-primary"><i class="{{ config('crud.plus_icon') }}"></i></a>
                        </li>
                        <li>
                            <a href="{{ url('admin/contact-me/'. $contact_me->id.'/edit') }}" class="btn btn-success"><i class="{{ config('crud.edit_icon') }}"></i></a>
                        </li>
                        <li>
                            <form id="back-delete-form" action="{{ url('admin/contact-me', [$contact_me->id]) }}" method="POST">
                                @csrf
                                {{method_field('DELETE')}}
                                <button type="submit" class="btn btn-danger"><i class="{{ config('crud.delete_icon') }}"></i></button>
                            </form>
                        </li>
                    </ul>
                    
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
