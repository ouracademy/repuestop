angular.module('partyService', [])
        .factory('Party', function ($http) {
            return {
              
                get: function (type,nro) {
                    return $http.get('verificateIdentificacition', {
                        params: {type: type ,nro:nro}                   
                    }); 
                },
        }
        });