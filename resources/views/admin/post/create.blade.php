@extends('admin.layouts.app')

@section('title','MyBlog Admin Panel')

@push('css')

<link rel="stylesheet" href="{{ asset('admin/bower_components/select2/dist/css/select2.min.css') }}">

@endpush

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

                <div class="form-group">
                  <label>Select Category</label>
                  <select class="form-control select2"  name="categories[]" multiple="multiple" data-placeholder="Select a Category"
                          style="width: 100%;">
                   @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                   @endforeach
                   </select>
                </div>

                <div class="form-group">
                  <label>Select Tag</label>
                  <select class="form-control select2"  name="tags[]" multiple="multiple" data-placeholder="Select a tag"
                          style="width: 100%;">
                   @foreach($tags as $tag)
                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                   @endforeach
                   </select>
                </div>
                
                <br>
                <br>
                
                <div class="checkbox">
                  <label>
                    <input type="checkbox" name="status"> Publish
                  </label>
                </div>
              </div>

              <div class="col-md-12">
                 <div class="form-group">
                  <label for="exampleInputFile">Post Body</label>
                   <textarea class="textarea" id="editor1" name="body" value="body" placeholder="Place some text here"
                      style="width: 100%; height: 400px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                   </textarea>
                </div>

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{ route('post.index') }}" class="btn btn-warning">Back</a>
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

@push('js')

<script src="{{ asset('admin/bower_components/select2/dist/js/select2.full.min.js') }}"></script>

<script src="{{ asset('admin//bower_components/ckeditor/ckeditor.js') }}"></script>

<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1')
    //bootstrap WYSIHTML5 - text editor
    //$('.textarea').wysihtml5()
  })
</script>

@endpush