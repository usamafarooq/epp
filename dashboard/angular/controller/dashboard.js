app.controller('dashboardController',  function($scope, $window, $location, $http) {   
	$http.get(api + 'admin/auth/check_login')
    .then(function(data) {
        if (data.data.success == false) {
        	$window.location.href = dashboard+'login'
        }
    });
});