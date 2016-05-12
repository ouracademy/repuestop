angular.module('companyService', [])
        .factory('Company', function ($http) {
            return {
                save: function (company) {
                    return $http({
                        method: 'POST',
                        url: 'company',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded'
                        },
                        data: $.param(company)
                    });
                },
                get: function () {
                    return $http.get('company');
                },

            }
        });