@extends('layouts.main')
@section('content')
    <x-sidebar data="product_management"/>

    <div class="main-panel">
        <div class="content">
            <x-notification />

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header button-header">
                            <h2 class="title">Product List</h2>
                            <a href="{{ route("product.add") }}">
                                <input type="button" value="Add New Product" class="btn btn-fill btn-primary">
                            </a>
                        </div>
                        <form method="POST" action="{{ route('product-management') }}" id="product_form">
                        @csrf
                            <input type="hidden" name="product_id" id="product_id">
                            <input type="hidden" name="action" id="action">

                            <table class="table col-md-12">
                            <thead>
                            <tr>
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
                                        <img src="{{  asset('assets/img').'/'.$product->image }}" style="width: 100px" />
                                    </td>
                                    <td class="text-center">{{ $product->product_name }}</td>
                                    <td class="text-center">{{ $product->category }}</td>
                                    <td class="text-center">{{ $product->quantity }}</td>
                                    <td class="text-center">{{ $product->sr_company }}</td>
                                    <td class="text-center">
                                        <span class="mx-2" id="view_product_detail">
                                            <i class="fa-regular fa-eye"></i>
                                        </span>
                                        <span class="mx-2" id="edit_product">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </span>
                                        <span class="mx-2"
                                              id="delete_product"
                                              data-bs-toggle="modal"
                                              data-bs-target="#confirmModal"
                                              style="cursor: pointer">
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
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-confirmation_modal />

    <script>
        $(() => {
            $('#delete_product').click(() => {
                $('#product_id').val({{ $product->id ?? '' }})
                $('#action').val('delete')
                $('#confirm_btn').click(() => {
                    $('#product_form').submit()
                })
            })

        })
    </script>
@endsection
