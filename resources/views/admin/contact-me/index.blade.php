@extends('layouts.admin')


@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-12 col-xxl-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Contact Mes</h4>
                    <a href="{{ url('admin/contact-me/create') }}" class="btn btn-primary float-right"><i class="{{ config('crud.plus_icon') }}"></i> Add Contact Me</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="thead-light">
                                <tr>
                                    <th>#</th>
                                    <th scope="col">Name</th>
									<th scope="col">Email</th>
									<th scope="col">Subject</th>
									<th scope="col">Message</th>
									
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($contact_mes as $key => $contact_me)
                                    <tr>
                                        <th>{{ $key+1 }}</th>
                                        
										<td scope="col">{{ $contact_me->name }}</td>
										<td scope="col">{{ $contact_me->email }}</td>
										<td scope="col">{{ $contact_me->subject }}</td>
										<td scope="col">{{ $contact_me->message }}</td>

                                        <td>
                                            <ul style="display: inline-flex;">
                                                <li>
                                                    <a href="{{ url('admin/contact-me/'. $contact_me->id) }}" class="btn btn-info btn-sm"><i class="{{ config('crud.show_icon') }}"></i></a>
                                                </li>
                                                <li>
                                                    <a href="{{ url('admin/contact-me/'. $contact_me->id.'/edit') }}" class="btn btn-success btn-sm"><i class="{{ config('crud.edit_icon') }}"></i></a>
                                                </li>
                                                <li>
                                                    <form action="{{ url('admin/contact-me', [$contact_me->id]) }}" method="POST">
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
                            {{ $contact_mes->links() }}
                        </div>
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

