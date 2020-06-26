@extends('layouts.adminlayout')
@section('meta')
    @parent
        <title>Settings : Music Made Easy </title>
@endsection

@section('css')
    @parent
        <link rel="stylesheet" href="{{ asset('admin/css/select2.min.css') }}">
@endsection
    @section('content')
            <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Dashboard
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Settings</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">
                            Settings
                        </h3>
                    </div>
                    <div style="padding: 20px 20px;">
                        @include('errors.error_notification')

                        {{ Form::open(['url'=>'admin/settings', 'method'=>'POST', 'class'=>'form-horizontal role','id'=>'settings_form']) }}

                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email <span class="required">*</span>
                            </label>

                                <div class="col-md-6 col-sm-6 col-xs-12">
                                 <div class="form-group">
                                    {!! csrf_field() !!}
                                    {{ Form::text('EMAIL', ($settings != null)?$settings->config_value:'', ['class' => 'form-control col-md-7 col-xs-12','placeholder'=>'Email','id'=>'email']) }}
                                    </div>
                                </div>

                        </div>


                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="videos"> Videos<span class="required">*</span>
                            </label>

                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        {{ Form::select('videos[]', $videos,$selectedvideos, ['class' => 'form-control col-md-7 col-xs-12','id' => 'videos','multiple'=>true]) }}
                                    </div>
                                </div>

                        </div>

                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="pdf"> Pdf<span class="required">*</span>
                            </label>

                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        {{ Form::select('pdf[]', $pdf,$selectedpdf, ['class' => 'form-control col-md-7 col-xs-12','id' => 'pdf','multiple'=>true]) }}
                                    </div>
                                </div>

                        </div>

                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-3">
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
@endsection

@section('js')
    @parent
    <script src="{{ asset('admin/js/settings.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin/js/select2.min.js') }}" type="text/javascript"></script>

    <script type="text/javascript">

        $("#videos").select2({
            multiple: true,
            placeholder: 'Select videos',
            color:'#000',
            maximumSelectionLength: 5
        });

        $("#pdf").select2({
            multiple: true,
            placeholder: 'Select PDF',
            color:'#000',
            maximumSelectionLength: 5
        });

    </script>

@endsection