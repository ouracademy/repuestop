<div ng-controller="ModalDemoCtrl">
    <script type="text/ng-template" id="regPersonModalContent.html">
        <div class="modal-header">
            <h3 class="modal-title">Registrar Persona</h3>
        </div>
        <div class="modal-body">
        <div><label>@{{messageOK}}</label></div>
           
            <div class="form-group">
                <label  class="col-md-4 control-label">Nombre<small class="text-default">*</small></label>
                <div class="col-md-6">
                    <input type="text" ng-model="person.firstName" class="form-control" value="">
                </div>
                <div class="col-md-12" ng-repeat="error in errors.firstName">
                     <span class="label label-danger">@{{error}}</span> 
                </div>
            </div>
            
            <div class="form-group">
                <label class="col-md-4 control-label">Apellido Paterno<small class="text-default">*</small></label>
                <div class="col-md-6">
                    <input type="text" ng-model="person.fatherLastName" class="form-control" value="">
                </div>
                <div class="col-md-12" ng-repeat="error in errors.fatherLastName">
                     <span class="label label-danger">@{{error}}</span> 
                </div>
            </div>
            <div class="form-group">
                <label  class="col-md-4 control-label">Apellido Materno<small class="text-default">*</small></label>
                <div class="col-md-6">
                    <input type="text" ng-model="person.motherLastName" class="form-control" value="">
                </div>
                <div class="col-md-12" ng-repeat="error in errors.motherLastName">
                     <span class="label label-danger">@{{error}}</span> 
                </div>
            </div>
            <div class="form-group">
                <label  class="col-md-4 control-label">DNI<small class="text-default">*</small></label>
                <div class="col-md-6">
                    <input type="text" ng-model="person.identification" class="form-control" value="">
                </div>
                 <div class="col-md-12" ng-repeat="error in errors.identification">
                     <span class="label label-danger">@{{error}}</span> 
                </div>
            </div>
            <div class="form-group">
                <label  class="col-md-4 control-label">Direccion<small class="text-default">*</small></label>
                <div class="col-md-6">
                    <input type="text" ng-model="person.address" class="form-control" value="">
                </div>
                 <div class="col-md-12" ng-repeat="error in errors.address">
                 <span class="label label-danger">@{{error}}</span> 
                </div>
            
            </div>
            <div class="form-group">
                <label  class="col-md-4 control-label">Teléfono<small class="text-default">*</small></label>
                <div class="col-md-6">
                    <input type="text" ng-model="person.telephone" class="form-control" value="">
                </div>
                 <div class="col-md-12" ng-repeat="error in errors.telephone">
                 <span class="label label-danger">@{{error}}</span> 
                </div>
            </div>

            <div class="form-group">
                <label  class="col-md-4 control-label">Correo<small class="text-default">*</small></label>
                <div class="col-md-6">
                    <input type="email" ng-model="person.email" class="form-control" value="">
                </div>
                <div class="col-md-12" ng-repeat="error in errors.email">
                     <span class="label label-danger">@{{error}}</span> 
                </div>
            </div>
        </div>
        <hr>
        <div class="modal-footer">
            <button class="btn btn-primary btn-sm" ng-click="register()">Registrar</button>
            <button class="btn btn-danger btn-sm" ng-click="cancel()">Cancelar</button>
            <button class="btn btn-info btn-sm" ng-click="close()">Cerrar</button>
        </div>
    </script>
    <script type="text/ng-template" id="regCompanyModalContent.html">
        <div class="modal-header">
            <h3 class="modal-title">Registrar Empresa</h3>
        </div>
        <div class="modal-body">
            <div><label>@{{messageOK}}</label></div>
            <div class="form-group">
                <label  class="col-md-4 control-label">RUC<small class="text-default">*</small></label>
                <div class="col-md-6">
                    <input type="text" ng-model="company.identification" class="form-control" value="">
                </div>
                  <div class="col-md-12" ng-repeat="error in errors.identification">
                     <span class="label label-danger">@{{error}}</span> 
                </div>
            </div>
            <div class="form-group">
                <label  class="col-md-4 control-label">Nombre de Empresa<small class="text-default">*</small></label>
                <div class="col-md-6">
                    <input type="text" ng-model="company.name" class="form-control" value="">
                </div>
                  <div class="col-md-12" ng-repeat="error in errors.name">
                     <span class="label label-danger">@{{error}}</span> 
                </div>
            </div>
            <div class="form-group">
                <label for="billingLastName" class="col-md-4 control-label">Dirección<small class="text-default">*</small></label>
                <div class="col-md-6">
                    <input type="text" ng-model="company.address" class="form-control" value="">
                </div>
                   <div class="col-md-12" ng-repeat="error in errors.address">
                     <span class="label label-danger">@{{error}}</span> 
                </div>
            </div>
            <div class="form-group">
                <label for="billingTel" class="col-md-4 control-label">Teléfono<small class="text-default">*</small></label>
                <div class="col-md-6">
                    <input type="text" ng-model="company.telephone" class="form-control" value="">
                </div>
                <div class="col-md-12" ng-repeat="error in errors.telephone">
                    <span class="label label-danger">@{{error}}</span> 
                </div>
            </div>

            <div class="form-group">
                <label  class="col-md-4 control-label">Correo<small class="text-default">*</small></label>
                <div class="col-md-6">
                    <input type="email" ng-model="company.email" class="form-control" value="">
                </div>
                <div class="col-md-12" ng-repeat="error in errors.address">
                   <span class="label label-danger">@{{error}}</span> 
                </div>
            </div>
        </div>
        <hr>
        <div class="modal-footer">
            <button class="btn btn-primary btn-sm" ng-click="register()">Registrar</button>
            <button class="btn btn-danger btn-sm" ng-click="cancel()">Cancelar</button>
        </div>
    </script>
    <div ng-show="bRegisterCompany">
        <div class="col-md-10 text-center">
            <a href ng:click="openRegisterCompany('lg')" class="btn btn-group btn-info btn-sm">Registrar Empresa</a>
        </div>
    </div>
    <div ng-show="bRegisterPerson">
        <div class="col-md-10 text-center">
            <a href ng:click="openRegisterPerson('lg')" class="btn btn-group btn-info btn-sm">Registrar Persona</a>
        </div>
    </div>
</div>


<div ng-show="flag">
    <div class="row">



        <hr>
        <div class="row">

            <div class="col-lg-8 col-lg-offset-1">
                <div class="form-group">
                    <label for="billingFirstName" class="col-md-2 control-label">Direccion<small class="text-default">*</small></label>
                    <div class="col-md-10">
                        <input type="text" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="billingLastName" class="col-md-2 control-label">Departamento<small class="text-default">*</small></label>
                    <div class="col-md-10">
                        <input type="text" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="billingTel" class="col-md-2 control-label">Distrito<small class="text-default">*</small></label>
                    <div class="col-md-10">
                        <input type="text" class="form-control">
                    </div>
                </div>


            </div>
        </div>
        <hr>
        <div class="row">

            <div class="col-lg-8 col-lg-offset-1">
                <div class="form-group">
                    <label class="col-md-2 control-label">Observaciones<small class="text-default">*</small></label>

                    <div class="col-md-10">
                        <textarea class="form-control" rows="4"></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>