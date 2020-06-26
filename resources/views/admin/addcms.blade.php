@extends('layouts.adminlayout')
@section('meta')
@parent
      <title>@if(isset($cms))
                  Edit Cms
              @else
                 Add Cms
              @endif
              :: Music Made Easy </title>
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
          @if(isset($cms))
                  Edit Cms
              @else
                 Add Cms
              @endif </li>
      </ol>
    </section>

  <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">
                @if(isset($cms))
                  Edit Cms
              @else
                 Add Cms
              @endif</h3>
            </div>
            <div style="padding: 20px 20px;">
                 @include('errors.error_notification')
                    @if(isset($cms))
                      {{ Form::model($cms, ['route' => ['cms.update', $cms->id], 'method'=>'PUT', 'class'=>'form-horizontal role','id'=>'cms_form']) }}
                   @else
                      {{ Form::open(['url'=>'admin/cms', 'method'=>'POST', 'class'=>'form-horizontal role','id'=>'cms_form']) }}
                  @endif
                      
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Title <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {!! csrf_field() !!}
                                {{ Form::text('title', null, ['class' => 'form-control col-md-7 col-xs-12','placeholder'=>'cms Title','id'=>'title']) }}
                            </div>
                        </div>
                        @if(isset($cms))
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Slug 
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {{ Form::text('slug', null, ['class' => 'form-control col-md-7 col-xs-12','placeholder'=>'cms Slug','id'=>'slug','readonly'=>true]) }}
                            </div>
                        </div>
                        @endif
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email"> Description<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                           {{ Form::textarea('description', null, ['class' => 'form-control col-md-7 col-xs-12','placeholder'=>'description','id'=>'page_desc']) }}
                        </div>
                      </div>

                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Meta Title <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {{ Form::text('meta_title', null, ['class' => 'form-control col-md-7 col-xs-12','placeholder'=>'Meta Title','id'=>'meta_title']) }}
                            </div>
                        </div>

                     <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Meta Description <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {{ Form::text('meta_description', null, ['class' => 'form-control col-md-7 col-xs-12','placeholder'=>'Meta Description','id'=>'meta_description']) }}
                            </div>
                        </div>

                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Meta Keywords <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {{ Form::text('meta_keywords', null, ['class' => 'form-control col-md-7 col-xs-12','placeholder'=>'Meta Keywords','id'=>'meta_keywords']) }}
                            </div>
                        </div>
                     
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="occupation">Active
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12 icheckbox_flat-green checked">
                          @if(isset($cms))
                            {{ Form::checkbox('active',1, ($cms->active === 1)?true:null, ['id'=>'active']) }}
                          @else
                             {{ Form::checkbox('active', 1, true, ['id'=>'active']) }} 
                          @endif
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <a href="{{ url('/admin').'/cms'}}" class="btn btn-primary">Cancel</a>
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

<!--  <script src="{{ asset('admin/js/ckeditor/ckeditor.js') }}"></script> -->
<!--  <script src="{{url('ckeditor/ckeditor.js')}}"></script> -->
<script src="/templateEditor/ckeditor/ckeditor.js"></script> 
 <script>
  $(function () {
    CKEDITOR.replace('page_desc');
  });
</script>


<!-- <script>
    var ckview = document.getElementById("ckview");
    $(function () {
    CKEDITOR.replace('page_desc',{
      language:'en-gb',
      filebrowserBrowseUrl : '{{url("ckeditor")}}/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
      filebrowserUploadUrl : '{{url("ckeditor")}}/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
      filebrowserImageBrowseUrl : '{{url("ckeditor")}}/filemanager/dialog.php?type=1&editor=ckeditor&fldr='
    });
    });
  </script> -->
  <script src="{{ asset('admin/js/cms.js') }}" type="text/javascript"></script>
 @endsection