<div class="pv-30" >
    <div class="header-dropdown-buttons ">
        <div   class="btn-group dropdown ">
            <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                <i class="fa fa-shopping-cart"></i>
                <span class="cart-count default-bg">@{{orders.data.length}}</span>
            </button>
            <ul class="dropdown-menu dropdown-menu-right  cart">
                <li>
                    <table class="table ">
                        <thead>
                            <tr>
                                <th class="quantity">Repuesto</th>
                                <th class="product">Cantidad</th>
                                <th class="amount">Subtotal</th>
                                <th></th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr ng-repeat="order in orders.data">
                                <td class="product">@{{order.name}}</td>
                                <td class="quantity">@{{order.quantity}}</td>
                                <td class="amount">@{{order.amount}}</td>
                                <td><a href ng:click="removeItem($index)"><i class="fa fa-remove "></i></a></td>
                                
                            </tr>

                            <tr>
                                <td class="total-quantity" colspan="2">Total @{{orders.length}}</td>
                                <td class="total-amount">@{{orders.total}}</td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="panel-body text-right">	
                       <a href ng:click="test()" class="btn btn-group btn-gray btn-sm">Checkout</a>
                    </div> 
                </li>
            </ul>
        </div>
    </div>
</div>
