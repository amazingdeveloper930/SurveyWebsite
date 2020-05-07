
@extends('backend.layouts.default')

@section('title')
	Admin Payment
@endsection

@section('content')
	<div class="page-header">
		<h1>
			Payments
			
			<!-- <div class="pull-right">
				<a href="{{ route('users.create') }}" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Sukurti naują vartotoją</a>
			</div> -->
		</h1>
		<div class="pull-right">

			<form method="POST" style='margin-top:20px' action="{{ route('admin.payments') }}" accept-charset="UTF-8" class="navbar-form navbar-right">
				<div class="input-group">
					{{ csrf_field() }}
					{{ Form::checkbox('query',null,isset($_REQUEST['query']), array('name'=>'query','style'=>'position:absolute;','onClick' => 'this.form.submit()')) }}
					<label style='margin-left:20px;' > Show successful payments</label>
					
				</div>
			</form>
		</div>
	</div>

	@if (session('created'))
		<div class="alert alert-success">
			Mokėjimas sėkmingai pridėtas.
		</div>
	@endif
	
	@if (count($entries) > 0)
		<table class="table">
			<thead>
				<th>#Order</th>
				<th>Transaction ID</th>
				<th>User</th>
				<th>Method</th>
				<th style='text-align:center'>Status</th>
				<th>Date</th>
				<th>Time</th>
				<th>Amount</th>
				<th>Failed Reason</th>
			</thead>

			@foreach ($entries as $entry)
				<tr>
					<td style="vertical-align: middle;">
						<span class="label label-info">{{ $entry->id }}</span>
					</td>
					<td style="vertical-align: middle;">
							@if($entry->trans_id !== '0')
								{{ $entry->trans_id}}
							@else
								<b style='color:red'>Not Generated Yet</b>
							@endif
					</td>
					<td style="vertical-align: middle;">
					@if(isset($entry->user->email))
						<strong>{{ $entry->user->email }}</strong><br>
						{{ $entry->user->username }}
						@else
							<strong>User Deleted</strong>
						@endif
					</td>

					<td style="vertical-align: middle;">
						{{ ucwords($entry->method) }}
					</td>

					<td style="vertical-align:middle;">
						@if ($entry->paid==1)
							<span class="label label-success">{{ $entry->status }}</span>
						@elseif($entry->paid==2)
							<span class="label label-danger">{{ $entry->status }}</span>
						@else
							<span class="label label-warning">{{ $entry->status }}</span>
						@endif
					</td>
					
					<td>{{ date('Y-m-d',strtotime($entry->created_at)) }}</td>
					
					<td>{{ date('H:i',strtotime($entry->created_at)) }}</td>
					
					<td>{{ $entry->ammount }}</td>

					<td>{{ $entry->declinereason }}</td>
					
				</tr>
			@endforeach
		</table>

		<script>
			$(".remove").click(function ()
			{
				var c = confirm('Ar tikrai norite ištrinti?');

				return c;
			});
		</script>

		<div class="text-center">
			{{ $entries->links() }}
		</div>
	@else
		<div class="alert alert-warning">
			<h4>Tuščia!</h4>

			<a href="{{ route('campaigns.create') }}">Pridėkite</a> dabar.
		</div>
	@endif
@stop