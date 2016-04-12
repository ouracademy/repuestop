@extends('AccessPublic.layout')
@section('title','Catalogo')
@section('description','retenes')
@section('app','repuest')
@section('plugins')
<link href="assets/css/partials/wizard.css" rel="stylesheet" />
@endsection
@section('appAngular')
<script type="text/javascript" src="libs/angular-wizard/angular-wizard.js"></script>
<link rel="stylesheet" type="text/css" href="libs/angular-wizard/angular-wizard.css">
<script src="modules/services/repuestService.js"></script> 
<script src="modules/services/orderService.js"></script> 
<script src="modules/services/partyService.js"></script> 
<script src="modules/catalog/app.js"></script> <!-- load our application-->
<script src="modules/catalog/controllers/mainCtrl.js"></script> <!-- load our controller -->
@endsection
@section('content') 
<div  ng-controller="orderCustomerController" >
    <div class="row">
        <div class="col-md-12">
            <wizard on-finish="finishedWizard()"> 
                <wz-step title="Escoge tus productos"  wz-title ="Escoge tus productos" >
                    <div class="col-md-12">  
                        <div class="container">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="light-gray-bg section">
                                        <!-- filters start -->
                                        <div class=" text-center mb-20">
                                            <div class="col-md-12">

                                                <form class="form-inline">
                                                    <div class="form-group">
                                                        <input class="form-control"  ng-model="search.codeInter" placeholder="Codigo Internacional">
                                                    </div>
                                                    <div class="form-group">
                                                        <input class="form-control"  ng-model="search.codeOwner" placeholder="Codigo Marca">
                                                    </div>
                                                    <div class="form-group">
                                                        <select class="form-control" ng-model="search.brand">
                                                            <option value="">Seleccione Marca</option>
                                                            <option ng-repeat="x in brands" value="@{{x.name}}">@{{x.name}}</option>
                                                        </select>  
                                                    </div>


                                                    <div class="form-group">
                                                        <input class="form-control"  ng-model="search.measureIn" placeholder="Interior">
                                                    </div>
                                                    <div class="form-group">
                                                        <input class="form-control"  ng-model="search.measureOut" placeholder="Exterior">
                                                    </div>
                                                    <div class="form-group">
                                                        <input class="form-control"  ng-model="search.measureHeight" placeholder="Altura">
                                                    </div>
                                                    <div class="form-group">
                                                        <input class="form-control" ng-model="query" placeholder="Busque cualquier palabra" >
                                                    </div>

                                                </form>
                                            </div>  

                                        </div>
                                        <div ng-controller="orderController">           
                                            <table class="table table-sm">
                                                <thead>
                                                    <tr>
                                                        <th class="quantity">Item</th>
                                                        <th class="product">Cantidad</th>
                                                        <th class="amount">Subtotal</th>
                                                        <th></th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr ng-repeat="cartItem in shoppingCart.body">
                                                        <td class="product">@{{cartItem.name}}</td>
                                                        <td class="quantity">@{{cartItem.quantity}}</td>
                                                        <td class="amount">@{{cartItem.amount}}</td>
                                                        <td><a href ng:click="removeItem($index)"><i class="fa fa-remove "></i></a></td>

                                                    </tr>

                                                    <tr>
                                                        <td class="total-quantity" >Total @{{shoppingCart.length}}</td>
                                                        <td></td>
                                                        <td class="total-amount">@{{shoppingCart.total}}</td>
                                                        <td></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="text-center"
                                             <p>@{{message}}</p>

                                            <div class="panel-body text-center">	 
                                                <input class="btn btn-group btn-info btn-sm" type="submit" wz-next value="Siguiente Paso >>" />
                                            </div> 
                                            <pagination boundary-links="true" total-items="totalItems" ng-model="currentPage" items-per-page="pageSize" max-size="maxSize" class="pagination-sm" boundary-links="true" rotate="false" num-pages="noOfPages"  previous-text="&lsaquo;" next-text="&rsaquo;" first-text="&laquo;" last-text="&raquo;"></pagination>

                                        </div>

                                    </div>

                                </div>



                                <div class="col-md-9">
                                    <div class="panel-body">
                                        <div class="table-responsive">
                                            <table  class="table table-bordered table-hover" >
                                                <thead class="gray">
                                                    <tr>
                                                        <th>Marca</th>
                                                        <th>Codigo Inter</th>
                                                        <th>Codigo Propio</th>
                                                        <th>Diseño</th>
                                                        <th>Giro</th>
                                                        <th>Medida Interior</th>
                                                        <th>Medida Exterior</th>
                                                        <th>Altura</th>                             
                                                        <th>Aplicacion</th>
                                                        <th>Precio</th>
                                                        <th>Opcion</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <tr ng-repeat="repuest in filtered = repuests| filter:search | filter:query | startFrom:(currentPage - 1) * pageSize | limitTo:pageSize" >
                                                        <td>@{{repuest.brand}}</td>
                                                        <td>@{{repuest.codeInter}}</td>
                                                        <td>@{{repuest.codeOwner}}</td>
                                                        <td>@{{repuest.designType}}</td>
                                                        <td>@{{repuest.gireType}}</td>
                                                        <td>@{{repuest.measureIn}}</td>
                                                        <td>@{{repuest.measureOut}}</td>
                                                        <td>@{{repuest.measureHeight}}</td>
                                                        <td>@{{repuest.application}}</td>

                                                        <td>$.@{{repuest.price}}</td>
                                                        <td>
                                                            <div ng-controller="orderController" class="btn-group dropdown ">
                                                                <button type="button" class="btn btn-default-transparent  dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                                                    <i class="fa fa-cart-plus"></i>
                                                                </button>
                                                                <ul class="dropdown-menu dropdown-menu-right ">
                                                                    <li>
                                                                        <div class="panel-body">
                                                                            <form class="form">

                                                                                <div class="form-group">
                                                                                    <label >Cantidad</label>
                                                                                    <input type="number" class="form-control" ng-model="quantity">
                                                                                </div>
                                                                            </form>
                                                                            <a href ng:click="addRow($index)" class="btn btn-group btn-success btn-sm">Agregar</a>

                                                                        </div> 



                                                                    </li>
                                                                </ul>
                                                            </div>

                                                        </td>


                                                    </tr>
                                                </tbody>
                                            </table>

                                        </div>
                                    </div>
                                </div>



                            </div>
                        </div></div>
                </wz-step>
                <wz-step title="Informacion del Cliente " wz-title ="Registra tus datos" canexit="customerInfoValidation" >
                       <div class="col-md-8 col-md-offset-2">      
                        <fieldset>
                            <legend>Informacion del Cliente</legend>
                            <form role="form" class="form-horizontal" >
                                <div class="row">
                                    <div class="col-lg-10 col-lg-offset-1">
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Tipo de Documento<small class="text-default">*</small></label>
                                            <div class="col-md-3">
                                                <select class="form-control" ng-model="selectedTypeParty" ng-options="x.typeDocument for x in typesParty">
                                                </select>  
                                            </div>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" ng-model="nroIdentification" placeholder="Numero del documento" value="">
                                            </div>
                                            <div class="col-md-3">
                                                <a href ng:click="verificateIdentification(selectedTypeParty, nroIdentification)" class="btn btn-group btn-success btn-sm">Verificar</a>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-md-8 control-label">@{{message}} </label>
                                           
                                        </div>
                                    </div>
                                </div>
                                @include('AccessPublic.partials.hide')
                            </form>
                            <div class="row">
                                   
                                <div class="col-md-8 col-md-offset-2">
                                      <ul class="pager">    
                                            <li class="previous"><input class="btn btn-group pager-button" type="submit" wz-previous value="<< Anterior"/></li>
                                            <li class="next"><input class="btn btn-group pager-button " type="submit" wz-next value="Siguiente >>"/></li>
                                        </ul>
                                    </div>
                                
                            </div>
                        </fieldset>

                    </div>
                </wz-step>
                <wz-step title="Informacion final"  wz-title ="Envia tu orden" >
                    <div class="col-md-12">      
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6">
                                    <div ng-controller="orderController">           
                                        <table class="table table-sm">
                                            <thead>
                                                <tr>
                                                    <th class="quantity">Item</th>
                                                    <th class="product">Cantidad</th>
                                                    <th class="amount">Subtotal</th>
                                                    <th></th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr ng-repeat="order in shoppingCart.body">
                                                    <td class="product">@{{order.name}}</td>
                                                    <td class="quantity">@{{order.quantity}}</td>
                                                    <td class="amount">@{{order.amount}}</td>
                                                    <td><a href ng:click="removeItem($index)"><i class="fa fa-remove "></i></a></td>

                                                </tr>

                                                <tr>
                                                    <td class="total-quantity" >Total @{{shoppingCart.length}}</td>
                                                    <td></td>
                                                    <td class="total-amount">@{{shoppingCart.total}}</td>
                                                    <td></td>
                                                </tr>
                                            </tbody>
                                        </table>


                                        <div class="text-center">
                                            <div class="panel-body ">	
                                                <a href ng:click="addOrder()" class="btn btn-group btn-success ">Completa tu Orden</a>
                                                <p>@{{message}}</p>
                                            </div> 
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th colspan="2">Informacion de Cliente </th>
                                            </tr>
                                        </thead>
                                        <tbody ng-show="dataPerson">

                                            <tr>
                                                <td>Apellido Paterno</td>
                                                <td class="information">@{{party.fatherLastname}}</td>
                                            </tr>
                                            <tr>
                                                <td>Apellido Materno</td>
                                                <td class="information">@{{party.motherLastname}}</td>
                                            </tr>
                                            <tr>
                                                <td>Nombre</td>
                                                <td class="information">@{{party.firstName}} </td>
                                            </tr>
                                            <tr>
                                                <td>DNI</td>
                                                <td class="information">@{{party.dni}}</td>
                                            </tr>
                                        </tbody>

                                        <tbody ng-show="dataCompany">
                                            <tr>
                                                <td>RUC</td>
                                                <td class="information">@{{party.ruc}}</td>
                                            </tr>
                                            <tr>
                                                <td>Nombre de Empresa</td>
                                                <td class="information">@{{party.name}}</td>
                                            </tr>
                                        </tbody>   
                                    </table>
                                    <hr>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th colspan="2">Informacion General</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <tr>
                                                <td>Email</td>
                                                <td class="information">@{{party.email}}</td>
                                            </tr>
                                            <tr>
                                                <td>Telefono</td>
                                                <td class="information">@{{party.telephone}}</td>
                                            </tr>
                                            <tr>
                                                <td>Direccion</td>
                                                <td class="information">@{{party.address}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <hr>
                                </div>
                            </div>
                        </div>
                    </div>
                </wz-step>
            </wizard>
        </div>
    </div>
</div>
@endsection














