!function(e){jQuery.fn.is_exists=function(){return this.length>0},e(window).on("load",function(){if(e(".agent-work-grid").is_exists()){var t=e(".agent-work-grid"),a=function(){var a,i=t.width(),s=1;return i>1200?s=4:i>900?s=4:i>600?s=2:i>450?s=2:i>385&&(s=1),a=Math.floor(i/s),t.find(".agent-single-grid-item").each(function(){var t=e(this),i=t.attr("class").match(/agent-single-grid-item-w(\d)/),s=t.attr("class").match(/agent-single-grid-item-h(\d)/),o=i?a*i[1]:a;s&&s[1];t.css({width:o})}),a};(i=function(){t.isotope({resizable:!1,itemSelector:".agent-single-grid-item",masonry:{columnWidth:a(),gutterWidth:0}})})(),e(window).on("resize",i),e(".agent-work-nav .option-set").find("li").on("click",function(){var a=e(this),i=a.parents(".option-set");i.find(".selected").removeClass("selected"),a.addClass("selected");var s={},o=i.attr("data-option-key"),n=a.attr("data-option-value");return n="false"!==n&&n,s[o]=n,"layoutMode"===o&&"function"==typeof changeLayoutMode?changeLayoutMode(a,s):t.isotope(s),!1})}if(e(".agent-work-grid-v2").is_exists()){var i;t=e(".agent-work-grid-v2"),a=function(){var a,i=t.width(),s=1;return i>1200?s=3:i>900?s=3:i>600?s=2:i>450?s=2:i>385&&(s=1),a=Math.floor(i/s),t.find(".agent-single-grid-item").each(function(){var t=e(this),i=t.attr("class").match(/agent-single-grid-item-w(\d)/),s=t.attr("class").match(/agent-single-grid-item-h(\d)/),o=i?a*i[1]:a;s&&s[1];t.css({width:o})}),a};(i=function(){t.isotope({resizable:!1,itemSelector:".agent-single-grid-item",masonry:{columnWidth:a(),gutterWidth:0}})})(),e(window).on("resize",i),e(".agent-work-nav .option-set").find("li").on("click",function(){var a=e(this),i=a.parents(".option-set");i.find(".selected").removeClass("selected"),a.addClass("selected");var s={},o=i.attr("data-option-key"),n=a.attr("data-option-value");return n="false"!==n&&n,s[o]=n,"layoutMode"===o&&"function"==typeof changeLayoutMode?changeLayoutMode(a,s):t.isotope(s),!1})}}),e(document).ready(function(){var t=0,a=0,i=setInterval(function(){e(".loading-page .counter h1").html(a+"%"),e(".loading-page .counter hr").css("width",a+"%"),a++,101==++t&&(clearInterval(i),e("#preloader").delay(100).fadeOut(400))},50);if(e("#agent-testimonial-slider-v-2").is_exists()){var s=e("#agent-testimonial-slider-v-2");s.owlCarousel({nav:!1,slideSpeed:300,paginationSpeed:400,center:!0,items:3,loop:!0,touchDrag:!0,mouseDrag:!0,dots:!1,responsive:{0:{items:1},768:{items:1},991:{items:3},1e3:{items:3}}}),e(".prev").on("click",function(){s.trigger("prev.owl.carousel")}),e(".next").on("click",function(){s.trigger("next.owl.carousel")})}e("#agent-client-slider").is_exists()&&e("#agent-client-slider").owlCarousel({nav:!1,slideSpeed:300,paginationSpeed:400,items:6,loop:!0,touchDrag:!0,mouseDrag:!0,dots:!1,responsive:{0:{items:1},600:{items:3},1e3:{items:5}}});if(e("#agent-testimonial-slider").is_exists()){var o=e("#agent-testimonial-slider");o.owlCarousel({nav:!1,slideSpeed:300,paginationSpeed:400,center:!0,items:3,loop:!0,touchDrag:!0,mouseDrag:!0,dots:!0,responsive:{0:{items:1},600:{items:1},768:{items:3}}}),e(".prev").on("click",function(){o.trigger("prev.owl.carousel")}),e(".next").on("click",function(){o.trigger("next.owl.carousel")})}if(e("#agent-welcome-botton-slider").is_exists()){var n=e("#agent-welcome-botton-slider");n.owlCarousel({nav:!1,slideSpeed:300,paginationSpeed:400,items:4,loop:!0,touchDrag:!0,mouseDrag:!0,dots:!1,responsive:{0:{items:1},768:{items:2},991:{items:3},1e3:{items:4}}}),e(".prev").on("click",function(){n.trigger("prev.owl.carousel")}),e(".next").on("click",function(){n.trigger("next.owl.carousel")})}if(e("#agent-post-slider").is_exists()){var r=e("#agent-post-slider");r.owlCarousel({nav:!1,slideSpeed:300,paginationSpeed:400,items:1,loop:!0,touchDrag:!0,mouseDrag:!0,dots:!1,lazyLoad:!0}),e(".prev").on("click",function(){r.trigger("prev.owl.carousel")}),e(".next").on("click",function(){r.trigger("next.owl.carousel")})}if(e("#agent-blog-post-slider").is_exists()){var l=e("#agent-blog-post-slider");l.owlCarousel({nav:!1,slideSpeed:300,paginationSpeed:400,items:3,loop:!0,touchDrag:!0,mouseDrag:!0,dots:!1,lazyLoad:!0,responsive:{0:{items:1},768:{items:2},991:{items:3},1e3:{items:3}}}),e(".prev").on("click",function(){l.trigger("prev.owl.carousel")}),e(".next").on("click",function(){l.trigger("next.owl.carousel")})}e("#agent-banner-carousel").is_exists()&&e("#agent-banner-carousel").owlCarousel({nav:!1,slideSpeed:300,paginationSpeed:400,center:!0,items:1,loop:!0,touchDrag:!0,mouseDrag:!0,dots:!0});e(".userFeed").is_exists()&&(e.fn.spectragram.accessData={accessToken:"1764162550.ba4c844.679392a432894982bf6a31ec20d8acb0",clientID:"289a98508b934dd49a68144b79209813"},e(".userFeed").spectragram("getUserFeed",{query:"natgeo",size:"small",max:6})),e(".agent-main-menu-area, .agent-main-menu ul li").is_exists()&&e(".agent-main-menu-area, .agent-main-menu ul li").on("click","a",function(t){var a=e(this).attr("href");if("#"===a[0]&&e(a).offset()){var i="#"===a?0:e(a).offset().top-0;e("html, body").stop().animate({scrollTop:i},500,"easeInOutCirc"),t.preventDefault()}});var d=e(".agent-work-main-wraper");d.is_exists()&&d.magnificPopup({delegate:"a",type:"image",tLoading:"Loading image #%curr%...",mainClass:"mfp-with-zoom mfp-img-mobile",gallery:{enabled:!0,navigateByImgClick:!0,preload:[0,1]},image:{titleSrc:function(e){return e.el.attr}}}),e(".agent-video-play-btn").is_exists()&&e(".agent-video-play-btn").magnificPopup({disableOn:700,type:"iframe",mainClass:"mfp-fade",removalDelay:160,preloader:!1,fixedContentPos:!1}),e("#rev_slider_1").is_exists()&&jQuery("#rev_slider_1").show().revolution({sliderLayout:"fullscreen",navigation:{arrows:{enable:!0,style:"hesperiden",hide_onleave:!1},bullets:{enable:!0,style:"hesperiden",hide_onleave:!1,h_align:"center",v_align:"bottom",h_offset:0,v_offset:20,space:5}}}),e("#dl-menu").is_exists()&&e("#dl-menu").dlmenu(),e("#emailform").on("submit",function(t){t.preventDefault();var a=e("#form-name-px"),i=e("#form-email-px"),s=e("#form-massage-px"),o=(a.val(),i.val()),n=!1,r=e(this);r.find(".message-update")&&r.find(".message-update").fadeOut("normal",function(){e(this).remove()}),a.removeClass("error"),s.removeClass("error"),i.removeClass("error"),""===a.val()&&(n=!0,a.addClass("error")),""===s.val()&&(n=!0,s.addClass("error")),""===i.val()&&(n=!0,i.addClass("error")),i.val(),/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(o)||(n=!0,i.addClass("error")),!1===n&&e.ajax({method:"POST",url:e(this).attr("action"),data:{name:e("#form-name-px").val(),email:e("#form-email-px").val(),message:e("#form-massage-px").val()},success:function(t){var o=JSON.parse(t);console.log(o),o.email_success&&(e('<div class="message-update alert alert-success">'+o.email_success+"</div>").appendTo(r).hide().fadeIn(),a.val(""),i.val(""),s.val("")),o.email_error&&e('<div class="message-update alert alert-danger">'+o.email_error+"</div>").appendTo(r).hide().fadeIn()}})}),e("#mc-form").is_exists()&&e("#mc-form").ajaxChimp({url:"//pixiefy.us13.list-manage.com/subscribe/post?u=1c19cb3fd3c3c6c56177c50ea&amp;id=967a07b6cc"});var c=0;e(".agent-welcome-bottom-single-wraper").each(function(){var t=e(this).height();t>c&&(c=t)}),e(".agent-welcome-bottom-single-wraper").height(c)}),e(window).on("scroll",function(){e(window).scrollTop()>50?e("#home-section").addClass("sticky-menu"):e("#home-section").removeClass("sticky-menu")}),e("#map").is_exists()&&google.maps.event.addDomListener(window,"load",function(){var e={zoom:11,scrollwheel:!1,navigationControl:!1,mapTypeControl:!0,scaleControl:!1,draggable:!0,disableDefaultUI:!0,center:new google.maps.LatLng(54.6877546,25.2730256),styles:[{featureType:"administrative",elementType:"labels.text.fill",stylers:[{color:"#444444"}]},{featureType:"landscape",elementType:"all",stylers:[{color:"#f2f2f2"}]},{featureType:"poi",elementType:"all",stylers:[{visibility:"off"}]},{featureType:"road",elementType:"all",stylers:[{saturation:-100},{lightness:45}]},{featureType:"road.highway",elementType:"all",stylers:[{visibility:"simplified"}]},{featureType:"road.arterial",elementType:"labels.icon",stylers:[{visibility:"off"}]},{featureType:"transit",elementType:"all",stylers:[{visibility:"off"}]},{featureType:"water",elementType:"all",stylers:[{color:"#E0A516"},{visibility:"on"}]}]},t=document.getElementById("map"),a=new google.maps.Map(t,e);new google.maps.Marker({position:new google.maps.LatLng(54.6877546,25.2730256),map:a,title:"Snazzy!"})})}(jQuery);