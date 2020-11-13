@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="/accountinformation/{{ $user->id }}" method="post">
            @csrf
            @method('PATCH')

            <div class="row">
                <div class="col-8 offset-2">
                    <div class="form-group row">
                        <label for="first_name" class="col-md-4 col-form-label">First name</label>

                        <div class="col-md-6">
                            <input id="first_name" type="text"
                                   class="form-control @error('first_name') is-invalid @enderror"
                                   name="first_name" value="{{ old('first_name') ?? $user->account->first_name }}"
                                   required autocomplete="first_name" autofocus>

                            @error('first_name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="last_name" class="col-md-4 col-form-label">Last Name</label>

                        <div class="col-md-6">
                            <input id="last_name" type="text"
                                   class="form-control @error('last_name') is-invalid @enderror"
                                   name="last_name" value="{{ old('last_name') ?? $user->account->last_name }}"
                                   required autocomplete="last_name" autofocus>

                            @error('last_name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="date_of_birth" class="col-md-4 col-form-label">Date of Birth</label>

                        <div class="col-md-6">
                            <input id="date_of_birth" type="date"
                                   class="form-control @error('date_of_birth') is-invalid @enderror"
                                   name="date_of_birth" value="{{ old('date_of_birth') ?? $user->account->date_of_birth }}"
                                   required autocomplete="date_of_birth" autofocus>

                            @error('date_of_birth')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="gender" class="col-md-4 col-form-label">Gender</label>

                        <div class="col-md-6">

                            <input id="gender" type="text"
                                   class="form-control @error('gender') is-invalid @enderror"
                                   name="gender" value="{{ old('gender') ?? $user->account->gender }}"
                                   required autocomplete="gender" autofocus>

                            @error('gender')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="phone_number" class="col-md-4 col-form-label">Phone Number</label>

                        <div class="col-md-6">
                            <input id="phone_number" type="text"
                                   class="form-control @error('phone_number') is-invalid @enderror"
                                   name="phone_number" value="{{ old('phone_number') ?? $user->account->phone_number }}"
                                   required autocomplete="phone_number" autofocus>

                            @error('phone_number')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="mobile_number" class="col-md-4 col-form-label">Mobile Number</label>

                        <div class="col-md-6">
                            <input id="mobile_number" type="text"
                                   class="form-control @error('mobile_number') is-invalid @enderror"
                                   name="mobile_number" value="{{ old('mobile_number') ?? $user->account->mobile_number }}"
                                   autocomplete="mobile_number" autofocus>

                            @error('mobile_number')
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
                                   name="specialNotes" value="{{ old('specialNotes') ?? $user->account->specialNotes }}"
                                   autocomplete="specialNotes" autofocus>

                            @error('specialNotes')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row pt-4">
                        <button class="btn btn-primary">Update Personal Information</button>
                    </div>

                </div>
            </div>
        </form>
    </div>
@endsection
