@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Show Word Meaning</h4>
                <a href="{{ url('admin/word-meaning') }}" class="btn btn-info float-right"><i class="{{ config('crud.back_icon') }}"></i></a>
            </div>
            <div class="card-body">                        
                <div class="row pb-4">                           
                    <div class="col-lg-3">Word</div>
                    <div class="col-lg-9">{{ $word_meaning->word }}</div>
                </div> 
                <div class="row pb-4">                           
                    <div class="col-lg-3">Meaning</div>
                    <div class="col-lg-9">{{ $word_meaning->meaning }}</div>
                </div> 
                <div class="row pb-4">                           
                    <div class="col-lg-3">Detail</div>
                    <div class="col-lg-9">{{ $word_meaning->detail }}</div>
                </div> 
                <div class="row pb-4">                           
                    <div class="col-lg-3">Sentence</div>
                    <div class="col-lg-9">{{ $word_meaning->sentence }}</div>
                </div> 
                <div class="row pb-4">                           
                    <div class="col-lg-3">Status</div>
                    <div class="col-lg-9">
                        <label class='checkbox-inline pl-4'>
							<input type='checkbox' @if($word_meaning->status == 1) checked @endif data-toggle_id='{{ $word_meaning->id }}' data-toggle='toggle' data-onstyle='success' class='word_meaning-status-toggle' data-offstyle='danger' name='status' data-size='xs'>
						</label>
					</div>
                </div> 
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <ul style="display: inline-flex; float:right;">
                    <li>
                        <a href="{{ url('admin/word-meaning/create') }}" class="btn btn-primary"><i class="{{ config('crud.plus_icon') }}"></i></a>
                    </li>
                    <li>
                        <a href="{{ url('admin/word-meaning/'. $word_meaning->id.'/edit') }}" class="btn btn-success"><i class="{{ config('crud.edit_icon') }}"></i></a>
                    </li>
                    <li>
                        <form id="back-delete-form" action="{{ url('admin/word-meaning', [$word_meaning->id]) }}" method="POST">
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
@endsection
@section('script-last')
<script type='text/javascript'>
jQuery(document).ready(function() {
	var token = jQuery('meta[name="csrf-token"]').attr('content')
	var site_url = jQuery('meta[name="site-url"]').attr('content')
    jQuery(document).on('change', '.word_meaning-status-toggle', function(){
        var isThis = this;
        $.ajax({
            type:'post',
            url: site_url+'/admin/word_meaning/status',
            data:{
                'id': jQuery(this).data('toggle_id'),
                'status': jQuery(this).prop('checked'),
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
