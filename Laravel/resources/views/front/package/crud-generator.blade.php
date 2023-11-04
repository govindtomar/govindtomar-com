@extends('layouts.front')

@section('content')
	<main id="main">
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<section>
						<h1>Create a CRUD Operation by using CRUD Generator Package</h1>
						<p class="para">This Generator package provides various generators like CRUD, API, Controller, Model, Migration, View for your painless development of your applications.</p>
						<div class="package-block">
							<h2>Installation</h2>
							<p class="para">To get started, you should add the <span class="h-b">govindtomar/crudgenerator</span> Composer dependency to your project</p>
							<p class="code">composer require govindtomar/crudgenerator</p>
							<p class="para">Once the package is installed, you should register the <span class="h-b">GovindTomar\CrudGenerator\CrudGeneratorServiceProvider</span> service provider. Normally, Laravel 5.5+ will register the service provider automatically.</p>
							<p>After that, publish its assets using the <span class="h-b">vendor:publish</span> Artisan command:</p>
							<p class="code">php artisan vendor:publish --provider="GovindTomar\CrudGenerator\CrudGeneratorServiceProvider"</p>
						</div>
						<div class="package-block">
							<h2>Configuration</h2>
							<p class="para">You will find a configuration file located at <span class="h-b">config/crud.php</span></p>
							<p class="para">When you want to use your own custom namespace, then you should change your own namespace</p>
							<p class="code">'namespace'	=>	'Admin',</p>
							<p class="para">When you want to use your own layout, then you should change your own layouts</p>
							<p class="code">'layout'  =>  'layouts.admin',</p>
							<p class="para">When you want to use create an API, then you should change to .</p>
							<p class="code">'code_type' => 'API',</p>
							<p class="para">When you want to use your own icons, then you should change to.</p>
							<ul class="code">
								<li>'show_icon'		=>	'bx bx-show',</li>
								<li>'edit_icon'		=>	'bx bx-edit',</li>
								<li>'delete_icon'	=>	'bx bx-x',</li>
								<li>'save_icon'		=>	'bx bx-save',</li>
								<li>'plus_icon'		=>	'bx bx-plus-medical',</li>
								<li>'lock_icon'		=>	'bx bx-lock-open-alt', </li>
								<li>'back_icon'     =>  'bx bx-arrow-back',</li>
							</ul>							
						</div>
						<div class="package-block">
							<h2>Usage</h2>
							<h4>Command</h4>
							<p class="code">php artisan make:crud ContactMe --fields=text*name,email*email,text*subject,textarea*message</p>
							<h4>Relationship</h4>
							<p class="code">php artisan make:crud ContactMe --fields=text*name,email*email,text*subject,textarea*message --model=User</p>
							<h4>Migration</h4>
							<p class="code">php artisan make:crud ContactMe --fields=text*name,email*email,text*subject,textarea*message --model=User --migration=yes</p>
							<h4>Available fields</h4>
							<ul class="code">
								<li>text</li>
								<li>email</li>
								<li>file</li>
								<li>hidden</li>
								<li>image</li>
								<li>number</li>
								<li>password</li>
								<li>date</li>
								<li>radio</li>
								<li>select</li>
								<li>textarea</li>
								<li>toggle</li>
							</ul>
						</div>
					</section>
				</div>
			</div>
		</div>
	</main>
@endsection