@extends('layouts.admin')


@section('content')
<div class="row">
    <div class="col-xl-12 col-xxl-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Blogs</h4>
                <a href="{{ url('admin/blog/create') }}" class="btn btn-primary float-right"><i class="{{ config('crud.plus_icon') }}"></i> Add Blog</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead class="thead-light">
                            <tr>
                                <th>#</th>
                                <th scope="col">Image</th>
								<th scope="col">Name</th>
								<th scope="col">User</th>
								<th scope="col">Publish</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($blogs as $key => $blog)
                                <tr>
                                    <th>{{ $key+1 }}</th>
                                    
									<td scope="col" style="padding-top:5px;padding-bottom:5px;">
                                        <img style="width:40px;" src="{{ asset($blog->image) }}" />
                                    </td>
									<td scope="col">{{ $blog->name }}</td>
									<td scope="col">{{ $blog->user->name }}</td>
									<td scope='col'>
										<label class='checkbox-inline pl-4'>
											<input type='checkbox' @if($blog->publish == 1) checked @endif data-toggle_id='{{ $blog->id }}' data-toggle='toggle' data-onstyle='success' class='blog-publish-toggle' data-offstyle='danger' name='publish' data-size='xs'>
										</label>
									</td>
                                    <td>
                                        <ul style="display: inline-flex;">
                                            <li>
                                                <a href="{{ url('admin/blog/'. $blog->id) }}" class="btn btn-info btn-sm"><i class="{{ config('crud.show_icon') }}"></i></a>
                                            </li>
                                            <li>
                                                <a href="{{ url('admin/blog/'. $blog->id.'/edit') }}" class="btn btn-success btn-sm"><i class="{{ config('crud.edit_icon') }}"></i></a>
                                            </li>
                                            <li>
                                                <form action="{{ url('admin/blog', [$blog->id]) }}" method="POST">
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
                        {{ $blogs->links() }}
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
    jQuery(document).on('change', '.blog-publish-toggle', function(){
        var isThis = this;
        $.ajax({
            type:'post',
            url: site_url+'/admin/blog/publish',
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

