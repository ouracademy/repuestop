angular.module('accountCtrl', [])
        .controller('accountController', function ($scope, $http, filterFilter, Account) {
            Account.get()
                    .success(function (data) {
                        console.log(data.accounts);
                        $scope.accounts = data.accounts;
                        $scope.currentPage = 1;
                        $scope.pageSize = 40;
                        $scope.maxSize = 5;
                        $scope.totalItems = data.accounts.length;
                        $scope.noOfPages = Math.ceil($scope.totalItems / $scope.pageSize);
                    });
            $scope.search = {};
            $scope.resetFilters = function () {
                $scope.search = {};
            };
            $scope.$watch('search', function (newVal, oldVal) {
                $scope.filtered = filterFilter($scope.accounts, newVal);
                $scope.totalItems = $scope.filtered.length;
                $scope.noOfPages = Math.ceil($scope.totalItems / $scope.pageSize);
                $scope.currentPage = 1;
            }, true);

            $scope.showOrderLines = function (id) {
                window.location.href = "http://localhost/repuestop/public/order/" + id;
            }

        })
        .controller('ModalDemoCtrl', function ($scope, $modal, $log) {

            $scope.accountTo=null;
            $scope.animationsEnabled = true;
            $scope.openRegisterTransferenceDeposit = function (size,account) {
                $scope.accountTo=account;
                var modalInstance = $modal.open({
                    animation: $scope.animationsEnabled,
                    templateUrl: 'regTransferenceDepositModalContent.html',
                    controller: 'ModalInstanceCtrl',
                    size: size,
                    resolve: {
                        accountTo: function () {
                            return $scope.accountTo;
                        }
                    }
                });
                modalInstance.result.then(function () {
 
                }, function () {
                    $log.info('Modal dismissed at: ' + new Date());
                });
            };
              $scope.openRegisterTransferenceWithDrawal = function (size,account) {
                $scope.accountTo=account;
                var modalInstance = $modal.open({
                    animation: $scope.animationsEnabled,
                    templateUrl: 'regTransferenceWithDrawalModalContent.html',
                    controller: 'ModalInstanceCtrl',
                    size: size,
                    resolve: {
                        accountTo: function () {
                            return $scope.accountTo;
                        }
                    }
                });
                modalInstance.result.then(function () {
 
                }, function () {
                    $log.info('Modal dismissed at: ' + new Date());
                });
            };


            $scope.toggleAnimation = function () {
                $scope.animationsEnabled = !$scope.animationsEnabled;
            };

        })
        .controller('ModalInstanceCtrl', function ($scope, $modalInstance,accountTo) {

            $scope.accountTo = accountTo;

            $scope.ok = function () {
                //TODO : REGISTER A TRANSFERENCE
                console.log('registrando');
                $modalInstance.close();
            };

            $scope.cancel = function () {
                $modalInstance.dismiss('cancel');
            };
        });



