<?php

namespace App\Http\Controllers;

use App\Models\Agen;
use Illuminate\Http\Request;

class AgenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('agen.index');
    }

    /**
     * Get the data for listing in yajra.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getAgen(Request $request, Agen $agen)
    {
        $data = $agen->getData();
        return \DataTables::of($data)
            ->addColumn('Actions', function($data) {
                return '<button type="button" class="btn btn-success btn-sm" id="getEditAgen" data-id="'.$data->agen_id.'">Edit</button>
                    <button type="button" data-id="'.$data->agen_id.'" data-toggle="modal" data-target="#DeleteAgenModal" class="btn btn-danger btn-sm" id="getDeleteId">Delete</button>';
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
    public function store(Request $request, Agen $agen)
    {
        $validator = \Validator::make($request->all(), [
            'agen_name' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        $agen->storeData($request->all());

        return response()->json(['success'=>'Agen added successfully']);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $agen
     * @return \Illuminate\Http\Response
     */
    public function show(Agen $agen)
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
        $agen = new Agen;
        $data = $agen->findData($id);

        $html = '<div class="form-group">
                    <label for="Title">Title:</label>
                    <input type="text" class="form-control" id="edit_agen_name" name="agen_name" value="'.$data->agen_name.'">
                </div>
                <div class="form-group">
                    <label for="agen_desc">Description:</label>
                    <textarea class="form-control" id="edit_agen_desc" name="agen_desc">'.$data->agen_desc.'
                    </textarea>
                <div class="form-group">
                    <label for="Status">Status:</label>
                    <input type="text" class="form-control" id="edit_status" name="status" value="'.$data->status.'">
                </div>
                </div>';

        return response()->json(['html'=>$html]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $agen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = \Validator::make($request->all(), [
            'agen_name' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        $agen = new Agen;
        $agen->updateData($id, $request->all());

        return response()->json(['success'=>'Agen updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $agen
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $agen = new Agen;
        $agen->deleteData($id);

        return response()->json(['success'=>'Agen deleted successfully']);
    }
}
