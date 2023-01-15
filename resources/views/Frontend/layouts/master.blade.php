
<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Tohoney -@yield('frontendtitle')</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  @include('Frontend.layouts.inc.style')
</head>

<body>
    <!--Start Preloader-->
    <div class="preloader-wrap">
        <div class="spinner"></div>
    </div>
   @include('Frontend.layouts.inc.search')
            @include('Frontend.layouts.inc.header')
            @yield('frontend_content')


      @include('Frontend.layouts.inc.newsletter')
     @include('Frontend.layouts.inc.footer')
     @include('Frontend.layouts.inc.modal')
  @include('Frontend.layouts.inc.script')
</body>


<!-- Mirrored from themepresss.com/tf/html/tohoney/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 13 Mar 2020 03:33:34 GMT -->
</html>
