@extends('layouts.app')
@section('content')
	<div class="container">
	    <div class="row">
	        <div class="col-md-10 col-lg-8 col-md-offset-1 col-lg-offset-2">
				<h1 class="text-center">Welcome to the Online Endocrinologist
				<br> <small>The best online patient-to-doctor communications system</small></h1>
				<p>&nbsp;</p>
				<p class="lead">Diabetes can be hard enough to manage with the constant monitoring and adjustments,
				but having to create pages upon pages of logs of measurements and forwarding these
				logs to your doctor can be a pain.</p>
				<p class="lead">The Online Endocrinologist solves this problem by providing a simple and intuitive interface
				with which you can communicate your daily logs with your healthcare professional.</p>
				<h2 class="text-center">Let's get started!</h2>
				<div class="row">
					<div class="col-md-8 col-md-offset-2">
						<a href="{{ route('register') }}"><button class="btn btn-primary btn-block btn-lg">Sign Up</button></a>
					</div>
				</div>
				<br>
			</div>
		</div>

	</div>
@endsection
