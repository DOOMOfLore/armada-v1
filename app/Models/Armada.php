<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Armada extends Model
{
    use HasFactory;

    protected $table = 'armada';
    protected $guarded = array();

    protected $fillable = [
       'armada_name', 'armada_desc', 'status', 'kategori_name', 'created_at', 'updated_at'
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
        return static::where('armada_id', '=', $id)->first();
    }

    public function updateData($id, $input)
    {
        return static::where('armada_id', '=', $id)->update($input);
    }

    public function deleteData($id)
    {
        return static::where('armada_id', '=', $id)->delete();
    }
}
