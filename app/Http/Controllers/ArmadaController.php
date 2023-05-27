<?php

namespace App\Http\Controllers;

use App\Models\Armada;
use Illuminate\Http\Request;

class ArmadaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('armada.index');
    }

    /**
     * Get the data for listing in yajra.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getArmada(Request $request, Armada $armada)
    {
        $data = $armada->getData();
        return \DataTables::of($data)
            ->addColumn('Actions', function($data) {
                return '<button type="button" class="btn btn-success btn-sm" id="getEditArmada" data-id="'.$data->armada_id.'">Edit</button>
                    <button type="button" data-id="'.$data->armada_id.'" data-toggle="modal" data-target="#DeleteArmadaModal" class="btn btn-danger btn-sm" id="getDeleteId">Delete</button>';
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
    public function store(Request $request, Armada $armada)
    {
        $validator = \Validator::make($request->all(), [
            'armada_name' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        $armada->storeData($request->all());

        return response()->json(['success'=>'Armada added successfully']);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $armada
     * @return \Illuminate\Http\Response
     */
    public function show(Armada $armada)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $armada
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // dd($id);
        $armada = new Armada;
        $data = $armada->findData($id);

        $html = '<div class="form-group">
                    <label for="Title">Title:</label>
                    <input type="text" class="form-control" id="edit_armada_name" name="armada_name" value="'.$data->armada_name.'">
                </div>
                <div class="form-group">
                    <label for="armada_desc">Description:</label>
                    <textarea class="form-control" id="edit_armada_desc" name="armada_desc">'.$data->armada_desc.'
                    </textarea>
                <div class="form-group">
                    <label for="Status">Status:</label>
                    <input type="text" class="form-control" id="edit_status" name="status" value="'.$data->status.'">
                </div>
                <div class="form-group">
                    <label for="kategori_name">Kategori:</label>
                    <input type="text" class="form-control" id="edit_kategori_name" name="kategori_name" value="'.$data->kategori_name.'">
                </div>
                </div>';

        return response()->json(['html'=>$html]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $armada
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = \Validator::make($request->all(), [
            'armada_name' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        $armada = new Armada;
        $armada->updateData($id, $request->all());

        return response()->json(['success'=>'Armada updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $armada
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $armada = new Armada;
        $armada->deleteData($id);

        return response()->json(['success'=>'Armada deleted successfully']);
    }
}
