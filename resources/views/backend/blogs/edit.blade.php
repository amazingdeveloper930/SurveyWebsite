@extends('backend.layouts.default')
@section('title')
	Admin Panel - {{ $blogs->name }} - Edit
@endsection

@section('content')
	<div class="page-header">
		<div class="pull-right">
			<button class="btn btn-primary" type="submit" form="form-banner"><i class="glyphicon glyphicon-floppy-disk"></i> Save</button>
		</div>
		<h1 class="panel-title">{{ $blogs->title }} <small>- Edit</small></h1>
	</div>
	{!! Form::open(['route' => ['blogs.update', $blogs->id], 'files' => true,'method' => 'put', 'id' => 'form-banner']) !!}
		<div class="row">
			<div class="col-md-8">
				<div class="form-group {{ $errors->first('name', 'has-error') }}">
					{!! Form::label('title', 'Title:') !!}
					{!! Form::text('title', $blogs->title, ['class' => 'form-control']) !!}
					{!! $errors->first('title', '<label class="control-label text-danger">:message</label>') !!}
				</div>
				
				
				<div class="form-group {{ $errors->first('body', 'has-error') }}">
					{!! Form::label('body', 'Body:') !!}<br>
					{!! $errors->first('body', '<label class="control-label text-danger">:message</label>') !!}
					{!! Form::textarea('body', $blogs->body, ['id' => 'editor']) !!}
				</div>
			</div>
			
			<div class='col-md-4'>
			@if (!empty($blogs->image))
					<div class="form-group">
						<img class="img-thumbnail" src="{{ asset('uploads/blogs/photos').'/'.$blogs->image }}">
					</div>
					@else
						<div class="form-group">
						<img class="img-thumbnail" style="width: 100%;" src="{{ asset('uploads/img-placeholder.png')}}">
					</div>
				@endif
				
				<div class="form-group {{ $errors->first('image', 'has-error') }}">
					{!! Form::label('photo', 'Photo:') !!}
					{{ Form::file('image', [ 'class' => 'form-control ', 'placeholder' => 'Picture of the profile']) }}
					{!! $errors->first('image', '<label class="control-label text-danger">:message</label>') !!}
					</div>
					
			</div>
			
		</div>
	{!! Form::close() !!}
@endsection

@push('styles')
	<link href="{{ asset('js/backend/summernote/summernote.css') }}" rel="stylesheet">
@endpush

@push('scripts')
	<script src="{{ asset('js/backend/summernote/summernote.min.js') }}"></script>
	<script type="text/javascript">
		$('#editor').summernote({
			disableDragAndDrop: true,
			height: 300,
		});
	</script>
@endpush