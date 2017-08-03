@extends('admin.layouts.app')

@section('title','MyBlog Admin Panel')

@section('conetent')

 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Tag
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">Editors</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">

         <div class="box box-warning">
           <!-- /.box-header -->
            <div class="box-body">
              <form role="form" action="{{ route('tag.update', $tag->id ) }}" method="POST">

              {{ csrf_field() }}

              {{ method_field('put') }}

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
                  <label>Tag Name</label>
                  <input type="text" name="name" value="{{ $tag->name }}" class="form-control" placeholder="Enter ...">
                </div>

                 <div class="form-group">
                  <label>Tag Slug</label>
                  <input type="text" name="slug" value="{{ $tag->slug }}" class="form-control" placeholder="Enter ...">
                </div>
              </div>

              <div class="col-md-12">
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{ route('tag.index') }}" class="btn btn-warning">Back</a>
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