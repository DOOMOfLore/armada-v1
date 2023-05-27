<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kota extends Model
{
    use HasFactory;

    protected $table = 'kota';
    protected $guarded = array();

    protected $fillable = [
       'kota_name', 'lokasi_berhenti', 'kota_desc', 'status', 'created_at', 'updated_at'
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
        return static::where('kota_id', '=', $id)->first();
    }

    public function updateData($id, $input)
    {
        return static::where('kota_id', '=', $id)->update($input);
    }

    public function deleteData($id)
    {
        return static::where('kota_id', '=', $id)->delete();
    }
}
