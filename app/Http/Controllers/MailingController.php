<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class MailingController extends Controller
{
    public function index(User $user)
    {
        return view('dashboard', compact('user'));
    }

    public function edit(User $user)
    {
        //$this->authorize('update', $user->mailing);

        return view('mailing.edit', compact('user'));
    }

    public function update(User $user)
    {
        //$this->authorize('update', $user->mailing);

        $data = request()->validate([
            'address_number' => ['string'],
            'address' => ['string'],
            'city' => ['string'],
            'province' => ['string'],
            'country' => ['string'],
            'postalCode' => ['string'],
        ]);

        auth()->user()->mailing->update($data);

        return redirect('/dashboard/' . auth()->user()->id);
    }
}
