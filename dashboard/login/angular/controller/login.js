app.controller('loginController',  function($scope, $window, $location, $http) {   
	$scope.postForm = function() {                
        $http({
            method: 'POST',
            url: api + 'admin/auth/',
            data: {
                email: $scope.email,
                password: $scope.password,
            },
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        })
        .success(function(data) {
            if ( data.success == 'true') {
                $window.location.href = dashboard;
            } 
            else {
                $scope.errorMsg = data.msg;
            }
        })            
    }
});