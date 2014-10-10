function commonController($rootScope,$scope, $location, $http, $routeParams,$cookieStore) {
	$scope.subMenu = function() {
            if($cookieStore.get('islogin')==true){
                 return 'partials/subMenu.html';
            } 
    }   	
}
