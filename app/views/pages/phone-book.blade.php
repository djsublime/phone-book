@section('content')
	<div class="page-head">
		<h1>Phone Book</h1>
	</div>
	<table class="table">
		<thead>
			<tr>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Phone</th>
				<th>Address</th>
				<th>Comments</th>
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
			    </tr>
			@empty
			    <tr>
			    	<td colspan="6"><h1 class="text-center">No Data</h1></td>
			    </tr>
			@endforelse
		</tbody>
	</table>
	{{$data->links()}}
@stop