app.controller('dashboardController',  function($scope, $window, $location, $http) {   
	$http.get(api + 'admin/auth/check_login')
    .success(function(data) {
        console.log(data);
    });
});