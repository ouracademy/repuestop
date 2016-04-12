<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="description" content="retenes,wb,repuestop">
        <meta name="author" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta charset="utf-8" />
        <title>@yield('title')</title>
        @include(config('path_access.private').'.partials.head')
        @include(config('path_access.common').'.headAngular')
        @yield('appAngular')
        @yield('cssSection')
        @yield('appAngular')
    </head>

    <body>
        <div id="page-loader" class="fade in"><span class="spinner"></span></div>
        <div id="page-container" class="fade page-sidebar-fixed page-header-fixed">
            @include(config('path_access.private').'.partials.header')
            @yield('sidebar')
            @yield('content')

            <a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
        </div>
        @include(config('path_access.private').'.partials.plugins')
        @include(config('path_access.private').'.partials.script')
        @yield('ownerScript')
    </body>
</html>







