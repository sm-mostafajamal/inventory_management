<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;
    protected $table='sales';
    public $timestamps = false;
    protected $guarded=[];
    public function insertData($data)
    {
        $this->create($data);
        return true;
    }

    public function getAllDataWithProducts()
    {
        return $this->join('products','products.id','=','sales.product_id')
                    ->get();
    }
}
