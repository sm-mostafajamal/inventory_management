@extends('layouts.main')
@section('content')
    <x-sidebar data="product_management"/>

    <div class="main-panel">
        <div class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header button-header">
                            <h2 class="title">Product List</h2>
                            <a href="{{ route("product.add") }}">
                                <input type="button" value="Add New Product" class="btn btn-fill btn-primary">
                            </a>
                        </div>
                        <table class="table col-md-12">
                            <thead>
                            <tr>
                                <th scope="col" class="text-center"></th>
                                <th scope="col" class="text-center">Image</th>
                                <th scope="col" class="text-center">Product Name</th>
                                <th scope="col" class="text-center">Category</th>
                                <th scope="col" class="text-center">Quantity</th>
                                <th scope="col" class="text-center">Company Name</th>
                                <th scope="col" class="text-center"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($products as $product)
                                <tr>
                                    <td class="text-center">
                                        <button class="btn">Details</button>
                                    </td>
                                    <td class="text-center">
                                        <img src="{{  asset('assets/img'). '/' .$product->image }}" style="width: 100px" />
                                    </td>
                                    <td class="text-center">{{ $product->product_name }}</td>
                                    <td class="text-center">{{ $product->category }}</td>
                                    <td class="text-center">{{ $product->quantity }}</td>
                                    <td class="text-center">{{ $product->sr_company }}</td>
                                    <td class="text-center">
                                        <span class="mx-2">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                        </span>
                                        <span class="mx-2">
                                        <i class="fa-solid fa-trash"></i>
                                        </span>
                                    </td>
                                </tr>
                            @empty
                                <tr class="text-center">
                                    <td colspan="8">No data found!!!</td>
                                </tr>
                            @endforelse

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
