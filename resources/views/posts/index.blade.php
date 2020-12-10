@extends('layouts.app')
@section('content')
    <div class="row p-1">
            <div class="col-sm-12 col-md-3 col-lg-3">
                    <div class="card sticky-top" style="top:10px;z-index:0;"> 
                        <form action="{{route('posts.index')}}" method="POST">
                            @csrf
                            @method('GET')

                        <div class="card-group-item">
                            <header class="card-header">
                              <h6 class="title">Filter</h6>
                            </header>
                            <div class="card-body">
                              <label for="location">Location:</label>
                              <input type="text" name="location" class="form-control form-control-lg" placeholder="location" id="autocomplete" name="location" onFocus="geolocate()" type="text" />
                            </div>
                        </div>

                        <div class="card-group-item">
                            <div class="filter-content">
                                <div class="card-body">
                                  <label for="unit_type">Building Type:</label>
                                    <select class="form-control" name="unit_type">
                                    <option value="">select</option>
                                      <option value="apartment">Apartment</option>
                                      <option value="Condo">Condo</option>
                                      <option value="House">House</option>
                                      <option value="Bedspace">Bedspace</option>
                                    </select>
                                </div> <!-- card-body.// -->
                            </div> <!-- filter-content.// -->
                        </div>

                        <div class="card-group-item">
                            <div class="filter-content">
                                <div class="card-body">
                                  <label for="bed_no">Bedroom No:</label>
                                    <select class="form-control" name="bed_no" id="bed_no">
                                    <option value="">select</option>
                                      <option value="1">1</option>
                                      <option value="2">2</option>
                                      <option value="3">3</option>
                                      <option value="4">4</option>
                                      <option value="5">5+</option>
                                    </select>
                                </div> <!-- card-body.// -->
                            </div> <!-- filter-content.// -->
                        </div>

                        <div class="card-group-item">
                            <div class="filter-content">
                                <div class="card-body">
                                  <label for="bathroom_no">Bathroom No:</label>
                                    <select class="form-control" name="bathroom_no" id="bathroom_no">
                                    <option value="">select</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5+</option>
                                    </select>
                                </div> <!-- card-body.// -->
                            </div> <!-- filter-content.// -->
                            <button type="submit" id="filter" name="filter" class="btn btn-success btn-block">Apply Filters</button>
                        </div>
                       
                    </form>
                    </div> <!-- card.// -->  
            </div> <!-- col-sm-3 mt.// -->
    
           
                    
                @if(count($data)=="0")
                <h1>no post</h1>
                @else
                <div class="col-sm-12 col-md-9 col-lg-9">
                    <div class="row">
                        @foreach ($data as $post)
                        <div class="col-sm-12 col-md-4 col-lg-3 p-1 m-0">
                            <div class="card">
                              <img src="../image/{{$post->images}}" class="card-img-top" alt="{{$post->images}}">
                              <div class="card-body">
                                <h3 class="card-title">{{$post->title}}</h3>
                                <p class="card-text">{{$post->body}}</p>
                                <p class="card-text text-muted">{{$post->location}}</p>
                                @if($post->certified !== 'none')
                                    <p style="color:green;">Certified</p>
                                @endif
                              </div>
                              <div class="card-footer">
                                <a class="btn btn-primary btn-block" href="/posts/{{$post->id}}">More details</a>
                              </div>
                            </div>
                            <br>
                        </div>
                        
                        @endforeach
                    </div>
                </div>
                
        {{-- {{$data->links()}} --}}
                @endif
        @endsection
        <script>
                // This sample uses the Autocomplete widget to help the user select a
                // place, then it retrieves the address components associated with that
                // place, and then it populates the form fields with those details.
                // This sample requires the Places library. Include the libraries=places
                // parameter when you first load the API. For example:
                // <script
                // src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">
                
                var placeSearch, autocomplete;
                
                var componentForm = {
                  street_number: 'short_name',
                  route: 'long_name',
                  locality: 'long_name',
                  administrative_area_level_1: 'short_name',
                  country: 'long_name',
                  postal_code: 'short_name'
                };
                
                function initAutocomplete() {
                  // Create the autocomplete object, restricting the search predictions to
                  // geographical location types.
                  autocomplete = new google.maps.places.Autocomplete(
                      document.getElementById('autocomplete'), {types: ['geocode']});
                
                  // Avoid paying for data that you don't need by restricting the set of
                  // place fields that are returned to just the address components.
                  autocomplete.setFields(['address_component']);
                
                  // When the user selects an address from the drop-down, populate the
                  // address fields in the form.
                  autocomplete.addListener('place_changed', fillInAddress);
                }
                
                function fillInAddress() {
                  // Get the place details from the autocomplete object.
                  var place = autocomplete.getPlace();
                
                  for (var component in componentForm) {
                    document.getElementById(component).value = '';
                    document.getElementById(component).disabled = false;
                  }
                
                  // Get each component of the address from the place details,
                  // and then fill-in the corresponding field on the form.
                  for (var i = 0; i < place.address_components.length; i++) {
                    var addressType = place.address_components[i].types[0];
                    if (componentForm[addressType]) {
                      var val = place.address_components[i][componentForm[addressType]];
                      document.getElementById(addressType).value = val;
                    }
                  }
                }
                
                // Bias the autocomplete object to the user's geographical location,
                // as supplied by the browser's 'navigator.geolocation' object.
                function geolocate() {
                  if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(function(position) {
                      var geolocation = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude
                      };
                      var circle = new google.maps.Circle(
                          {center: geolocation, radius: position.coords.accuracy});
                      autocomplete.setBounds(circle.getBounds());
                    });
                  }
                }
             
            </script>
            
            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAprFqcV6T93fKrVth6bwnLMxSavhwAmN4&libraries=places&callback=initAutocomplete" async defer></script>  
                    
    </div>
