
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Quixlab - Bootstrap Admin Dashboard Template by Themefisher.com</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('ui/backend')}}/images/favicon.png">
    <!-- Pignose Calender -->
    <link href="{{asset('ui/backend')}}/plugins/pg-calendar/css/pignose.calendar.min.css" rel="stylesheet">
    <!-- Chartist -->
    <link rel="stylesheet" href="{{asset('ui/backend')}}/plugins/chartist/css/chartist.min.css">
    <link rel="stylesheet" href="{{asset('ui/backend')}}/plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css">
    <!-- Custom Stylesheet -->
    <link href="{{asset('ui/backend')}}/css/style.css" rel="stylesheet">

</head>
<body>


@include('backend.layouts.partials.header')
   

   

@yield('content')


@include('backend.layouts.partials.footer')

<!--**********************************
        Scripts
    ***********************************-->
    <script src="{{asset('ui/backend')}}/plugins/common/common.min.js"></script>
    <script src="{{asset('ui/backend')}}/js/custom.min.js"></script>
    <script src="{{asset('ui/backend')}}/js/settings.js"></script>
    <script src="{{asset('ui/backend')}}/js/gleek.js"></script>
    <script src="{{asset('ui/backend')}}/js/styleSwitcher.js"></script>

    <!-- Chartjs -->
    <script src="{{asset('ui/backend')}}/plugins/chart.js/Chart.bundle.min.js"></script>
    <!-- Circle progress -->
    <script src="{{asset('ui/backend')}}/plugins/circle-progress/circle-progress.min.js"></script>
    <!-- Datamap -->
    <script src="{{asset('ui/backend')}}/plugins/d3v3/index.js"></script>
    <script src="{{asset('ui/backend')}}/plugins/topojson/topojson.min.js"></script>
    <script src="{{asset('ui/backend')}}/plugins/datamaps/datamaps.world.min.js"></script>
    <!-- Morrisjs -->
    <script src="{{asset('ui/backend')}}/plugins/raphael/raphael.min.js"></script>
    <script src="{{asset('ui/backend')}}/plugins/morris/morris.min.js"></script>
    <!-- Pignose Calender -->
    <script src="{{asset('ui/backend')}}/plugins/moment/moment.min.js"></script>
    <script src="{{asset('ui/backend')}}/plugins/pg-calendar/js/pignose.calendar.min.js"></script>
    <!-- ChartistJS -->
    <script src="{{asset('ui/backend')}}/plugins/chartist/js/chartist.min.js"></script>
    <script src="{{asset('ui/backend')}}/plugins/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js"></script>



    <script src="{{asset('ui/backend')}}/js/dashboard/dashboard-1.js"></script>
