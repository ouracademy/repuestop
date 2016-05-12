angular.module('personService', [])
        .factory('Person', function ($http) {
            return {
                save: function (person) {
                    return $http({
                        method: 'POST',
                        url: 'person',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded'
                        },
                        data: $.param(person)
                    });
                },
                get: function () {
                    return $http.get('person');
                },

            }
        });