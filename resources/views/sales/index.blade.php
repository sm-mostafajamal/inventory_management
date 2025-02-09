@extends('layouts.main')
@section('content')
    <x-sidebar data="sales"/>

    <div class="main-panel">
        <div class="content">
            <x-notification/>

            <form method="POST" action="{{ route('sales') }}">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                            <h2 class="title mt-4" id="test">Sale Lists</h2>

                                <table class="table col-md-12">
                                    <thead>
                                    <tr>
                                        <th scope="col" class="text-center">Serial</th>
                                        <th scope="col" class="text-center">Product Name</th>
                                        <th scope="col" class="text-center">Product Category</th>
                                        <th scope="col" class="text-center">Product Ordered Quantity</th>
                                        <th scope="col" class="text-center">Product Total Amount</th>
                                        <th scope="col" class="text-center">Created At</th>
                                        <th scope="col" class="text-center">Updated At</th>
                                    </tr>
                                    </thead>
                                    <tbody id="table_body">
                                    @foreach($products as $product)
                                        <tr>
                                            <td class="text-center">{{ $loop->index + 1 }}</td>
                                            <td class="text-center">{{ $product->product_name }}</td>
                                            <td class="text-center">{{ $product->category }}</td>
                                            <td class="text-center">{{ $product->ordered_quantity }}</td>
                                            <td class="text-center">{{ $product->product_total_amount }}</td>
                                            <td class="text-center">{{ $product->created_at }}</td>
                                            <td class="text-center">{{ $product->updated_at }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="paginate col-12 d-flex justify-content-between">
                    <div class="pagination_total">Total Sold: {{ $products->total() }}</div>
                    <div class="">{{ $products->links() }}</div>
                </div>
            </form>
        </div>
    </div>
@endsection
