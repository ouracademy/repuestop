angular.module('accountService', [])
        .factory('Account', function ($http) {
            return {
                save: function (account) {
                    return $http({
                        method: 'POST',
                        url: 'accountData',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded'
                        },
                        data: $.param(account)
                    });
                },
                get: function () {
                    return $http.get('accountData');
                },
             
            }
        });