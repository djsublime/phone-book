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
				<div class="col-sm-9">
					<div class="panel panel-default phone-book">
						<div class="panel-heading clearfix">
							<form class="form-inline">
								<div class="form-group">
									<input type="text" class="form-control" name="name" value="" placeholder="first name">
									<input type="text" class="form-control" name="surname" value="" placeholder="last name">
									<input type="text" class="form-control" name="phone" value="" placeholder="phone">
									<input type="submit" class="form-control" name="filter" value="filter">
								</div>
								<div class="form-group pull-right">
									<a href class="btn btn-primary">reset</a>
								</div>
							</form>
						</div>
						<div class="panel-body">
							<table class="table table-striped">
								<thead>
									<tr>
										<th>#</th>
										<th nowrap>First Name</th>
										<th nowrap>Last Name</th>
										<th nowrap>Phone</th>
										<th nowrap>Address</th>
										<th nowrap>Comments</th>
										<th nowrap>Updated</th>
										<th nowrap>Action</th>
									</tr>
								</thead>
								<tbody>
									<tr ng-repeat="(key,contact) in vm.colection.data">
										<td ng-bind="(vm.colection.from + key)"></td>
										<td ng-bind="contact.name"></td>
										<td ng-bind="contact.surname"></td>
										<td ng-bind="contact.phone"></td>
										<td ng-bind="contact.address"></td>
										<td ng-bind="contact.comment"></td>
										<td ng-bind="contact.updated_at"></td>
										<td nowrap="">
											<a href class="btn btn-warning btn-sm">
												<span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
											</a>
											<a href class="btn btn-danger btn-sm">
												<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
											</a>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
						<div class="panel-footer clearfix">
							<form class="pull-left form-inline">
								<div class="form-group">
									<label >Per page: </label>
					  				<select ng-model="vm.paginateSet.per_page" ng-change="vm.paginateFn(1,vm.paginateSet.per_page)" class="form-control input-sm">
						  				<option ng-repeat="sopt in [5,10,15,20,50]" value="{{sopt}}" ng-selected="vm.paginateSet.per_page == sopt" ng-bind="sopt"></option>
					  				</select>
								</div>
								<div class="form-group">
									<span ng-bind-template="Total: {{vm.colection.total}}" class=""></span>
								</div>
							</form>
							<ul class="pagination pull-right">
							  <li 
							  	ng-class="{'active':(i === vm.colection.current_page)}" 
						  		ng-if="i !== 0" 
						  		ng-repeat="i in [] | range: vm.colection.last_page"><a href ng-click="vm.paginateFn(i,vm.paginateSet.per_page)" ng-bind="i"></a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-sm-3">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title text-center text-uppercase">Add new contact</h3>
						</div>
						<div class="panel-body">
							<form ng-submit accept-charset="UTF-8">
								<div class="form-group has-success">
									<label for="name">First Name</label>
									<input class="form-control input-sm" required="required" name="name" type="text" id="name">
									<p class="help-block" ng-bind=""></p>
								</div>
								<div class="form-group has-error">
									<label for="surname">Last Name</label>
									<input class="form-control input-sm" required="required" name="surname" type="text" id="surname">
									<p class="help-block" ng-bind=""></p>
								</div>
								<div class="form-group">
									<label for="phone">Phone</label>
									<input class="form-control input-sm" required="required" name="phone" type="text" id="phone">
									<p class="help-block" ng-bind=""></p>								
								</div>
								<div class="form-group">
									<label for="address">Address</label>
									<input class="form-control input-sm" name="address" type="text" id="address">
								</div>
								<div class="form-group">
									<label for="comment">Comment</label>
									<textarea class="form-control input-sm" name="comment" cols="50" rows="10" id="comment"></textarea>
								</div>
								<div class="form-group">
									<input class="form-control input-sm btn btn-success" type="submit" value="Save Contact">
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</main>
		<footer role="footer" ng-include="'js/app/views/partials/footer.tpl.html'"></footer>
	</div>

	<script src="bower_components/angular/angular.min.js" type="text/javascript"></script>
	<script src="bower_components/angular-resource/angular-resource.min.js" type="text/javascript"></script>
	<script src="bower_components/angular-filter/dist/angular-filter.min.js" type="text/javascript"></script>
	<script src="bower_components/angular-toastr/dist/angular-toastr.tpls.min.js" type="text/javascript"></script>
	<script src="js/app/app.js" type="text/javascript"></script>
</body>
</html>
