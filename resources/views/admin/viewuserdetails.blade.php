@extends('layouts.adminlayout')
@section('meta')
    @parent
    <title>User Details : Music Made Easy </title>
    @endsection
    @section('content')
            <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Dashboard
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">User Details</li>
          
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">

                    <div style="padding: 20px 20px;">
                        <div class="modal-body row">
                            <div class="col-md-6">
                                <div class="box-header with-border">
                                    <h3 class="box-title">
                                        User Details
                                    </h3>
                                </div>
                                <div class="col-md-4">
                                    <img src="{{asset('images/user-icon.png')}}" height="150" width="150">
                                </div>
                                <div class="col-md-6">
                                    <label class="control-label col-md-4" > First Name:
                                    </label>
                                    {{$userdetails->firstname}}
                                </div></br>
                                <div class="col-md-6">
                                    <label class="control-label col-md-4" > Last Name:
                                    </label>
                                    {{$userdetails->email}}
                                </div>
                                 <div class="col-md-6">
                                    <label class="control-label col-md-4" > Name:
                                    </label>
                                    {{$userdetails->firstname}}
                                </div></br>
                                <div class="col-md-6">
                                    <label class="control-label col-md-4" > Email:
                                    </label>
                                    {{$userdetails->email}}
                                </div>
                            </div>
                       
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row 2-->
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">

                    <div style="padding: 20px 20px;">
                        <div class="modal-body row">
                            <div class="col-md-6">
                                <div class="box-header with-border">
                                    <h3 class="box-title">
                                        Roles
                                    </h3>
                                </div>
                                <div class="col-md-6">
                           

                                <div class='form-group'>
                                @if(count($userdetails->roles) > 0)
                                @foreach ($userdetails->roles as $role)

                                <h5><b>{{$role->name}}<b></h5></br>

                               @endforeach
                                @endif
                               </div>
                               
                                </div></br>
                            </div>
                       
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row 2-->
    </section>
@endsection

@section('js')
    @parent

@endsection
