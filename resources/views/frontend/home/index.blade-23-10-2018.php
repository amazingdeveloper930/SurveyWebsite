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
									<li><a href="https://plus.google.com/u/0/108265710207237184889" title="" target="_blank"><i class="fa fa-google-plus"></i></a></li>
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
								<h1>Free <span>survey creator</span></h1>
								<p>Create surveys. <span>Receive answers </span></p>
								@if(!Auth::check())
								<a href="{{ route('login.registration')}}" class="agent-btn brown-btn">SIGN UP</a>
								<a href="{{ route('login')}}" class="agent-btn border-btn">LOG IN</a>
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
				<h2>How does this survey creator work ?</h2>
				<div class="agent-header-spearetor">
					<img src="{{ asset('images/img/spearretor-v-1.png') }}" alt="spearretor">
				</div>
			</div>
			<div class="row agent-service-overview-inner content-margin-top">
				<div class="col-md-4 col-sm-6">
					<div class="agent-single-right-side-servcie">
						<div class="agent-content-tbl-c">
							<i class="fa fa-comments-o"></i>
							<h2>Create your survey</h2>
							
							<p><br>Create your individual survey. Ask questions and form them in any way you want. Get answers you need.</p>
							<div class="agent-single-right-side-servcie-btn">
								<a href="{{ route('blog','your-first-fast-reliable-survey-creator-tool') }}" target='_blank' class="agent-btn brown-btn">MORE</a>
							</div>
						</div>
					</div> <!-- .agent-single-right-side-servcie END -->
				</div>
				<div class="col-md-4 col-sm-6">
					<div class="agent-single-right-side-servcie">
						<div class="agent-content-tbl-c">
							<i class="fa fa-users"></i>
							<h2>Get the answers in easiest way</h2>
							<p><br>Need respondents? You simply earn respondents by answering other surveys, or purchase our promotion services.</p>
							<div class="agent-single-right-side-servcie-btn">
								<a href="{{ route('blog','easily-reach-your-respondents') }}" target='_blank' class="agent-btn brown-btn">MORE</a>
							</div>
						</div>
					</div> <!-- .agent-single-right-side-servcie END -->
				</div>
				<div class="col-md-4 col-sm-6">
					<div class="agent-single-right-side-servcie">
						<div class="agent-content-tbl-c">
							<i class="fa fa-line-chart"></i>
							<h2>Operate your <br> results</h2>
							<p><br>Once you have answers, you can operate your data in needed way for free. Generate reports, graphs or charts.</p>
							<div class="agent-single-right-side-servcie-btn">
								<a href="{{ route('blog','detailed-reporting')}}" target='_blank' class="agent-btn brown-btn">MORE</a>
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
				<h2>Survey maker best for</h2>
				<div class="agent-header-spearetor">
					<img src="{{ asset ('images/img/spearretor-v-1.png') }}" alt="spearretor">
				</div>
			</div>
			<div class="row agent-service-overview-inner content-margin-top">
				<div class="col-md-4 col-sm-6">
					<div class="agent-single-right-side-servcie">
						<div class="agent-content-tbl-c">
							<i class="fa fa-users"></i>
							<h2> For students</h2>
							
							<p><br>Gather statistic information for your academic papers.</p>
							<div class="agent-single-right-side-servcie-btn">
								<a href="{{ route('login.registration')}}" class="agent-btn brown-btn">CREATE</a>
							</div>
						</div>
					</div> <!-- .agent-single-right-side-servcie END -->
				</div>
				<div class="col-md-4 col-sm-6">
					<div class="agent-single-right-side-servcie">
						<div class="agent-content-tbl-c">
							<i class="fa fa-graduation-cap"></i>
							<h2> For universities and schools</h2>
							<p><br>Gather student feedback for studies and lectures quality. Identify needs.</p>
							<div class="agent-single-right-side-servcie-btn">
								<a href="{{ route('login.registration')}}" class="agent-btn brown-btn">CREATE</a>
							</div>
						</div>
					</div> <!-- .agent-single-right-side-servcie END -->
				</div>
				<div class="col-md-4 col-sm-6">
					<div class="agent-single-right-side-servcie">
						<div class="agent-content-tbl-c">
							<i class="fa fa-calendar-check-o"></i>
							<h2>For business</h2>
							<p><br>Explore your customer satisfaction. Know better about needs of your target group. Evaluate employee performance and satisfaction.</p>
							<div class="agent-single-right-side-servcie-btn">
								<a href="{{ route('login.registration')}}" class="agent-btn brown-btn">CREATE</a>
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
						<h2>Users' surveys</h2>
						<div class="agent-header-spearetor">
							<img src="{{ asset('images/img/spearretor-v-1.png') }}" alt="spearretor">
						</div>
					</div>
				</center>
			<div class="row content-margin-top">		
				
		<div class="col-lg-12 col-md-12">

		<div id="" class='survey-carousel owl-carousel owl-theme'>
		<?php $x=1;?>
	
		 @foreach ($public_entries as $anketa)
	
		
			<div class='border-solid item'>
			@if(file_exists($anketa->photo))
			<img src='{{ $anketa->photo }}' class='img-responsive'/>
	
			@else
				<img src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMzIiIGhlaWdodD0iMzIiIHZpZXdCb3g9IjAgMCAzMiAzMiIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+PGRlZnMvPjxyZWN0IHdpZHRoPSIzMiIgaGVpZ2h0PSIzMiIgZmlsbD0iI0VFRUVFRSIvPjxnPjx0ZXh0IHg9IjE0LjMzNTkzNzUiIHk9IjE2IiBzdHlsZT0iZmlsbDojQUFBQUFBO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1mYW1pbHk6QXJpYWwsIEhlbHZldGljYSwgT3BlbiBTYW5zLCBzYW5zLXNlcmlmLCBtb25vc3BhY2U7Zm9udC1zaXplOjEycHg7ZG9taW5hbnQtYmFzZWxpbmU6Y2VudHJhbCI+wqA8L3RleHQ+PC9nPjwvc3ZnPg==" alt="title-img" class="survey-title-img " class='img-responsive'/>
				
			@endif
			
		 	<h4 style='height: 35px;'>{{ mb_strimwidth($anketa->title,0,50,"...") }}</h4>
			<p style='word-wrap: break-word;height:65px'>{{ mb_strimwidth($anketa->description, 0, 80, "...") }}</p>
		 	<p><a href="{{ route('campaigns.answer', $anketa->id) }}" title="" class="cusub"><i class="fa fa-book" aria-hidden="true"></i> Fill Survey</a></p>
			<p class='content'>
		
			</p>
			</div>
	<?php $x++;?>
		  @endforeach

		</div>
			
		</div>

	</div>
	</div>
	</section>

	<!-- Agent Why Choose US -->
	<section style="padding: 70px 0px;" class="agent-pricing-table-section-area text-center section-padding">		
		<div class="container">
			<div class="agent-section-heading">
				<h2>OUR PRICING</h2>
				<div class="agent-header-spearetor">
					<img src="{{ asset('images/img/spearretor-v-1.png') }}" alt="spearretor">
				</div>
			</div>		
			<div class="row content-margin-top pricing-wrapper">	

<table class="table pricing-table">
    <thead>
      <tr>
        <th class='empty'></th>
        <th class='basic' style="position: relative;"><span class='basic_a'>Basic</span></th>
        <th class='premium' style="position: relative;"><span class='basic_b'>Premium</span></th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Create unlimited number of surveys</td>
        <td class='basic'><i class='fa fa-check'></i></td>
        <td class='premium'><i class='fa fa-check'></i></td>
      </tr>
	  
	   <tr class='grey'>
        <td>Promote your surveys in your social networks</td>
        <td class='basic'><i class='fa fa-check'></i></td>
        <td class='premium'><i class='fa fa-check'></i></td>
      </tr>
	  
	   <tr>
        <td>Generate results of surveys</td>
        <td class='basic'><i class='fa fa-check'></i></td>
        <td class='premium'><i class='fa fa-check'></i></td>
      </tr>
	  
	   <tr class='grey'>
        <td>Receive unlimited number of responses</td>
        <td class='basic'><i class='fa fa-check'></i></td>
        <td class='premium'><i class='fa fa-check'></i></td>
      </tr>
	  
      <tr>
        <td>Receive responses by answering other users' surveys</td>
        <td class='basic'><i class='fa fa-check'></i></td>
        <td class='premium'><i class='fa fa-check'></i></td>
      </tr>
	  
     <tr class='grey'>
        <td>Promotion of your surveys for other users</td>
        <td class='basic color-black'><i class='fa fa-times'></i></td>
        <td class='premium'><i class='fa fa-check'></i></td>
      </tr>
	  
     <tr class=''>
        <td>Ability to filter respondents</td>
        <td class='basic color-black'><i class='fa fa-times'></i></td>
        <td class='premium'><i class='fa fa-check'></i></td>
      </tr>
	  
	  <tr class='grey'>
        <td style='tbl_price'>Price</td>
        <td class='basic basic_price'>FREE</td>
        <td class='premium'>$0.2/per answer</td>
      </tr>
	  
	   <tr class=''>
        <td class='empty'></td>
        <td class='create-btn-basic'><a href='{{ route("login.registration") }}'>Create</a></td>
        <td class='create-btn-premium'><a href='{{ route("login.registration") }}'>Create</a></td>
      </tr>
	  
	  
     
    </tbody>
  </table>
  
				
				 
			</div>
		</div>
	</section>

	

	<section style="padding: 0px 0px !important;" class="agent-testimonials-section section-padding text-center" id="testimonials-section">
		<div class="agent-section-heading">
			<h2>Need Help ?</h2>
			<div class="agent-header-spearetor">
				<img src="{{ asset('images/img/spearretor-v-1.png') }}" alt="spearretor">
			</div>
		</div>

		<div class="agent-contact-us-section section-padding" id="contact-section">
			<div class="container">			
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="agent-contact-us-right-side">
							<article>
								<p>Fill out form and we will be in touch with you soon.</p>
							</article>
							<div class="agent-contact-form">
								<form id="" method='POST' action="{{route('send-email')}}">
									{{ csrf_field()}}
									<input type="hidden" name="form_type" value="Help Inquiry">
									<input type="text" name="name" placeholder="Your Name" id="form-name-px" required>
									<input type="email" name="email" placeholder="Your Mail" id="form-email-px" required>
								    <textarea name="massage" cols="30" rows="10" placeholder="Your Message" id="form-massage-px" required></textarea>
									<input type="submit" value="send message" name="send massage">
								</form>
							</div>
						</div> <!-- .agent-contact-us-right-side END -->
					</div>
				</div>
			</div>
		</div> <!-- .agent-contact-us-section END -->
	</section>

	
@stop