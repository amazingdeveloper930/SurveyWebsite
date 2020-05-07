@extends('backend.layouts.default')

@section('title')
	Admin Panel - Soc.shares
@endsection

@section('content')
<style type="text/css">
.badge-primary {
    background-color: #19c2e3;
}

.badge-warning {
    background-color: #fa9400;
}

.badge-danger {
    background-color: #ec3e3e;
}
</style>
	<div class="page-header">

		<h1>Social Shared Users</h1>
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
					<th>User</th>
					<th>E-mail</th>
					{{-- <th>Email Verified</th> --}}
					<th>Share Site</th>
					<th>Shared At</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				@foreach($users as $user)

					<tr>
						<td>{{ $user->user_id }}</td>
						<td>{{ $user->username }}</td>
						<td>{{ $user->email }}</td>
						<td>
							
							@if(($user->socialsite == "trustpilot"))
								<span class="badge badge-warning text-uppercase">Trustpilot</span>	
							@elseif(($user->socialsite == "sitejabber"))
								<span class="badge badge-danger text-uppercase">Sitejabber</span>
							@elseif(($user->socialsite == "facebook"))
								<span class="badge text-uppercase badge-info">Facebook</span>
							@elseif(($user->socialsite == "alternativeto"))
								<span class="badge text-uppercase badge-primary">Alternativeto</span>	
							@endif
						</td>
						<td>{{ $user->updated_at }}</td>
						<td>
							<div class="btn-group">
								
								@if ($user->paid_status == 1)
									
									<p>Free Credit Paid</p>
								@else
								<button data-toggle="modal" data-target="#creditmodal{{$user->id}}" class="btn btn-sm btn-default" ><i class="glyphicon glyphicon-credit-card"></i> Credit</button>


								<div class="modal fade" id="creditmodal{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="public" aria-hidden="true">
									<!-- start -->
									<div class="modal-dialog" role="document" style="text-align: left">
                                        <div class="modal-content" style="height: 200px;">
                                          <div class="modal-header">
                                            <h5 class="modal-title" style="color: black;" id="publicmodalTitle">Add Free Credits</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                          <div class="modal-body" style="color: black;">
                                             {{ Form::open( ['route' => ['socialshare.addcredit', $user->id], 'class' => 'profile-settings', 'files' => true] ) }}
                                            <p>
                                                Enter number of free credit that you want to add to this user.
                                            </p>
                                            <div class="form-inline">
                                                {{ Form::text('free_credit', 0, [ 'class' => 'form-control', 'placeholder' => 'Atsakymų kiekis']) }}
                                            </div>

                                             <div class="button-stacked pull-right" style="margin-top: -15px">
                                                 <button type="button" class="btn sq-buttons btn-secondary" data-dismiss="modal">Close</button>
                                            <!-- No credits remove submit button -->
                                            <button type="submit" name="btn_public" value="1" class="btn btn-primary">Assign Credit</button>
                                            
                                             </div>
                                            {{ Form::close() }}
                                          </div>
                                          <!-- <div class="modal-footer">

                                          </div> -->
                                        </div>
                                    </div>
									<!-- end -->
								</div>
								@endif
								

							</div>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
		{{ $users->links() }}
@stop