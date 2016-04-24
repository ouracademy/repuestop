
<table class="table ">
    <thead>
        <tr>
            <th>Cuenta</th>
            <th>Identificador</th>
            <th>Propietario</th>
            <th>Producto</th>
            <th>Cantidad Disponible</th>
            <th>Opciones</th>
        </tr>
    </thead>
    <tbody>

        <tr ng-repeat="account in accounts| filter:search | filter:query | startFrom:(currentPage - 1) * pageSize | limitTo:pageSize " >
            <td>@{{account.type}}</td>
            <td>@{{account.id}}</td>
            <td>@{{account.partyFullName}}</td>
            <td>@{{account.instrument}}</td>
            <td>@{{account.quantity}}</td>
            <td ng-controller="ModalDemoCtrl">
                <a class="btn btn-sm btn-info" href ng:click="openRegisterTransferenceDeposit('sm', account)" ><i class="fa fa-plus" aria-hidden="true"></i></a>  
            </td>
            <td ng-controller="ModalDemoCtrl">
                <a class="btn btn-sm btn-info" href ng:click="openRegisterTransferenceWithDrawal('sm', account)" ><i class="fa fa-minus" aria-hidden="true"></i></a>  
            </td>

        </tr>


    </tbody>
</table>
<div class="order-footer clearfix">
    <pagination boundary-links="true" total-items="totalItems" ng-model="currentPage" items-per-page="pageSize" max-size="maxSize" class="pagination pagination-sm pull-right" boundary-links="true" rotate="false" num-pages="noOfPages"  previous-text="&lsaquo;" next-text="&rsaquo;" first-text="&laquo;" last-text="&raquo;"></pagination>
</div>


