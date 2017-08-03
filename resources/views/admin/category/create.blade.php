@extends('admin.layouts.app')

@section('title','MyBlog Admin Panel')

@section('conetent')

 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Create Category
      </h1>
       <ol class="breadcrumb">
        <li><a href="{{ route('admin.home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ route('post.index') }}">Categories</a></li>
        <li class="active">create category</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">

         <div class="box box-warning">
           <!-- /.box-header -->
            <div class="box-body">
              <form role="form" action="{{ route('category.store') }}" method="POST">

              {{ csrf_field() }}

              <div>
              
              @foreach($errors->all() as $error)
              {{ $error }}
              @endforeach

              @if(session()->has('success'))
              {{ session()->get('success') }}
              @endif
              
              </div>
                
              <div class="col-lg-6">
                <div class="form-group">
                  <label>Category Name</label>
                  <input type="text" name="name" value="" class="form-control" placeholder="Enter ...">
                </div>

                 <div class="form-group">
                  <label>Category Slug</label>
                  <input type="text" name="slug" value="" class="form-control" placeholder="Enter ...">
                </div>
              </div>

              <div class="col-md-12">
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{ route('category.index') }}" class="btn btn-warning">Back</a>
              </div>
              </div>
              
              </form>
            </div>
            <!-- /.box-body -->

          </div>
          
        </div>
        <!-- /.col-->
      </div>
      <!-- ./row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection