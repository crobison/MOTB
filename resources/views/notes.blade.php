@extends('layouts.app')

@section('content')
	<!-- Bootstrap Boilerplate stuff -->
	<div class="container">
		<div class="col-sm-offset-2 col-sm-8">
			<div class="panel panel-default">
				<div class="panel-heading">
					New Note
				</div>
				<div class="panel-body">
					<!-- Display Validation Errors -->
					@include('common.errors')

					<form action="/note" method="POST" class="form-horizontal">
						{{ csrf_field() }}

						<div class="form-group">
							<label for="note-title" class="col-sm-3 control-label">Note Title</label>

							<div class="col-sm-6">
								<input type="text" name="title" id="note-title" class="form-control" value="{{ old('note') }}">
							</div>
						</div>

						<div class="form-group">
							<label for="note-description" class="col-sm-3 control-label">Note Description</label>

							<div class="col-sm-6">
								<textarea name="description" id="note-description" class="form-control"></textarea>
							</div>
						</div>

						<div class="form-group">
							<div class="col-sm-offset-3 col-sm-6">
								<button type="submit" class="btn btn-default">
									<i class="fa fa-btn fa-plus"></i>Add Note
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
<!-- Current Notes -->

		@if (count($notes) > 0)
			<div class="panel panel-default">

				<div class="panel-body">
					<table class="table table-striped task-table">
						<thead>
							<th>Notes</th>
						</thead>

						<tbody>
							@foreach ($notes as $note)
								@if ($note->active == true)
								<tr>
									<td class="table-text">
										<div style="font-weight: bold;">{{ $note->title}}</div>
										<div> {{ $note->description }} </div>
										<div style="font-size: 8px;"> 
											<!--who this note is shared with by auth user -->
										</div>
									</td>

									<td class="table-text" width="100px;">
										<form action="{{ url('note/'.$note->id) }}" method="POST">
											{!! csrf_field() !!}
											<button type="submit" class="btn btn-danger pull-left">
												<i class="fa fa-btn fa-trash" title="delete"></i>
											</button>
										</form>
										<!--
										<form action="{{ url('share/'.$note->id) }}" method="POST">
											{!! csrf_field() !!}
											<button type="submit" class="btn btn-danger pull-right">
												<i class="fa fa-btn fa-share-alt" title="share"></i>
											</button>
										</form>
										-->
										<a type="button" href="{{ url('share/'.$note->id) }}" class="btn btn-danger pull-right"><i class="fa fa-btn fa-share-alt" title="share"></i></a>
									</td>
								</tr>
								@endif
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		@endif





		</div>
	</div>

@endsection
