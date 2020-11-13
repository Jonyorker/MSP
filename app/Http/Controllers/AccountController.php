<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Nullable;

class AccountController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(User $user)
    {
        return view('dashboard', compact('user'));
    }

    public function edit(User $user)
    {
        //$this->authorize('update', $user->accountinformation);

        return view('accountinformation.edit', compact('user'));
    }

    public function update(User $user)
    {
        //$this->authorize('update', $user->accountinformation);

        $data = request()->validate([
            'first_name' => ['string'],
            'last_name' => ['string'],
            'date_of_birth' => ['date'],
            'gender' => ['string'],
            'phone_number' => ['string','digits_between:7,10'],
            'mobile_number' => ['string','digits_between:7,10', 'nullable'],
            'specialNotes' => ['string','nullable'],
        ]);

        auth()->user()->account->update($data);

        return redirect('/dashboard/' . auth()->user()->id);
    }

    /*public function store(User $user)
    {
        $data = request()->validate([
            'address_number' => ['string'],
            'address' => ['string'],
            'city' => ['string'],
            'province' => ['string'],
            'country' => ['string'],
            'postalCode' => ['string'],
            'phoneNumber'=> ['string'],
            'mobileNumber'=> ['string'],
            'specialNotes' => ['required','string']
        ]);

        //dd($user);

        auth()->user()->accountinformation->update($data);

        /*auth()->user()->accountinformation()->create([
            //'user_id' => auth()->user()->id,
            'address_number' => $data['address_number'],
            'address' => $data['address'],
            'city' => $data['city'],
            'province' => $data['province'],
            'country' => $data['country'],
            'postalCode' => $data['postalCode'],
            'phoneNumber'=> $data['phoneNumber'],
            'mobileNumber'=> $data['mobileNumber'],
            'specialNotes' => $data['specialNotes']
        ]);

        return redirect('/dashboard/' . auth()->user()->id);
    }*/
}
