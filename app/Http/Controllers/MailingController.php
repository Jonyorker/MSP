<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MailingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function update(Request $request)
    {
        //$this->authorize('update', $user->mailing);

        $validator = Validator::make($request->all(), [
            'address_number' => ['string'],
            'address' => ['string'],
            'city' => ['string'],
            'province' => ['string'],
            'country' => ['string'],
            'postalCode' => ['string'],
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(), 400);
        }

        auth()->user()->mailing->update($request->all());

        return response()->json([
            'message' => 'Users mailing information successfully updated',
            'Account information: ' => auth()->user()->mailing
        ], 201);
    }
}
