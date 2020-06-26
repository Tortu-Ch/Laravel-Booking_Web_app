@extends('layouts.adminlayout')
@section('meta')
@parent
      <title>@if(isset($contact_us))
                  Reply for Contact Us
              @else
                 Add Cms
              @endif
              :: Laravel Repo </title>
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
                @if($contact_us->reply==null)
                  Reply for {{$contact_us->subject}}
              @else
                 view {{$contact_us->subject}}
              @endif</h3>
            </div>
            <div style="padding: 20px 20px;">
                 @include('errors.error_notification')
                    @if(isset($contact_us))
                      {{ Form::model($contact_us, ['route' => ['contact_us.update', $contact_us->id], 'method'=>'PUT', 'class'=>'form-horizontal role','id'=>'contact_us_form']) }}
                    @endif
                      
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {!! csrf_field() !!}
                                {{ Form::text('name', null, ['class' => 'form-control col-md-7 col-xs-12','placeholder'=>'cms Title','id'=>'name','readonly'=>true]) }}
                            </div>
                        </div>
                        
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email 
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {{ Form::text('email', null, ['class' => 'form-control col-md-7 col-xs-12','placeholder'=>'email','id'=>'email','readonly'=>true]) }}
                            </div>
                        </div>

                    

                     <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="subject">Subject <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {{ Form::text('subject', null, ['class' => 'form-control col-md-7 col-xs-12','placeholder'=>'subject','id'=>'subject','readonly'=>true]) }}
                            </div>
                        </div>
                       
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="message"> Message <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        {{ Form::textarea('message', null, ['class' => 'form-control col-md-7 col-xs-12','placeholder'=>'description','id'=>'message','readonly'=>true]) }}
                        </div>
                      </div>
                       @if($contact_us->reply==null)
                       <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="message"> Reply <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                           {{ Form::textarea('reply', null, ['class' => 'form-control col-md-7 col-xs-12','placeholder'=>'reply','id'=>'reply']) }}
                        </div>
                      </div>
                       @else
                       <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="message"> Reply <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          {!! $contact_us->reply !!}
                        </div>
                      </div>
                       @endif
                      
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <a href="{{ url('/admin').'/contact_us'}}" class="btn btn-primary">Cancel</a>
                          @if($contact_us->reply==null)
                          <button id="submit" type="submit" class="btn btn-success">Submit</button>
                          @endif
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
    CKEDITOR.replace('reply');
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