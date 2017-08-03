@extends('admin.layouts.app')

@section('title','All Posts')

@push('css')

<link rel="stylesheet" href="{{ asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">

@endpush

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

              @if(session()->has('success'))
              <div class="row col-lg-12">
              <div class="col-lg-4 col-lg-offset-2 alert alert-dismissible alert-success">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                {{ session()->get('success') }} 
              </div>
              </div>
              @endif
              
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
                  <td>
                    <form id="delete-form-{{ $post->id }}" style="display: none;" action="{{ route('post.destroy', $post->id) }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    </form>

                    <a href="{{ route('post.destroy',['post' => $post->id ]) }}" onclick="event.preventDefault(); if(confirm('Are you sure, want to delete this')) { document.getElementById('delete-form-{{ $post->id }}').submit(); } else { event.preventDefault(); }"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                  </td> 
                  </td> 
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

@push('js')

<script src="{{ asset('admin/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>

@endpush