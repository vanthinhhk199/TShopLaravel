@extends('layouts.front')

@section('title')
    Check Out
@endsection

@section('content')
    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="#">Home</a>
                    <a class="breadcrumb-item text-dark" href="#">Shop</a>
                    <span class="breadcrumb-item active">Checkout</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Checkout Start -->
    <div class="container-fluid">
        <form action="{{ url('place-order') }}" method="POST">
            {{ csrf_field() }}
            <div class="row px-xl-5">
                @if ($cartitems->count() > 0)
                    <div class="col-lg-8">
                        <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Billing Address</span></h5>
                        <div class="bg-light p-30 mb-5">
                            <div class="row checkout-form">
                                <div class="col-md-6 form-group">
                                    <label>First Name</label>
                                    <input class="form-control firstname" required type="text" name="fname" value="{{ Auth::user()->fname }}" placeholder="Thinh">
                                    <span id="fname_error" class="text-danger"></span>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>Last Name</label>
                                    <input class="form-control lastname" required type="text" name="lname" value="{{ Auth::user()->lname }}" placeholder="Van">
                                    <span id="lname_error" class="text-danger"></span>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>E-mail</label>
                                    <input class="form-control email" required type="text" name="email" value="{{ Auth::user()->email }}" placeholder="vanthinh@email.com">
                                    <span id="email_error" class="text-danger"></span>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>Mobile No</label>
                                    <input class="form-control phone" required type="text" name="phone" value="{{ Auth::user()->phone }}" placeholder="+123 456 789">
                                    <span id="phone_error" class="text-danger"></span>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>Address Line 1</label>
                                    <input class="form-control address1" required type="text" name="address1" value="{{ Auth::user()->address1 }}" placeholder="VN Đà Nẽn">
                                    <span id="address1_error" class="text-danger"></span>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>Address Line 2</label>
                                    <input class="form-control address2" required type="text" name="address2" value="{{ Auth::user()->address2 }}" placeholder="VN Đà Nẽn">
                                    <span id="address2_error" class="text-danger"></span>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>Country</label>
                                    <input class="form-control city" required type="text" name="country" value="{{ Auth::user()->country }}" placeholder="Enter Country">
                                    <span id="city_error" class="text-danger"></span>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>City</label>
                                    <input class="form-control state" required type="text" name="city" value="{{ Auth::user()->city }}" placeholder="Đà Nẽn">
                                    <span id="state_error" class="text-danger"></span>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>State</label>
                                    <input class="form-control country" required type="text" name="state" value="{{ Auth::user()->state }}" placeholder="Đà Nẽn">
                                    <span id="country_error" class="text-danger"></span>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>Pin Code</label>
                                    <input class="form-control pincode" required type="text" name="pincode" value="{{ Auth::user()->pincode }}" placeholder="50813">
                                    <span id="pincode_error" class="text-danger"></span>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="collapse mb-5" id="shipping-address">
                            <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Shipping Address</span></h5>
                            <div class="bg-light p-30">
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label>First Name 123</label>
                                        <input class="form-control" type="text" placeholder="John">
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label>Last Name</label>
                                        <input class="form-control" type="text" placeholder="Doe">
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label>E-mail</label>
                                        <input class="form-control" type="text" placeholder="example@email.com">
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label>Mobile No</label>
                                        <input class="form-control" type="text" placeholder="+123 456 789">
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label>Address Line 1</label>
                                        <input class="form-control" type="text" placeholder="123 Street">
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label>Address Line 2</label>
                                        <input class="form-control" type="text" placeholder="123 Street">
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label>Country</label>
                                        <select class="custom-select">
                                            <option selected>United States</option>
                                            <option>Afghanistan</option>
                                            <option>Albania</option>
                                            <option>Algeria</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label>City</label>
                                        <input class="form-control" type="text" placeholder="New York">
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label>State</label>
                                        <input class="form-control" type="text" placeholder="New York">
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label>ZIP Code</label>
                                        <input class="form-control" type="text" placeholder="123">
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                    <div class="col-lg-4">
                        <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Order Total</span></h5>
                        <div class="bg-light p-30 mb-5">
                            <div class="border-bottom">
                                <h6 class="mb-3">Products</h6>
                                @php $total = 0 @endphp
                                @foreach ($cartitems as $item)
                                    @php $total += ($item->products->selling_price * $item->prod_qty) @endphp
                                    <div class="d-flex justify-content-between">
                                        <p>{{ $item->products->name }}</p>
                                        <p>{{ $item->prod_qty * $item->products->selling_price }} $</p>
                                    </div>
                                @endforeach
                            </div>
                            <div class="border-bottom pt-3 pb-2">
                                <div class="d-flex justify-content-between mb-3">
                                    <h6>Subtotal</h6>
                                    <h6>$0</h6>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <h6 class="font-weight-medium">Shipping</h6>
                                    <h6 class="font-weight-medium">$0</h6>
                                </div>
                            </div>
                            <div class="pt-2">
                                <div class="d-flex justify-content-between mt-2">
                                    <h5>Total</h5>
                                    <h5>{{ $total }}$</h5>
                                </div>
                            </div>
                        </div>
                        <div class="mb-5">
                            <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Payment</span></h5>
                            <div class="bg-light p-30">
                                <input type="hidden" name="payment_mode" value="COD">
                                <button type="submit" class="btn btn-block btn-primary font-weight-bold py-3">Place Order</button>
                                <div id="paypal-button-container" class="py-2"></div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="card-body text-center mt-5">
                        <h2>Your <i class="fa fa-shopping-cart"></i> No products in cart</h2>
                        <a href="{{ url('/') }}" class="btn btn-outline-primary float-end">Continue Shopping</a>
                    </div>
                @endif
            </div>
        </form>
    </div>
    <!-- Checkout End -->
@endsection

@section('scripts')

    <script src="https://www.paypal.com/sdk/js?client-id=AYxavrHdCLYLVUC6USfORhzyxE4KdzDrwa7Udf7vAfextpmVTK0UP1-4ToyKVDvB509M4A3rfxIOlj0w"></script>

    <script>

        paypal.Buttons({
        createOrder: function(data, actions) {
            // This function sets up the details of the transaction, including the amount and line item details.
            return actions.order.create({
            purchase_units: [{
                amount: {
                value: '{{ $total }}'
                }
            }]
            });
        },
        onApprove: function(data, actions) {
            // This function captures the funds from the transaction.
            return actions.order.capture().then(function(details) {
            // This function shows a transaction success message to your buyer.
            // alert('Transaction completed by ' + details.payer.name.given_name);

            var firstname = $('.firstname').val();
            var lastname = $('.lastname').val();
            var email = $('.email').val();
            var phone = $('.phone').val();
            var address1 = $('.address1').val();
            var address2 = $('.address2').val();
            var city = $('.city').val();
            var state = $('.state').val();
            var country = $('.country').val();
            var pincode = $('.pincode').val();

            if (!firstname) {
                fname_error = "First Name is required";
                $('#fname_error').html('');
                $('#fname_error').html(fname_error);
            }else{
                fname_error = "";
                $('#fname_error').html('');
            }
            if (!lastname) {
                lastname_error = "lastname is required";
                $('#lastname_error').html('');
                $('#lastname_error').html(lastname_error);
            }else{
                lastname_error = "";
                $('#lastname_error').html('');
            }
            if (!email) {
                email_error = "email is required";
                $('#email_error').html('');
                $('#email_error').html(email_error);
            }else{
                email_error = "";
                $('#email_error').html('');
            }
            if (!phone) {
                phone_error = "phone is required";
                $('#phone_error').html('');
                $('#phone_error').html(phone_error);
            }else{
                phone_error = "";
                $('#phone_error').html('');
            }
            if (!address1) {
                address1_error = "address1 is required";
                $('#address1_error').html('');
                $('#address1_error').html(address1_error);
            }else{
                address1_error = "";
                $('#address1_error').html('');
            }
            if (!address2) {
                address2_error = "address2 is required";
                $('#address2_error').html('');
                $('#address2_error').html(address2_error);
            }else{
                address2_error = "";
                $('#address2_error').html('');
            }
            if (!city) {
                city_error = "city is required";
                $('#city_error').html('');
                $('#city_error').html(city_error);
            }else{
                city_error = "";
                $('#city_error').html('');
            }
            if (!state) {
                state_error = "state is required";
                $('#state_error').html('');
                $('#state_error').html(state_error);
            }else{
                state_error = "";
                $('#state_error').html('');
            }
            if (!country) {
                country_error = "country is required";
                $('#country_error').html('');
                $('#country_error').html(country_error);
            }else{
                country_error = "";
                $('#country_error').html('');
            }
            if (!pincode) {
                pincode_error = "pincode is required";
                $('#pincode_error').html('');
                $('#pincode_error').html(pincode_error);
            }else{
                pincode_error = "";
                $('#pincode_error').html('');
            }

            if (fname_error != '' || lastname_error != '' || email_error != '' || phone_error != '' || address1_error != '' || address2_error != '' || city_error != '' || state_error != '' || country_error != '' || pincode_error != '') {
                return false;
            }else{
                $.ajax({
                    method: "POST",
                    url: "/place-order",
                    data: {
                        'fname':firstname,
                        'lname':lastname,
                        'email':email,
                        'phone':phone,
                        'address1':address1,
                        'address2':address2,
                        'city':city,
                        'state':state,
                        'country':country,
                        'pincode':pincode,
                        'payment_mode':"Paid by Paypal",
                        'payment_id':details.id,

                    },
                    success: function (response) {
                        swal("", response.status, "success")
                        .then((value) => {
                            window.location.href = "/my-orders";
                        });
                    }
                });
            }

            });
        }
        }).render('#paypal-button-container');
        //This function displays payment buttons on your web page.

    </script>

@endsection
