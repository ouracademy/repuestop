<div class="col-md-2">
    <form>
          <fieldset>
            <legend>Cuadro de Búsqueda</legend>
        <div class="input-group m-b-15">                                         
            <input type="text" ng-model="query" class="form-control input-sm input-white" >
            <span class="input-group-btn">
                <button class="btn btn-sm btn-inverse" type="button"><i class="fa fa-search"></i></button>
            </span>
        </div>
          </fieldset>
    </form>
    <form >
        <fieldset>
            <legend>Filtros</legend>
            <div class="form-group">
                <label>Código Instrumento</label>
                <input type="text" ng-model="search.instrument" class="form-control">
            </div>
            <div class="form-group">
                <label>Propietario de Cuenta</label>
                <input type="text" ng-model="search.partyFullName" class="form-control">
            </div>
            <div class="form-group">
                <label class="control-label">Tipos de Cuenta</label>
                <div class="checkbox">
                    <label>
                        <input type="checkbox" value="">
                        <i class="fa fa-inbox fa-fw m-r-5"></i>Stock
                    </label>
                </div>
                <div class="checkbox">
                    <label>
                        <input type="checkbox" value="">
                        <i class="fa fa-folder fa-fw m-r-5"></i>YYY
                    </label>
                </div>
            </div>
        </fieldset>
    </form>

</div>




