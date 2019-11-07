@extends('template')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-lg-8 col-md-10 mx-auto my-5">
		<h1> Post Edit Form</h1>

		@if ($errors->any())
		    <div class="alert alert-danger">
	        <ul>
	            @foreach ($errors->all() as $error)
	                <li>{{ $error }}</li>
	            @endforeach
	        </ul>
		    </div>
		@endif


			<form method="post" action="{{route('category.update',$category->id)}}" enctype="multipart/form-data">
				@csrf
				{{--not post update using method PUT--}}
				@method('PUT')
				<div class="form-group">
					<label>name</label>
					<input type="text" name="name" class="form-control" value="{{$category->name}}">
					
				</div>
				
				
				
				<div class="form-group">
				<input type="submit" name="submit" value="update" class="btn btn-primary">
					
				</div>
				

			</form>
			
		</div>
		
	</div>
	

</div>


@endsection