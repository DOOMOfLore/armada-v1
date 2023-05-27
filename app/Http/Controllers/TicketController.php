<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('ticket.index');
    }

    /**
     * Get the data for listing in yajra.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getTicket(Request $request, Ticket $ticket)
    {
        $data = $ticket->getData();
        return \DataTables::of($data)
            ->addColumn('Actions', function($data) {
                return '<button type="button" class="btn btn-success btn-sm" id="getEditTicket" data-id="'.$data->ticket_id.'">Edit</button>
                    <button type="button" data-id="'.$data->ticket_id.'" data-toggle="modal" data-target="#DeleteTicketModal" class="btn btn-danger btn-sm" id="getDeleteId">Delete</button>';
            })
            ->rawColumns(['Actions'])
            ->make(true);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Ticket $ticket)
    {
        $validator = \Validator::make($request->all(), [
            'name_ticket' => 'required',
            'nominal' => 'required',
            'kota_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        $ticket->storeData($request->all());

        return response()->json(['success'=>'Ticket added successfully']);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $agen
     * @return \Illuminate\Http\Response
     */
    public function show(Ticket $ticket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $agen
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // dd($id);
        $ticket = new Ticket;
        $data = $ticket->findData($id);

        $html = '<div class="form-group">
                    <label for="Ticket Name">Ticket Name:</label>
                    <input type="text" class="form-control" id="edit_name_ticket" name="name_ticket" value="'.$data->name_ticket.'">
                </div>
                <div class="form-group">
                    <label for="Nominal">Nominal:</label>
                    <input type="text" class="form-control" id="edit_nominal" name="nominal" value="'.$data->nominal.'">
                </div>
                <div class="form-group">
                    <label for="Status">Status:</label>
                    <input type="text" class="form-control" id="edit_status" name="status" value="'.$data->status.'">
                </div>
                <div class="form-group">
                    <label for="Kota ID">Kota ID:</label>
                    <input type="text" class="form-control" id="edit_kota_id" name="kota_id" value="'.$data->kota_id.'">
                </div>
                </div>';

        return response()->json(['html'=>$html]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = \Validator::make($request->all(), [
            'name_ticket' => 'required',
            'nominal' => 'required',
            'kota_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        $ticket = new Ticket;
        $ticket->updateData($id, $request->all());

        return response()->json(['success'=>'Ticket updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $agen
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ticket = new Ticket;
        $ticket->deleteData($id);

        return response()->json(['success'=>'Ticket deleted successfully']);
    }
}
