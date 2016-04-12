 <div class="header-top dark ">
        <div class="container">
            <div class="row">
                <div class="col-xs-3 col-sm-6 col-md-9">
                    <!-- header-top-first start -->
                    <!-- ================ -->
                    <div class="header-top-first clearfix">
                        <ul class="social-links circle small clearfix hidden-xs">
                            <li class="facebook"><a target="_blank" href="http://www.facebook.com/"><i class="fa fa-facebook"></i></a></li>
                        </ul>
                        <div class="social-links hidden-lg hidden-md hidden-sm circle small">
                            <div class="btn-group dropdown">
                                <button type="button" class="btn dropdown-toggle" data-toggle="dropdown"><i class="fa fa-share-alt"></i></button>
                                <ul class="dropdown-menu dropdown-animation">
                                    <li class="facebook"><a target="_blank" href="http://www.facebook.com/"><i class="fa fa-facebook"></i></a></li>

                                </ul>
                            </div>
                        </div>
                        <ul class="list-inline hidden-sm hidden-xs">
                            <li><i class="fa fa-map-marker pr-5 pl-10"></i>Inversiones Medina Bussines E.I.R.L</li>
                            <li><i class="fa fa-phone pr-5 pl-10"></i>+981 477  715</li>
                            <li><i class="fa fa-envelope-o pr-5 pl-10"></i> repuestop@mail.com</li>
                        </ul>
                    </div>
                    <!-- header-top-first end -->
                </div>
                <div class="col-xs-9 col-sm-6 col-md-3">

                    <!-- header-top-second start -->
                    <!-- ================ -->
                    <div id="header-top-second"  class="clearfix">

                        <!-- header top dropdowns start -->
                        <!-- ================ -->
                        <div class="header-top-dropdown text-right">
                           
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
                    <!-- header-top-second end -->
                </div>
            </div>
        </div>
    </div>
</div>