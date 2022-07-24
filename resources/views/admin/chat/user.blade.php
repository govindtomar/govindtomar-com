@extends('layouts.admin')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				
			</div>
			<div class="col-md-3">
				
			</div>
			<div class="col-md-3">
				<h3>Users</h3>
				<div class="user-container">
					<ul>
						@foreach($users as $user)
							<li>
								<a href="{{ url('/admin/chat/'.Crypt::encryptString($user->id)) }}">{{ $user->name }}</a>
							</li>
						@endforeach
					</ul>
				</div>
			</div>
		</div>
	</div>
@endsection

