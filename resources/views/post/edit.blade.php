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


			<form method="post" action="{{route('post.update',$post->id)}}" enctype="multipart/form-data">
				@csrf
				{{--not post update using method PUT--}}
				@method('PUT')
				<div class="form-group">
					<label>Title</label>
					<input type="text" name="title" class="form-control" value="{{$post->title}}">
					
				</div>
				<div class="form-group">
					<label>Contact</label>
				<input type="text" name="contact" class="form-control"value="{{$post->body}}">
				</div>
				<div class="form-group">
					<label>photo</label><span class="text-danger">[ Support file types: jpeg,png]</span>
					<input type="file" name="photo" class="form-control">
					<img src="{{asset($post->image)}}" class="img-fluid">
					<input type="hidden" name="oldphoto"value="{{$post->image}}">
				</div>
				<div class="form-group">
					<label>Category</label>
					<select name="category" class="form-control">
						{-- accept data and loop--}
					<option value="">choose category</option>
					@foreach($categories as $row)
					<option value="{{$row->id}}" 
					@if($row->id==$post->category_id){{'selected'}}@endif>{{$row->name}}</option>
					@endforeach
					</select>
					
				</div>

				<div class="form-group">
				<input type="submit" name="submit" value="update" class="btn btn-primary">
					
				</div>
				

			</form>
			
		</div>
		
	</div>
	

</div>


@endsection