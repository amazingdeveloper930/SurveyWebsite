
<div id="wrap" class="animsition">
    <section id="header">
        <header class="clearfix">                   
            <div class="branding" style='margin-top:10px;margin-bottom:10px;'>
               <a href="{{ route('home') }}" title=""><img src="{{ asset('images/logo.png') }}" alt="logo image" width="80%">
                <a role="button" tabindex="0" class="offcanvas-toggle visible-xs-inline"><i class="fa fa-bars"></i></a>
            </div>
             <ul class="nav-left pull-left list-unstyled list-inline">
                <li class="sidebar-collapse divided-right">
                    <a href="#" class="collapse-sidebar">
                        <i class="fa fa-outdent"></i>
                    </a>
                </li>
            </ul>      
			@if(Auth::check())
            <ul class="nav-right pull-right list-inline">
                    <li class="dropdown nav-profile">
                    <a href class="dropdown-toggle" data-toggle="dropdown">
					@if(auth()->user()->photo=='')
						<img src="{{ asset('uploads/default_profile.png') }} " alt="" class="img-circle size-30x30">   
					@else
					<img src="{{ auth()->user()->photo }} " alt="" class="img-circle size-30x30"> 
					@endif
                        <span>{{ auth()->user()->username }}<i class="fa fa-angle-down"></i></span>
                    </a>
                    <ul class="dropdown-menu animated littleFadeInRight" role="menu">
                        <li>
                            <a role="button" tabindex="0" href="{{ route('account.index') }}">
                                <span class="badge bg-greensea pull-right">86%</span>
                                <i class="fa fa-user"></i>@lang('frontend/layouts.Profile')
                            </a>
                        </li>                                
                        <li>
                            <a role="button" tabindex="0" href="{{ route('login.logout') }}">
                                <i class="fa fa-sign-out"></i>@lang('frontend/layouts.Logout')
                            </a>
                        </li>
                    </ul>
                </li>                       
            </ul>
			@endif
        </header>
    </section>           
    <div id="controls">
        <aside id="sidebar" style='top:65px'>
            <div id="sidebar-wrap">
                <div class="panel-group slim-scroll" role="tablist">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" href="#sidebarNav">
                                    @lang('frontend/layouts.Navigation') <i class="fa fa-angle-up"></i>
                                </a>
                            </h4>
                        </div>
                        <div id="sidebarNav" class="panel-collapse collapse in" role="tabpanel">
                            <div class="panel-body">
                                <ul id="navigation">
                                    <li class="{{ in_array(Route::getCurrentRoute()->getName(), ['campaigns.my']) ? "active" : NULL }}"><a class="cusmenu" href="{{ route('campaigns.my') }}"><i class="fa fa-dashboard cusmenuicon"> </i><span> @lang('frontend/layouts.Dashboard')</span></a></li>
                                    <li class="{{ in_array(Route::getCurrentRoute()->getName(), ['campaigns.create']) ? "active" : NULL }}"><a class="cusmenu" href="{{ route('campaigns.create') }}"><i class="fa fa-user cusmenuicon"></i> <span>@lang('frontend/layouts.Create_survey')</span></a></li>
                                    <li class="{{ in_array(Route::getCurrentRoute()->getName(), ['credits']) ? "active" : NULL }}"><a class="cusmenu" href="{{ route('credits') }}"><i class="fa fa-money cusmenuicon"></i> <span>@lang('frontend/layouts.Credit')</span></a></li>
                                    <li class="{{ in_array(Route::getCurrentRoute()->getName(), ['account.index']) ? "active" : NULL }}"><a class="cusmenu" href="{{ route('account.index') }}"><i class="fa fa-pencil cusmenuicon"></i> <span>@lang('frontend/layouts.Account_settings')</span></a></li>
                                    <li><a class="cusmenu" href="{{ route('login.logout') }}"><i class="fa fa-sign-out cusmenuicon"></i> <span>@lang('frontend/layouts.Logout')</span></a></li>
                                </ul>
                                <div id="poll-panel">
                                    <div id = "poll-header" class="page-header">
                                        <h3>                                 @lang('frontend/layouts.Polls')      
                                        </h3>
                                    </div>
                                    <div id="poll-content">
                                        <div id = "question1" class="question">
                                            <label class = "poll-question"><strong>@lang('frontend/layouts.Select_gender')</strong></label>
                                            <div class = "poll-answer">
                                                <div>
                                                    <label class="radio checkbox-custom-alt checkbox-custom-sm inline-block">
                                                        <input  type="radio" name="gender" value="Male"><i></i> <a>@lang('frontend/layouts.Male')</a>
                                                    </label>
                                                    <label class="radio checkbox-custom-alt checkbox-custom-sm inline-block">
                                                        <input  type="radio" name="gender" value="Female"><i></i> <a>@lang('frontend/layouts.Female')</a>
                                                    </label>
                                                </div>
                                               
                                            </div>
                                        </div>
                                        <?php
                                        $Occupation_txt = app('translator')->getFromJson('frontend/common.Select_occupation');
                                        $Language_txt = app('translator')->getFromJson('frontend/common.Select_language');
                                        $Country_txt = app('translator')->getFromJson('frontend/common.Select_country');
                                        ?>
                                        <div id = "question2" class="question">
                                            <label class = "poll-question"><strong>@lang('frontend/layouts.What_occupation')</strong></label>
                                            <div class = "poll-answer">
                                                <label class="inline-block hint-text col-sm-11">
                                                {{Form::select('occupation', $occupation_list , null, ['class' => 'form-control ', 'placeholder' => $Occupation_txt]) }}
                                                </label>
                                            </div>
                                        </div>
                                        <div  id = "question3" class="question">
                                            <label class = "poll-question"><strong>@lang('frontend/layouts.What_language')</strong></label>
                                            <div class = "poll-answer">
                                                <label class="inline-block hint-text  col-sm-11">
                                                {{Form::select('language[]', $language_list , null, ['class' => 'form-control ', 'multiple' => 'multiple']) }}
                                                </label>
                                            </div>
                                        </div>
                                        <div id = "question4" class="question">
                                            <label class = "poll-question"><strong>@lang('frontend/layouts.What_country')</strong></label>
                                            <div  class = "poll-answer">
                                                <label class="inline-block hint-text col-sm-11">
                                                {{Form::select('country', $country_list , null, ['class' => 'form-control ', 'placeholder' => $Country_txt]) }}
                                                </label>
                                            </div>
                                        </div>
                                        <div id = "question5" class="form-group question" style="display: inline-block;width: 100%;">
                                            <label class = "poll-question"><strong>@lang('frontend/layouts.What_birthday_year')</strong></label>
                                            <div  class = "poll-answer">
                                                <label class="inline-block hint-text col-sm-11">

                                                <?php
                                                    $current_year = date('Y');
                                                ?>
                                                {{ 
                                                    Form::select('year', array('' => 'year') + range($current_year,$current_year - 80) , null, ['class' => 'form-control ']) 
                                                }}
                                                </label>
    
                                            </div>
                                        </div>
                                    </div>
                                    <div id="poll-footer">
                                        <a id = "skip-btn" href="javascript:void(0)">@lang('frontend/layouts.Skip')
                                        </a>
                                        <a id = "submit-anw-btn" class="btn btn-success" href="javascript:void(0)">@lang('frontend/layouts.Submit_answer')
                                        </a>
                                        <a id = "submit-anw-loading-btn" class="btn btn-success buttonload" style="display: none">
                                          <i class="fa fa-spinner fa-spin"></i>@lang('frontend/layouts.Submit_answer')
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>                            
                </div>
            </div>                
        </aside>               
    </div> 
<script src="{{ asset('js/backend/ajax.googleapis.min.js') }}"></script>


<script type="text/javascript">
    var current_question = -1;
    function select_poll(question_index)
    {
        if(question_index == -1)
        {
            $("#poll-panel").hide();
            return;
        }

        if(question_index == 1)
        {
            $(".question").hide();
            $("#question1").show();
        }
        if(question_index == 2)
        {
            $(".question").hide();
            $("#question2").show();
        }
        if(question_index == 3)
        {
            $(".question").hide();
            $("#question3").show();
        }
        if(question_index == 4)
        {
            $(".question").hide();
            $("#question4").show();
        }
        if(question_index == 5)
        {
            $(".question").hide();
            $("#question5").show();
        }

    }
    function get_available_poll()
    {

        $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
          }
        });

       $.ajax({
          url: "{{ route('account.availablepoll') }}",
          method: 'get',
          success: function(result){
            current_question = result.index;
            select_poll(current_question);            
          }});
    }

    get_available_poll();

    $('#skip-btn').on("click",function(e){
       e.preventDefault();
       var data = {};
       data['current_poll'] = current_question;
       $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
          }
        });
       $("#submit-anw-btn").hide();
       $("#submit-anw-loading-btn").show();
       $.ajax({
          url: "{{ route('account.availablepoll') }}",
          method: 'get',
          data: data,
          success: function(result){
            current_question = result.index;
            select_poll(current_question);   
            $("#submit-anw-btn").show();
            $("#submit-anw-loading-btn").hide();         
          }});
    });

    $('#submit-anw-btn').on("click",function(e){
       e.preventDefault();
       var data = {};
       if(current_question == 1)
       {
          data['gender'] = $("input[name='gender']:checked"). val();
          if(data['gender'] == null)
          {
            alert("Please select your gender.");
            return;
          }
          
       }
       if(current_question == 2)
       {
          data['occupation'] = $("select[name='occupation'] option:selected"). val();
          if(data['occupation'] == null || data['occupation'] == '')
          {
            alert("Please select your occupation.");
            return;
          }
       }

       if(current_question == 3)
       {
        debugger;
          data['language'] = [];
          $("select[name='language[]'] option:selected").each(function(index){
            data['language'].push(parseInt($(this).val()));
          });
          if(data['language'].length == 0 || data['language'] == null || data['language'] == '')
          {
            alert("Please select your language.");
            return;
          }
       }

       if(current_question == 4)
       {
          data['country'] = $("select[name='country'] option:selected"). val();
          if(data['country'] == null || data['country'] == '')
          {
            alert("Please select your country.");
            return;
          }
       }

       if(current_question == 5)
       {
          data['birth_year'] = $("select[name='year'] option:selected"). val();
          if(data['birth_year'] == null || data['birth_year'] == '')
          {
            alert("Please select your birth year.");
            return;
          }
       }
       $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
          }
      });
       $("#submit-anw-btn").hide();
       $("#submit-anw-loading-btn").show();

       $.ajax({
          url: "{{ route('account.updatepoll') }}",
          method: 'get',
          data: data,
          success: function(result){
            // var win = window.open('https://www.trustpilot.com/review/pollanimal.com', '_blank');
            // if (win) {
            //     win.focus();
            // } else {
            //     alert('Please allow popups for this website');
            // }
            get_available_poll();
            $("#submit-anw-btn").show();
            $("#submit-anw-loading-btn").hide();
            
          }});
    });
</script>
</div>