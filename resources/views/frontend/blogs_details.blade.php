@extends('frontend.layouts.default')

@section('title')Pradinis - @stop
<style>
.agent-single-page-content h2::before {content: "";}

.blog-grid h3 {
color:#16a085;
text-align: left;
font-size: 14px;
margin-top:10px;

}


.section-blog {
padding: 35px;
background-color: rgba(1, 1, 1, 0.03);
}

.blog-details::before {
background-color: rgba(31, 31, 10, 0.52) !important;

}
.blog-details{background-position: center center !important;}

.blog-inner{padding:10px;}

.blog-grid p {

text-align: left;
color:#fff;
font-size: 13px;
color:rgba(1, 1, 1, 0.62);
margin-top:10px;
}

.blog-grid{
margin-bottom: 10px;
border: 1px solid #eee;
background-color: #fff;

}

.blog-grid:hover{
box-shadow: 10px 10px 8px #8888884d;
}

footer .custom2{
margin:0;
padding:0;
list-style:none;
}
p{
line-height:20px !important
}
</style>
@section('content')

<?php $data = $blogs;?>
<section class="agent-single-welcome-section blog-details" id="welcome-section" style="background-image: url({{ asset('uploads/blogs/photos/thumb/').'/'.$data->image}});">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="agent-content-tbl">
						<div class="agent-content-tbl-c">
							<div class="agent-single-page-content">
								<h2 style="font-size: 40px;"><?php echo ucwords($data->title); ?></h2><br>
								<h2 style="font-size: 10px;"><?php echo date('j F Y', strtotime($data->created_at));?></h2>
								
							</div> <!-- .agent-single-page-content END -->
						</div>
					</div>
				</div>
			</div>
			 <!-- .agent-single-page-breadcumb END -->
		</div>
</section>
<section class='section-blog'>
	<div class="container">
			<div class="row">

				<div class="col-md-12">
					<div class='img-wrapper blog-grid'>
					<div class='blog-inner'>
					<h2 style='color:#16a085'><?php echo ucwords($data->title); ?></h2>
					<p><?php echo $data->body;?></p>
				
					</div>
					</div>
			
				</div>
				
			</div>
	</div>
</section>



@stop