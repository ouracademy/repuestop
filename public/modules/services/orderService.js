angular.module('orderService', [])
        .factory('Order', function ($http) {
            return {
                save: function (order) {
                    return $http({
                        method: 'POST',
                        url: 'orderData',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded'
                        },
                        data: $.param(order)
                    });
                },
                get: function () {
                    return $http.get('orderData');
                },
                getOrderLines: function (idOrder, urlBase) {
                    return $http({
                        method: 'GET',
                        url: urlBase+'/'+idOrder
                       
                    });
                },
            }
        });