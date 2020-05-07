@extends('backend.layouts.default')

@section('title')
Admin - Dashboard
@endsection

@section('content')
<style type="text/css">
	.btn-group{
	display: -webkit-inline-box !important;

	}
</style>
<div class="page-header">
	<div class="pull-right">

		<form method="GET" style='margin-top:20px' action="{{ route('search.dashboard') }}" accept-charset="UTF-8" class="navbar-form navbar-right">
			<div class="input-group">
				{{ Form::checkbox('query',null,isset($_GET['query']), array('id'=>'query','style'=>'position:absolute;','onClick' => 'this.form.submit()')) }}
				<label style='margin-left:20px;' > Show Surveys with credit</label>
				
			</div>
		</form>
	</div>
</div>
<div class="row">
	<main class="col-md-12 ml-sm-auto col-lg-12 px-4" role="main">
		<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
			<div class="page-header">
				<h1 class="h2">
					Surveys
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
								Used Credit
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
							<th>
								Language
							</th>
							<th>
								Action
							</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($surveys as $survey)
						<tr>
							<td>
								<a href="{{route('users.edit', $survey->user_id)}}">{{ $survey->id }}</a>
							</td>
							<td>
								<a href="{{route('survey.profile',$survey->id)}}">{{ $survey->title }}</a>
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
								{{ $survey->used_credits }}
							</td>
							<td>
								{{ $survey->advertise_credits }}
							</td>
							<td>
								@if($no_of_answers)
								 {{ $no_of_answers[$survey->id] }}
								@endif
							</td>
							<td>
								{{ $survey->created_at }}
							</td>
							<td>
								{{Form::select('language', $language_list , $survey->language, ['class' => 'form-control language-select', 'placeholder' => '', 'data-id' =>  $survey -> id, 'id' => 'language' . $survey -> id]) }}
							</td>
							<td>
								<div class="btn-group">
									@if($survey->active == 1)
									<a class="btn btn-sm btn-danger" href="{{ route('destroy.dashboard', $survey->id) }}" onclick="return confirm('Do you want to Disable this survey?');">
										<i class="glyphicon glyphicon-ban-circle">
										</i>
										Disable Survey
									</a>
									@endif
									<a class="btn btn-sm btn-primary"style="margin-left:10px;"  href="{{ route('viewCampaign.dashboard', $survey->id) }}" onclick="return confirm('Are you sure you want to add advertising credit to this survey?');">
										<i class="glyphicon glyphicon-credit-card">
										</i>
										Add Credit
									</a>
									
								</div>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
				{{ $surveys->links() }}
			</div>
		</div>
	</main>
	<div style="width: 100%; height: 100%; background-color: white; position: absolute; top: -20px; opacity: 0.7; display: none" id = "loading-pan">
	
</div>
</div>

<script type="text/javascript">
	$(".language-select").on('change', function (e) {
    var language = this.value;
    var survey_id = $(this).attr('data-id');
    $('#loading-pan').show();
     $.ajax({
            type: "get",
            dataType: "json",
            url: 'setsurveylangauge/' + survey_id + "/" + language,

            data:{
            _token: "{{ csrf_token() }}",
            },
            success: function(response){
                if(response.status == 'success')
                {

                }
                else
                {
                	alert("Error: failed");
                }
                $('#loading-pan').hide();
            },
            error:  function(jqXhr, textStatus, errorThrown) {
            	$('#loading-pan').hide();
            	alert("Error : unknow reason");
            }
        })
});
</script>
@stop
