<template>
<div class="row create-post">
  <div class="col-sm-12 col-md-6">
    <div class="card">
      <div class="card-header">
        <h3>Create Post:</h3>
      </div>
      <div class="card-body">
        <form action="">
            <div class="form-group">
              <label for="title">Title:</label>
              <input type="text" name="title" id="title" class="form-control" placeholder="Your title">
            </div>
            <div class="form-group row">
              <div class="col">
                  <label for="bed_no">Bed number:</label>
                  <input type="number" name="bed_no" id="bed_no" class="form-control" placeholder="0">
              </div>
              <div class="col">
                  <label for="bathroom_no">Bathroom number:</label>
                  <input type="number" name="bathroom_no" id="bathroom_no" class="form-control" placeholder="0">
              </div>
            </div>
            <div class="form-group row">
                <div class="col">
                    <label for="price">Price:</label>
                    <input type="number" name="price" id="price" class="form-control" placeholder="0">
                </div>
                <div class="col">
                    <label for="unit_type">Unit Type:</label>
                    <select name="unit_type" id="unit_type" class="form-control">
                      <option value="Apartment">Apartment</option>
                      <option value="Condo">Condo</option>
                      <option value="Bedspace">Bedspace</option>
                      <option value="House">House</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
              <label for="body">Body:</label>
              <textarea name="body" id="body" cols="20" rows="4" class="form-control"></textarea>
            </div>
            <div class="form-group">
              <label for="images">Image:</label>
              <input type="file" name="images" id="images" class="form-control">
            </div>
            <div class="form-group" id="locationField">
                <label for="Address">Address</label>
                <input class="form-control input-sm" id="autocomplete" placeholder="Enter your address" onFocus="geolocate()" type="text" />
            </div>
            <div class="form-group row">
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
            </div>
            <input type="submit" value="Create your post" class="form-control block btn btn-primary">
        </form>
      </div>
    </div>
  </div>

    <div class="card">
        <div class="card-header">
            Your Post:
        </div>
        <div class="card-body">
            <div id="map">

            </div>
            <div class="form-">
                <input type="text" name="" id="" readonly class="form-control-plaintext">
            </div>
        </div>
    </div>

</div>

</template>

<script>
$(function() {

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
        // Create the autocomplete object, restricting the search to geographical
        // location types.
        autocomplete = new google.maps.places.Autocomplete(
            (document.getElementById('autocomplete')), {
                types: ['geocode']
            });

        // When the user selects an address from the dropdown, populate the address
        // fields in the form.
        autocomplete.addListener('place_changed', fillInAddress);
    }

    function fillInAddress() {
        // Get the place details from the autocomplete object.
        var place = autocomplete.getPlace();

        for (var component in componentForm) {
            document.getElementById(component).value = '';
            //document.getElementById(component).disabled = false;
            $("#" + component).prop('readonly', false);
        }

        var location = place.geometry.location;
        var lattitude = location.lat();
        var longitude = location.lng();
        $("#lattitude").val(parseFloat(lattitude.toFixed(8)));
        $("#longitude").val(parseFloat(longitude.toFixed(8)));


        // Get each component of the address from the place details
        // and fill the corresponding field on the form.
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
            var circle = new google.maps.Circle({
                center: geolocation,
                radius: position.coords.accuracy
            });
            //autocomplete.setBounds(circle.getBounds());
        });
    }
}
});

$("#autocomplete").focus(function() {
    geolocate();
});

export default {
name: "create-post",
}
</script>

<style>

</style>