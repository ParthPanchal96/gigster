'use strict';

angular.module('gigster', ['ngTouch','ngRoute','ngAnimate','ngCookies'])
.config(['$routeProvider', function ($routeProvider) {
	
    	$routeProvider.when('/Home', {templateUrl: 'partials/home.html'});

        $routeProvider.otherwise({redirectTo: '/Home'});

}]).directive("hideMe", function ( $animate ) {
  return function (scope, element, attrs) {
    var clickClassName = 'off';
    scope.$watch( attrs.hideMe, function (newVal) {
    
        if( element.hasClass(clickClassName) ){
            $animate.removeClass(element, clickClassName)
        } else {
      
        } 
            
    })
  }
}).directive('fileModel', function ($parse) {
    return function(scope, element, attrs) {

            var model = $parse(attrs.fileModel);
            var modelSetter = model.assign;
            element.bind('change', function(){
                scope.$apply(function(){
                    modelSetter(scope, element[0].files[0]);
                    console.log( element[0].files[0] );
                });
            });
        }
    
}).run(function( $http, $rootScope ){
    $rootScope.profile = function( housing_ass_id ){
        return $http.get(baseURL + 'profile/'+ housing_ass_id );
    }
});