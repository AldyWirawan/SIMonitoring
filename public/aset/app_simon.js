var app = angular.module('simonApp',['ngRoute']);

app.run(function($rootScope, $http){
	$http({
		url:'login/role', 
		method:'GET'
	}).success(function (data) {
		console.log(data);
		$rootScope.role = data;
	})
});

app.service('mediator', function(){
	var mediator = window.mediator || new Mediator();
    return mediator;
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

app.factory("UserSvc", function($http){
	return{
		create: function(data){
			var req = $http({method:'POST', url:'user/create', params:data});
			return req;
		},
	}
})

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
			if(!alert("UUK "+res.status)){window.location.reload();}
		});
	}
	$scope.simpan_proyek = function(){
		$scope.is_saving = true;
		var req = ProyekSvc.create($scope.temp_proyek);
		req.success(function(res){
			$scope.is_saving = false;
			if(!alert("Proyek "+res.status)){window.location.reload();}
		});
	}
	$scope.update_proyek = function(){
		$scope.is_saving = true;
		console.log($scope.id);
		console.log($scope.temp_proyek);
		var req = ProyekSvc.update($scope.id, $scope.temp_proyek);
		req.success(function(res){
			$scope.is_saving = false;
			if(!alert("Proyek "+res.status)){window.location.reload();}
		});
	}
	$scope.delete_proyek = function(){
		var req = ProyekSvc.delete($scope.id);
		req.success(function(res){
			$scope.is_saving = false;
			alert("Proyek "+res.status);
		});
	}
	$scope.update_temp = function(selected){
		console.log(selected.id_uuk);
		$scope.temp_proyek =
		{
			id_uuk :selected.id_uuk,
			pin :selected.pin,
			tanggal_catat :selected.tanggal_catat,
			nama_pekerjaan :selected.nama_pekerjaan,
			nama_pemberi_kerja :selected.nama_pemberi_kerja,
			nama_ketua_pelaksana :selected.nama_ketua_pelaksana,
			kontrak_tanggal :selected.kontrak_tanggal,
			kontrak_nomor :selected.kontrak_nomor,
			kontrak_akhir_periode :selected.kontrak_akhir_periode,
			kontrak_nilai_euro :selected.kontrak_nilai_euro,
			kontrak_nilai_jpy :selected.kontrak_nilai_jpy,
			kontrak_nilai_dollar :selected.kontrak_nilai_dollar,
			kontrak_nilai_rupiah :selected.kontrak_nilai_rupiah,
			kontrak_nilai_total :selected.kontrak_nilai_total,
			keuangan_invoice_total :selected.keuangan_invoice_total,
			keuangan_sisa_invoice_total :selected.keuangan_sisa_invoice_total,
			keuangan_usulan_penghapusan_proyek :selected.keuangan_usulan_penghapusan_proyek,
			keuangan_total_realisasi :selected.keuangan_total_realisasi,
			keuangan_pre_financing :selected.keuangan_pre_financing,
			status_pekerjaan :selected.status_pekerjaan,
			persentase_progres_bulan_1 :selected.persentase_progres_bulan_1,
			persentase_progres_bulan_2 :selected.persentase_progres_bulan_2,
			persentase_progres_bulan_3 :selected.persentase_progres_bulan_3,
			persentase_progres_bulan_4 :selected.persentase_progres_bulan_4,
			persentase_progres_bulan_5 :selected.persentase_progres_bulan_5,
			persentase_progres_bulan_6 :selected.persentase_progres_bulan_6,
			persentase_progres_bulan_7 :selected.persentase_progres_bulan_7,
			persentase_progres_bulan_8 :selected.persentase_progres_bulan_8,
			persentase_progres_bulan_9 :selected.persentase_progres_bulan_9,
			persentase_progres_bulan_10 :selected.persentase_progres_bulan_10,
			persentase_progres_bulan_11 :selected.persentase_progres_bulan_11,
			persentase_progres_bulan_12 :selected.persentase_progres_bulan_12
		};
		$scope.id = selected.id;
	}
	
	mediator.subscribe('updatetemp', function(data){
		$scope.update_temp(data);
		$scope.$apply();
	})

	$scope.temp_proyek =
	{
		kontrak_nilai_euro:'0',
		kontrak_nilai_jpy:'0',
		kontrak_nilai_dollar:'0',
		kontrak_nilai_rupiah:'0',
		kontrak_nilai_total:'0',
		keuangan_invoice_total:'0',
		keuangan_sisa_invoice_total:'0',
		keuangan_usulan_penghapusan_proyek:'0',
		keuangan_total_realisasi:'0',
		keuangan_pre_financing:'0',
		persentase_progres_bulan_1:'0',
		persentase_progres_bulan_2:'0',
		persentase_progres_bulan_3:'0',
		persentase_progres_bulan_4:'0',
		persentase_progres_bulan_5:'0',
		persentase_progres_bulan_6:'0',
		persentase_progres_bulan_7:'0',
		persentase_progres_bulan_8:'0',
		persentase_progres_bulan_9:'0',
		persentase_progres_bulan_10:'0',
		persentase_progres_bulan_11:'0',
		persentase_progres_bulan_12:'0'
	};

	$scope.get_proyeks();
	$scope.get_UUKs();
})

app.controller('UUKCtrl', function($scope, UUKSvc){
	$scope.simpan_UUK = function(){
		$scope.is_saving = true;
		var req = UUKSvc.create($scope.temp_UUK);
		req.success(function(res){
			$scope.is_saving = false;
			if(!alert("UUK "+res.status)){window.location.reload();}
		});
	}
	$scope.update_UUK = function(){
		$scope.is_saving = true;
		console.log($scope.id);
		console.log($scope.temp_UUK);
		var req = UUKSvc.update($scope.id, $scope.temp_UUK);
		req.success(function(res){
			$scope.is_saving = false;
			if(!alert("UUK "+res.status)){window.location.reload();}
		});
	}
	$scope.update_tempUUK = function(selected){
		$scope.temp_UUK =
		{
			id :selected.id,
			nama_uuk :selected.nama_uuk,
			waktu_didirikan :selected.waktu_didirikan,
			kepemilikan_ITB :selected.kepemilikan_ITB,
			penjabat :selected.penjabat,
			alamat :selected.alamat
		};
		$scope.id = selected.id;
	}

	mediator.subscribe('updatetempUUK', function(data){
		$scope.update_tempUUK(data);
		$scope.$apply();
	})
})

app.controller('ManageAkunCtrl', function($scope, UUKSvc, UserSvc) {
	$scope.get_UUKs = function(){
		var req = UUKSvc.all();
		req.success(function(res){
			$scope.UUKs = res;
		});
	}
	$scope.tambah_user = function(){
		$scope.is_saving = true;
		var req = UserSvc.create($scope.temp_user);
		req.success(function(res){
			$scope.is_saving = false;
			if(!alert("User "+res.status)){window.location.reload();}
		});
	}
	$scope.get_UUKs();
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
		controller:'UUKCtrl',
		resolve: {
			factory: checkRouting
		}
	});
	$routeProvider.when('/lappro',{
		templateUrl:'aset/simon/pages/lappro.html',
		controller:'ProyekCtrl'
	});
	$routeProvider.when('/manageakun',{
		templateUrl:'aset/simon/pages/manageakun.html',
		controller:'ManageAkunCtrl',
		resolve: {
			factory: checkRouting
		}
	});
	$routeProvider.when('/tambah_proyek', {
		templateUrl:'aset/simon/pages/tambah_proyek.html',
		controller:'ProyekCtrl'
	});
	$routeProvider.when('/tambah_UUK', {
		templateUrl:'aset/simon/pages/tambah_UUK.html',
		controller:'UUKCtrl',
		resolve: {
			factory: checkRouting
		}
	});
});

var checkRouting = function ($q, $rootScope, $location) {
    if ($rootScope.role == "admin") {
        return true;
    } else {
    	alert("you are not allowed to access this feature!");
        var deferred = $q.defer();
        deferred.reject();
        return deferred.promise;
    }
};