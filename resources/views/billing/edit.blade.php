@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="/billing/{{ $user->id }}" method="post">
            @csrf
            @method('PATCH')

            <div class="row">
                <div class="col-8 offset-2">
                    <div class="form-group row">
                        <label for="credit_card_number" class="col-md-4 col-form-label">Credit Card Number</label>

                        <div class="col-md-6">
                            <input id="credit_card_number" type="text"
                                   class="form-control @error('credit_card_number') is-invalid @enderror"
                                   name="credit_card_number" value="{{ old('credit_card_number') ?? $user->billingInformation->credit_card_number }}"
                                   required autocomplete="credit_card_number" autofocus>

                            @error('credit_card_number')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="cvs" class="col-md-4 col-form-label">CVS</label>

                        <div class="col-md-6">
                            <input id="cvs" type="text"
                                   class="form-control @error('cvs') is-invalid @enderror"
                                   name="cvs" value="{{ old('cvs') ?? $user->billingInformation->cvs }}"
                                   required autocomplete="cvs" autofocus>

                            @error('cvs')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="expiry_date" class="col-md-4 col-form-label">Expiry Date</label>

                        <div class="col-md-6">
                            <input id="expiry_date" type="date"
                                   class="form-control @error('expiry_date') is-invalid @enderror"
                                   name="expiry_date" value="{{ old('expiry_date') ?? $user->billingInformation->expiry_date }}"
                                   required autocomplete="expiry_date" autofocus>

                            @error('expiry_date')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="type" class="col-md-4 col-form-label">Type</label>

                        <div class="col-md-6">
                            <input id="type" type="text"
                                   class="form-control @error('type') is-invalid @enderror"
                                   name="type" value="{{ old('type') ?? $user->billingInformation->type }}"
                                   required autocomplete="type" autofocus>

                            @error('type')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row pt-4">
                        <button class="btn btn-primary">Update Billing Information</button>
                    </div>

                </div>
            </div>
        </form>
    </div>
@endsection
