/**
 * Created by Brandon on 2/14/2015.
 */
var myApp = angular.module('myApp', ["xeditable"]);
myApp.config(function ($interpolateProvider) {
    $interpolateProvider.startSymbol('%%');
    $interpolateProvider.endSymbol('%%');
});

function TeamsController($scope, $http) {

    $http.get('team/get_teams').success(function (teams) {
        $scope.teams = teams;
    });

    $scope.editTeam = function (id) {
        $http.get('team/get_team/' + id)
    };


    $scope.addTeam = function (team) {

        if (typeof team.id != 'undefined') {
            var team = {
                id: team.id,
                team_name: team.team_name,
                logo: team.logo,
                wins: team.wins,
                losses: team.losses,
                points: team.points,
                div_id: team.div_id,
                completed: false
            };
            //$scope.teams.push(team);

            console.log(team.id);
            $http.put('team/edit_team/' + team.id, team).success(function (data) {
                console.log(data);
                window.location.reload();
            });
        } else {

            var team2 = {
                team_name: team.team_name,
                team_id: $scope.teams.length +1,
                logo: team.logo,
                wins: team.wins,
                losses: team.losses,
                points: team.points,
                div_id: team.div_id,
                completed: false
            };
            console.log(team2);
            $scope.teams.push(team2);
            $http.post('team/create', team2);
        }
    };

    $scope.deleteTeam = function (id) {
        $http.delete('team/delete/' + id)
            .success(function (data) {
                console.log(data);
                // if successful, we'll need to refresh the comment list
                $http.get('team/get_teams').success(function (teams) {
                    $scope.teams = teams;
                });
                //$scope.divisions=data;
            });
    };
    $scope.addUser = function (id) {
        $scope.inserted = {
            team_name: '',
            logo: '',
            wins: '',
            losses: '',
            points: ''
        };
        $scope.teams.push($scope.inserted);
    };
}

function TeamController($scope, $http) {

    $http.get('/public/team/get_unsigned').success(function (players) {
        $scope.players = players;
    });
}

function DivisionController($scope, $http) {

    $http.get('division/get_divs').success(function (divisions) {
        $scope.divisions = divisions;
    });

    $scope.addDiv = function () {
        var div = {
            div_id: $scope.div.div_id,
            name: $scope.div.name,

            completed: false
        };
        $scope.divisions.push(div);

        $http.post('division/create', div);
    };

    $scope.deleteDivision = function (id) {
        $http.delete('division/delete/' + id)
            .success(function (data) {
                console.log(data);
                // if successful, we'll need to refresh the comment list
                $http.get('division/get_divs').success(function (divisions) {
                    $scope.divisions = divisions;
                });
                //$scope.divisions=data;

            });
    };
}

function PlayerController($scope, $http) {

    $http.get('api/players').success(function (divisions) {
        $scope.players = divisions;
    });

    $scope.$watch('lists', function (lists) {
        $scope.count = 0;
        angular.forEach(lists, function (list) {
            if (list.checked) {
                $scope.count += 1;
            }
        })
    }, true);
}