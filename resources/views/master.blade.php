<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title>DocuDown | @yield('title')</title>
        <link href="{{URL::to('/css/foundation.min.css')}}" rel="stylesheet">
        <link href="{{URL::to('/css/foundation-icons.css')}}" rel="stylesheet">
        <link href="{{URL::to('/css/app.css')}}" rel="stylesheet">
    </head>
    <body>
      <div class="top-bar">
        @include('sections.tree')
      </div>
      <div class="row" id ="content">

            @yield('content')
        
      </div>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>

      <script src="{{URL::to('/js/vendor/foundation.min.js')}}"></script>
      <script>
        $(document).foundation();
        var _base_path = "{{URL::to('/')}}";
      </script>
      <script src="{{URL::to('/js/app.js')}}"></script>
    </body>
</html>
