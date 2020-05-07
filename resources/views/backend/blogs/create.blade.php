@extends('backend.layouts.default')

@section('title')
	Admin Panel - Blog - Create
@endsection

@section('content')
		<div class="page-header">
			<div class="pull-right">
				<button class="btn btn-primary" type="submit" form="form-banner"><i class="glyphicon glyphicon-floppy-disk"></i> Save</button>
			</div>
			<h1>Blog <small>- Create</small></h1>
		</div>
		{!! Form::open(['route' => 'blogs.store', 'files' => true,'method' => 'post', 'id' => 'form-banner']) !!}
			<div class="row">
				<div class="col-md-8">
					<div class="form-group {{ $errors->first('title', 'has-error') }}">
						{!! Form::label('title', 'Title:') !!}
						{!! Form::text('title', null, ['class' => 'form-control']) !!}
						{!! $errors->first('title', '<label class="control-label text-danger">:message</label>') !!}
					</div>
				
					<div class="form-group">
							
						{!! Form::label('body', 'Body:') !!}<br>
						
						{!! $errors->first('body', '<label class="control-label text-danger">:message</label>') !!}
						{!! Form::textarea('body', null, ['id' => 'editor']) !!}
					
					</div>
				</div>
				<div class='col-md-4'>
				<div class="form-group">
						<img class="img-thumbnail" style="width: 100%;" src="{{ asset('uploads/img-placeholder.png')}}">
					</div>
					
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