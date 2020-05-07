<!doctype html>
<html class="no-js" lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Poll Animal</title>
    <link rel="icon" type="image/ico" href="{{ asset('images/backend/images/favicon.ico') }}" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/backend/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('css/backend/vendor/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/backend/vendor/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('css/backend/vendor/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('js/backend/vendor/animsition/css/animsition.min.css') }}">
    <link rel="stylesheet" href="{{ asset('js/backend/vendor/daterangepicker/daterangepicker-bs3.css') }}">
    <link rel="stylesheet" href="{{ asset('js/backend/vendor/morris/morris.css') }}">
    <link rel="stylesheet" href="{{ asset('js/backend/vendor/owl-carousel/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('js/backend/vendor/owl-carousel/owl.theme.css') }}">
    <link rel="stylesheet" href="{{ asset('js/backend/vendor/rickshaw/rickshaw.min.css') }}">
    <link rel="stylesheet" href="{{ asset('js/backend/vendor/datetimepicker/css/bootstrap-datetimepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('js/backend/vendor/datatables/css/jquery.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('js/backend/vendor/datatables/datatables.bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('js/backend/vendor/chosen/chosen.css') }}">
    <link rel="stylesheet" href="{{ asset('js/backend/vendor/summernote/summernote.css') }}">  
    <link rel="stylesheet" href="{{ asset('css/backend/main.css') }}">  

    <script data-cfasync="false" src="{{ asset('js/backend/vendor/modernizr/modernizr-2.8.3-respond-1.4.2.min.js') }}"></script>
</head>
    <body id="minovate" class="appWrapper">

      <style type="text/css">
 /* Added by ranveer */
   .form-validation .form-control {
     margin: 0px !important; 
}

.btn.btn-greensea.text-white{
    color: white !important;
    opacity: 1;
}
.btn.btn-md.btn-greensea{
    width: 100% !important;
}
    .brand{
        margin-top:20px;
        /*margin-b*/
    }
    .mt-40 h2.mfran{
    margin-top:30px !important;
}


.mt-40.mfran {
    margin-top:10px !important; 
}

.hint-text {
    color: #999;
    text-align: center;
}
#project-progress tbody tr td{
    line-height: 25px;
    vertical-align: middle;
}
.social-btn > .btn-group-lg>.btn, .btn-lg {
    padding: 10px 11px !important;
  }
.social-btn > .btn {
    color: #fff;
    /*margin: 10px 0 0 30px;*/
    font-size: 15px;
    /*width: 55px;*/
    /*height: 55px;*/
    width: 70px;
    line-height: 25px;
    font-weight: normal;
    text-align: center;
    border: none;
    transition: all 0.4s;
}
.social-btn > .open .dropdown-menu {
  padding: 5px;
}
.social-btn > .open .dropdown-menu .btn {
    color: #fff;
    /*margin: 10px 0 0 30px;*/
    font-size: 15px;
    /*width: 55px;*/
    /*height: 55px;*/
    width: 70px;
    line-height: 25px;
    font-weight: normal;
    text-align: center;
    border: none;
    transition: all 0.4s;
}

.social-btn .btn-primary {
    background: #507cc0;
}

.social-btn .btn-info {
    background: #64ccf1;
}

.social-btn .btn-danger {
    background: #df4930;
}
        .extc{
          background-color: #16a085 !important;
          border-color: #16a085 !important;
        }

        .extc:hover{
          background-color: #16a085 !important;
          border-color: #16a085 !important;
        }

        .login-success {
          color: #3c763d !important;
          background-color: #c3f9ad !important;
          border-color: #c3f9ad !important;
      }

      .mycus {
        height: 100%;
    position: relative;
    width: 100%;
    padding: 28px;
    top: 0;
    left: 0;
      }


      .btn-ef-4
      {
        font-size: 12px;
    /* width: 25%; */
    text-align: center;
    padding: 2px 15px;
      }

      .btn-ef-3
      {
        font-size: 10px;
    /* width: 25%; */
    text-align: center;
    padding: 2px 15px;
      }


      </style>
      @include('frontend.layouts.sidebar')
      @yield('content')

<script data-cfasync="false" src="{{ asset('js/backend/ajax.googleapis.min.js')}}"></script>
  <script data-cfasync="false">window.jQuery || document.write("<script src='{{ asset('js/backend/vendor/jquery/jquery-1.11.2.min.js')}}'><\/script>")</script>
  <script data-cfasync="false" src="{{ asset('js/backend/vendor/bootstrap/bootstrap.min.js')}}"></script>
  <script data-cfasync="false" src="{{ asset('js/backend/vendor/jRespond/jRespond.min.js')}}"></script>
  <script data-cfasync="false" src="{{ asset('js/backend/vendor/d3/d3.min.js')}}"></script>
  <script data-cfasync="false" src="{{ asset('js/backend/vendor/d3/d3.layout.min.js')}}"></script>
  <script data-cfasync="false" src="{{ asset('js/backend/vendor/rickshaw/rickshaw.min.js')}}"></script>
  <script data-cfasync="false" src="{{ asset('js/backend/vendor/sparkline/jquery.sparkline.min.js')}}"></script>
  <script data-cfasync="false" src="{{ asset('js/backend/vendor/slimscroll/jquery.slimscroll.min.js')}}"></script>
  <script src="{{ asset('js/backend/vendor/animsition/js/jquery.animsition.min.js')}}"></script>
  <script data-cfasync="false" src="{{ asset('js/backend/vendor/daterangepicker/moment.min.js')}}"></script>
  <script data-cfasync="false" src="{{ asset('js/backend/vendor/daterangepicker/daterangepicker.js')}}"></script>
  <script data-cfasync="false" src="{{ asset('js/backend/vendor/screenfull/screenfull.min.js')}}"></script>
  <script data-cfasync="false" src="{{ asset('js/backend/vendor/flot/jquery.flot.min.js')}}"></script>
  <script data-cfasync="false" src="{{ asset('js/backend/vendor/flot-tooltip/jquery.flot.tooltip.min.js')}}"></script>
  <script data-cfasync="false" src="{{ asset('js/backend/vendor/flot-spline/jquery.flot.spline.min.js')}}"></script>
  <script data-cfasync="false" src="{{ asset('js/backend/vendor/easypiechart/jquery.easypiechart.min.js')}}"></script>
  <script data-cfasync="false" src="{{ asset('js/backend/vendor/raphael/raphael-min.js')}}"></script>
  <script data-cfasync="false" src="{{ asset('js/backend/vendor/morris/morris.min.js')}}"></script>
  <script data-cfasync="false" src="{{ asset('js/backend/vendor/owl-carousel/owl.carousel.min.js')}}"></script>
  <script data-cfasync="false" src="{{ asset('js/backend/vendor/datetimepicker/js/bootstrap-datetimepicker.min.js')}}"></script>
  <script data-cfasync="false" src="{{ asset('js/backend/vendor/datatables/js/jquery.dataTables.min.js')}}"></script>
  <script data-cfasync="false" src="{{ asset('js/backend/vendor/datatables/extensions/dataTables.bootstrap.js')}}"></script>
  <script data-cfasync="false" src="{{ asset('js/backend/vendor/chosen/chosen.jquery.min.js')}}"></script>
  <script src="{{ asset('js/backend/vendor/summernote/summernote.min.js')}}"></script>
  <script data-cfasync="false" src="{{ asset('js/backend/vendor/coolclock/coolclock.js')}}"></script>
  <script data-cfasync="false" src="{{ asset('js/backend/vendor/coolclock/excanvas.js')}}"></script>      
  <script data-cfasync="false" src="{{ asset('js/backend/main.js')}}"></script>        
  <script>
      $(window).load(function(){
          // Initialize Statistics chart
          var data = [{
              data: [[1,15],[2,40],[3,35],[4,39],[5,42],[6,50],[7,46],[8,49],[9,59],[10,60],[11,58],[12,74]],
              label: 'Unique Visits',
              points: {
                  show: true,
                  radius: 4
              },
              splines: {
                  show: true,
                  tension: 0.45,
                  lineWidth: 4,
                  fill: 0
              }
          }, {
              data: [[1,50],[2,80],[3,90],[4,85],[5,99],[6,125],[7,114],[8,96],[9,130],[10,145],[11,139],[12,160]],
              label: 'Page Views',
              bars: {
                  show: true,
                  barWidth: 0.6,
                  lineWidth: 0,
                  fillColor: { colors: [{ opacity: 0.3 }, { opacity: 0.8}] }
              }
          }];

          var options = {
              colors: ['#e05d6f','#61c8b8'],
              series: {
                  shadowSize: 0
              },
              legend: {
                  backgroundOpacity: 0,
                  margin: -7,
                  position: 'ne',
                  noColumns: 2
              },
              xaxis: {
                  tickLength: 0,
                  font: {
                      color: '#fff'
                  },
                  position: 'bottom',
                  ticks: [
                      [ 1, 'JAN' ], [ 2, 'FEB' ], [ 3, 'MAR' ], [ 4, 'APR' ], [ 5, 'MAY' ], [ 6, 'JUN' ], [ 7, 'JUL' ], [ 8, 'AUG' ], [ 9, 'SEP' ], [ 10, 'OCT' ], [ 11, 'NOV' ], [ 12, 'DEC' ]
                  ]
              },
              yaxis: {
                  tickLength: 0,
                  font: {
                      color: '#fff'
                  }
              },
              grid: {
                  borderWidth: {
                      top: 0,
                      right: 0,
                      bottom: 1,
                      left: 1
                  },
                  borderColor: 'rgba(255,255,255,.3)',
                  margin:0,
                  minBorderMargin:0,
                  labelMargin:20,
                  hoverable: true,
                  clickable: true,
                  mouseActiveRadius:6
              },
              tooltip: true,
              tooltipOpts: {
                  content: '%s: %y',
                  defaultTheme: false,
                  shifts: {
                      x: 0,
                      y: 20
                  }
              }
          };

          var plot = $.plot($("#statistics-chart"), data, options);

          $(window).resize(function() {
              // redraw the graph in the correctly sized div
              plot.resize();
              plot.setupGrid();
              plot.draw();
          });
          // * Initialize Statistics chart
          //Initialize morris chart
          Morris.Donut({
              element: 'browser-usage',
              data: [
                  {label: 'Chrome', value: 25, color: '#00a3d8'},
                  {label: 'Safari', value: 20, color: '#2fbbe8'},
                  {label: 'Firefox', value: 15, color: '#72cae7'},
                  {label: 'Opera', value: 5, color: '#d9544f'},
                  {label: 'Internet Explorer', value: 10, color: '#ffc100'},
                  {label: 'Other', value: 25, color: '#1693A5'}
              ],
              resize: true
          });
          //*Initialize morris chart
          // Initialize owl carousels
          $('#todo-carousel, #feed-carousel, #notes-carousel').owlCarousel({
              autoPlay: 5000,
              stopOnHover: true,
              slideSpeed : 300,
              paginationSpeed : 400,
              singleItem : true,
              responsive: true
          });

          $('#appointments-carousel').owlCarousel({
              autoPlay: 5000,
              stopOnHover: true,
              slideSpeed : 300,
              paginationSpeed : 400,
              navigation: true,
              navigationText : ['<i class=\'fa fa-chevron-left\'></i>','<i class=\'fa fa-chevron-right\'></i>'],
              singleItem : true
          });
          //* Initialize owl carousels
          // Initialize rickshaw chart
          var graph;

          var seriesData = [ [], []];
          var random = new Rickshaw.Fixtures.RandomData(50);

          for (var i = 0; i < 50; i++) {
              random.addData(seriesData);
          }

          graph = new Rickshaw.Graph( {
              element: document.querySelector("#realtime-rickshaw"),
              renderer: 'area',
              height: 133,
              series: [{
                  name: 'Series 1',
                  color: 'steelblue',
                  data: seriesData[0]
              }, {
                  name: 'Series 2',
                  color: 'lightblue',
                  data: seriesData[1]
              }]
          });

          var hoverDetail = new Rickshaw.Graph.HoverDetail( {
              graph: graph,
          });

          graph.render();

          setInterval( function() {
              random.removeData(seriesData);
              random.addData(seriesData);
              graph.update();

          },1000);
          //* Initialize rickshaw chart
          //Initialize mini calendar datepicker
          $('#mini-calendar').datetimepicker({
              inline: true
          });
          //*Initialize mini calendar datepicker
          //todo's
          $('.widget-todo .todo-list li .checkbox').on('change', function() {
              var todo = $(this).parents('li');

              if (todo.hasClass('completed')) {
                  todo.removeClass('completed');
              } else {
                  todo.addClass('completed');
              }
          });
          //* todo's
          //initialize datatable
          $('#project-progress').DataTable({
              "aoColumnDefs": [
                { 'bSortable': false, 'aTargets': [ "no-sort" ] }
              ],
          });
          //*initialize datatable

          //load wysiwyg editor
          $('#summernote').summernote({
              toolbar: [
                  //['style', ['style']], // no style button
                  ['style', ['bold', 'italic', 'underline', 'clear']],
                  ['fontsize', ['fontsize']],
                  ['color', ['color']],
                  ['para', ['ul', 'ol', 'paragraph']],
                  ['height', ['height']],
                  //['insert', ['picture', 'link']], // no insert buttons
                  //['table', ['table']], // no table button
                  //['help', ['help']] //no help button
              ],
              height: 143   //set editable area's height
          });
          //*load wysiwyg editor
      });
  </script>
            <!-- Global site tag (gtag.js) - Google Analytics -->
<script async data-cfasync="false" src="https://www.googletagmanager.com/gtag/js?id=UA-107521779-2"></script>
<script>
window.dataLayer = window.dataLayer || [];
function gtag(){dataLayer.push(arguments);}
gtag('js', new Date());
gtag('config', 'UA-107521779-2');
</script>
    </body>
</html>