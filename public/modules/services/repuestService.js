angular.module('repuestService', [])
	.factory('Repuest', function($http) {
		return {
			get : function() {
                                return $http.get('catalog');
			},
           find : function(id) {
				return $http.get('json/' + id);
			},
			store :function(data){
				return $http.post('json',data);
			}
			
		}
	});