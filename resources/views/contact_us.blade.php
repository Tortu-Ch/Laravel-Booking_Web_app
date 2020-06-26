@extends('layouts.app')
@section('content')
    <div class="container">
          <div class="row">
               <div class="col-md-8 col-md-offset-2 "><p class="mar_top_bot text-center">Have a question? Don't hesitate to send us a message.<br> Fill up the details in the form below and we will get back to you at the earliest.</p></div>
          </div>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Get in touch</div>
                    <div class="panel-body">
                        @if( Session::has('message') )
                          <div class="alert alert-success" role="alert" align="center">
                          {{ Session::get('message') }}
                          </div>
                        @endif
                          <form class="form-horizontal" method="POST" action="{{ url('/contact-us') }}" id="contact_us_form">
                            {{ csrf_field() }}
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Name*</label>

                                <div class="col-md-6">
                                    <input id="name" type="name" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">Email*</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" required>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                             <div class="form-group{{ $errors->has('contactno') ? ' has-error' : '' }}">
                                <label for="contactno" class="col-md-4 control-label">Contact No</label>

                                <div class="col-md-6">
                                    <input id="contactno" type="text" class="form-control" name="contactno" >

                                    @if ($errors->has('contactno'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('contactno') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('subject') ? ' has-error' : '' }}">
                                <label for="subject" class="col-md-4 control-label">Subject*</label>

                                <div class="col-md-6">
                                    <input id="subject" type="text" class="form-control" name="subject" required>

                                    @if ($errors->has('subject'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('subject') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('message') ? ' has-error' : '' }}">
                                <label for="message" class="col-md-4 control-label">Message*</label>

                                <div class="col-md-6">
                                    <textarea id="message" class="form-control" name="message" required></textarea>

                                    @if ($errors->has('message'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('message') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Send
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
      </div>
@endsection
@section('js')
  <script src="{{ asset('js/contact_us.js') }}" type="text/javascript"></script>
@endsection