<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $table = 'ticket';
    protected $guarded = array();

    protected $fillable = [
       'ticket_name', 'nominal', 'status', 'kota_id', 'created_at', 'updated_at'
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
        return static::where('ticket_id', '=', $id)->first();
    }

    public function updateData($id, $input)
    {
        return static::where('ticket_id', '=', $id)->update($input);
    }

    public function deleteData($id)
    {
        return static::where('ticket_id', '=', $id)->delete();
    }
}
