@extends('layouts.adminlayout')
@section('meta')
@parent
      <title>@if(isset($genre))
                  Edit Genre
              @else
                 Add Genre
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
          @if(isset($genre))
                  Edit Genre
              @else
                 Add Genre
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
                @if(isset($genre))
                  Edit Genre
              @else
                 Add Genre
              @endif</h3>
            </div>
            <div style="padding: 20px 20px;">
                 @include('errors.error_notification')
                    @if(isset($genre))
                      {{ Form::model($genre, ['route' => ['genre.update', $genre->id], 'method'=>'PUT', 'class'=>'form-horizontal role','id'=>'genre_form']) }}
                   @else
                      {{ Form::open(['url'=>'admin/genre', 'method'=>'POST', 'class'=>'form-horizontal role','id'=>'genre_form']) }}
                  @endif
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          {!! csrf_field() !!}
                           {{ Form::text('name', null, ['class' => 'form-control col-md-7 col-xs-12','placeholder'=>'Genre Name','id'=>'name']) }}
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email"> Description
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                           {{ Form::textarea('description', null, ['class' => 'form-control col-md-7 col-xs-12','placeholder'=>'description','id'=>'page_desc']) }}
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="occupation">Active
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12 icheckbox_flat-green checked">
                          @if(isset($genre))
                            {{ Form::checkbox('active',1, ($genre->active === 1)?true:null, ['id'=>'active']) }}
                          @else
                             {{ Form::checkbox('active', 1, true, ['id'=>'active']) }} 
                          @endif
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <a href="{{ url('/admin').'/genre'}}" class="btn btn-primary">Cancel</a>
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
  <script src="{{ asset('admin/js/genre.js') }}" type="text/javascript"></script>
 @endsection