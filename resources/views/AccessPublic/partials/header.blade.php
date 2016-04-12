
<header class="header fixed clearfix">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                   <div class="header-left clearfix">
                      <div id="logo" class="logo">
                            <a href="{{ url('/') }}"><img id="logo_img" src="images/logos/main.PNG" alt="RepuesTop"></a>
                        </div>
                     </div>
                </div>
                <div class="col-md-5">

                 
                    <div class="header-right clearfix">
                         <div class="main-navigation  animated with-dropdown-buttons">

                           <nav class="navbar navbar-default" role="navigation">
                                <div class="container-fluid">

                                   <div class="navbar-header">
                                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-1">
                                            <span class="sr-only">Toggle navigation</span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                        </button>

                                    </div>

                                  <div class="collapse navbar-collapse" id="navbar-collapse-1">
                                        <!-- main-menu -->
                                        <ul class="nav navbar-nav ">
                                            <li class="dropdown ">
                                                <a href="index.html" class="dropdown-toggle" data-toggle="dropdown">Inicio</a>
                                            </li>
                                            <li class="dropdown ">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Pages</a>
                                            </li>
                                        </ul>
                                       
                                    </div>

                                </div>
                            </nav>
                        </div>            
                
                    </div>
                    
               </div>
                <div class="col-md-4">
                            <div class="header-top-dropdown text-right buttons-access">
                           
                              @if (Auth::guest())
                                  <div class="btn-group">
                                <a href="{{ url('/register') }}" class="btn btn-default btn-sm">
                                    <i class="fa fa-user pr-10"></i> Registrar
                                </a>
                            </div>
                                  <div class="btn-group ">
                                 <a href="{{ url('/login') }}" class="btn btn-default btn-sm">
                                    <i class="fa fa-lock pr-10"></i> Ingresar
                                </a>
                           </div>
                                @else
                        <div class="btn-group dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        
                        </div>
                    @endif
                    </div>
                
                </div>
            </div>
        </div>

    </header>
  


