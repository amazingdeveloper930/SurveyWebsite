@extends('backend.layouts.default')

@section('title')
	Admin Panel - Blogs
@endsection

@section('content')
	<div class="page-header">
		<div class="pull-right">
			<a href="{{ route('blogs.create') }}" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> New Blog</a>
		</div>
		<h1>Blogs</h1>
	</div>
		@if (session('status'))
			<div class="alert alert-success">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				{{ session('status') }}
			</div>
		@endif
		<table cellpadding="0" cellspacing="0" border="0" class="table table-striped">
			<thead>
				<tr>
					<th>ID</th>
					<th>Image</th>
					<th  style='width:50%'>Title</th>
					<th>Created At</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($blogs as $data)
					<tr>
						<td>{{ $data->id }}</td>
						<td>@if (!empty($data->image))
					<div class="form-group">
						<img class="img-responsive" style='max-width:150px' src="{{ asset('uploads/blogs/photos/thumb').'/'.$data->image }}">
					</div>
					@else
						<span class="badge badge-danger text-uppercase">No Image</span> 
				@endif</td>
						<td>{{ $data->title }}</td>
						
						<td>{{ $data->created_at }}</td>
						<td>
							<div class="btn-group">
								<a href="{{ route('blogs.edit', $data->id) }}" class="btn btn-sm btn-default"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
								<a href="{{ route('blogs.delete', $data->id) }}" class="btn btn-sm btn-default" onclick="return confirm('Do you want to delete this data?');"><i class="glyphicon glyphicon-trash"></i> Delete</a>
							</div>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
		{{ $blogs->links() }}
@stop