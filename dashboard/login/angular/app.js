var app = angular.module('loginApp', ['ngRoute']);
var l = window.location;
var base_url = l.protocol + "//" + l.host + "/" + l.pathname.split('/')[1];
var url = base_url;
var frontend = base_url;
var dashboard = base_url + '/dashboard/';
var api = base_url + '/api/';
app.config(['$routeProvider', function($routeProvider) {
    $routeProvider
    .when("/", {
        templateUrl : "pages/login.html",
        controller : 'loginController'
    });
}]);