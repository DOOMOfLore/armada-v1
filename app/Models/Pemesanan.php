<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    use HasFactory;

    protected $table = 'kota_pemesanan';
    protected $guarded = array();

    protected $fillable = [
        'nama_pemesanan',
        'email_pemesanan',
        'nomor_pemesanan',
        'bukti_bayar',
        'pemesanan_id',
        'kategori_id',
        'kota_id',
        'agen_id',
        'status',
        'created_at',
        'updated_at',
    ];

    public function getData()
    {
        return static::orderBy('created_at','desc')->get();
    }

    public function storeData($input)
    {
    	return static::create($input);
    }

    public function findData($id)
    {
        return static::where('pemesanan_id', '=', $id)->first();
    }

    public function updateData($id, $input)
    {
        return static::where('pemesanan_id', '=', $id)->update($input);
    }

    public function deleteData($id)
    {
        return static::where('pemesanan_id', '=', $id)->delete();
    }
}
