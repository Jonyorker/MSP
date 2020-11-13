<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class BillingInformationController extends Controller
{
    public function index(User $user)
    {
        return view('dashboard', compact('user'));
    }

    public function edit(User $user)
    {
        //$this->authorize('update', $user->billing);

        return view('billing.edit', compact('user'));
    }

    public function update(User $user)
    {
        //$this->authorize('update', $user->billing);

        $data = request()->validate([
            'credit_card_number' => ['string'],
            'cvs' => ['string'],
            'expiry_date' => ['date'],
            'type' => ['string'],
        ]);

        auth()->user()->billinginformation->update($data);

        return redirect('/dashboard/' . auth()->user()->id);
    }
}
