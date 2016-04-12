<div ng-controller="ModalDemoCtrl">
    <script type="text/ng-template" id="regPersonModalContent.html">
          <div class="modal-header">
            <h3 class="modal-title">Registrar Persona</h3>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label for="billingLastName" class="col-md-4 control-label">Nombre<small class="text-default">*</small></label>
                <div class="col-md-6">
                    <input type="text" ng-model="party.firstName" class="form-control"  value="">
                </div>
            </div>
            <div class="form-group">
                <label for="billingLastName" class="col-md-4 control-label">Apellido Paterno<small class="text-default">*</small></label>
                <div class="col-md-6">
                    <input type="text" ng-model="party.fatherLastName" class="form-control"  value="">
                </div>
            </div>
          <div class="form-group">
                <label for="billingLastName" class="col-md-4 control-label">Apellido Materno<small class="text-default">*</small></label>
                <div class="col-md-6">
                    <input type="text" ng-model="party.motherLastName" class="form-control"  value="">
                </div>
            </div>
          <div class="form-group">
                <label for="billingLastName" class="col-md-4 control-label">DNI<small class="text-default">*</small></label>
                <div class="col-md-6">
                    <input type="text" ng-model="party.identification" class="form-control"  value="">
                </div>
            </div>
            <div class="form-group">
                <label for="billingLastName" class="col-md-4 control-label">Direccion<small class="text-default">*</small></label>
                <div class="col-md-6">
                    <input type="text" ng-model="party.address" class="form-control"  value="">
                </div>
            </div>
            <div class="form-group">
                <label for="billingTel" class="col-md-4 control-label">Teléfono<small class="text-default">*</small></label>
                <div class="col-md-6">
                    <input type="text" ng-model="party.telephone" class="form-control"  value="">
                </div>
            </div>

            <div class="form-group">
                <label for="billingemail" class="col-md-4 control-label">Correo<small class="text-default">*</small></label>
                <div class="col-md-6">
                    <input type="email" ng-model="party.email" class="form-control"  value="">
                </div>
            </div>
        </div>
        <hr>
        <div class="modal-footer">
            <button class="btn btn-primary btn-sm" ng-click="register()">Registrar</button>
            <button class="btn btn-danger btn-sm" ng-click="cancel()">Cancelar</button>
        </div>
    </script>
    <script type="text/ng-template" id="regCompanyModalContent.html">
        <div class="modal-header">
            <h3 class="modal-title">Registrar Empresa</h3>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label for="billingLastName" class="col-md-4 control-label">RUC<small class="text-default">*</small></label>
                <div class="col-md-6">
                    <input type="text" ng-model="party.identification" class="form-control"  value="">
                </div>
            </div>
            <div class="form-group">
                <label for="billingLastName" class="col-md-4 control-label">Nombre de Empresa<small class="text-default">*</small></label>
                <div class="col-md-6">
                    <input type="text" ng-model="party.name" class="form-control"  value="">
                </div>
            </div>
            <div class="form-group">
                <label for="billingLastName" class="col-md-4 control-label">Dirección<small class="text-default">*</small></label>
                <div class="col-md-6">
                    <input type="text" ng-model="party.address" class="form-control"  value="">
                </div>
            </div>
            <div class="form-group">
                <label for="billingTel" class="col-md-4 control-label">Teléfono<small class="text-default">*</small></label>
                <div class="col-md-6">
                    <input type="text" ng-model="party.telephone" class="form-control"  value="">
                </div>
            </div>

            <div class="form-group">
                <label for="billingemail" class="col-md-4 control-label">Correo<small class="text-default">*</small></label>
                <div class="col-md-6">
                    <input type="email" ng-model="party.email" class="form-control"  value="">
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
            <a href ng:click="openRegisterCompany()" class="btn btn-group btn-info btn-sm">Registrar Empresa</a>  
        </div>
    </div>
    <div ng-show="bRegisterPerson">
        <div class="col-md-10 text-center">     
            <a href ng:click="openRegisterPerson()" class="btn btn-group btn-info btn-sm">Registrar Persona</a>  
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
                        <input type="text" class="form-control" >
                    </div>
                </div>
                <div class="form-group">
                    <label for="billingLastName" class="col-md-2 control-label">Departamento<small class="text-default">*</small></label>
                    <div class="col-md-10">
                        <input type="text" class="form-control"  >
                    </div>
                </div>
                <div class="form-group">
                    <label for="billingTel" class="col-md-2 control-label">Distrito<small class="text-default">*</small></label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" >
                    </div>
                </div>


            </div>
        </div>
        <hr>
        <div class="row">

            <div class="col-lg-8 col-lg-offset-1">
                <div class="form-group">
                    <label  class="col-md-2 control-label">Observaciones<small class="text-default">*</small></label>

                    <div class="col-md-10">
                        <textarea class="form-control" rows="4"></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>