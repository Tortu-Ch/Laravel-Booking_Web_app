@extends('layouts.adminlayout')
@section('meta')
    @parent
    <title>Subscription Types : Music Made Easy </title>
    @endsection
    @section('content')
            <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Dashboard
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Subscription Types</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">
                            Subscription type
                        </h3>
                    </div>
                    <div style="padding: 20px 20px;">
                        @include('errors.error_notification')

                        {{ Form::open(['url'=>'admin/subscription_type', 'method'=>'POST', 'class'=>'form-horizontal role','id'=>'subscription_form']) }}

                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Monthly ($) <span class="required">*</span>
                            </label>
                            @if(count($subscriptiontype)>0)
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    {!! csrf_field() !!}
                                    {{ Form::number('monthly', $subscriptiontype[0]->value, ['class' => 'form-control col-md-7 col-xs-12','placeholder'=>'Monthly Subscription Value','id'=>'monthly']) }}
                                </div>
                            @else
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    {!! csrf_field() !!}
                                    {{ Form::number('monthly', null, ['class' => 'form-control col-md-7 col-xs-12','placeholder'=>'Monthly Subscription Value','id'=>'monthly']) }}
                                </div>
                            @endif
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Half Yearly ($)<span class="required">*</span>
                            </label>
                            @if(count($subscriptiontype)>0)
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    {!! csrf_field() !!}
                                    {{ Form::number('half_yearly', $subscriptiontype[1]->value, ['class' => 'form-control col-md-7 col-xs-12','placeholder'=>'Half Yearly Subscription Value','id'=>'half_yearly']) }}
                                </div>
                            @else
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    {!! csrf_field() !!}
                                    {{ Form::number('half_yearly', null, ['class' => 'form-control col-md-7 col-xs-12','placeholder'=>'Half Yearly Subscription Value','id'=>'half_yearly']) }}
                                </div>
                            @endif
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Annual ($)<span class="required">*</span>
                            </label>
                            @if(count($subscriptiontype)>0)
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    {!! csrf_field() !!}
                                    {{ Form::number('annual', $subscriptiontype[2]->value, ['class' => 'form-control col-md-7 col-xs-12','placeholder'=>'Annual Subscription Value','id'=>'annual']) }}
                                </div>
                            @else
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    {!! csrf_field() !!}
                                    {{ Form::number('annual', null, ['class' => 'form-control col-md-7 col-xs-12','placeholder'=>'Annual Subscription Value','id'=>'annual']) }}
                                </div>
                            @endif
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
    <script src="{{ asset('admin/js/subscriptionType.js') }}" type="text/javascript"></script>

    <script>
        $(function () {

        });
    </script>

@endsection