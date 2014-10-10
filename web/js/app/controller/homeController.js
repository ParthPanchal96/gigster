
function homeController($rootScope,$scope, $location, $http, $routeParams,$cookieStore) {
	  if($cookieStore.get('islogin')==false){
            $cookieStore.put('islogin',false);
            $scope.islogin = false;
          }
	
	
}


  