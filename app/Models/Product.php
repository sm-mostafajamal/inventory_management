<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $guarded = [];

    public function getAll()
    {
        return self::all();
    }
    public function insertData($data)
    {
        return self::create($data);
    }

    public function deleteById($id)
    {
        return self::where('id', $id)->delete();
    }
}
