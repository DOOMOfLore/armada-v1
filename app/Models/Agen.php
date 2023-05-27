<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agen extends Model
{
    use HasFactory;

    protected $table = 'agen';
    protected $guarded = array();

    protected $fillable = [
       'agen_name', 'agen_desc', 'status', 'created_at', 'updated_at'
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
        return static::where('agen_id', '=', $id)->first();
    }

    public function updateData($id, $input)
    {
        return static::where('agen_id', '=', $id)->update($input);
    }

    public function deleteData($id)
    {
        return static::where('agen_id', '=', $id)->delete();
    }
}
