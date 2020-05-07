<!-- Agent Footer -->

 @if (Session::has('data'))

<div class="modal fade subscription" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        Thank you
      </div>
      <div class="modal-body">
     @if(Session::get('data')==1)
        <h4><i class="fa fa-check"></i> Message Submitted Successfully !</h4>
    @endif



      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
@endif

<footer style="padding: 50px 0px !important;" class="agent-footer-section section-padding" style="background-image: url({{ asset ('images/img/footer-bg.jpg') }});">
    <div class="container">
        <div class="row" style="margin-bottom: 20px;">
            <div class="col-md-3 col-sm-6 col-xs-12 agent-footer-column">
                <div class="agent-single-footer-wraper">

                    <p style="text-align:justify;">@lang('frontend/layouts.Survey_maker_tool')
                    </p>
                </div> <!-- .agent-single-footer-wraper END -->
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12 agent-footer-column">
                <div class="agent-single-footer-wraper">
                    <h4>@lang('frontend/layouts.Recent_post')</h4>
          @foreach($blogs as $data)
          <div class="col-md-6">
                    <div class="agent-single-post clear-both">
                        <div class="agent-single-post-date-and-time">
              <?php
$date = $data->created_at;

$day = date('j', strtotime($date));

$month = date('F', strtotime($date));

?>
                            <h5>{{ $day }}</h5>
                            <h6>{{ $month }}</h6>
                        </div>
                        <a href="{{ route('blog',$data->slug) }}"><p style='font-size: 14.5px;'>{{ ucwords(mb_strimwidth($data->title, 0, 40, "...")) }}</p></a>
                    </div> <!-- .agent-single-post END -->
                    </div> <!-- .agent-single-post END -->
                @endforeach
                </div> <!-- .agent-single-footer-wraper END -->
            </div>

            <!--  <div class="col-md-3 col-sm-6 col-xs-12 agent-footer-column">
                <div class="agent-single-footer-wraper">
                    <h4>Our Services</h4>
                    <ul class="custom2">
                        <li><a class="agent-simple-btn" href="#">Create your questionnaire</a></li>
                        <li><a class="agent-simple-btn" href="#">Reach The Right People</a></li>
                        <li><a class="agent-simple-btn" href="#">Get Meaningful Insights</a></li>
                    </ul>
                </div>
            </div>  -->

            <div class="col-md-3 col-sm-6 col-xs-12 agent-footer-column">
                <div class="agent-single-footer-wraper">
                    <h4>@lang('frontend/layouts.Quick_links')</h4>
                    <ul class="custom2">
                        <!--<li><a class="agent-simple-btn" href="{{ route('campaigns') }}">Apklausos</a></li>-->
                        <li><a class="agent-simple-btn" href="{{ url('/') }}">@lang('frontend/layouts.Home')</a></li>
                        <li><a class="agent-simple-btn" href="{{ url('faq') }}">@lang('frontend/layouts.FAQ')</a></li>
                        <li><a class="agent-simple-btn" href="{{ url('contact')}}">@lang('frontend/layouts.Contacts')</a></li>
            @if(!Auth::check())
                        <li><a class="agent-simple-btn" href="{{ route('login') }}">@lang('frontend/home.Login')</a></li>
                        <li><a class="agent-simple-btn" href="{{ route('login.registration') }}">@lang('frontend/home.Signup')</a></li>
            @endif
                        <li><a class="agent-simple-btn" href="{{ url('terms-conditions') }}">@lang('frontend/home.Terms_conditions')</a></li>
                        <li><a class="agent-simple-btn" href="{{ route('blogs') }}">@lang('frontend/home.Our_blog')</a></li>
                        <li><a class="agent-simple-btn" href="https://plagiarismchecker.eu/" _target = 'blank'>@lang('frontend/home.PlagiarismChecker_1')</a></li>
                        <li><a class="agent-simple-btn" href="https://plagiarismhunt.com/" _target = 'blank'>@lang('frontend/home.PlagiarismChecker_2')</a></li>
                    </ul>
                </div> <!-- .agent-single-footer-wraper END -->
            </div>
        </div>
        <p class="text-center agent-copyright-txt">Copyright © 2017 <a href="{{ route('home') }}" title="">Poll Animal</a> <span>@lang('frontend/layouts.All_reserved')</span></p>
    </div>
</footer>
<link type="text/css" rel="stylesheet" media='screen and (max-width: 991px)' href="{{ asset('css/frontend/component.css') }}"/>
<!-- js File Start -->
<script type="text/javascript" src="{{ asset('js/frontend/jquery-3.1.1.min.js') }}"></script>
<script async type="text/javascript" src="{{ asset('js/frontend/jquery.ajaxchimp.min.js') }}"></script>
<script async type="text/javascript" src="{{ asset('js/frontend/bootstrap.min.js') }}"></script>
<script async type="text/javascript" src="{{ asset('js/frontend/isotope.pkgd.min.js') }}"></script>
<script async type="text/javascript" src="{{ asset('js/frontend/jquery.magnific-popup.min.js') }}"></script>
<script async type="text/javascript" src="{{ asset('js/frontend/spectragram.min.js') }}"></script>
<script async type="text/javascript" src="{{ asset('js/frontend/jquery.easing.1.3.js') }}"></script>
<script  type="text/javascript" src="{{ asset('js/frontend/owl.carousel.min.js') }}"></script>
<script async type="text/javascript" src="{{ asset('js/frontend/jquery.themepunch.revolution.min.js') }}"></script>
<script async type="text/javascript" src="{{ asset('js/frontend/jquery.themepunch.tools.min.js') }}"></script>

<script async type="text/javascript" src="{{ asset('js/frontend/modernizr.custom.js') }}"></script>
<script async type="text/javascript" src="{{ asset('js/frontend/jquery.dlmenu.js') }}"></script>
<!-- <script async type="text/javascript" src="{{ asset('js/frontend/revulation/revolution.extension.actions.min.js') }}"></script>
<script async type="text/javascript" src="{{ asset('js/frontend/revulation/revolution.extension.kenburn.min.js') }}"></script>
<script async type="text/javascript" src="{{ asset('js/frontend/revulation/revolution.extension.layeranimation.min.js') }}"></script>
<script async type="text/javascript" src="{{ asset('js/frontend/revulation/revolution.extension.navigation.min.js') }}"></script>
<script async type="text/javascript" src="{{ asset('js/frontend/revulation/revolution.extension.parallax.min.js') }}"></script>
<script async type="text/javascript" src="{{ asset('js/frontend/revulation/revolution.extension.slideanims.min.js') }}"></script>
<script async type="text/javascript" src="{{ asset('js/frontend/revulation/revolution.extension.video.min.js') }}"></script>
<script async type="text/javascript" src="{{ asset('js/frontend/revulation/revolution.extension.migration.min.js') }}"></script> -->

<script async src="{{ asset('js/frontend/main.js') }}"></script>
<script defer src="{{ asset('js/frontend/parsley.min.js') }}"></script>
  <script >
            $(document).ready(function() {
        @if (Session::has('data'))
        $('#myModal').modal("show");
        @endif
        $('form').parsley();


              var owl = $('.owl-carousel');

              owl.owlCarousel({
                margin: 5,
    autoplay:true,
    autoplayTimeout:5000,
    autoplayHoverPause:true,
    slideBy:4,
  scrollPerPage : true,
                nav: true,
        navClass:['btn-prev','btn-next'],
        navText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>', '<i class="fa fa-angle-right" aria-hidden="true"></i>'],
                loop: true,
                responsive: {
                  0: {
                    items: 1
                  },
                  600: {
                    items: 3
                  },
                  1000: {
                    items: 4
                  }
                }
              })
            })
          </script>
