@extends('layouts.main')

@section('content')
    <x-sidebar data="report_and_analytics"/>

    <div class="content">

        <div class="row">
            <div class="col-lg-4">
                <div class="card card-chart">
                    <div class="card-header">
                        <h3 class="h3 text-center">Total Products Needs To Refill</h3>
                        <h3 class="card-title text-center"><i
                                class="tim-icons icon-bell-55 text-primary"></i> {{ $total_products_needs_to_refill }}
                        </h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card card-chart">
                    <div class="card-header">
                        <h5 class="text-center h3">Daily Sales</h5>
                        <div class="daily-sales d-flex justify-content-around">
                            <h3 class="card-title"><i class="fa-brands fa-product-hunt"></i> {{ $today_total_sales }}
                            </h3>
                            <h3 class="card-title"><i
                                    class="fa-solid fa-dollar-sign"></i> {{ $today_total_sales_amount }}
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card card-chart">
                    <div class="card-header">
                        <h5 class="h3 text-center">Total Sales</h5>
                        <div class="daily-sales d-flex justify-content-around">
                            <h3 class="card-title"><i class="fa-brands fa-product-hunt"></i> {{ $sales_in_month }} </h3>
                            <h3 class="card-title"><i
                                    class="fa-solid fa-dollar-sign"></i> {{ $total_amount_product_sale_in_month }} TK
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="card card-tasks">
                    <div class="card-header ">
                        <h4 class="card-title">Products Sold Today <strong style="color: #00e3b7">({{ $today_total_sales }})</strong></h4>
                    </div>
                    <div class="card-body ">
                        <div class="table-full-width table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                <tr>
                                    <th>Product Name</th>
                                    <th>Product Category</th>
                                    <th class="text-center">Product Quantity</th>
                                    <th class="text-center">Product Price</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($todays_sales as $sales)
                                    <tr>
                                        <td class="py-3">{{ $sales->product_name }}</td>
                                        <td>{{ $sales->category }}</td>
                                        <td class="text-center">{{ $sales->ordered_quantity }}</td>
                                        <td class="text-center">{{ $sales->product_total_amount }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="card card-tasks">
                    <div class="card-header ">
                        <h4 class="card-title">Products Needs To Refill <strong style="color: red">({{ $total_products_needs_to_refill }})</strong></h4>
                    </div>
                    <div class="card-body ">
                        <div class="table-full-width table-responsive">
                            <table class="table">
                                <thead class="text-primary">
                                    <tr>
                                        <th >Product Name</th>
                                        <th>Product Category</th>
                                        <th class="text-center">Product Quantity</th>
                                        <th class="text-center">Product Price</th>
                                        <th>SR Company Name</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($products as $product)
                                    @if($product->quantity <= \App\Models\Sale::QUANTITY_LIMIT)
                                        <tr>
                                            <td class="py-3">{{ $product->product_name }}</td>
                                            <td>{{ $product->category }}</td>
                                            <td class="text-center">{{ $product->quantity }}</td>
                                            <td class="text-center">{{ $product->price }}</td>
                                            <td>{{ $product->sr_company }}</td>
                                        </tr>
                                    @endif
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

