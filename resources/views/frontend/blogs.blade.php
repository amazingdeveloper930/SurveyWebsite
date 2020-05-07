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
			
			

	</style>
@section('content')


<section class="agent-single-welcome-section contact" id="welcome-section" style="background-image: url(images/single-page-welcome-bg.jpg);">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="agent-content-tbl">
						<div class="agent-content-tbl-c">
							<div class="agent-single-page-content">
								<h2>Blogs</h2>
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
			<?php foreach($blogs as $data) : ?>
				<div class="col-md-4">
				<a href='blog/<?php echo $data->slug;?>'>
					<div class='img-wrapper blog-grid'>
					<img style='width:100%' src='{{ asset("uploads/blogs/photos/thumb/").'/'.$data->image}}'/>
					<?php if(strlen(strip_tags($data->body)) >40) { $height=50;}?>
					<div class='blog-inner'>
					<h3><?php echo ucwords($data->title); ?></h3>
					<p><i><?php echo date('j F Y', strtotime($data->created_at));?></i></p>
					<div style='height:<?php echo $height;?>px'>
					<p style='word-wrap: break-word;'><?php echo ucwords(mb_strimwidth(strip_tags($data->body), 0, 70, "..."));?></p>
					</div>
				
					</div>
					</div>
				</a>
				</div>
			<?php endforeach ?>
				
			</div>
	</div>
</section>


@stop