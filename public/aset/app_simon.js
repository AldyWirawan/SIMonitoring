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

app.factory("UUKSvc", function($http){
	return{
		all: function(){
			var req = $http({method:'GET', url:'uuk'});
			return req;
		},
		create: function(data){
			var req = $http({method:'GET', url:'uuk/create', params:data});
			return req;
		},
		get: function(id){
			var req = $http.get('uuk/'+id);
			return req;
		},
		update: function(id, data){
			var req = $http.put('uuk/'+id, data);
			return req;
		},
		delete: function(id){
			var req = $http.delete('uuk/'+id);
			return req;
		}
	}
})

app.factory("ProyekDashboardSvc", function($http){
	return{
		all: function(){
			var req = $http({method:'GET', url:'proyekDashboard'});
			return req;
		}
	}
})

/*
app.factory("UploadSvc", function($http){
	return{
		all: function(){
			var req = $http({method:'GET', url:'proyek/upload'});
			return req;
		}
	}
})
*/

app.controller('ProyekCtrl', function($scope, ProyekSvc, UUKSvc){
	$scope.get_proyeks = function(){
		var req = ProyekSvc.all();
		req.success(function(res){
			$scope.proyeks = res;
		});
	}
	$scope.get_UUKs = function(){
		var req = UUKSvc.all();
		req.success(function(res){
			$scope.UUKs = res;
		});
	}
	$scope.simpan_UUK = function(){
		$scope.is_saving = true;
		var req = UUKSvc.create($scope.temp_UUK);
		req.success(function(res){
			$scope.is_saving = false;
			alert("UUK "+res.status);
		});
		$location.path('/UUK');
	}
	$scope.simpan_proyek = function(){
		$scope.is_saving = true;
		var req = ProyekSvc.create($scope.temp_proyek);
		req.success(function(res){
			$scope.is_saving = false;
			alert("Proyek "+res.status);
		});
		$location.path('/Proyek');
	}

	$scope.get_proyeks();
	$scope.get_UUKs();
})

app.controller('UUKCtrl', function($scope, UUKSvc){
	$scope.simpan_UUK = function(){
		$scope.is_saving = true;
		var req = UUKSvc.create($scope.temp_UUK);
		req.success(function(res){
			$scope.is_saving = false;
			alert("UUK "+res.status);
		});
		$location.path('/UUK');
	}
})

app.controller('DashboardCtrl', function($scope, ProyekDashboardSvc){
	var getProyekDashboard = ProyekDashboardSvc.all();
	getProyekDashboard.success(function(response){
		$scope.proyeks = response;
	});
})

/*
app.controller('UploadCtrl'), function($scope, UploadSvc){
	var getFile = UploadSvc.all();
	getFile.success(function(response){
		$scope.file = response;
	})

	$scope.getFile();
}
*/

app.controller('NavController', function($scope){
	$scope.halaman = "beranda";
});
 
//This will handle all of our routing
app.config(function($routeProvider, $locationProvider){	
	$routeProvider.when('/',{
		templateUrl:'aset/simon/pages/beranda.html',
		controller:'DashboardCtrl'
	});
	$routeProvider.when('/UUK',{
		templateUrl:'aset/simon/pages/UUK.html'
	});
	$routeProvider.when('/lappro',{
		templateUrl:'aset/simon/pages/lappro.html'
	});
	/*
	$routeProvider.when('/lappro/upload',{
		controller:'UploadCtrl'
	});
	*/
	$routeProvider.when('/tambah_proyek', {
		templateUrl:'aset/simon/pages/tambah_proyek.html',
		controller:'ProyekCtrl'
	});
	$routeProvider.when('/tambah_UUK', {
		templateUrl:'aset/simon/pages/tambah_UUK.html',
		controller:'UUKCtrl'
	});
});

