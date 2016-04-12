@extends(config('path_access.private').'.layout')
@section('cssSection')
{!! Html::style('admin/assets/css/orders.css') !!}
@endsection
@section('appAngular')
{!! Html::script('modules/services/orderService.js') !!}
{!! Html::script('modules/orderLines/controllers/mainCtrl.js') !!}
{!! Html::script('modules/orderLines/app.js') !!}
@endsection
@section('sidebar')
@include(config('path_access.private').'.dashboard.admin.sidebar')
@endsection
@section('content')
<div id="content" class="content">

    <div ng-app="orderLine" ng-controller="orderLineController" data-ng-init="init({{$id}},'{{url('')}}')" >
        <div class="row">
            <div class="col-md-3 ">

                <div class="panel-body">
                    <form class="form" role="form" >

                        <legend>Agrega pedido</legend>

                        <label for="exampleInputPassword1">Codigo</label>
                        <div class="input-group">
                            <input type="text" class="form-control" ng-model="coder"  placeholder="Ingrese codigo del reten">
                            <span href="#modal-dialog" class="input-group-addon btn btn-success" data-toggle="modal"><i class="fa fa-search fa-2x"></i></span>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Cantidad</label>
                            <input type="number" class="form-control" ng-model="quantity" placeholder="Ingrese cantidad">
                        </div>
                        <div class="form-group">	

                            <a href ng:click="addRow()" class="btn btn-sm btn-inverse"> <i class="fa fa-plus m-r-5"></i>Agregar</a>
                        </div>
                        <!--ng-submit="addRow()"-->
                    </form>
                    <form name="userForm" novalidate>
                        <div class="form-group"  
                             ng-class="{'has-error has-feedback': userForm.email.$touched && userForm.email.$invalid,
                                                 'has-success has-feedback': userForm.email.$dirty && userForm.email.$valid }">
                            <label>Text</label>
                            <input type="text" name="email" class="form-control" 
                                   ng-model="email"
                                   ng-minlength="5"
                                   ng-maxlength="20"
                                   required>
                            <div class="help-block" ng-messages="userForm.email.$error" ng-if="userForm.email.$touched">
                            <!--<p ng-message="required">This field is required</p>
                                    <p ng-message="minlength">This field is too short</p>
                                    <p ng-message="maxlength">This field is too long</p>-->
                                <div ng-messages-include=""></div>
                            </div>

                            <span ng-show="userForm.email.$dirty && userForm.email.$valid" class="glyphicon glyphicon-ok form-control-feedback"></span>
                            <span ng-show="userForm.email.$touched && userForm.email.$invalid" class="glyphicon glyphicon-remove  form-control-feedback"></span>
                        </div>
                    </form>

                </div>
            </div>

            <div class="col-md-9 ">

                <div class="panel panel-inverse" >
                    <div class="panel-heading">

                        <h4 class="panel-title">Items</h4>
                    </div>
                    <div class="panel-body">
                        <div></div>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th> <input type="checkbox" ng-click='optionCheck()'></td>
                                        </th>
                                        <th >
                                            Producto
                                        </th>
                                        <th>
                                            Cantidad 
                                        </th>
                                        <th>
                                            Unidad de Medida
                                        </th>
                                        <th>
                                            Precio Ofrecido
                                        </th>
                                        <th>
                                            Estado
                                        </th>
                                        <th>
                                            Opciones
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr ng-repeat="line in orderLines">

                                        <td>

                                            <input type="checkbox"  data-checklist-model="linesToExecute" data-checklist-value="line"></td>
                                        <td>@{{line.product}}
                                        </td>
                                        <td>
                                            @{{line.quantity}}
                                        </td>
                                        <td>@{{line.unit}}
                                        </td>
                                        <td>@{{line.offeredPrice}}
                                        </td>
                                        <td>@{{line.status}}
                                        </td>
                                        <td >
                                            <a href ng:click="removeItem($index)"><i class="fa fa-trash-o fa-2x"></i></a>
                                        </td>

                                    </tr>


                                </tbody>
                            </table>
                            @{{linesToExecute}}
                        </div>

                    </div>
                </div>
                <!-- end col-10 -->
            </div>
        </div>
        <!-- end row -->

        <div class="modal fade" id="modal-dialog" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title">Modal Dialog</h4>
                    </div>
                    <div class="modal-body">
                        Modal body content here...
                    </div>
                    <div class="modal-footer">
                        <a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal">Close</a>
                        <a href="javascript:;" class="btn btn-sm btn-success">Action</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('ownerScript')
<script>

            $(document).ready(function () {
    App.init();
    });
</script>
@endsection