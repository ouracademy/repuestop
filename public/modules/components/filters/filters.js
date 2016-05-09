angular.module('filters', [])
        .filter('startFrom', function () {
	return function (input,start) {
		if (input) {
                    start = +start;
                    return input.slice(start);
		}
		return [];
	};
});

   /*.filter('startFrom', function () {
	return function (data,start) {
		//if (input) {
                 //   start = +start;
                    return data.slice(start);
		
		//return [];
	}}*/

