<!DOCTYPE html>

<html>
<head>
	<title>BPUDL</title>

	<!-- css bootstrap -->
	<link rel="stylesheet" type="text/css" href="aset/css/my-style.css">
	<link rel="stylesheet" type="text/css" href="aset/bootstrap/css/bootstrap.min.css">

	<!-- css datatables -->
	<link rel="stylesheet" type="text/css" href="aset/css/dataTables.min.css"/>

	<!-- css editor -->
	<!--
	<link rel="stylesheet" type="text/css" href="aset/css/editor.bootstrap.css">
	<link rel="stylesheet" type="text/css" href="aset/css/editor.bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="aset/css/editor.dataTables.css">
	<link rel="stylesheet" type="text/css" href="aset/css/editor.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="aset/css/editor.foundation.css">
	<link rel="stylesheet" type="text/css" href="aset/css/editor.foundation.min.css">
	<link rel="stylesheet" type="text/css" href="aset/css/editor.jqueryui.css">
	<link rel="stylesheet" type="text/css" href="aset/css/editor.jqueryui.min.css">
	-->

	<!-- js bootstrap + angular -->
	<script src="aset/js/jquery-2.1.3.min.js"></script>
	<script src="aset/bootstrap/js/bootstrap.min.js"></script>
	<script src="aset/js/angular.js"></script>
	<script src="aset/js/angular-route.js"></script>

	<!-- js highcharts + datatables -->
	<script src="aset/js/highcharts.js"></script>
	<script type="text/javascript" src="aset/js/dataTables.min.js"></script>

	<!-- js mediator -->
	<script src="aset/js/mediator.min.js"></script>

	<!-- js editor -->
	<!--
	<script src="aset/js/editor.bootstrap.js"></script>
	<script src="aset/js/editor.bootstrap.min.js"></script>
	<script src="aset/js/editor.foundation.js"></script>
	<script src="aset/js/editor.foundation.min.js"></script>
	<script src="aset/js/editor.jqueryui.js"></script>
	<script src="aset/js/editor.jqueryui.min.js"></script>
	-->

	<script src="aset/app_simon.js"></script>

</head>

<body ng-app="simonApp">
	<!-- navbar -->
	<nav class="navbar navbar-inverse" ng-controller="NavController">
		<div class="container-fluid">
	    <!-- Brand and toggle get grouped for better mobile display -->
		    <div class="navbar-header">
		      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
		      <a class="navbar-brand" href="#" ng-click="halaman='beranda'">SI Monitoring</a>
		    </div>

		    <!-- Collect the nav links, forms, and other content for toggling -->
		    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			    <ul class="nav navbar-nav">
			    	<li class="{{(halaman=='beranda')?'active':''}}"><a href="#" ng-click="halaman='beranda'">Beranda</a></li>
			        <li ng-show="role == 'admin'" class="{{(halaman=='UUK')?'active':''}}"><a href="#/UUK" ng-click="halaman='UUK'">UUK</a></li>
			        <li class="{{(halaman=='lappro')?'active':''}}"><a href="#/lappro" ng-click="halaman='lappro'">Laporan Proyek</a></li>
			        <li ng-show="role == 'admin'" class="{{(halaman=='manageakun')?'active':''}}"><a href="#/manageakun" ng-click="halaman='manageakun'">Pengaturan Akun</a></li>
			    </ul>

			    <ul class="nav navbar-nav navbar-right">
			        <li class="dropdown">
			        	<a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span style="margin-right: 10px" class="glyphicon glyphicon-user"></span> <?php echo Auth::user()->email ?> <span class="caret"></span></a>
				        <ul class="dropdown-menu" role="menu">
							<li><a href='/#' id="ubahpass" data-toggle="modal" data-target="#editPass">Edit Akun</a></li>
							<li><a href='auth/logout'>Logout</a></li>
						</ul>
			        </li>
			    </ul>
		    </div><!-- /.navbar-collapse -->
	  	</div><!-- /.container-fluid -->
	</nav>
	<div class="container" ng-view>
	</div>

	<!-- Modal -->
	<div id="editPass" class="modal fade" role="dialog">
	  <div class="modal-dialog">

	    <!-- Modal content-->
	    <div class="modal-content">

	      <div class="modal-header">
		   	<button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title">Edit Akun</h4>
	      </div>

	      <div class="modal-body">

	    <form class="form-horizontal" action="user/editPass" method="post">
				<div class="form-group">
					<label class="control-label col-md-2">Nama</label>
					<div class="col-md-10">
						<input type="text" name="name" value=<?php echo Auth::user()->name?> class="form-control">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-2">Email</label>
					<div class="col-md-10">
						<input type="email" name="email" value=<?php echo Auth::user()->email?> class="form-control">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-2">Password Baru</label>
					<div class="col-md-10">
						<input id="password1" type="password" name="pass" class="form-control">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-2">Konfirmasi Password</label>
					<div class="col-md-10">
						<input id="password2" type="password" name="confirm" class="form-control">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-2"></label>
					<div class="col-md-10">
						<input type="submit" class="btn btn-success" value="Simpan">
					</div>
				</div>
			</form>

	      </div>

      	  <div class="modal-footer">
        	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      	  </div>

	    </div>
      </div>
    </div>

<script type="text/javascript">
		window.onload = function () {
			document.getElementById("password1").onchange = validatePassword;
			document.getElementById("password2").onchange = validatePassword;
		}
		function validatePassword(){
			var pass2=document.getElementById("password2").value;
			var pass1=document.getElementById("password1").value;
			if(pass1!=pass2)
				document.getElementById("password2").setCustomValidity("Passwords Don't Match");
			else
				document.getElementById("password2").setCustomValidity('');
			//empty string means no validation error
		}
</script>

</body>
</html>
