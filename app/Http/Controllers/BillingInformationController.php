<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BillingInformationController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function edit(User $user)
    {
        //$this->authorize('update', $user->billing);

        return view('billing.edit', compact('user'));
    }

    public function update(Request $request) {
        $validator = Validator::make($request->all(), [
            'credit_card_number' => ['string'],
            'cvs' => ['string'],
            'expiry_date' => ['date'],
            'type' => ['string'],
        ]);

        auth()->user()->billinginformation->update($request->all());

        return response()->json([
            'message' => 'Users billing information successfully updated',
            'Account information: ' => auth()->user()->billinginformation
        ], 201);
    }
}
