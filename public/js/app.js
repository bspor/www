var myApp = angular.module('myApp', ['mainCtrl', 'commentService']);
myApp.config(function($interpolateProvider) {
    $interpolateProvider.startSymbol('%%');
    $interpolateProvider.endSymbol('%%');
});

var eSport = angular.module('eSport', []);
eSport.config(function ($interpolateProvider) {
    $interpolateProvider.startSymbol('%%');
    $interpolateProvider.endSymbol('%%');
});

eSport.controller('BearController', function ($scope, $http, Bear) {
    // object to hold all the data for the new Bear form
    $scope.BearData = {};
    // loading variable to show the spinning loading icon
    $scope.loading = true;
    console.log('wtf mate');
    // get all the Bears first and bind it to the $scope.Bears object
    // use the function we created in our service
    // GET ALL BearS ====================================================
    Bear.get()
        .success(function (data) {
            $scope.Bears = data;
            $scope.loading = false;
            console.log('wtf mate');
        });

    // function to handle submitting the form
    // SAVE A Bear ======================================================
    $scope.submitBear = function () {
        $scope.loading = true;
        // save the Bear. pass in Bear data from the form
        // use the function we created in our service
        Bear.save($scope.BearData)
            .success(function (data) {

                // if successful, we'll need to refresh the Bear list
                Bear.get()
                    .success(function (getData) {
                        $scope.Bears = getData;
                        $scope.loading = false;
                    });

            })
            .error(function (data) {
                console.log(data);
            });
    };

    // function to handle deleting a Bear
    // DELETE A Bear ====================================================
    $scope.deleteBear = function (id) {
        $scope.loading = true;

        // use the function we created in our service
        Bear.destroy(id)
            .success(function (data) {

                // if successful, we'll need to refresh the Bear list
                Bear.get()
                    .success(function (getData) {
                        $scope.Bears = getData;
                        $scope.loading = false;
                    });

            });
    };

}).factory('Bear', function ($http) {
    console.log('wtf mate');
    return {

        // get all the Bears
        get: function () {
            return $http.get('leagueIndex');
        },

        // save a Bear (pass in Bear data)
        save: function (BearData) {
            console.log('wtf mate');
            return $http({
                method: 'POST',
                url: 'api/Bear',
                headers: {'Content-Type': 'application/x-www-form-urlencoded'},
                data: $.param(BearData)
            });
        },

        // destroy a Bear
        destroy: function (id) {
            return $http.delete('api/Bear/' + id);
        }
    }
});