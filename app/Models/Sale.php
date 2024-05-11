<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;
    protected $table='sales';
    public $timestamps = false;
    protected $guarded=[];
    const QUANTITY_LIMIT = 5;

    public function insertData($data)
    {
        return $this->create($data);
    }

    public function getAllDataWithProducts($paginate=null, $filter=[])
    {
        $query = $this->query();

        $query->join('products','products.id','=','sales.product_id');

        if (!empty($filter['today_sales'])) {
            $query->where('sales.created_at', 'like', '%' . $filter['today_sales'] . '%');
        }

        if (!empty($filter['start_of_month']) && !empty($filter['end_of_month'])) {
            $query->whereBetween('sales.created_at', [$filter['start_of_month'], $filter['end_of_month']]);
        }

        if(!empty($paginate)) {
            return $query->paginate($paginate);
        }

        return $query->get();
    }
}
