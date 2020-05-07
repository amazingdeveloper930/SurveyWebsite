@extends('backend.layouts.default')

@section('title')
	Admin Panel - Soc.shares
@endsection

@section('content')
	<div class="page-header">

		<h1>Social Shared Surveys</h1>
	</div>

		
		<table cellpadding="0" cellspacing="0" border="0" class="table table-striped">
			<thead>
				<tr>
					<th>Survey ID</th>
					<th>User</th>
					<th>E-mail</th>
					<th>Share Status</th>
					<th>Shared At</th>
				</tr>
			</thead>
			<tbody>
				@foreach($campaigns as $campaign)
					<tr>
						<td>{{ $campaign->id }}</td>
						<td><a href="{{ route('users.show', $campaign->user_id) }}">{{ $campaign->username }}</a>
						</td>
						<td>{{ $campaign->email }}</td>
						<td>
							@if ($campaign->shared == 1)
								<span class="badge badge-success text-uppercase">Twitter</span>
							@else
								<span class="badge badge-info text-uppercase">FaceBook</span>
							@endif
						</td>
						<td>{{ $campaign->shared_at }}</td>
					</tr>
				@endforeach
			</tbody>
		</table>
@stop