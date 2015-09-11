@section('content')
	<div class="row">
		<div class="page-head">
			<h1>Phone Book | Edit Contact</h1>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12">

				{{ Form::model($contact, ['route' => array('phone-book.update',$contact->id)]) }}
					<div class="form-group">
						{{ Form::label('name', 'First Name') }}
					    {{ Form::text('name',null,$attributes = ['class'=>"form-control"]) }}
					    @if ($errors->has('name')) <p class="help-block bg-danger">{{ $errors->first('name') }}</p> @endif
					</div>
					<div class="form-group">
					    {{ Form::label('surname', 'Last Name') }}
					    {{ Form::text('surname',null,$attributes = ['class'=>"form-control"]) }}
					    @if ($errors->has('surname')) <p class="help-block bg-danger">{{ $errors->first('surname') }}</p> @endif
					</div>
					<div class="form-group">
					    {{ Form::label('phone', 'Phone') }}
					    {{ Form::text('phone',null,$attributes = ['class'=>"form-control"]) }}
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
				    	{{ Form::submit('Update Contact',$attributes = ['class'=>"form-control btn btn-success"]) }}
				    </div>
				{{ Form::close() }}
		</div>
	</div>
@stop