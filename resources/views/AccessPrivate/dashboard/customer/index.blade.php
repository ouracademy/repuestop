@extends(config('path_access.private').'.layout')
@section('appAngular')

	<!-- ANGULAR -->
<!-- all angular resources will be loaded from the /public folder -->
<script src="modules/dashboard/controllers/mainCtrl.js"></script> <!-- load our controller -->
<!--<script src="modules/dashboard/services/commentService.js"></script> <!-- load our service -->
<script src="modules/dashboard/app.js"></script> <!-- load our application -->



@endsection
@section('sidebar')
    @include(config('path_access.private').'.dashboard.customer.sidebar')
@endsection
@section('cont
@section('content')
<div id="content" class="content">
	<div ng-app="dash" ng-controller="mainController">
                           
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li><a href="javascript:;">Home</a></li>
				<li><a href="javascript:;">Dashboard</a></li>
				<li class="active">Dashboard v2</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">Panel de Control <small>Como cliente yo puedo :</small></h1>
			<!-- end page-header -->
			<!-- begin row -->
			<div class="row">
			    <!-- begin col-3 -->
			    <div class="col-md-3 col-sm-6">
			    	<a href="">
			        <div class="widget widget-stats bg-green">
			            <div class="stats-icon stats-icon-lg"><i class="fa fa-shopping-cart fa-fw"></i></div>
			            <div class="stats-title">PEDIR REPUESTOS</div>
			            <div class="stats-number">@{{lengthOrders}}</div>
			            <p>Ordenes realizadas</p>
			            <div class="stats-progress progress">
                            <div class="progress-bar" style="width: 70.1%;"></div>
                        </div>
                        <div class="stats-desc">Tiene un descuento(70.1%)</div>
			        </div>
			        </a>
			    </div>
			    <!-- end col-3 -->
			    <!-- begin col-3 -->
			    <div class="col-md-3 col-sm-6">
			        <div class="widget widget-stats bg-blue">
			            <div class="stats-icon stats-icon-lg"><i class="fa fa-tags fa-fw"></i></div>
			            <div class="stats-title">TODAY'S PROFIT</div>
			            <div class="stats-number">180,200</div>
			            <div class="stats-progress progress">
                            <div class="progress-bar" style="width: 40.5%;"></div>
                        </div>
                        <div class="stats-desc">Better than last week (40.5%)</div>
			        </div>
			    </div>
			    <!-- end col-3 -->
			    <!-- begin col-3 -->
			    <div class="col-md-3 col-sm-6">
			        <div class="widget widget-stats bg-purple">
			            <div class="stats-icon stats-icon-lg"><i class="fa fa-shopping-cart fa-fw"></i></div>
			            <div class="stats-title">NEW ORDERS</div>
			            <div class="stats-number">38,900</div>
			            <div class="stats-progress progress">
                            <div class="progress-bar" style="width: 76.3%;"></div>
                        </div>
                        <div class="stats-desc">Better than last week (76.3%)</div>
			        </div>
			    </div>
			    <!-- end col-3 -->
			    <!-- begin col-3 -->
			    <div class="col-md-3 col-sm-6">
			        <div class="widget widget-stats bg-black">
			            <div class="stats-icon stats-icon-lg"><i class="fa fa-comments fa-fw"></i></div>
			            <div class="stats-title">NEW COMMENTS</div>
			            <div class="stats-number">3,988</div>
			            <div class="stats-progress progress">
                            <div class="progress-bar" style="width: 54.9%;"></div>
                        </div>
                        <div class="stats-desc">Better than last week (54.9%)</div>
			        </div>
			    </div>
			    <!-- end col-3 -->
			</div>
			<!-- end row -->
			
		
	</div>
	
</div>
@endsection
@section('ownerScript')


<script>
	$(document).ready(function() {
			App.init();
			DashboardV2.init();
	});
</script>
@endsection