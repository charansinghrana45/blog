@extends('admin.layouts.app')

@section('title','MyBlog Admin Panel')

@section('conetent')

 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Create Post
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
              <form role="form" action="{{ route('post.store') }}" method="POST">

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
                  <label>Post Title</label>
                  <input type="text" name="title" value="" class="form-control" placeholder="Enter ...">
                </div>
                
                <div class="form-group">
                  <label>Post SubTitle</label>
                  <input type="text" name="subtitle" value="" class="form-control" placeholder="Enter ...">
                </div>

                 <div class="form-group">
                  <label>Post Slug</label>
                  <input type="text" name="slug" value="" class="form-control" placeholder="Enter ...">
                </div>
              </div>

              <div class="col-lg-6">
                <div class="form-group">
                  <label for="exampleInputFile">Post Image</label>
                  <input type="file" value="" name="image" id="exampleInputFile">
                </div>
                
                <br>
                <br>
                
                <div class="checkbox">
                  <label>
                    <input type="checkbox" checked="checked" name="status"> Publish
                  </label>
                </div>
              </div>

              <div class="col-md-12">
                 <div class="form-group">
                  <label for="exampleInputFile">Post Body</label>
                   <textarea class="textarea" name="body" value="body" placeholder="Place some text here"
                      style="width: 100%; height: 400px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                </div>

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
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