/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


angular.directive('itemsPagination', function(){  
   return{
      restrict: 'E',
      template:'<p>hola</p>'
     /* template: '<ul class="pagination">'+
        '<li ng-show="currentPage != 1">\n\
            <a href="javascript:void(0)" ng-click="getPerPage(1)">&laquo;</a></li>'+
        '<li ng-show="currentPage != 1">\n\
            <a href="javascript:void(0)" ng-click="getPerPage(currentPage-1)">&lsaquo; Anterior</a></li>'+
        '<li ng-repeat="i in range" ng-class="{active : currentPage == i}">'+
            '<a href="javascript:void(0)" ng-click="getPerPage(i)">{{i}}</a>'+
        '</li>'+
        '<li ng-show="currentPage != totalPages">\n\
            <a href="javascript:void(0)" ng-click="getPerPage(currentPage+1)">Siguiente &rsaquo;</a></li>'+
        '<li ng-show="currentPage != totalPages">\n\
            <a href="javascript:void(0)" ng-click="getPerPage(totalPages)">&raquo;</a></li>'+
      '</ul>'*/
   };
});



