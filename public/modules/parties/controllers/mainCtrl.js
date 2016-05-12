angular.module('orderCtrl', [])
        .controller('orderController', function ($scope, $http, filterFilter, Order) {
            Order.get()
                    .success(function (data) {
                        console.log(data.orders);
                        $scope.orders = data.orders;
                        $scope.currentPage = 1;
                        $scope.pageSize = 40;
                        $scope.totalItems = data.orders.length;
                        $scope.noOfPages = Math.ceil($scope.totalItems / $scope.pageSize);
                    });
            $scope.search = {};
            $scope.resetFilters = function () {
                $scope.search = {};
            };
            $scope.$watch('search', function (newVal, oldVal) {
                $scope.filtered = filterFilter($scope.orders, newVal);
                $scope.totalItems = $scope.filtered.length;
                $scope.noOfPages = Math.ceil($scope.totalItems / $scope.pageSize);
                $scope.currentPage = 1;
            }, true);
            
            $scope.showOrderLines = function (id) {
                window.location.href = "http://localhost/repuestop/public/order/" + id;
            }

        });



