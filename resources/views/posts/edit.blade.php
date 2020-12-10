@extends('layouts.app')
@section('content')

    <div class="row edit-post">
            <div class="col-sm-12 col-md-6 mr-auto">
              <div class="card">
                <div class="card-header">
                  <h3>Edit Post:</h3>
                </div>
                <div class="card-body">
                <form action="{{route('posts.update',$post->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                      <div class="form-group">
                        <label for="title">Title:</label>
                        <input type="text" name="title" id="title" class="form-control" value="{{$post->title}}">
                      </div>
                      <div class="form-group row">
                        <div class="col">
                            <label for="bed_no">Bed number:</label>
                            <input type="number" name="bed_no" id="bed_no" class="form-control" value="{{$post->bed_no}}">
                        </div>
                        <div class="col">
                            <label for="bathroom_no">Bathroom number:</label>
                            <input type="number" name="bathroom_no" id="bathroom_no" class="form-control" value="{{$post->bathroom_no}}">
                        </div>
                      </div>
                      <div class="form-group row">
                          <div class="col">
                              <label for="price">Price:</label>
                              <input type="number" name="price" id="price" class="form-control" value="{{$post->price}}">
                          </div>
                          <div class="col">
                              <label for="unit_type">Unit Type:</label>
                              <select name="unit_type" id="unit_type" value="{{$post->unit_type}}" class="form-control">
                                <option value="Apartment">Apartment</option>
                                <option value="Condo">Condo</option>
                                <option value="Bedspace">Bedspace</option>
                                <option value="House">House</option>
                              </select>
                          </div>
                      </div>
                      <div class="form-group">
                        <label for="body">Body:</label>
                        <textarea name="body" id="body" cols="20" rows="4" class="form-control">{{$post->body}}</textarea>
                      </div>
                      <div class="form-group">
                        <label for="images">Image:</label>
                        <input type="file" name="images" multiple id="images" class="form-control">
                      </div>
                      <div class="form-group" id="locationField">
                          <label for="Address">Address</label>
                          <input class="form-control input-sm" id="autocomplete" name="location" value="{{$post->location}}" placeholder="Enter your address" onFocus="geolocate()" type="text" />
                      </div>
                      {{-- <div class="form-group row">
                          <div class="col-3">
                              <label for="street_number">Street Number:</label>
                              <input class="form-control" id="street_number" />
                          </div>
                          <div class="col-9">
                              <label for="barangay sr-only">Barangay:</label>
                              <input class="form-control" id="barangay" />  
                            </div>
                      </div>
                      <div class="form-group">
                          <label for="street_number">City:</label>
                          <input class="form-control" id="locality" disabled="true"/>
                      </div>
                      <div class="form-group row">
                          <div class="col">
                            <label for="street_number sr-only">Province:</label>
                            <input class="form-control" id="administrative_area_level_1" disabled="true"/>  
                          </div>
                          <div class="col">
                              <label for="street_number sr-only">Zip code:</label>
                              <input class="form-control" id="postal_code" disabled="true"/>  
                            </div>
                      </div>
                      <div class="form-group">
                          <label for="street_number">Country</label>
                          <input class="form-control" id="country" disabled="true"/>
                      </div> --}}
                      <input type="submit" value="update" class="form-control block btn btn-primary">
                  </form>
                </div>
              </div>
            </div>
        </div>  
@endsection