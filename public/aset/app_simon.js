var app = angular.module('simonApp',['ngRoute']);
 
app.run(function(){

});

app.factory("ProyekSvc", function($http){
	return{
		all: function(){
			var req = $http({method:'GET', url:'proyek'});
			return req;
		},
		create: function(data){
			var req = $http({method:'GET', url:'proyek/create', params:data});
			return req;
		},
		get: function(id){
			var req = $http.get('proyek/'+id);
			return req;
		},
		update: function(id, data){
			var req = $http.put('proyek/'+id, data);
			return req;
		},
		delete: function(id){
			var req = $http.delete('proyek/'+id);
			return req;
		}
	}
})

app.controller('NavController', function($scope){
	$scope.halaman = "beranda";
});
 
//This will handle all of our routing
app.config(function($routeProvider, $locationProvider){	
	$routeProvider.when('/',{
		templateUrl:'aset/simon/pages/beranda.html'
	});
	$routeProvider.when('/UUK',{
		templateUrl:'aset/simon/pages/UUK.html',
	});
	$routeProvider.when('/lappro',{
		templateUrl:'aset/simon/pages/lappro.html',
	});
});

