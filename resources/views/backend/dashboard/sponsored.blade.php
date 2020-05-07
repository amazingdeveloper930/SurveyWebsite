@extends('backend.layouts.default')

@section('title')
Admin - Sponsored Surveys
@endsection

@section('content')
<div class="row">
	<main class="col-md-12 ml-sm-auto col-lg-12 px-4" role="main">
		<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
			<div class="page-header">
				<h1 class="h2">
					Sponsored Surveys
				</h1>
			</div>
			<div class="table-responsive">
				<table class="table table-striped table-sm">
					<thead>
						<tr>
							<th>
								#
							</th>
							<th>
								Title
							</th>
							{{--
							<th>
								Description
							</th>
							--}}
							<th>
								Status
							</th>
							<th>
								Advertise Credit
							</th>
							<th>
								No. of Answers
							</th>
							<th>
								Created At
							</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($surveys as $survey)
						<tr>
							<td>
								{{ $survey->id }}
							</td>
							<td>
								{{ $survey->title }}
							</td>
							{{--
							<td>
								{{ $survey->description }}
							</td>
							--}}
							<td>
								{!! $survey->active == 1 ? '
								<span class="badge badge-success text-uppercase">
									Active
								</span>
								' : '
								<span class="badge text-uppercase">
									Disabled
								</span>
								' !!}
							</td>
							<td>
								{{ $survey->advertise_credits }}
							</td>
							<td>{{ $no_of_answers[$survey->id] }}</td>
							<td>
								{{ $survey->created_at }}
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
				{{ $surveys->links() }}
			</div>
		</div>
	</main>
</div>
@stop
