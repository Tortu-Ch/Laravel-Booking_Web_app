@extends('layouts.adminlayout')
@section('meta')
@parent
<title>@if(isset($media))
   Edit Media
   @else
   Add Media
   @endif
   :: Music Made Easy 
</title>
@endsection
    @section('css')
    @parent
        <link rel="stylesheet" href="{{ asset('admin/css/select2.min.css') }}">
    @endsection
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
   <h1>
      &nbsp;
   </h1>
   <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">
        @if(isset($media))
          Edit Media
        @else
          Add Media
        @endif 
      </li>
   </ol>
</section>
<!-- Main content -->
<section class="content">
   <div class="row">
      <div class="col-md-12">
         <div class="box box-primary">
            <div class="box-header with-border">
               <h3 class="box-title">
                  @if(isset($media))
                    Edit Media
                  @else
                    Add Media
                  @endif
               </h3>
            </div>
            <div style="padding: 20px 20px;">
               @include('errors.error_notification')
               @if(isset($media))
                  {{ Form::model($media, ['route' => ['media.update', $media->id], 'method'=>'PUT', 'class'=>'form-horizontal role','id'=>'media_form','files'=>true]) }}
               @else
                  {{ Form::open(['url'=>'admin/media', 'method'=>'POST', 'class'=>'form-horizontal role','id'=>'media_form','files'=>true]) }}
               @endif

               <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="media_type"> Media Type<span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                           {{ Form::radio('media_type', 1, true) }} <label>Video</label> &nbsp;&nbsp; &nbsp;
                           {{ Form::radio('media_type', 2) }} <label>Pdf</label>
                  </div>
               </div>

               <div class="item form-group pdf_div">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="media_type"> Upload Pdf<span class="required">*</span>
                  </label>
                   <div class="col-md-6 col-sm-6 col-xs-12">
                           {{ Form::file('pdffile', ['id'=>'pdffile','accept'=>'application/pdf']) }}
                  </div>
               </div>

                 <div class="video_div">
                 <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="youtubelink"> Youtube Link<span class="required">*</span>
                    </label>
                     <div class="col-md-6 col-sm-6 col-xs-12">
                          {{ Form::text('youtubelink', null, ['class' => 'form-control','placeholder'=>'youtubelink','id'=>'youtubelink']) }}
                    </div>
                 </div>
                 <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="video_image"> Upload Image for Video<span class="required">*</span>
                    </label>
                     <div class="col-md-6 col-sm-6 col-xs-12">
                             {{ Form::file('video_image', ['placeholder'=>'Image','id'=>'image','accept'=>'image/*']) }}
                    </div>
                 </div>
                </div>

                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title"> Title<span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                           {{ Form::text('title', null, ['class' => 'form-control col-md-7 col-xs-12','placeholder'=>'Media Title','id'=>'title']) }}
                        
                  </div>
               </div>
               <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Description"> Description
                  </label>
                   <div class="col-md-6 col-sm-6 col-xs-12">
                    {{ Form::textarea('description', null, ['class' => 'form-control col-md-7 col-xs-12','placeholder'=>'description','id'=>'page_desc']) }}
                  </div>
               </div>

               <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="genre"> Genre<span class="required">*</span>
                  </label>
                   <div class="col-md-6 col-sm-6 col-xs-12">
                           {{ Form::select('genre_id', $genre, null, ['class' => 'form-control','id' => 'genre_id']) }}
                  </div>
               </div>
          
               
               <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="song"> Song<span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                           {{ Form::select('song_id', $songs, null, ['class' => 'form-control','id' => 'song_id']) }}
                  </div>
               </div>
               <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="author"> Author<span class="required">*</span>
                  </label> <div class="col-md-6 col-sm-6 col-xs-12">
                           {{ Form::select('author_id', $artists, null, ['class' => 'form-control','id' => 'author_id']) }}
                        </div>
               </div>
                
                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title"> Price<span class="required">*</span>
                  </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                           {{ Form::number('price', null, ['class' => 'form-control col-md-7 col-xs-12','placeholder'=>'Price','id'=>'price']) }}
                        </div>
                </div>

               
               <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="occupation">Active
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12 icheckbox_flat-green checked">
                     @if(isset($media))
                     {{ Form::checkbox('active',1, ($media->active === 1)?true:null, ['id'=>'active']) }}
                     @else
                     {{ Form::checkbox('active', 1, true, ['id'=>'active']) }}
                     @endif
                  </div>
               </div>
               <div class="ln_solid"></div>
               <div class="form-group">
                  <div class="col-md-6 col-md-offset-3">
                     <a href="{{ url('/admin').'/media'}}" class="btn btn-primary">Cancel</a>
                     <button id="submit" type="submit" class="btn btn-success">Submit</button>
                  </div>
               </div>
               </form>
            </div>
         </div>
      </div>
   </div>
   <!-- /.row -->
</section>
<!-- /.content -->
@endsection
@section('js')
@parent
<script src="{{ asset('admin/js/select2.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('admin/js/media.js') }}" type="text/javascript"></script>
<script type="text/javascript">
  $("#song_id,#author_id,#genre_id,#category_id").select2();
</script>
@endsection