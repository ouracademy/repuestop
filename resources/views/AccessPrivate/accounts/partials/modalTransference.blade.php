<div ng-controller="ModalDemoCtrl">
    <script type="text/ng-template" id="regTransferenceDepositModalContent.html">
        <div class="modal-header">
            <h3 class="modal-title">Registrar Depósito</h3>
        </div>
        <div class="modal-body">
           <form role="form" class="form-horizontal" >
                <div class="row">
                    <div class="col-lg-10 col-lg-offset-1">
                        <div class="form-group">
                            <label class="col-md-4 control-label">Beneficiario<small class="text-default">*</small></label>
                            <div class="col-md-8">
                                <label class="col-md-2 control-label">@{{accountTo.partyFullName}} </label>
                            </div>
                        </div>
                    <div class="form-group">
                            <label class="col-md-4 control-label">Afectado<small class="text-default">*</small></label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" ng-model="from"  value="">

                            </div>
                    </div>
                     <div class="form-group">
                            <label class="col-md-4 control-label">Cantidad<small class="text-default">*</small></label>
                            <div class="col-md-8">
                                <input type="number" class="form-control" ng-model="quantity"  value="">
                            </div>
                    </div>
            </form>
        </div>
        <div class="modal-footer">
            <button class="btn btn-primary" ng-click="ok()">OK</button>
            <button class="btn btn-warning" ng-click="cancel()">Cancel</button>
        </div>
    </script>
    <script type="text/ng-template" id="regTransferenceWithDrawalModalContent.html">
        <div class="modal-header">
            <h3 class="modal-title">Registrar Retiro</h3>
        </div>
        <div class="modal-body">
           <form role="form" class="form-horizontal" >
                <div class="row">
                    <div class="col-lg-10 col-lg-offset-1">
                        <div class="form-group">
                            <label class="col-md-4 control-label">Beneficiario<small class="text-default">*</small></label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" ng-model="from"  value="">
                            </div>
                        </div>
                    <div class="form-group">
                            <label class="col-md-4 control-label">Afectado<small class="text-default">*</small></label>
                            <div class="col-md-8">
                                <label class="col-md-2 control-label">@{{accountTo.partyFullName}} </label>

                            </div>
                    </div>
                     <div class="form-group">
                            <label class="col-md-4 control-label">Cantidad<small class="text-default">*</small></label>
                            <div class="col-md-8">
                                <input type="number" class="form-control" ng-model="quantity"  value="">
                            </div>
                    </div>
            </form>
        </div>
        <div class="modal-footer">
            <button class="btn btn-primary" ng-click="ok()">OK</button>
            <button class="btn btn-warning" ng-click="cancel()">Cancel</button>
        </div>
    </script>

</div>
