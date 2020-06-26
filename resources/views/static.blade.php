@extends('layouts.app')
@section('meta')
  @if(!empty($staticdata['meta_title']))
  <meta name="title" content="{{ $staticdata['meta_title'] }}">
  @endif

  @if(!empty($staticdata['meta_description']))
  <meta name="description" content="{{ $staticdata['meta_description'] }}">
  @endif

  @if(!empty($staticdata['meta_keywords']))
    <meta name="keywords" content="{{ $staticdata['meta_keywords'] }}">
  @endif
@stop
@section('content')<!--parallax 1 -->
<section class="inner_banner text-center">
  <div class="container"> 
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        @if(!empty($staticdata))
          <h1>{{ $staticdata['title'] }}</h1>
        @endif
      </div>   
    </div>  
  </div><!--/container-->
</section>
<!--/parallax 1-->
@if(!empty($staticdata['description']))
  {!! $staticdata['description'] !!}
@endif
@stop