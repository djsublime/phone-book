@section('content')
@if(Session::has('message'))
<div class="alert alert-{{Session::get('message')['type']}} alert-dismissible" role="alert">
	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	<strong>{{Session::get('message')['title']}}</strong> {{Session::get('message')['content']}}
</div>
@endif
<div class="landing-box">
	<h1 class="text-center">You have arrived.<small><p>Environment: {{App::environment()}}</p></small></h1>
	<div class="content">
		<div>
		  <!-- Nav tabs -->
		  <ul class="nav nav-tabs" role="tablist">
		    <li role="presentation" class="active"><a href="#about-tab" aria-controls="about-tab" role="tab" data-toggle="tab">About</a></li>
		    <li role="presentation"><a href="#no-js" aria-controls="no-js" role="tab" data-toggle="tab">NO-JS App</a></li>
		    <li role="presentation"><a href="#rest" aria-controls="rest" role="tab" data-toggle="tab">RESTfull App</a></li>
		  </ul>

		  <!-- Tab panes -->
		  <div class="tab-content">
		    <div role="tabpanel" class="tab-pane active" id="about-tab">
		    	<p>
		    		<ul>
		    			<li>This is just an example app and is made for the purpose of job interview.</li>
		    			<li>Phone book app is based on 3 great framework Laravel 4.2 Framework , AngularJS and Twitter Boostrap</li>
		    		</ul>
    			</p>
		    	{{link_to_route('ngapp', 'Recomendent version', $parameters = array(), $attributes = array('class'=>'btn btn-success btn-block'))}}
		    </div>
		    <div role="tabpanel" class="tab-pane" id="no-js">
		    	<p>
		    		<ul>
		    			<li>Old way CRUD development without javascript</li>
		    			<li>Only for fallback and to show great Laravel framework features :) !</li>
		    		</ul>
    			</p>
    			{{link_to_route('phone-book', 'Go there', $parameters = array(), $attributes = array('class'=>'btn btn-info btn-block'))}}
		    </div>
		    <div role="tabpanel" class="tab-pane" id="rest">
		    	<p>
		    		<ul>
		    			<li>Using Laravel like RESTfull API</li>
		    			<li>Using AngularJS to create Restfull Client</li>
		    		</ul>
    			</p>
    			<h3>Responce standard: </h3>
    			<p>
    				200: The request was successful.<br />
    				201: The resource was successfully created.<br />
    				204: The request was successful, but we did not send any content back.<br />
    				400: The request failed due to an application error, such as a validation error.<br />
    				401: An API key was either not sent or invalid.<br />
    				403: The resource does not belong to the authenticated user and is forbidden.<br />
    				404: The resource was not found.<br />
    				500: A server error occurred.<br />
    			</p>
    			<h3>To do: </h3>
    			<ol>
    				<li>Filter should be new request, at the moment just filtering array on current page done with angularjs filter</li>
    			</ol>
		    	{{link_to_route('ngapp', 'Go There', $parameters = array(), $attributes = array('class'=>'btn btn-info btn-block'))}}
		    </div>
		  </div>
		</div>
	</div>
</div>
@stop