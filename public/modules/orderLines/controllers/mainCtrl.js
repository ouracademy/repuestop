angular.module('orderLineCtrl', [])
        .controller('orderLineController', function ($scope, $http, Order) {
            $scope.init = function (id, urlBase) {
                Order.getOrderLines(id, urlBase)
                        .success(function (data) {
                            $scope.orderLines = data.orderLines;
                        });
                $scope.linesToExecute = [];
              
            };
            var check = false;
            $scope.optionCheck = function () {
                   check = !check;
                   console.log(check);
                   if(check===true){
                       checkAll();
                   }else{
                       uncheckAll();
                   }
            }
            function  checkAll() {
                $scope.linesToExecute = angular.copy($scope.orderLines);
            }

            function uncheckAll() {
                $scope.linesToExecute = [];
            }


            $scope.addRow = function () {
                $scope.items.push({'code': $scope.coder, 'quantity': $scope.quantity, 'price': 10, 'priceTotal': 10 * $scope.quantity});
                $scope.coder = '';
                $scope.quantity = '';
            };
            $scope.removeItem = function (index) {
                $scope.orderLines.splice(index, 1);
            };

        });