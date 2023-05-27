<?php

namespace App\Http\Controllers;

use App\Models\Kota;
use Illuminate\Http\Request;

class KotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('kota.index');
    }

    /**
     * Get the data for listing in yajra.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getKota(Request $request, Kota $kota)
    {
        $data = $kota->getData();
        return \DataTables::of($data)
            ->addColumn('Actions', function($data) {
                return '<button type="button" class="btn btn-success btn-sm" id="getEditKota" data-id="'.$data->kota_id.'">Edit</button>
                    <button type="button" data-id="'.$data->kota_id.'" data-toggle="modal" data-target="#DeleteKotaModal" class="btn btn-danger btn-sm" id="getDeleteId">Delete</button>';
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
    public function store(Request $request, Kota $kota)
    {
        $validator = \Validator::make($request->all(), [
            'kota_name' => 'required',
            'lokasi_berhenti' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        $kota->storeData($request->all());

        return response()->json(['success'=>'Kota added successfully']);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $kota
     * @return \Illuminate\Http\Response
     */
    public function show(Kota $kota)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $kota
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // dd($id);
        $kota = new Kota;
        $data = $kota->findData($id);

        $html = '<div class="form-group">
                    <label for="Title">Title:</label>
                    <input type="text" class="form-control" id="edit_kota_name" name="kota_name" value="'.$data->kota_name.'">
                </div>
                <div class="form-group">
                    <label for="lokasi_berhenti">Description:</label>
                    <textarea class="form-control" id="edit_lokasi_berhenti" name="lokasi_berhenti">'.$data->lokasi_berhenti.'
                    </textarea>
                </div>
                <div class="form-group">
                    <label for="kota_desc">Description:</label>
                    <textarea class="form-control" id="edit_kota_desc" name="kota_desc">'.$data->kota_desc.'
                    </textarea>
                </div>
                <div class="form-group">
                    <label for="Status">Status:</label>
                    <input type="text" class="form-control" id="edit_status" name="status" value="'.$data->status.'">
                </div>';

        return response()->json(['html'=>$html]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $kota
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = \Validator::make($request->all(), [
            'kota_name' => 'required',
            'lokasi_berhenti' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        $kota = new Kota;
        $kota->updateData($id, $request->all());

        return response()->json(['success'=>'Kota updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $kota
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kota = new Kota;
        $kota->deleteData($id);

        return response()->json(['success'=>'Kota deleted successfully']);
    }
}
