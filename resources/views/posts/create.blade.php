@extends('layouts.app')
@section('content')
    @if ((Auth::user()->certified === 'certified') || (Auth::user()->account_type === 'free' && count($posts)<1))
        <div class="row create-post">
            <div class="col-sm-12 col-md-6 mr-auto">
              <div class="card">
                <div class="card-header">
                  <h3>Create Post:</h3>
                </div>
                <div class="card-body">
                  <form action="{{route('posts.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
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
                          <input class="form-control input-sm" id="autocomplete" name="location" placeholder="Enter your address" onFocus="geolocate()" type="text" />
                      </div>
                     
                      <input type="submit" value="Create your post" class="form-control block btn btn-primary">
                  </form>
                </div>
              </div>
            </div>
          </div>  
        
    @elseif((Auth::user()->account_type === 'none') || (Auth::user()->account_type === 'free' && count($posts)>1) )
    <div class="account row">
            @if (Auth::user()->account_type !== 'free')    
            <div class="card col-sm-11 col-md-5 col-lg-4 m-auto">
              <img class="card-img-top" src="../images/first.jpg" alt="Card image">
              <div class="card-body">
                  <span class="badge badge-success">FREE</span>
                  <h4 class="card-title">FREE ACCOUNT</h4>
                  <p>- Lorem ipsum dolor sit amet, consectetur</p>
                  <p>- Sed do eiusmod tempor incididunt ut labore</p>
                  <p>- Ut enim ad minim veniam</p>
                  <form action="{{route('users.update',Auth::user()->id)}}" method="POST">
                      @csrf
                      @method('PUT')
                      <input type="hidden" name="account_type" value="free">
                    <button type="submit" class="btn btn-primary">SELECT</button>
                    </form>
              </div>
              </div>
            @endif
          
          
              <div class="card col-sm-11 col-md-5 col-lg-4 m-auto">
              <img class="card-img-top" src="../images/first.jpg" alt="Card image">
              <div class="card-body">
                  <span class="badge badge-success">P 99.99</span>
                  <h4>PREMIUM ACCOUNT</h4>
                  <p>- Lorem ipsum dolor sit amet, consectetur</p>
                  <p>- Sed do eiusmod tempor incididunt ut labore</p>
                  <p>- Ut enim ad minim veniam</p>
                  <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#premium">SELECT</a>
          
                  <div class="modal fade" id="premium" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Payment</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="cc-payment" class="control-label mb-1">deposit here XXXX-XXX-XXXX-XXX</label>
                                <input  name="paymentslip" type="file" class="form-control" aria-required="true" aria-invalid="false" required value="500.00">
                            </div>
                        </div>
                              
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <form action="{{route('users.update',Auth::user()->id)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="account_type" value="premium">
                          <button type="submit" class="btn btn-primary">Pay</button>
                          </form>
                            
                        </div>
                        </div>
                      </div>
                    </div>
            </div>
              </div>
              </div>
              
              @elseif(Auth::user()->account_type === 'premium')
                <h1>this account is not certified by admin yet.</h1>
              @endif
    
@endsection