@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="/account" method="post">
            @csrf
            <div class="row">
                <div class="col-8 offset-2">
                    <div class="form-group row">
                        <label for="address_number" class="col-md-4 col-form-label">Civic Number</label>

                        <div class="col-md-6">
                            <input id="address_number" type="number"
                                   class="form-control @error('address_number') is-invalid @enderror"
                                   name="address_number" value="{{ old('address_number') ?? }}"
                                   required autocomplete="address_number" autofocus>

                            @error('address_number')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="address" class="col-md-4 col-form-label">Address</label>

                        <div class="col-md-6">
                            <input id="address" type="text"
                                   class="form-control @error('address') is-invalid @enderror"
                                   name="address" value="{{ old('address') }}"
                                   required autocomplete="address" autofocus>

                            @error('address')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="city" class="col-md-4 col-form-label">City</label>

                        <div class="col-md-6">
                            <input id="city" type="text"
                                   class="form-control @error('city') is-invalid @enderror"
                                   name="city" value="{{ old('city') }}"
                                   required autocomplete="city" autofocus>

                            @error('city')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="province" class="col-md-4 col-form-label">Province</label>

                        <div class="col-md-6">
                            <input id="province" type="text"
                                   class="form-control @error('province') is-invalid @enderror"
                                   name="province" value="{{ old('province') }}"
                                   required autocomplete="province" autofocus>

                            @error('province')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="country" class="col-md-4 col-form-label">Country</label>

                        <div class="col-md-6">
                            <input id="country" type="text"
                                   class="form-control @error('country') is-invalid @enderror"
                                   name="country" value="{{ old('country') }}"
                                   required autocomplete="country" autofocus>

                            @error('country')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="postalCode" class="col-md-4 col-form-label">Postal Code</label>

                        <div class="col-md-6">
                            <input id="postalCode" type="text"
                                   class="form-control @error('postalCode') is-invalid @enderror"
                                   name="postalCode" value="{{ old('postalCode') }}"
                                   required autocomplete="postalCode" autofocus>

                            @error('postalCode')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="phoneNumber" class="col-md-4 col-form-label">Phone Number</label>

                        <div class="col-md-6">
                            <input id="phoneNumber" type="number"
                                   class="form-control @error('phoneNumber') is-invalid @enderror"
                                   name="phoneNumber" value="{{ old('phoneNumber') }}"
                                   required autocomplete="phoneNUmber" autofocus>

                            @error('phoneNumber')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="mobileNumber" class="col-md-4 col-form-label">Mobile Number</label>

                        <div class="col-md-6">
                            <input id="mobileNumber" type="number"
                                   class="form-control @error('mobileNumber') is-invalid @enderror"
                                   name="mobileNumber" value="{{ old('mobileNumber') }}"
                                   required autocomplete="mobileNumber" autofocus>

                            @error('mobileNumber')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="specialNotes" class="col-md-4 col-form-label">Special notes</label>

                        <div class="col-md-6">
                            <input id="specialNotes" type="text"
                                   class="form-control @error('specialNotes') is-invalid @enderror"
                                   name="specialNotes" value="{{ old('specialNotes') }}"
                                   required autocomplete="specialNotes" autofocus>

                            @error('specialNotes')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row pt-4">
                        <button class="btn btn-primary">Submit</button>
                    </div>

                </div>
            </div>
        </form>
    </div>
@endsection
