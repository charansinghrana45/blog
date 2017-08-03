@extends('admin.layouts.app')

@section('title','All Posts')

@section('conetent')

 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Posts
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('admin.home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ route('post.index') }}">Posts</a></li>
        <li class="active">Posts</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Posts</h3>
              <a class="col-lg-offset-5 btn btn-success" href="{{ route('post.create') }}">Add New Post</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>S. No</th>
                  <th>Title</th>
                  <th>Sub Title</th>
                  <th>Slug</th>
                  <th>Created At</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
                </thead>
                <tbody>

                @if(empty($posts))
                <p>Sorry! no records found.</p>
                @endif

                @foreach($posts as $post)
                <tr>
                  <td>{{ $loop->index + 1 }}</td>
                  <td>{{ $post->title }}</td>
                  <td>{{ $post->subtitle }}</td>
                  <td>{{ $post->slug }}</td>
                  <td>{{ $post->created_at }}</td>
                  <td><a href="{{ route('post.edit',['post' => $post->id ]) }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td> 
                  <td><a href="{{ route('post.edit',['post' => $post->id ]) }}"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td> 
                </tr>
                @endforeach
                
                </tbody>
                <tfoot>
                <tr>
                  <th>S. No</th>
                  <th>Title</th>
                  <th>Sub Title</th>
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