@extends(config('path_access.private').'.layout')
@section('cssSection')
<link href="admin/assets/css/orders.css" rel="stylesheet" />
@endsection
@section('appAngular')
<script src="modules/accounts/controllers/mainCtrl.js"></script>
<script src="modules/services/accountService.js"></script>
<script src="modules/accounts/app.js"></script> 
@endsection
@section('sidebar')
    @include(config('path_access.private').'.dashboard.admin.sidebar')
@endsection
@section('content')
<div id="content" class="content">
	<div ng-app="account" ng-controller="accountController" >
		<div class="row">
                    <div class="p-20">
			<!-- begin row -->
			<div class="row">
			    <!-- begin col-2 -->
                            @include(config('path_access.private').'.accounts.partials.optionsLeft')
			    <!-- end col-2 -->
			    <!-- begin col-10 -->
			    <div class="col-md-10">
                            @include(config('path_access.private').'.accounts.partials.optionsTop')
			  
                                <div class="order-content">
                                                          
			                @include(config('path_access.private').'.accounts.partials.tableStock')

			        </div>
			    </div>
			    <!-- end col-10 -->
			</div>
			<!-- end row -->
			</div>
		</div>
                @include(config('path_access.private').'.accounts.partials.modalTransference')
			
			
	</div>
</div>


@endsection
@section('ownerScript')

<script>

	$(document).ready(function() {
			App.init();
			
	});
</script>

@endsection