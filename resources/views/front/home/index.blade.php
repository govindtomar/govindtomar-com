@extends('layouts.front')

@section('content')
	@include('front.home.hero')
	<main id="main">
		@include('front.home.services')
		@include('front.home.portfolio')
		@include('front.home.package')
		@include('front.home.contact')
	</main>
@endsection