<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title>App Name | @yield('title')</title>
        <link href="{{URL::to('/css/foundation.min.css')}}" rel="stylesheet">
        <link href="{{URL::to('/css/app.css')}}" rel="stylesheet">
    </head>
    <body>
      <div class="top-bar">
        @include('sections.tree')
      </div>
      <div class="row" id ="content">
        <div class="medium-3 columns">
        @yield('sidebar')

        </div>
        <div class="medium-9 columns">
            @yield('content')
        </div>
      </div>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>

      <script src="{{URL::to('/js/vendor/foundation.min.js')}}"></script>
      <script>
        $(document).foundation();
      </script>
      <script src="{{URL::to('/js/app.js')}}"></script>
    </body>
</html>