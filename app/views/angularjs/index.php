<!DOCTYPE html>
<html lang="en"  ng-app="phoneBook" ng-controller="AppCtrl as vm">
<head>
	<meta charset="UTF-8">
	<title ng-bind="pageTitle"></title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Bootstrap 3.3.4 -->
	<link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

	<link href="bower_components/angular-toastr/dist/angular-toastr.min.css" rel="stylesheet" type="text/css" />

	<link href="css/app.css" rel="stylesheet" type="text/css" />

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
</head>
<body>

	<div class="container">
		<header role="header" ng-include="'js/app/views/partials/header.tpl.html'"></header>
		<main role="main">
			<div class="row">
				<div class="col-sm-9" ng-include="'js/app/views/contact-table.tpl.html'"></div>
				<div class="col-sm-3" ng-include="'js/app/views/contact-form.tpl.html'"></div>
			</div>
		</main>
		<footer role="footer" ng-include="'js/app/views/partials/footer.tpl.html'"></footer>
	</div>

	<script src="bower_components/angular/angular.min.js" type="text/javascript"></script>
	<script src="bower_components/angular-resource/angular-resource.min.js" type="text/javascript"></script>
	<script src="bower_components/angular-filter/dist/angular-filter.min.js" type="text/javascript"></script>
	<script src="bower_components/angular-toastr/dist/angular-toastr.tpls.min.js" type="text/javascript"></script>
	<script src="js/app/app.js" type="text/javascript"></script>
	<script src="js/app/controller.js" type="text/javascript"></script>
</body>
</html>