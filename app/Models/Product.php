<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $guarded = [];

    const PAGE_LIMIT = 5;


    public $product_category = [
        "Beverages" => "beverages",
        "Bakery" => "bakery",
        "Jarred Goods" => "jarred",
        "Dairy" => "dairy",
        "Baking Goods" => "baking",
        "Frozen Foods" => "frozen",
        "Meat" => "meat",
        "Produce" => "produce",
        "Cleaners" => "cleaners",
        "Paper Goods" => "paper_goods",
        "Personal Care" => "personal_care",
        "Others" => "others",
    ];

    public function getAll($paginate=null)
    {
        $query = $this->query();

        if(!empty($paginate)) {
            return $query->paginate($paginate);
        }
        return $query->get();
    }

    public function getDataByFilters($filters)
    {
        return self::select($filters)->where('quantity', '>', 0 )->get();
    }
    public function insertData($data)
    {
        return self::create($data);
    }

    public function deleteById($id)
    {
        return self::where('id', $id)->delete();
    }

    public function getById($id)
    {
        return self::whereIn('id', $id)->get();
    }
    public function updateData($id, $data)
    {
        return self::where('id', $id)->update($data);
    }
}
