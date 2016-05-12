<!DOCTYPE html>
<!--[if IE 9]> <html lang="es" class="ie9"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->

<head>

    @include(config('path_access.public').'.partials.head')
</head>

<!-- body classes:  -->
<!-- "boxed": boxed layout mode e.g. <body class="boxed"> -->
<!-- "pattern-1 ... pattern-9": background patterns for boxed layout mode e.g. <body class="boxed pattern-1"> -->
<!-- "transparent-header": makes the header transparent and pulls the banner to top -->
<!-- "page-loader-1 ... page-loader-6": add a page loader to the page (more info @components-page-loaders.html) -->
<body class="no-trans   ">

<!-- page wrapper start -->
<!-- ================ -->
<div class="page-wrapper">
   
    @yield('content')
</div>
<!-- page-wrapper end -->

@include(config('path_access.public').'.partials.script')

<script>
  @yield('ownerScript')
</script>
</body>
</html>







