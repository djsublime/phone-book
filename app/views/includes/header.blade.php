<nav class="navbar navbar-default">
	<div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#">Phone Book Web App</a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
				<li><a href="{{url('/')}}">Home</a></li>
				<li><a href="{{route('phone-book', null)}}">NO-JS app<span class="sr-only">(current)</span></a></li>
				<li><a href="{{route('ngapp', null)}}">RESTfull app<span class="sr-only">(current)</span></a></li>
			</ul> 
			<a href="https://github.com/djsublime/phone-book" target="_blank" class="btn btn-danger navbar-btn pull-right">
				Github
			</a>
		</div><!-- /.navbar-collapse -->
	</div><!-- /.container-fluid -->
</nav>