<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
      <title>DocuDown | @yield('title')</title>
      
      <link rel="preconnect" href="https://fonts.gstatic.com">
      <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&display=swap" rel="stylesheet">

      <link href="{{URL::to('/css/app.css')}}" rel="stylesheet">
    </head>
  <body>
    <section class="container">
      <h1 class="title">
        Docudown
      </h1>
      @include('sections.tree')
      <section class="main">
        <article>
          @yield('content')
        </article>
      </section>
    </section>
   
    <script>
      var _base_path = "{{URL::to('/')}}";
    </script>
    <script src="{{URL::to('/js/app.js')}}"></script>
  </body>
</html>
