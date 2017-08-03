@extends('admin.layouts.app')

@section('title','All Tags')

@section('conetent')

 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        All Categories
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('admin.home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ route('post.index') }}">Categories</a></li>
        <li class="active">All Categories</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Categories</h3>
              <a class="col-lg-offset-5 btn btn-success" href="{{ route('category.create') }}">Add New Category</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>S. No</th>
                  <th>Name</th>
                  <th>Slug</th>
                  <th>Created At</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
                </thead>
                <tbody>

                @if(empty($categories))
                <p>Sorry! no records found.</p>
                @endif

                @foreach($categories as $category)
                <tr>
                  <td>{{ $loop->index + 1 }}</td>
                  <td>{{ $category->name }}</td>
                  <td>{{ $category->slug }}</td>
                  <td>{{ $category->created_at }}</td>
                  <td><a href="{{ route('category.edit',['category' => $category->id ]) }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td> 
                  <td><a href="{{ route('category.edit',['category' => $category->id ]) }}"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td> 
                </tr>
                @endforeach
                
                </tbody>
                <tfoot>
                <tr>
                  <th>S. No</th>
                  <th>Name</th>
                  <th>Slug</th>
                  <th>Created At</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection