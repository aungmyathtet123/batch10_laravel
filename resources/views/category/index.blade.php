@extends('template')
@section('content')

<div class="container m-xl-5">

    <div class="row">

      <!-- Blog Entries Column -->
      <div class="col-md-8">

        <h1 class="my-4">Page Heading
          <small>Secondary Text</small>
        </h1>




        <!-- Search Widget -->
        <div class="card my-4">
          <h5 class="card-header">Search</h5>
          
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Search for...">
              <span class="input-group-btn">
                <button class="btn btn-secondary" type="button">Go!</button>
              </span>
            </div>
          
        </div>

        
        
        <div class="card mb-4">
          
          <div class="card-body">
        
        <table class="table table-striped table-responsive-md btn-table" >
          <thead>
            <tr>
              <th>No</th>
              <th>Name</th>
              <th colspan="2" class="text-center">Action</th>
              
            </tr>
          </thead>
          <tbody>
            @foreach($categories as $row)
            <tr>
              <td>{{$row->id}}</td>
              <td>{{$row->name}}</td>
              <td>
                  <a href="{{route('category.edit',$row->id)}}" class="btn btn-primary">Edit</a>
              </td>
              <td>
                <form action="{{route('category.destroy',$row->id)}}" method="post">
                @csrf
                @method('DELETE')
                <input type="submit" class="btn btn-dark" value="Delete">
                </form>
              </td>
            </tr>
             @endforeach
          </tbody>
          
        </table>
      </div>

        <!-- Pagination -->
        <ul class="pagination justify-content-center mb-4 m-xl-5">
          <li class="page-item">
            <a class="page-link" href="#">&larr; Older</a>
          </li>
          <li class="page-item disabled">
            <a class="page-link" href="#">Newer &rarr;</a>
          </li>
        </ul>

      </div>
        <div class="card my-4">
          <h5 class="card-header">Categories</h5>
          <div class="card-body">
            <div class="row">
              <div class="col-lg-6">
                <ul class="list-unstyled mb-0">
                  <li>
                    <a href="#">Web Design</a>
                  </li>
                  <li>
                    <a href="#">HTML</a>
                  </li>
                  <li>
                    <a href="#">Freebies</a>
                  </li>
                </ul>
              </div>
              <div class="col-lg-6">
                <ul class="list-unstyled mb-0">
                  <li>
                    <a href="#">JavaScript</a>
                  </li>
                  <li>
                    <a href="#">CSS</a>
                  </li>
                  <li>
                    <a href="#">Tutorials</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>

        <!-- Side Widget -->
        <div class="card my-4">
          <h5 class="card-header">Side Widget</h5>
          <div class="card-body">
            You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
          </div>
        </div>

      </div>

    </div>
    <!-- /.row -->

  </div>




@endsection