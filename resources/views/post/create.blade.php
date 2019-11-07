@extends('template')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-lg-8 col-md-10 mx-auto my-5">
		<h1> Post Create Form</h1>

		@if ($errors->any())
		    <div class="alert alert-danger">
	        <ul>
	            @foreach ($errors->all() as $error)
	                <li>{{ $error }}</li>
	            @endforeach
	        </ul>
		    </div>
		@endif


			<form method="post" action="{{route('post.store')}}" enctype="multipart/form-data">
				@csrf
				<div class="form-group">
					<label>Title</label>
					<input type="text" name="title" class="form-control">
					
				</div>
				<div class="form-group">
					<label>Contact</label>
				<input type="text" name="contact" class="form-control">
				</div>
				<div class="form-group">
					<label>photo</label><span class="text-danger">[ Support file types: jpeg,png]</span>
					<input type="file" name="photo" class="form-control">
				</div>
				<div class="form-group">
					<label>Category</label>
					<select name="category" class="form-control">
						{-- accept data and loop--}
					<option value="">choose category</option>
					@foreach($categories as $row)
					<option value="{{$row->id}}">{{$row->name}}</option>
					@endforeach
					</select>
					
				</div>

				<div class="form-group">
				<input type="submit" name="submit" value="save" class="btn btn-primary">
					
				</div>
				

			</form>
			
		</div>
		
	</div>
	

</div>


@endsection