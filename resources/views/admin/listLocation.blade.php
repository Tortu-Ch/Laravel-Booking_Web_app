@extends('layouts.adminlayout')
@section('meta')
    @parent
    <title>Location Lists </title>
    @endsection
    @section('content')
        @include('errors.error_notification')
    <section class="content">

        <div class="box">

                    <div class="content-header">
                          <h3> Search Panel</h3>
                    </div>      
                        {{-- form start --}}
                          <form role="form" method="POST" action="{{ route('locations.search') }}">
                          {{ csrf_field() }}
                            <div class="box-body">
                              <div class="row">
                                 <div class="col-md-4 add_bol_form col-sm-6 col-xs-12">
                                   <div class="form-group">
                                      <label>Location</label>
                                        {{ Form::text('location', null, ['class' => 'form-control col-md-7 col-xs-12','placeholder'=>'Location','id'=>'Location']) }}
                                    </div>
                                 </div>
                              </div>
                            </div>
                            <div class="box-footer">
                              <div class="box-footer-btns col-md-3 add_bol_form col-sm-4 col-xs-12 pull-right">
                                <div class="search_wrap" title="Search Location">
                                   <a class="btn btn-danger" href="{{route('locationslist')}}">Clear</a>
                                  <button type="submit" class="btn btn-primary" >Search</button>
                                </div>
                              </div>
                            </div>
                          </form>
        </div>

                <div class="box usertable">
                    <div class="content-header ">
                        <h3 class="box-title pull-left">Location Listings</h3>
                        <div class="pull-right">
                        <a class="btn btn-info" title="Add new Location" href="{{ URL::to('/locations/create') }}">Add New Location
                        </a>
                         </div>
                    </div>

                            {{-- /.box-header --}}
                    <div class="box-body table-responsive">
                        <table id="example2" class="table table-hover">
                          <thead>
                          <tr>
                            <th>#</th>
                            <th>Location</th>
                            <th class="text-center">Actions</th>
                          </tr>
                          </thead>
                           <tbody>
                            @if(count($location) > 0)
                                @foreach($location as $loc)
                                    <tr class="pointer" id="{{ $loc->id }}">
                                        <td>{{$loc->id }}</td>
                                        <td>{{$loc->location}}</td>
                                        <td class="text-center">
                                            <a class="btn btn-info btn-flat" tooltip="" title="Edit Location" type="button" href="{{ URL:: to('/').'/locations/'.$loc->id.'/edit' }}">
                                              <i class="fa fa-pencil"></i>
                                            </a>

                                            <a class="btn btn-danger btn-flat" data-url="/housing-authority/" data-id={{$loc->id}} id="delete" title="Delete Location" onclick="deleteuser({{$loc->id}},'/locations/')" type="button"><i class="fa fa-trash-o"></i>
                                            </a>
                                         </td>

                                    </tr>
                                @endforeach
                            @else
                                <tr class="pointer">
                                    <td colspan="7">
                                        <p style="text-align:center;"> No Location Found</p>
                                    </td>
                                </tr>

                            </tbody>
                          @endif               
                        </table>
                        {{$location->links()}}

                      </div>
                    {{-- /.box-body --}}
                </div>
              {{-- /.box --}}


    </section>
@endsection

@section('js')
    @parent
<script src="{{ asset('admin/js/location.js') }}" type="text/javascript"></script>

 @endsection

