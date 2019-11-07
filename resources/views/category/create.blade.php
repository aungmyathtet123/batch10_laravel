@extends('template')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-lg-8 col-md-10 mx-auto my-5">
		<h1> Category Create Form</h1>

		@if ($errors->any())
		    <div class="alert alert-danger">
	        <ul>
	            @foreach ($errors->all() as $error)
	                <li>{{ $error }}</li>
	            @endforeach
	        </ul>
		    </div>
		@endif


			<form method="post" action="{{route('category.store')}}">
				@csrf
				<div class="form-group">

					<label>name</label>
					<input type="text" name="category" class="form-control">
					
				</div>
				
				<div class="form-group">
				<input type="submit" name="submit" value="save" class="btn btn-primary">
					
				</div>
				

			</form>
			
		</div>
		
	</div>
	

</div>


@endsection