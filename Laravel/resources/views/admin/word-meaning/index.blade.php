@extends('layouts.admin')


@section('content')
<div class="row">
    <div class="col-xl-12 col-xxl-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Word Meanings</h4>
                <a href="{{ url('admin/word-meaning/create') }}" class="btn btn-primary float-right"><i class="{{ config('crud.plus_icon') }}"></i> Add Word Meaning</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead class="thead-light">
                            <tr>
                                <th>#</th>
                                <th scope="col">Word</th>
								<th scope="col">Meaning</th>
								{{-- <th scope="col">Detail</th>
								<th scope="col">Sentence</th>
								<th scope="col">Status</th> --}}
								
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($word_meanings as $key => $word_meaning)
                                <tr>
                                    <th>{{ $key+1 }}</th>
                                    
									<td scope="col">{{ $word_meaning->word }}</td>
									<td scope="col">{{ $word_meaning->meaning }}</td>
									{{-- <td scope="col">{{ $word_meaning->detail }}</td> --}}
									{{-- <td scope="col">{{ $word_meaning->sentence }}</td> --}}
									{{-- <td scope='col'>
										<label class='checkbox-inline pl-4'>
											<input type='checkbox' @if($word_meaning->status == 1) checked @endif data-toggle_id='{{ $word_meaning->id }}' data-toggle='toggle' data-onstyle='success' class='word_meaning-status-toggle' data-offstyle='danger' name='status' data-size='xs'>
										</label>
									</td> --}}

                                    <td>
                                        <ul style="display: inline-flex;">
                                            <li>
                                                <a href="{{ url('admin/word-meaning/'. $word_meaning->id) }}" class="btn btn-info btn-sm"><i class="{{ config('crud.show_icon') }}"></i></a>
                                            </li>
                                            <li>
                                                <a href="{{ url('admin/word-meaning/'. $word_meaning->id.'/edit') }}" class="btn btn-success btn-sm"><i class="{{ config('crud.edit_icon') }}"></i></a>
                                            </li>
                                            <li>
                                                <form action="{{ url('admin/word-meaning', [$word_meaning->id]) }}" method="POST">
                                                  @csrf
                                                  {{method_field('DELETE')}}
                                                  <button type="submit" class="btn btn-danger btn-sm"><i class="{{ config('crud.delete_icon') }}"></i></button>
                                                </form>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="index-pagination">
                        {{ $word_meanings->links() }}
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

