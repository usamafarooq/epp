app.controller('loginController',  function($scope, $window, $location, $http) {   
	$scope.loginForm = function() {                
        $http({
            method: 'POST',
            url: api + 'admin/home/',
            data: {
                email: $scope.email,
                password: $scope.password,
            },
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        })
        .then(function(data) {
            if ( data.data.success == true) {
                $window.location.href = dashboard;
            } 
            else {
                $scope.errorMsg = data.msg;
            }
        })            
    }
});