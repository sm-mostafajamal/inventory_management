<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Sale;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReportAndAnalyticsController extends Controller
{
    protected $products;
    protected $sales;
    public function  __construct(Product $product, Sale $sales)
    {
        $this->products = $product;
        $this->sales = $sales;
    }
    //
    public function index()
    {
        $filters_for_month = [
            'start_of_month' => Carbon::now()->startOfMonth()->toDateString(),
            'end_of_month' => Carbon::now()->endOfMonth()->toDateString(),
        ];
        $filters_for_today = [
            'count' => true,
            'today_sales' => Carbon::now()->toDateString()
        ];

        $products = $this->products->getAll();
        $data['products'] = $this->products->getAll();
        $today_total_sales = $this->sales->getAllDataWithProducts(null, $filters_for_today);
        $data['todays_sales'] = $today_total_sales;
        $sales_in_month = $this->sales->getAllDataWithProducts(null, $filters_for_month);
        $data['today_total_sales'] = count($today_total_sales);
        $data['sales_in_month'] = count($this->sales->getAllDataWithProducts(null, $filters_for_month));
        [ $data['total_amount_product_sale_in_month'], $data['today_total_sales_amount'] ] = $this->getTotalSales($sales_in_month, $today_total_sales);
        $data['total_products_needs_to_refill'] = $this->getTotalProductsToRefill($products);

        return view('report_and_analytics.index', $data);
    }


    public function getTotalSales($sales_in_month, $today_total_sales)
    {
        $total_amount_product_sale_in_month = 0;
        $today_total_sales_amount = 0;

        foreach ($sales_in_month as $sale) {
            $total_amount_product_sale_in_month += $sale->product_total_amount;
        }

        foreach ($today_total_sales as $sale) {
            $today_total_sales_amount += $sale->product_total_amount;
        }

        return [ $total_amount_product_sale_in_month, $today_total_sales_amount];
    }

    public function getTotalProductsToRefill($products)
    {
        $total_products_needs_to_refill = 0;
         foreach ($products as $product) {
            if($product->quantity <= Sale::QUANTITY_LIMIT) {
                $total_products_needs_to_refill++;
            }
        }
        return $total_products_needs_to_refill;
    }
}
