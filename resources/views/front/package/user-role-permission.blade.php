@extends('layouts.front')

@section('content')
	<main id="main">
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<section>
						<h1>Create a User Role Permission by using Permission Package</h1>
						<p class="para"></p>
						<div class="package-block">
							<h2>Installation</h2>
							<p class="para">To get started, you should add the <span class="h-b">govindtomar/permission</span> Composer dependency to your project</p>
							<p class="code">composer require govindtomar/permission</p>
							<p class="para">Once the package is installed, you should register the <span class="h-b">GovindTomar\Permission\PermissionServiceProvider</span> service provider. Normally, Laravel 5.5+ will register the service provider automatically.</p>
							<p>After that, publish its assets using the <span class="h-b">vendor:publish</span> Artisan command:</p>
							<p class="code">php artisan vendor:publish --provider="GovindTomar\Permission\PermissionServiceProvider"</p>
							<p>After that, you need to install permission on your project.</p>
							<p class="code">php artisan permission:install</p>						
						</div>
					</section>
				</div>
			</div>
		</div>
	</main>
@endsection