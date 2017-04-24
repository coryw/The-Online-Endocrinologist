@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-lg-8 col-md-offset-1 col-lg-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading">Blood Sugars</div>

                <div class="panel-body">
					@if (count($sugars) > 0)
						<table class="table table-hover">
						<thead>
							<th>Value (mg/dL)</th><th>Date</th><th>Comment</th><th>Delete</th>
						</thead>
						<tbody>
	                    @foreach ($sugars as $sugar)
							<tr>
								<td class="value">{{{ $sugar->value }}}</td>
								<td>{{{ $sugar->reading_time }}}</td>
								<td>{{{ $sugar->comment }}}</td>
								<td>
									<form method="POST" class="form-inline" action="{{ route('patient.sugars.destroy', [$user_id, $sugar->id]) }}">
										<input type="hidden" name="_token" value="{{ csrf_token() }}">
										{{ method_field('DELETE') }}
										<button type="submit" class="close" aria-label="Close" hidden><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button>
									</form>
								</td>
							</tr>
						@endforeach
					@else
						<h4>No sugars logged yet. Go ahead and add one!</h4>
						<br>
					@endif
					</tbody>
					</table>
					<form class="form-inline" id="add-sugar-form" method="POST" action="{{ route('patient.sugars.store', $user_id) }}" hidden>
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<label for="name" class="sr-only" >Value</label>
						<input name="value" class="form-control" type="number" min="0" max="1000" placeholder="Value"></input>
						<label for="reading_time" class="sr-only">Date</label>
						<input name="reading_time" class="form-control" type="datetime-local"></input>
						<label for="comment" class="sr-only" >Comment</label>
						<input name="comment" class="form-control" type="text" placeholder="Comment"></input>
						<button type="submit" class="btn btn-success">Add</button>
						<button class="btn btn-default delete-input" onClick="return false">Cancel</button>
					</form>
					<button id="add-sugar-button" class="btn btn-primary">Add Blood Sugar</button>
                </div>
            </div>
			@if (session()->has('status'))
				<div class="alert {{ session()->has('alert_level') ? session()->get('alert_level') : 'alert-success' }}" id="status">
					{{ session()->get('status', '') }}
				</div>
			@endif
			@if (count($errors) > 0)
				<div class="alert alert-danger">
					<ul>
						@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
			@endif
        </div>
    </div>
</div>
@endsection
