<?php

namespace App\Http\Controllers;

use App\Models\Device;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DeviceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'operating_system' => ['string'],
            'type_of_device' => ['string'],
            'computer_name' => ['string'],
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(), 400);
        }

        $device = Device::find($request->id);

        $device->operating_system = $request->operating_system;
        $device->type_of_device = $request->type_of_device;
        $device->computer_name = $request->computer_name;

        $device->save();

        //auth()->user()->devices()->update($request->all());

        return response()->json([
            'message' => 'Updated device ' . $device->computer_name,
            'Device information: ' => $device
        ], 201);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'operating_system' => ['string'],
            'type_of_device' => ['string'],
            'computer_name' => ['string'],
        ]);

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }

        auth()->user()->devices()->create($request->all());

        return response()->json([
            'message' => 'Added new device',
            'Device information: ' => auth()->user()->devices
        ], 201);
    }

    public function delete(Request $request)
    {
        $device = Device::find($request->id);
        $device->delete();

        return response()->json([
            'message' => 'Device deleted',
            'Device information: ' => auth()->user()->devices
        ], 201);

    }
}
