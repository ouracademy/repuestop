
<table class="table table-order">
    <thead>
        <tr>
           <th>Cliente </th>
           <th>Estado</th>
           <th>Fecha de Envio</th>
           <th>Opciones</th>


        </tr>
    </thead>
    <tbody>
            
            <tr ng-repeat="order in orders | filter:search | filter:query | startFrom:(currentPage - 1) * pageSize | limitTo:pageSize " >
                                        
               
                <td class="order-sender">@{{order.nameCustomer}}</td>
                <td>@{{order.status}}</td>
                <td class="order-date">@{{order.dateCharged}}</td>
                <td class="order-subject">
                    <a href ng:click="showOrderLines(order.id)" class="order-btn"><i class="fa fa-eye"></i></a>
                    <a href="#" class="order-btn" data-click="order-archive"><i class="fa fa-folder-open"></i></a>
                    <a href="#" class="order-btn" data-click="order-remove"><i class="fa fa-trash-o"></i></a>
                    <a href="#" class="order-btn" data-click="order-highlight"><i class="fa fa-flag"></i></a> 
               </td>
            </tr>
         
         
    </tbody>
</table>
<div class="order-footer clearfix">
            737 messages
            <ul class="pagination pagination-sm m-t-0 m-b-0 pull-right">
                <li class="disabled"><a href="javascript:;"><i class="fa fa-angle-double-left"></i></a></li>
                <li class="disabled"><a href="javascript:;"><i class="fa fa-angle-left"></i></a></li>
                <li><a href="javascript:;"><i class="fa fa-angle-right"></i></a></li>
                <li><a href="javascript:;"><i class="fa fa-angle-double-right"></i></a></li>
            </ul>
</div>


