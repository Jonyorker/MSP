<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TicketController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function unassignedTickets(Request $request){

        $tickets = Ticket::where('status', $request->status)->get();

        return response()->json([
            'message' => 'Unassigned tickets',
            'Unassigned Tickets: ' => $tickets
        ], 201);
    }

    public function assignedTickets(Request $request){

        $tickets = Ticket::where('status', $request->status)->get();

        return response()->json([
            'message' => 'Assigned tickets',
            'Unassigned Tickets: ' => $tickets
        ], 201);
    }

    public function completedTickets(Request $request){

        $tickets = Ticket::where('status', $request->status)->get();

        return response()->json([
            'message' => 'Completed tickets',
            'Unassigned Tickets: ' => $tickets
        ], 201);
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'device_id' => ['string'],
            'description' => ['string'],
        ]);

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }

        auth()->user()->tickets()->create(array_merge(
            $request->all(),
            ['status' => 'submitted'],
        ));

        return response()->json([
            'message' => 'Submitted a ticket',
            'Device information: ' => auth()->user()->tickets
        ], 201);
    }

    public function edit(Request $request)
    {

    }

    public function update(Request $request, Ticket $ticket)
    {
        $validator = Validator::make($request->all(), [
            'device_id' => ['string'],
            'description' => ['string'],
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(), 400);
        }

        $ticket = Ticket::find($request->id);

        $ticket->description = $request->description;

        $ticket->save();

        //auth()->user()->devices()->update($request->all());

        return response()->json([
            'message' => 'Updated ticket ' . $ticket,
            'Ticket information: ' => $ticket
        ], 201);
    }

    public function assign(Request $request)
    {
        $ticket = Ticket::find($request->id);

        $ticket->assignedTo = $request->assignedTo;
        $ticket->status = 'assigned';

        $ticket->save();

        //auth()->user()->devices()->update($request->all());
        $name = User::find($request->assignedTo);
        return response()->json([
            'message' => 'Ticket assigned to ' . $name->name,
            'Ticket information: ' => $ticket
        ], 201);
    }

    public function completeTicket(Request $request)
    {
        $ticket = Ticket::find($request->id);

        $ticket->status = 'completed';

        $ticket->save();

        //auth()->user()->devices()->update($request->all());

        return response()->json([
            'message' => 'Ticket completed ' . User::find($ticket->assignedTo)->name,
            'Ticket information: ' => $ticket
        ], 201);
    }
}
