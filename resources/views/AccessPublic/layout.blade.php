<!DOCTYPE html>
<html lang="es">
<head>
    <title>@yield('title')</title>
    @include(config('path_access.common').'.meta')
    @include(config('path_access.common').'.headNoSecured')
    @include(config('path_access.common').'.headAngular')
    @yield('plugins')
    @yield('appAngular')
</head>
<body>
   <div class="page-wrapper" ng-app = "@yield('app')">
        <div class="header-container">
      
            @include(config('path_access.public').'.partials.header')
            
        </div>
       <div class="col-md-12">
        @yield('content')
       </div>
    </div>
    @yield('callingPlugins')
</body>
</html>







