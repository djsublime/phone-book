@section('content')
	<div class="row">
		<div class="page-head">
			<h1>Phone Book</h1>
		</div>
	</div>
	<div class="row">
		@if(Session::has('message'))
		<div class="alert alert-{{Session::get('message')['type']}} alert-dismissible" role="alert">
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		  <strong>{{Session::get('message')['title']}}</strong> {{Session::get('message')['content']}}
		</div>
		@endif
		<div class="col-sm-3">
			{{ Form::open(['route' => array('phone-book.save')]) }}
				<div class="form-group">
					{{ Form::label('name', 'First Name') }}
				    {{ Form::text('name',null,$attributes = ['class'=>"form-control",'required'=>'required']) }}
				     @if ($errors->has('name')) <p class="help-block bg-danger">{{ $errors->first('name') }}</p> @endif
				</div>
				<div class="form-group">
				    {{ Form::label('surname', 'Last Name') }}
				    {{ Form::text('surname',null,$attributes = ['class'=>"form-control",'required'=>'required']) }}
				     @if ($errors->has('surname')) <p class="help-block bg-danger">{{ $errors->first('surname') }}</p> @endif
				</div>
				<div class="form-group">
				    {{ Form::label('phone', 'Phone') }}
				    {{ Form::text('phone',null,$attributes = ['class'=>"form-control",'required'=>'required']) }}
				    @if ($errors->has('phone')) <p class="help-block bg-danger">{{ $errors->first('phone') }}</p> @endif

				</div>
				<div class="form-group">
				    {{ Form::label('address', 'Address') }}
				    {{ Form::text('address',null,$attributes = ['class'=>"form-control"]) }}
				</div>
				<div class="form-group">
				    {{ Form::label('comment', 'Comment') }}
				    {{ Form::textarea('comment',null,$attributes = ['class'=>"form-control"]) }}
				</div>
				<div class="form-group">
			    	{{ Form::submit('Save Contact',$attributes = ['class'=>"form-control btn btn-success"]) }}
			    </div>
			{{ Form::close() }}
		</div>
		<div class="col-sm-9">
			<table class="table">
				<thead>
					<tr>
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
					@forelse($data as $contact)
					    <tr>
					    	<td>{{ $contact->name }}</td>
					    	<td>{{ $contact->surname }}</td>
					    	<td>{{ $contact->phone }}</td>
					    	<td>{{ $contact->address }}</td>
					    	<td>{{ $contact->comment }}</td>
					    	<td>{{ $contact->updated_at }}</td>
					    	<td nowrap>
					    		{{link_to_route('phone-book.edit', 'Edit', $parameters = array($contact->id), $attributes = array('class'=>'btn btn-warning'))}}
					    		{{link_to_route('phone-book.delete', 'Delete', $parameters = array($contact->id), $attributes = array('class'=>'btn btn-danger'))}}
			    			</td>
					    </tr>
					@empty
					    <tr>
					    	<td colspan="7"><h1 class="text-center">No Data</h1></td>
					    </tr>
					@endforelse
				</tbody>
			</table>
			<span class="badge pull-right">Total records count: {{$data->getTotal()}}</span>
			{{$data->links()}}
		</div>
	</div>
@stop