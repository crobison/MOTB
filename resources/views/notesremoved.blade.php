@extends('layouts.app')

@section('content')
	<!-- Bootstrap Boilerplate stuff -->
	<div class="container">
		<div class="col-sm-offset-2 col-sm-8">

<!-- Removed Notes -->

			<div class="panel panel-default">

				<div class="panel-body">
					<table class="table table-striped task-table">
						<thead>
							<th>Deleted Notes</th>
						</thead>
						<tbody>
							@if (count($notes) > 0)
							@foreach ($notes as $note)
								<tr>
									<td class="table-text">
										<div style="font-weight: bold;">{{ $note->title}}</div>
										<div>{{ $note->description }} </div>
									</td>
									<td class="table-text" width="40px">

										<form action="{{ url('note/restore/'.$note->id) }}" method="POST">
											{!! csrf_field() !!}
											<button type="submit" class="btn btn-danger pull-right">
												<i class="fa fa-btn fa-history"></i>
											</button>
										</form>
									</td>

								</tr>
							@endforeach
							@else
								<tr>
									<td class="table-text">
									No deleted notes.
									</td>
								</tr>
							@endif
						</tbody>
					</table>
				</div>
			</div>
				<a href="{{ url('notes/')}}" class="btn btn-danger pull-left" role="button"><i class="fa fa-btn fa-step-backward"></i> Notes</a>

		</div>
	</div>

@endsection
