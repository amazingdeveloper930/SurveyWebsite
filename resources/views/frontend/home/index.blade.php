@extends('frontend.layouts.default')

@section('title')Pradinis - @stop

@section('content')

<style>
.agent-welcome-section-v4 .agent-welcome-content-wraper {
    z-index: 1 !important;
}
.parsley-errors-list{
	text-align:left;
	color:red;
	
}

.agent-contact-form input[type="text"],
.agent-contact-form input[type="email"],
.agent-contact-form textarea{
	padding: 0 0 0 15px;
	margin-bottom: 15px;
	margin-top: 15px;
}

.basic_a::after {
	background-image: url('{{ asset('uploads/images/yellow_down_arrow.png')}}');
}

.basic_b::after {
	background-image: url('{{asset('uploads/images/black_down_arrow.png')}}');
}

	* {
	    box-sizing: border-box;
	}
	.columns {
	    float: left;
	    width: 33.3%;
	    padding: 8px;
	}
	.price {
	    list-style-type: none;
	    border: 1px solid #eee;
	    margin: 0;
	    padding: 0;
	    -webkit-transition: 0.3s;
	    transition: 0.3s;
	}
	.price:hover {
	    box-shadow: 0 8px 12px 0 rgba(0,0,0,0.2)
	}
	.price .header {
	    background-color: #333333;
	    color: white;
	    font-size: 25px;
	}
	.price li {
	    border-bottom: 1px solid #eee;
	    padding: 20px;
	    text-align: center;
	}
	.price .grey {
	    background-color: #eee;
	    font-size: 20px;
	}
	.button {
	    background-color: #e6af2a;
	    border: none;
	    color: white;
	    padding: 10px 25px;
	    text-align: center;
	    text-decoration: none;
	    font-size: 18px;
	}
	@media only screen and (max-width: 600px) {
	    .columns {
	        width: 100%;
	    }
	}
	.agent-service-overview .agent-single-right-side-servcie {
	    display: table;
	    height: 389px;
	    background-color: #d8d6d6;
	    padding: 20px;
	    width: 100%;
	    position: relative;
	}	
	.agent-section-heading h2{
	font-weight: 500;
	}	
	.agent-simple-text-section-area-v-2 {
    background-color: #c0baba;
	}	
	.agent-square-single-wraper span {
    width: 135px;
    height: 135px;
	}	
	.custom1{
	padding:10% 0px;
	}	
	.agent-what-we-do-section-area .agent-section-heading-v2 h2:before {
    content: "\e039";
	}

	.customcol
	{
		width: 50% !important;
	}

.containe1r {
  width: 100%; 
  height: 140px; 
  border: 1px solid green;
  overflow-x: scroll;
  overflow-y: hidden;
}

.inner {
  height: 100%;
  white-space:nowrap; 
}

.floatLeft {
  width: 200px;
  height: 92px; 
  margin:10px 10px 50px 10px; 
  display: inline-block;
  float:left;
}

img {
  height: 100%;
}


#container {
    width: 100%;
    background-color: #CCC;
    overflow: auto;
    height: 100px;
    white-space:nowrap;
}

.contents {
    width: 300px;
    height: 60px;
    display:inline-block;
}
#one {
    background-color:#ABC;
}
#two {
    background-color:#333;
}
#three {
    background-color:#888;
}
#four {
    background-color:#AAA;
}

.cusub {
	background-color: #16a085 !important;
	border-color: #16a085 !important;
	display: inline-block;
	padding: 10px 50px;
	margin-bottom: 0;
	font-size: 14px;
	font-weight: 400;
	line-height: 1.42857143;
	text-align: center;
	white-space: nowrap;
	vertical-align: middle;
	color: white;
	margin-left: -21px;
}
        .cusub:hover {
        	color: white!important;
        }


        #container {
  position: relative;
  height: 15em;
  width: 99%;
  margin: 2px auto;
  background: #fff;
  text-align: left;
  white-space: nowrap;
  overflow-x: auto;
  overflow-y: hidden;
  vertical-align:middle;
}
#container div {
  display: inline-block;
  width: 14em;
  height: 12em;
  margin: 0.5em;
  border: 1px solid #139c80;
  padding: 3px;
  white-space: normal;
  text-align: center;
}

.more_question_list {
	padding: 0px 0px 10px;
    border-color: #66666633;
    border-width: 0px 0px 1px 0px;
    border-style: solid;
    text-align: left;
}
.more_question_list a {
	color: black;
}
.more_question_list a:hover {
	color: #337ab7;
}



</style>


	<section class="agent-welcome-section-area agent-welcome-section-v4" style="background-image: url({{ asset ('images/img/main-banner.jpg') }});" id="welcome-section">
		<div class="container">
			<div class="row">
				<div class="col-md-2 col-sm-1 col-xs-2">
					<div class="agent-welcome-tbl">
						<div class="agent-welcome-tbl-c">
							<nav class="agent-social-links banner-social-links">
								<ul>
									<li><a href="https://twitter.com/Pollanimal" title="twitter.com" target="_blank"><i class="fa fa-twitter"></i></a></li>
									<li><a href="https://www.linkedin.com/company/pollanimal" title="" target="_blank"><i class="fa fa-linkedin"></i></a></li>
									<li><a href="https://www.facebook.com/Pollanimal-Survey-453745581712882/" title="facebook.com" target="_blank"><i class="fa fa-facebook"></i></a></li>
								</ul>
							</nav>
						</div>
					</div>
				</div>
				<div class="col-md-10 col-sm-11 col-xs-10">
					<div class="agent-welcome-tbl">
						<div class="agent-welcome-tbl-c">
							<div class="agent-welcome-content-wraper">
								<h1>@lang('frontend/home.Free_survey_creator')</h1>
								<p>@lang('frontend/home.Create_surveys')</p>
								@if(!Auth::check())
								<a href="{{ route('login.registration')}}" class="agent-btn brown-btn">@lang('frontend/home.Signup')</a>
								<a href="{{ route('login')}}" class="agent-btn border-btn">@lang('frontend/home.Login')</a>
								@endif
							</div> <!-- .agent-welcome-content-wraper END -->
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="banner-bottom-border"></div>
	</section> <!-- .agent-welcome-section-area END -->
		
	<!-- Agent Service Overview -->
	<section class="agent-service-overview text-center section-padding">
		<div class="container">
			<div class="agent-section-heading">
				<h2>@lang('frontend/home.How_survey_work')</h2>
				<div class="agent-header-spearetor">
					<img height="35" width="35" src="{{ asset('images/img/spearretor-v-1.png') }}" alt="spearretor">
				</div>
			</div>
			<div class="row agent-service-overview-inner content-margin-top">
				<div class="col-md-4 col-sm-6">
					<div class="agent-single-right-side-servcie">
						<div class="agent-content-tbl-c">
							<i class="fa fa-comments-o"></i>
							<h2>@lang('frontend/home.Home_faq_title1')</h2>
							
							<p><br>@lang('frontend/home.Home_faq_content1')</p>
							<div class="agent-single-right-side-servcie-btn">
								<a href="{{ route('blog','your-first-fast-reliable-survey-creator-tool') }}" target='_blank' class="agent-btn brown-btn" title="">@lang('frontend/home.More')</a>
							</div>
						</div>
					</div> <!-- .agent-single-right-side-servcie END -->
				</div>
				<div class="col-md-4 col-sm-6">
					<div class="agent-single-right-side-servcie">
						<div class="agent-content-tbl-c">
							<i class="fa fa-users"></i>
							<h2>@lang('frontend/home.Home_faq_title2')</h2>
							<p><br>@lang('frontend/home.Home_faq_content2')</p>
							<div class="agent-single-right-side-servcie-btn">
								<a href="{{ route('blog','easily-reach-your-respondents') }}" target='_blank' class="agent-btn brown-btn"  title="">@lang('frontend/home.More')</a>
							</div>
						</div>
					</div> <!-- .agent-single-right-side-servcie END -->
				</div>
				<div class="col-md-4 col-sm-6">
					<div class="agent-single-right-side-servcie">
						<div class="agent-content-tbl-c">
							<i class="fa fa-line-chart"></i>
							<h2>@lang('frontend/home.Home_faq_title3')</h2>
							<p><br>@lang('frontend/home.Home_faq_content3')</p>
							<div class="agent-single-right-side-servcie-btn">
								<a href="{{ route('blog','detailed-reporting')}}" target='_blank' class="agent-btn brown-btn"  title="">@lang('frontend/home.More')</a>
							</div>
						</div>
					</div> <!-- .agent-single-right-side-servcie END -->
				</div>
			</div>
		</div>
	</section>


	
	<!-- Agent Service Overview -->
	<section style="padding: 70px 0px;" class="agent-service-overview text-center section-padding">
		<div class="container">
			<div class="agent-section-heading">
				<h2>@lang('frontend/home.Survey_maker_best_for')</h2>
				<div class="agent-header-spearetor">
					<img height="35" width="35" src="{{ asset ('images/img/spearretor-v-1.png') }}" alt="spearretor">
				</div>
			</div>
			<div class="row agent-service-overview-inner content-margin-top">
				<div class="col-md-4 col-sm-6">
					<div class="agent-single-right-side-servcie">
						<div class="agent-content-tbl-c">
							<i class="fa fa-users"></i>
							<h2> @lang('frontend/home.For_students')</h2>
							
							<p><br>@lang('frontend/home.Home_faq_content4')</p>
							<div class="agent-single-right-side-servcie-btn">
								<a href="{{ route('login.registration')}}" class="agent-btn brown-btn">@lang('frontend/home.Create')</a>
							</div>
						</div>
					</div> <!-- .agent-single-right-side-servcie END -->
				</div>
				<div class="col-md-4 col-sm-6">
					<div class="agent-single-right-side-servcie">
						<div class="agent-content-tbl-c">
							<i class="fa fa-graduation-cap"></i>
							<h2> @lang('frontend/home.For_universities_schools')</h2>
							<p><br>@lang('frontend/home.Home_faq_content5')</p>
							<div class="agent-single-right-side-servcie-btn">
								<a href="{{ route('login.registration')}}" class="agent-btn brown-btn">@lang('frontend/home.Create')</a>
							</div>
						</div>
					</div> <!-- .agent-single-right-side-servcie END -->
				</div>
				<div class="col-md-4 col-sm-6">
					<div class="agent-single-right-side-servcie">
						<div class="agent-content-tbl-c">
							<i class="fa fa-calendar-check-o"></i>
							<h2>@lang('frontend/home.For_business')</h2>
							<p><br>@lang('frontend/home.Home_faq_content6')</p>
							<div class="agent-single-right-side-servcie-btn">
								<a href="{{ route('login.registration')}}" class="agent-btn brown-btn">@lang('frontend/home.Create')</a>
							</div>
						</div>
					</div> <!-- .agent-single-right-side-servcie END -->
				</div>
			</div>
			
		</div>
	</section>

	
	<section style="padding: 70px 0px;" class="agent-about-page-fun-fact section-padding">
			
		<div class="container">
			<center>	
					<div class="agent-section-heading">
						<h2>@lang('frontend/home.Users_survey')</h2>
						<div class="agent-header-spearetor">
							<img height="35" width="35" src="{{ asset('images/img/spearretor-v-1.png') }}" alt="spearretor">
						</div>
					</div>
				</center>
			<div class="row content-margin-top">		
				
		<div class="col-lg-12 col-md-12">

		<div id="" class='survey-carousel owl-carousel owl-theme'>
		<?php $x=1;
		?>
		 @if(isset($public_entries))
		 @foreach ($public_entries as $anketa)
	
		
			<div class='border-solid item'>
			@if(file_exists($anketa->photo))
			<img src='{{ $anketa->photo }}' class='img-responsive'/>
	
			@else
				<img src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMzIiIGhlaWdodD0iMzIiIHZpZXdCb3g9IjAgMCAzMiAzMiIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+PGRlZnMvPjxyZWN0IHdpZHRoPSIzMiIgaGVpZ2h0PSIzMiIgZmlsbD0iI0VFRUVFRSIvPjxnPjx0ZXh0IHg9IjE0LjMzNTkzNzUiIHk9IjE2IiBzdHlsZT0iZmlsbDojQUFBQUFBO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1mYW1pbHk6QXJpYWwsIEhlbHZldGljYSwgT3BlbiBTYW5zLCBzYW5zLXNlcmlmLCBtb25vc3BhY2U7Zm9udC1zaXplOjEycHg7ZG9taW5hbnQtYmFzZWxpbmU6Y2VudHJhbCI+wqA8L3RleHQ+PC9nPjwvc3ZnPg==" alt="title-img" class="survey-title-img " class='img-responsive'/>
				
			@endif
			
		 	<h4 style='height: 35px;'>{{ mb_strimwidth($anketa->title,0,50,"...") }}</h4>
			<p style='word-wrap: break-word;height:65px'>{{ mb_strimwidth($anketa->description, 0, 80, "...") }}</p>
		 	<p><a href="{{ route('campaigns.answer', $anketa->id) }}" title="" class="cusub"><i class="fa fa-book" aria-hidden="true"></i> @lang('frontend/home.Fill_survey')</a></p>
			<p class='content'>
		
			</p>
			</div>
	<?php $x++;?>
		  @endforeach
		  @endif

		</div>
			
		</div>

		<div class="col-lg-12 col-md-12" style="text-align:center; margin-top:50px;">
			<a href="{{ url('surveys')}}" class="btn btn-primary mb-10 btn-cns">@lang('frontend/home.All_surveys')</a>
		</div>

	</div>
	</div>
	</section>

	<!-- More Questions -->
	<section style="padding: 70px 0px;" class="agent-service-overview text-center section-padding">
		<div class="container">
			<div class="agent-section-heading">
				<h2>@lang('frontend/home.More_questions')</h2>
				<div class="agent-header-spearetor">
					<img height="35" width="35" src="{{ asset('images/img/spearretor-v-1.png') }}" alt="spearretor">
				</div>
			</div>
			<div class="row agent-service-overview-inner content-margin-top" style="padding: 0px 15%">
				<div class="more_question_list">
					<a data-toggle="collapse" href="#more_question_1"><h3>@lang('frontend/home.Home_faq_more_1')</h3></a>
					<div id="more_question_1" class="collapse">
						<p lang="en-US" align="justify" style="margin-bottom: 0.28cm; line-height: 150%">
							<font face="Arial">
								<font style="font-size: 12pt;">
										@lang('frontend/home.Home_faq_more_content_1_1')
									<br>
									<br>
									<b>@lang('frontend/home.Home_faq_more_content_1_2')</b>
									<br>
									<br>
									@lang('frontend/home.Home_faq_more_content_1_3')
									<br>
									@lang('frontend/home.Home_faq_more_content_1_4')
									<br>
									@lang('frontend/home.Home_faq_more_content_1_5')
								</font>
							</font>
						</p>
					</div>
				</div>
				<div class="more_question_list">
					<a data-toggle="collapse" href="#more_question_2"><h3>@lang('frontend/home.Home_faq_more_2')</h3></a>
					<div id="more_question_2" class="collapse">
						<p lang="en-US" align="justify" style="margin-bottom: 0.28cm; line-height: 150%">
							<font face="Arial">
								<font style="font-size: 12pt;">
										@lang('frontend/home.Home_faq_more_content_2_1')
									<br>
									<br>
								@lang('frontend/home.Home_faq_more_content_2_2')
									<br>
									Example: https://pollanimal.com/survey/185
									<br/>
							<br/>
										@lang('frontend/home.Home_faq_more_content_2_3')
										<br><br>
										@lang('frontend/home.Home_faq_more_content_2_4')
							<br><br>
										@lang('frontend/home.Home_faq_more_content_2_5')
										<br><br>
										@lang('frontend/home.Home_faq_more_content_2_6')
										<br><br>
							@lang('frontend/home.Home_faq_more_content_2_7')<br><br>
							@lang('frontend/home.Home_faq_more_content_2_8')<br><br>
							@lang('frontend/home.Home_faq_more_content_2_9')<br><br>
							@lang('frontend/home.Home_faq_more_content_2_10')
								</font>
							</font>
						</p>
					</div>
				</div>
				<div class="more_question_list">
					<a data-toggle="collapse" href="#more_question_3"><h3>@lang('frontend/home.Home_faq_more_3')</h3></a>
					<div id="more_question_3" class="collapse">
						<p lang="en-US" align="justify" style="margin-bottom: 0.28cm; line-height: 150%">
							<font face="Arial">
								<font style="font-size: 12pt;">
							@lang('frontend/home.Home_faq_more_content_3_1')
							<br><br>
							<b>@lang('frontend/home.Home_faq_more_content_3_2')</b><br><br>
							@lang('frontend/home.Home_faq_more_content_3_3')<br><br>
							<b>@lang('frontend/home.Home_faq_more_content_3_4')</b><br><br>
							@lang('frontend/home.Home_faq_more_content_3_5')<br><br>
							<b>@lang('frontend/home.Home_faq_more_content_3_6')</b><br><br>
							@lang('frontend/home.Home_faq_more_content_3_7')
							</font>
							</font>
						</p>
					</div>
				</div>
				<div class="more_question_list">
					<a data-toggle="collapse" href="#more_question_4"><h3>@lang('frontend/home.Home_faq_more_4')</h3></a>
					<div id="more_question_4" class="collapse">
						<p lang="en-US" align="justify" style="margin-bottom: 0.28cm; line-height: 150%">
								<font face="Arial">
									<font style="font-size: 12pt;">
								@lang('frontend/home.Home_faq_more_content_4_1')
								<br/><br/>
								@lang('frontend/home.Home_faq_more_content_4_2')<br/><br/>
								@lang('frontend/home.Home_faq_more_content_4_3')<br/><br/>
								@lang('frontend/home.Home_faq_more_content_4_4')<br/><br/>
								</font>
							</font>
						</p>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Agent Why Choose US -->
	<section style="padding: 70px 0px;" class="agent-pricing-table-section-area text-center section-padding">		
		<div class="container">
			<div class="agent-section-heading">
				<h2>@lang('frontend/home.Our_pricing')</h2>
				<div class="agent-header-spearetor">
					<img height="35" width="35" src="{{ asset('images/img/spearretor-v-1.png') }}" alt="spearretor">
				</div>
			</div>		
			<div class="row content-margin-top pricing-wrapper">	

<table class="table pricing-table">
    <thead>
      <tr>
        <th class='empty'></th>
        <th class='basic' style="position: relative;"><span class='basic_a'>@lang('frontend/home.Basic')</span></th>
        <th class='premium' style="position: relative;"><span class='basic_b'>@lang('frontend/home.Premium')</span></th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>@lang('frontend/home.Create_unlimited_surveys')</td>
        <td class='basic'><i class='fa fa-check'></i></td>
        <td class='premium'><i class='fa fa-check'></i></td>
      </tr>
	  
	   <tr class='grey'>
        <td>@lang('frontend/home.Promote_your_surveys')</td>
        <td class='basic'><i class='fa fa-check'></i></td>
        <td class='premium'><i class='fa fa-check'></i></td>
      </tr>
	  
	   <tr>
        <td>@lang('frontend/home.Generate_results_surveys')</td>
        <td class='basic'><i class='fa fa-check'></i></td>
        <td class='premium'><i class='fa fa-check'></i></td>
      </tr>
	  
	   <tr class='grey'>
        <td>@lang('frontend/home.Generate_results_surveys')</td>
        <td class='basic'><i class='fa fa-check'></i></td>
        <td class='premium'><i class='fa fa-check'></i></td>
      </tr>
	  
      <tr>
        <td>@lang('frontend/home.Receive_responses')</td>
        <td class='basic'><i class='fa fa-check'></i></td>
        <td class='premium'><i class='fa fa-check'></i></td>
      </tr>
	  
     <tr class='grey'>
        <td>@lang('frontend/home.Promotion_surveys')</td>
        <td class='basic color-black'><i class='fa fa-times'></i></td>
        <td class='premium'><i class='fa fa-check'></i></td>
      </tr>
	  
     <tr class=''>
        <td>@lang('frontend/home.Ability_filter_respondents')</td>
        <td class='basic color-black'><i class='fa fa-times'></i></td>
        <td class='premium'><i class='fa fa-check'></i></td>
      </tr>
	  
	  <tr class='grey'>
        <td style='tbl_price'>@lang('frontend/home.Price')</td>
        <td class='basic basic_price'>@lang('frontend/home.Free')</td>
        <td class='premium'>@lang('frontend/home.Price_per_answer')</td>
      </tr>
	  
	   <tr class=''>
        <td class='empty'></td>
        <td class='create-btn-basic'><a href='{{ route("login.registration") }}'>@lang('frontend/home.Create')</a></td>
        <td class='create-btn-premium'><a href='{{ route("login.registration") }}'>@lang('frontend/home.Create')</a></td>
      </tr>
	  
	  
     
    </tbody>
  </table>
  
				
				 
			</div>
		</div>
	</section>

	
	

	<section style="padding: 0px 0px !important;" class="agent-testimonials-section section-padding text-center" id="testimonials-section">
		<div class="agent-section-heading">
			<h2>@lang('frontend/home.Need_help')</h2>
			<div class="agent-header-spearetor">
				<img height="35" width="35" src="{{ asset('images/img/spearretor-v-1.png') }}" alt="spearretor">
			</div>
		</div>

		<div class="agent-contact-us-section section-padding" id="contact-section">
			<div class="container">			
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="agent-contact-us-right-side">
							<article>
								<p>@lang('frontend/home.Fill_form')</p>
							</article>
							<div class="agent-contact-form">
								<form id="" method='POST' action="{{route('send-email')}}">
									{{ csrf_field()}}
									<input type="hidden" name="form_type" value="Help Inquiry">
									<input type="text" name="name" placeholder="@lang('frontend/home.Your_name')" id="form-name-px" required>
									<input type="email" name="email" placeholder="@lang('frontend/home.Your_mail')" id="form-email-px" required>
								    <textarea name="massage" cols="30" rows="10" placeholder="@lang('frontend/home.Your_message')" id="form-massage-px" required></textarea>
									<input type="submit" value="@lang('frontend/home.Send_message')" name="send massage">
								</form>
							</div>
						</div> <!-- .agent-contact-us-right-side END -->
					</div>
				</div>
			</div>
		</div> <!-- .agent-contact-us-section END -->
	</section>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script type="text/javascript">
            <?php echo file_get_contents('https://www.googletagmanager.com/gtag/js?id=UA-107521779-2'); ?>
        </script>
<script>
window.dataLayer = window.dataLayer || [];
function gtag(){dataLayer.push(arguments);}
gtag('js', new Date());

gtag('config', 'UA-107521779-2');
</script>
	
@stop