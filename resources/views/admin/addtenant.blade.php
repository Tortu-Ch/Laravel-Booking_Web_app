@extends('layouts.adminlayout')
@section('meta')
    @parent
    <title>@if(isset($tenant))
            Edit Tenant
        @else
            Add Tenant
        @endif
    </title>
@endsection
@section('content')
    {{-- Content Header (Page header) --}}
    <section class="content-header">
        <h1>
            &nbsp;
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">
                @if(isset($tenant))
                    Edit Tenant
                @else
                    Add Tenant
                @endif </li>
        </ol>
    </section>

    {{-- Main content --}}
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">
                            @if(isset($tenant))
                                Edit Tenant
                            @else
                                Add Tenant
                            @endif</h3>
                    </div>
                    <div style="padding: 20px 20px;">
                        @include('errors.error_notification')
                        @if(isset($tenant))
                            {{ Form::model($tenant, ['route' => ['tenant.update', $tenant->id], 'method'=>'PUT', 'class'=>'form-horizontal role','id'=>'tenant_create_form']) }}
                        @else
                            {{ Form::open(['url'=>'/admin/tenant', 'method'=>'POST', 'class'=>'form-horizontal role','id'=>'tenant_create_form']) }}
                        @endif

                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="firstname">First Name <span
                                        class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {!! csrf_field() !!}
                                {{ Form::text('firstname', null, ['class' => 'form-control col-md-7 col-xs-12','placeholder'=>'First Name','id'=>'firstname','required']) }}
                            </div>
                        </div>

                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="lastname">Last Name
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {{ Form::text('lastname', null, ['class' => 'form-control col-md-7 col-xs-12','placeholder'=>'Last Name','id'=>'lastname']) }}
                            </div>
                        </div>

                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="permanentaddress">Leased
                                Address <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {{ Form::text('permanentaddress', null, ['class' => 'form-control col-md-7 col-xs-12','placeholder'=>'Permanent Address','id'=>'permanentaddress','required']) }}
                            </div>
                        </div>

                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="city"> City<span
                                        class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {{ Form::text('city', null, ['class' => 'form-control col-md-7 col-xs-12','placeholder'=>'City','id'=>'city','required']) }}
                            </div>
                        </div>

                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="state"> State <span
                                        class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {{ Form::text('state', null, ['class' => 'form-control col-md-7 col-xs-12','placeholder'=>'State','id'=>'state','required']) }}
                            </div>
                        </div>

                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="zip"> Zip <span
                                        class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {{ Form::text('zip', null, ['class' => 'form-control col-md-7 col-xs-12','placeholder'=>'Zip','id'=>'zip','required']) }}
                            </div>
                        </div>

                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="phoneno"> Phone No
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {{ Form::text('phoneno', null, ['class' => 'form-control col-md-7 col-xs-12 phone_us','placeholder'=>'Phone No','id'=>'phoneno']) }}
                            </div>
                        </div>

                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {{ Form::text('email', null, ['class' => 'form-control col-md-7 col-xs-12','placeholder'=>'Email','id'=>'email']) }}
                            </div>
                        </div>

                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Caseworker">Case Worker<span
                                        class="required"></span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {{ Form::textarea('caseworker', null, ['class' => 'form-control col-md-7 col-xs-12','placeholder'=>'Case Worker','id'=>'caseworker','rows'=>'5']) }}
                            </div>
                        </div>

                       <!--  <h2>Current Leased Property</h2>
                        <div class="properties">
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="lastname">Address<span
                                            class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">

                                    {{Form::textarea('property_address',null,array('class' => 'form-control col-md-7 col-xs-12 property_address','placeholder'=>'Property Address','id'=>'property_address','multiple'=>'multiple','name'=>'property_address','rows'=>'4','required'))}}

                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">City
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">


                                    {{Form::text('property_city',null,array('class' => 'form-control col-md-7 col-xs-12 property_city','placeholder'=>'City','id'=>'property_city','multiple'=>'multiple','name'=>'property_city','required'))}}
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">State
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">

                                    {{Form::text('property_state',null,array('class' => 'form-control col-md-7 col-xs-12 property_state','placeholder'=>'State','id'=>'property_state','multiple'=>'multiple','name'=>'property_state','required'))}}
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Zip
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">

                                    {{Form::text('property_zip',null,array('class' => 'form-control col-md-7 col-xs-12 property_zip','placeholder'=>'Zip','id'=>'property_zip','multiple'=>'multiple','name'=>'property_zip','required'))}}
                                </div>
                            </div>


                            </br>
                            </br>
                        </div> -->


                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-3">
                                <a onclick="window.history.back()" class="btn btn-primary">Cancel</a>
                                <button id="submit" type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        {{-- /.row --}}
    </section>
    {{-- /.content --}}
@endsection

@section('js')
    @parent
    <script src="{{ asset('admin/js/tenantlist.js') }}" type="text/javascript"></script>
    <script type="text/javascript">

    </script>


@endsection

