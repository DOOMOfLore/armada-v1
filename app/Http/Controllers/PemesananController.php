<?php

namespace App\Http\Controllers;

use App\Helpers\Helpers;
use App\Models\Pemesanan;
use Illuminate\Http\Request;

class PemesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list_armada = Helpers::listArmada();

        // dd($list_armada);
        return view('pemesanan.index');
    }

    /**
     * Get the data for listing in yajra.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getPemesanan(Request $request, Pemesanan $pemesanan)
    {
        $data = $pemesanan->getData();
        return \DataTables::of($data)
            ->addColumn('Actions', function($data) {
                return '<button type="button" class="btn btn-success btn-sm" id="getEditPemesanan" data-id="'.$data->pemesanan_id.'">Edit</button>
                    <button type="button" data-id="'.$data->pemesanan_id.'" data-toggle="modal" data-target="#DeleteArmadaModal" class="btn btn-danger btn-sm" id="getDeleteId">Delete</button>';
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
    public function store(Request $request, Pemesanan $armada)
    {
        // dd($request->all());
        $validator = \Validator::make($request->all(), [
            'nama_pemesanan' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        $armada->storeData($request->all());

        return response()->json(['success'=>'Pemesanan added successfully']);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $armada
     * @return \Illuminate\Http\Response
     */
    public function show(Pemesanan $armada)
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
        $armada = new Pemesanan;
        $data = $armada->findData($id);

        $html = '
                <div class="form-group">
                    <label for="nama_pemesanan">Nama Pemesan:</label>
                    <input type="text" class="form-control" name="nama_pemesanan" id="nama_pemesanan" value="'.$data->nama_pemesanan.'">
                </div>
                <div class="form-group">
                    <label for="email_pemesanan">Email Pemesan:</label>
                    <input type="email" class="form-control" name="email_pemesanan" id="email_pemesanan" value="'.$data->email_pemesanan.'">
                </div>
                <div class="form-group">
                    <label for="nomor_pemesanan">Nomor Pemesan:</label>
                    <input type="text" class="form-control" name="nomor_pemesanan" id="nomor_pemesanan" value="'.$data->nomor_pemesanan.'">
                </div>
                <div class="form-group">
                    <label for="bukti_bayar">Bukti Bayar:</label>
                    <input type="text" class="form-control" name="bukti_bayar" id="bukti_bayar" value="'.$data->bukti_bayar.'">
                </div>
                <div class="form-group">
                    <label class="control-label">Armada:</label>
                    <select class="form-control" id="armada_id" name="armada_id" value="'.$data->armada_id.'">
                        <?= Helpers::listArmada(); ?>
                    </select>
                </div>
                <div class="form-group">
                    <label class="control-label">Kategori:</label>
                    <select class="form-control" id="kategori_id" name="kategori_id" value="'.$data->kategori_id.'">
                        <?= Helpers::listKategori(); ?>
                    </select>
                </div>
                <div class="form-group">
                    <label class="control-label">Kota:</label>
                    <select class="form-control" id="kota_id" name="kota_id" value="'.$data->kota_id.'">
                        <?= Helpers::listKotaTujuan(); ?>
                    </select>
                </div>
                <div class="form-group">
                    <label class="control-label">Agen:</label>
                    <select class="form-control" id="agen_id" name="agen_id" value="'.$data->agen_id.'">
                        <?= Helpers::listAgen(); ?>
                    </select>
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

        $armada = new Pemesanan;
        $armada->updateData($id, $request->all());

        return response()->json(['success'=>'Pemesanan updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $armada
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $armada = new Pemesanan;
        $armada->deleteData($id);

        return response()->json(['success'=>'Pemesanan deleted successfully']);
    }
}
