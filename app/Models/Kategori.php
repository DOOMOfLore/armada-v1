<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $table = 'kategori_armada';
    protected $guarded = array();

    protected $fillable = [
        'kategori_name',
        'kategori_kelas',
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
        return static::where('kategori_id', '=', $id)->first();
    }

    public function updateData($id, $input)
    {
        return static::where('kategori_id', '=', $id)->update($input);
    }

    public function deleteData($id)
    {
        return static::where('kategori_id', '=', $id)->delete();
    }
}
