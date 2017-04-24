{{-- <div class="col-md-6">
	<form method="POST" action='@yield('action')' class="form-group">
		@yield('method') --}}
		<label for="name">@yield('label')</label>
		<div class="form row">
			<div class="col-md-7 col-xs-9">
				<input name="@yield('inputName')" class="form-control col-md-9" type="text" id="name" value="@yield('value')">
			</div>
			<div class="col-md-3 col-xs-3">
				<input class="btn btn-primary" type="submit" value="Submit">
			</div>
		</div>
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
	</form>
	@if (count($errors) > 0)
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif

{{-- </div> --}}
