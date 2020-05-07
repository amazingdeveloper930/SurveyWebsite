@extends('frontend.layouts.defaultprofile')

@section('title')Mano anketos - @stop


@section('content')
<section id="content">
    <div class="page page-dashboard">
        <div class="row" style="clear: both;"></div>
        @if (session('created'))
        <div class="row">
            <div class="col-md-12 alert login-success">
                Survey added successfully.
            </div>                        
        </div>
        @endif

        @if (session('copied'))
        <div class="row">
            <div class="col-md-12 alert login-success">
                Anketos kopija sėkmingai sukurta.
            </div>                        
        </div>
        @endif

        @if (session('deleted'))
        <div class="row">
            <div class="col-md-12 alert login-success">
                Anketa sėkmingai ištrinta.
            </div>                        
        </div>
        @endif

		<div class="row">
            <!-- col -->
            <div class="card-container col-lg-4 col-sm-6 col-sm-12">
                <div class="card">
                    <div class="mycus bg-greensea">
                        <!-- row -->
                        <div class="row">
                            <!-- col -->
                            <div class="col-xs-4">
                                <i class="fa fa-users fa-4x"></i>
                            </div>
                            <!-- /col -->
                            <!-- col -->
                            <div class="col-xs-8">
                                <p class="text-elg text-strong mb-0">3 659</p>
                                <span>Total Surveys</span>
                            </div>
                            <!-- /col -->
                        </div>
                        <!-- /row -->
                    </div>                                
                </div>
            </div>
            <!-- /col -->
            <!-- col -->
            <div class="card-container col-lg-4 col-sm-6 col-sm-12">
                <div class="card">
                    <div class="mycus bg-lightred">
                        <!-- row -->
                        <div class="row">
                            <!-- col -->
                            <div class="col-xs-4">
                                <i class="fa fa-shopping-cart fa-4x"></i>
                            </div>
                            <!-- /col -->
                            <!-- col -->
                            <div class="col-xs-8">
                                <p class="text-elg text-strong mb-0">19 364</p>
                                <span>Surveys Completed</span>
                            </div>
                            <!-- /col -->
                        </div>
                        <!-- /row -->
                    </div>                               
                </div>
            </div>
            <!-- /col -->
            <!-- col -->
            
            <!-- /col -->
            <!-- col -->
            <div class="card-container col-lg-4 col-sm-6 col-sm-12">
                <div class="card">
                    <div class="mycus bg-slategray">
                        <!-- row -->
                        <div class="row">
                            <!-- col -->
                            <div class="col-xs-4">
                                <i class="fa fa-eye fa-4x"></i>
                            </div>
                            <!-- /col -->
                            <!-- col -->
                            <div class="col-xs-8">
                                <p class="text-elg text-strong mb-0">29 651</p>
                                <span>Active Surveys</span>
                            </div>
                            <!-- /col -->
                        </div>
                        <!-- /row -->
                    </div>                               
                </div>
            </div>
            <!-- /col -->
        </div>  
        <!-- OK 4 -->                 
        <div class="row">                        
            <div class="col-md-8">                         
                <section class="tile">
                    <div class="tile-header dvd dvd-btm">
                        <h1 class="custom-font">My Surveys</h1>
                    </div>                               
                    <div class="tile-body table-custom">
                        <div class="table-responsive">
                        	@if (count($entries) > 0)
                            <table class="table table-custom" id="project-progress">
                                <thead>
                                    <tr>
                                        <th>Survey title</th>
                                        <th>Date</th>
                                        <th>Actions</th>                    
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($entries as $entry)
                                <tr>
                                    <td>{{ $entry->title }} </td>
                                    <td>{{ $entry->created_at }}</td>
                                    <td><a href="{{ route('campaigns.edit', $entry->id) }}" class="btn btn-default btn-border btn-rounded-20 btn-ef btn-ef-4 btn-ef-4a mb-10"><i class="fa fa-asterisk"></i> Survey management</a>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <a href="{{ route('campaigns.results', $entry->id) }}" class="btn btn-success btn-border btn-rounded-20 btn-ef btn-ef-4 btn-ef-4c mb-10"><i class="fa fa-eye"></i> Results</a>
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <a href="{{ route('campaigns.destroy', $entry->id) }}" class="btn btn-warning btn-border btn-rounded-20 btn-ef btn-ef-4 btn-ef-4d mb-10"><i class="glyphicon glyphicon-trash"></i> Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                            @else
							<div class="alert alert-warning">
								<h4>Empty!</h4>
								<a href="{{ route('campaigns.create') }}">Add</a> now.

							</div>

                            @endif
                            <div class="btn-block-create-new-survey"><a href="{{ route('campaigns.create') }}" class="btn btn-primary mb-10 btn-cns"><i class="fa fa-plus">&nbsp;</i>Create new survey</a></div>

                        </div>
                       

                    </div>                    
                </section>               
            </div>            
            
              <div class="col-md-4">

                    <div class="well col-sm-12" style="overflow-y: auto; height: 660px;min-width: 120px!important;">
                        <h4 style="color: grey; text-align: center;">Answer these surveys - get responses to your questions</h4>
                        

                        @php
                    $a = 0
                @endphp

                @foreach ($anketos as $anketa)
                <div class="col-md-12">
                    <section class="tile tile-simple bg-dutch">
                        <div class="tile-header">
                            <span class="title-img"><img src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMzIiIGhlaWdodD0iMzIiIHZpZXdCb3g9IjAgMCAzMiAzMiIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+PGRlZnMvPjxyZWN0IHdpZHRoPSIzMiIgaGVpZ2h0PSIzMiIgZmlsbD0iI0VFRUVFRSIvPjxnPjx0ZXh0IHg9IjE0LjMzNTkzNzUiIHk9IjE2IiBzdHlsZT0iZmlsbDojQUFBQUFBO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1mYW1pbHk6QXJpYWwsIEhlbHZldGljYSwgT3BlbiBTYW5zLCBzYW5zLXNlcmlmLCBtb25vc3BhY2U7Zm9udC1zaXplOjEycHg7ZG9taW5hbnQtYmFzZWxpbmU6Y2VudHJhbCI+wqA8L3RleHQ+PC9nPjwvc3ZnPg==" alt="title-img" class="survey-title-img "/></span>&nbsp;&nbsp;&nbsp;
                            <h1 class="custom-font" style="color: #337ab7;"><strong>{{ $anketa->title }}</strong></h1>                       
                        </div>                   
                        <div class="tile-body">
                            <p>{{ $anketa->title }}</p>
                        </div>
                        @if( $a > 0 )
                            <a style="color: white;" type="button" class="btn btn-info extc" href="{{ route('campaigns.answer', $anketa->id) }}"><i class="fa fa-book"> </i>  Fill out survey</a>
                            
                        @else
                            <a style="color: white;" type="button" class="btn btn-info extc" href="{{ route('campaigns.answer', $anketa->id) }}"><i class="fa fa-book"> </i>  Fill out survey</a>
                            
                        @endif
                        
                        @php 
                            $a++
                        @endphp
                        
                        
                        <div class="tile-footer" >
                                <p><a href="{{ route('campaigns.answers', $anketa->id) }}" class="btn-rounded-10 btn btn-default  btn-ef-3 btn-ef-3a mb-10" style="color: #16a085  !important;"><i class="fa fa-bars"></i> {{ count($anketa->results) }}</a>
                                <a href="#" class="btn btn-default btn-rounded-10  btn-ef-3 btn-ef-3a mb-10" style="color: #16a085  !important;"><i class="fa fa-user"></i> {{ $anketa->user->username }}</a>
                                <a href="#" class="btn-rounded-10 btn btn-default btn-ef-3 btn-ef-3a mb-10" style="color: #16a085  !important;"><i class="glyphicon glyphicon-calendar"></i> {{ $anketa->created_at }}</a></p>
                        </div>
                    </section>
                </div>
                @endforeach
            </div>
                </div>           
        </div><!-- OK 4 -->      

        <section class="tile">
			<div class="tile-header dvd dvd-btm advertise">
                <h1 class="custom-font">Advertisement</h1>
            </div>
        </section>
    </div>
</section>
@stop