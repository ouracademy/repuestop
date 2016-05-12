<div id="sidebar" class="sidebar">
    <div data-scrollbar="true" data-height="100%">
        <ul class="nav">
            <li class="nav-profile">
                <div class="image">
                   
                    <a href="javascript:;"> {{ Html::image('admin/assets/img//user-13.jpg','a picture') }}</a>
                </div>
                <div class="info">
                    {{ Auth::user()->name }}
                    <small>Description</small>
                </div>
            </li>
        </ul>
        <ul class="nav">
           <li class="has-sub active">
                <a href="javascript:;">
                    <span class="badge pull-right">10</span>
                    <i class="fa fa-inbox"></i> 
                    <span> ordenes de Venta</span>
                </a>
                <ul class="sub-menu">
                    <li><a href="#">Nuevas</a></li>
                    <li><a href="#">En Proceso</a></li>
                    <li><a href="#">Por Entregar</a></li>

                </ul>
            </li>
            <li class="has-sub">
                <a href="javascript:;">
                   <span class="badge pull-right">10</span>
                    <i class="fa fa-inbox"></i> 
                   
                    <span>Mi Almacen</span> 
                </a>
                <ul class="sub-menu">
                    <li><a href="{{url('order')}}">Agregar Producto<i class="fa fa-paper-plane text-theme"></i></a></li>
                    <li><a href="{{url('order')}}">Stock de Producto <i class="fa fa-paper-plane text-theme"></i></a></li>
                    <li><a href="{{url('order')}}">Productos por reestablecer <i class="fa fa-paper-plane text-theme"></i></a></li>

                </ul>
            </li>
            <li class="has-sub">
                <a href="javascript:;">
                    <span class="badge pull-right">10</span>
                    <i class="fa fa-inbox"></i> 
                    <span>Transferencias</span> 
                </a>
                <ul class="sub-menu">
                    <li><a href="{{url('order')}}">Proveedor a Almacen<i class="fa fa-paper-plane text-theme"></i></a></li>
                </ul>
            </li>
            <li class="has-sub ">
                <a href="javascript:;">
                    <span class="badge pull-right">10</span>
                    <i class="fa fa-inbox"></i> 
                    <span>Ordenes de Compra</span>
                </a>
                <ul class="sub-menu">
                    <li><a href="email_inbox.html">Crear orden</a></li> 
                </ul>
            </li>
            <li class="has-sub ">
                <a href="javascript:;">
                    <span class="badge pull-right">10</span>
                    <i class="fa fa-inbox"></i> 
                    <span>Clientes</span>
                </a>
                <ul class="sub-menu">
                    <li><a href="email_inbox.html">Agregar cliente</a></li> 
                    <li><a href="email_inbox.html">Ver a mis clientes</a></li> 

                </ul>
            </li>
               <li class="has-sub ">
                <a href="javascript:;">
                    <span class="badge pull-right">10</span>
                    <i class="fa fa-inbox"></i> 
                    <span>Reportes</span>
                </a>
                <ul class="sub-menu">
                    <li><a href="email_inbox.html">Poductos mas vendidos</a></li> 
                    <li><a href="email_inbox.html">Ventas del mes </a></li> 

                </ul>
            </li>
             <li class="has-sub ">
                <a href="javascript:;">
                    <span class="badge pull-right">10</span>
                    <i class="fa fa-inbox"></i> 
                    <span>Descuentos</span>
                </a>
                <ul class="sub-menu">
                    <li><a href="email_inbox.html">Registrar Descuento</a></li> 
                    <li><a href="email_inbox.html">Ver descuentos</a></li> 

                </ul>
            </li>
               <li class="has-sub ">
                <a href="javascript:;">
                    <span class="badge pull-right">10</span>
                    <i class="fa fa-inbox"></i> 
                    <span>Configuracion</span>
                </a>
                <ul class="sub-menu">
                    <li><a href="email_inbox.html">General</a></li> 
                    <li><a href="email_inbox.html">Pagos</a></li> 
                    <li><a href="email_inbox.html">Revisiones</a></li> 


                </ul>
            </li>

            <!-- begin sidebar minify button -->
            <li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i class="fa fa-angle-double-left"></i></a></li>
            <!-- end sidebar minify button -->
        </ul>
        <!-- end sidebar nav -->
    </div>
    <!-- end sidebar scrollbar -->
</div>
<div class="sidebar-bg"></div>