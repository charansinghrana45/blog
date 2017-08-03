@extends('admin.layouts.app')

@section('title','All Tags')

@push('css')

<link rel="stylesheet" href="{{ asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">

@endpush


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
                  <th>Name</th>
                  <th>Slug</th>
                  <th>Created At</th>
                  <th >Edit</th>
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
                  <td>
                    <form id="delete-form-{{ $category->id }}" style="display: none;" action="{{ route('category.destroy', $category->id) }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    </form>

                    <a href="{{ route('category.destroy',['category' => $category->id ]) }}" onclick="event.preventDefault(); if(confirm('Are you sure, want to delete this')) { document.getElementById('delete-form-{{ $category->id }}').submit(); } else { event.preventDefault(); }"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                  </td> 
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

@push('js')

<script src="{{ asset('admin/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>

@endpush