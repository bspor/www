/**
 * Created by Brandon on 2/14/2015.
 */
var myApp = angular.module('myApp', []);
myApp.config(function($interpolateProvider) {
    $interpolateProvider.startSymbol('%%');
    $interpolateProvider.endSymbol('%%');
});

function BearsController($scope, $http) {

    $http.get('bears').success(function(bears) {
        $scope.bears = bears;
    });

    $scope.remaining = function() {
        var count = 0;

        angular.forEach($scope.bears, function(bear) {
            count += bear;
        });

        return count;
    };

    $scope.getBears = function () {
        return $scope.bears;
    };

    $scope.$watch('lists', function(lists){
        $scope.count = 0;
        angular.forEach(lists, function(list){
            if(list.checked){
                $scope.count += 1;
            }
        })
    }, true);

    $scope.addBear = function() {
        var bear = {
            name: $scope.bear.name,
            type: $scope.bear.type,
            danger_level: $scope.bear.danger_level,
            completed: false
        };

        $scope.bears.push(bear);

       $http.post('bears', bear);
    };
}

function TeamsController($scope, $http) {

    $http.get('team/get_teams').success(function(teams) {
        $scope.teams = teams;
    });

    $scope.editTeam = function(id) {
        $http.get('team/get_team/'+ id)
    };


    $scope.addTeam = function() {
        var team = {
            team_name: $scope.team.name,
            logo: $scope.team.logo,
            wins: $scope.team.wins,
            losses: $scope.team.losses,
            points: $scope.team.points,
            completed: false
        };
       $scope.teams.push(team);
        $http.post('team/create', team);
    };

}

function TeamController($scope, $http) {

    $http.get('/public/team/get_unsigned').success(function(players) {
        $scope.players = players;
    });
}

function DivisionController($scope, $http) {

    $http.get('division/get_divs').success(function(divisions) {
        $scope.divisions = divisions;
    });

    $scope.addDiv = function() {
        var div = {
            div_id: $scope.div.div_id,
            name: $scope.div.name,

            completed: false
        };
        $scope.divisions.push(div);

        $http.post('division/create', div);
    };

    $scope.deleteDivision = function(id) {
        $http.delete('division/delete/' + id )
            .success(function(data) {
console.log(data);
            // if successful, we'll need to refresh the comment list
                $http.get('division/get_divs').success(function(divisions) {
                    $scope.divisions = divisions;
                });
            //$scope.divisions=data;

        });
    };
}

function PlayerController($scope, $http) {

    $http.get('api/players').success(function(divisions) {
        $scope.players = divisions;
    });
}