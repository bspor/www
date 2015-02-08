// public/js/services/commentService.js
angular.module('commentService', []).
	factory('Comment', function($http) {

		return {
			
			// get all the comments
			get : function() {
				return $http.get('api/comment');
			},

			// save a comment (pass in comment data)
			save : function(commentData) {
				return $http({
					method: 'POST',
					url: 'api/comment',
					headers: { 'Content-Type' : 'application/x-www-form-urlencoded' },
					data: $.param(commentData)
				});
			},

			// destroy a comment
			destroy : function(id) {
				return $http.delete('api/comment/' + id );
			}
		}
	});