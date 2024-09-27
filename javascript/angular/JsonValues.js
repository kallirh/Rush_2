var app = angular.module('app', []);

app.controller('controller', function($scope, $http) {
  $http.get('results.json')
       .then(function(res){
          $scope.results = res.data;
        });
});