(function() {
    "use strict";
    var app = angular.module("phApp", [], function($routeProvider, $locationProvider) {

        $routeProvider.when("/", {
            templateUrl: '../plantillas/6.php'
        });

        $routeProvider.when("/indexjquerytabs1-page-2", {
            templateUrl: '../plantillas/2.php'
        });

        $routeProvider.when("/indexjquerytabs1-page-3", {
            templateUrl: '../plantillas/3.php'
        });

        $routeProvider.when("/indexjquerytabs1-page-4", {
            templateUrl: '../plantillas/4.php'
        });

        $routeProvider.when("/indexjquerytabs1-page-5", {
            templateUrl: '../plantillas/5.php'
        });

        $routeProvider.when("/indexjquerytabs1-page-6", {
            templateUrl: '../plantillas/6.php'
        });

        $routeProvider.when("/indexjquerytabs1-page-7", {
            templateUrl: '../plantillas/7.php'
        });

        $locationProvider.html5Mode(false);
    });

    app.controller("phAppCtrl", [ "$scope", "$route", "$routeParams", "$location", function($scope, $route, $routeParams, $location) {

        $scope.$route = $route;
        $scope.$location = $location;
        $scope.$routeParams = $routeParams;
        $scope.numberError = false;

        $scope.menu_movil = function () {
            $('.espere').removeClass('hidden');
        }

        $scope.circleArea = function() {
            return Math.PI * Math.pow($scope.number, 2);
        };

        $scope.circlePerimeter = function() {
            return 2 * Math.PI * $scope.number;
        };

        $scope.$watch("number", function(newValue, oldValue) {
            if (newValue === undefined) return;

            if (isNaN(newValue)) {
                $scope.numberError = true;
            } else {
                $scope.numberError = false;
            }
        });
    }]);

    app.controller("hpAppCtrl6", ["$scope", "$http", "$timeout", function ($scope, $http, $timeout) {
        $('.espere').addClass('hidden');
        
        $timeout(function(){$('.alert').fadeOut('slow')}, 8000);
        var url = "../php/";

    }]);

}());
