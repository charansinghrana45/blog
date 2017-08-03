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
              <form role="form" action="{{ route('category.update', $category->id) }}" method="POST">

              {{ csrf_field() }}
              {{ method_field('PUT') }}
              <div>
              
              @foreach($errors->all() as $error)
              {{ $error }}
              @endforeach

             @if(session()->has('success'))
             <div class="row col-lg-12">
             <div class="col-lg-4 col-lg-offset-2 alert alert-dismissible alert-success">
               <button type="button" class="close" data-dismiss="alert">&times;</button>
               {{ session()->get('success') }} 
             </div>
             </div>
             @endif
              
              </div>
                
              <div class="col-lg-6">
                <div class="form-group">
                  <label>Category Name</label>
                  <input type="text" name="name" value="{{ $category->name }}" class="form-control" placeholder="Enter ...">
                </div>

                 <div class="form-group">
                  <label>Category Slug</label>
                  <input type="text" name="slug" value="{{ $category->slug }}" class="form-control" placeholder="Enter ...">
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