@extends('layouts.main')
@section('content')
    <x-sidebar data="order_product" />

    <div class="main-panel">
        <div class="content">
            <x-notification />

            <form method="POST" action="{{ route('order-product.store') }}">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4 pr-md-1">
                                        <div class="form-group">
                                            <div class="container mt-5">
                                                <select id="choices-multiple-remove-button" name="selected_products[]"
                                                    placeholder="Select Products" multiple>
                                                    @foreach ($products as $product)
                                                        <option class="option" value={{ $product->id }}>
                                                            {{ $product->product_name }}
                                                        </option>
                                                    @endforeach

                                                </select>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <h5 class="title mt-4" id="test">Product Information</h5>

                                <table class="table col-md-12">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="text-center">Action</th>
                                            <th scope="col" class="text-center">Product Name</th>
                                            <th scope="col" class="text-center">Product Price</th>
                                            <th scope="col" class="text-center">Product Quantity</th>
                                            <th scope="col" class="text-center">Total Price</th>
                                            <th scope="col" class="text-center">Product Category</th>
                                        </tr>
                                    </thead>
                                    <tbody id="table_body">
                                    </tbody>
                                </table>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-fill btn-primary">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @include('modals.confirmation_modal')

    <script>
        $(document).ready(function() {

            var multipleCancelButton = new Choices('#choices-multiple-remove-button', {
                removeItemButton: true,
                maxItemCount: 100,
                searchResultLimit: 50,
                renderChoiceLimit: 5
            });

            $("#choices-multiple-remove-button").change(() => {
                selected = $("#choices-multiple-remove-button").find(':selected')

                items = []
                $.each(selected, (option, item) => {
                    items.push($(item).val())
                })

                $.ajax({
                    url: "{{ route('order-product') }}",
                    data: {
                        product_id: items
                    },
                    success: function(result) {
                        $('#table_body').html("")
                        if ((result.length)) {
                            result.forEach(product => {
                                let row = `<tr>
                                                <td class="col-md-1 pr-md-1 text-center ">
                                                    <span class="mx-2 icons delete_product_icon" id="delete_product"
                                                        data-product_id="" data-bs-toggle="modal"
                                                        data-bs-target="#confirmModal">
                                                        <i class="fa-solid fa-trash"></i>
                                                    </span>
                                                </td>
                                                <td class="col-md-2 pr-md-1">
                                                    <input type="text" class="form-control disabled_input" placeholder="Product Name"
                                                        name="product_name" id="product_name" value="${product.product_name}" disabled>
                                                </td>
                                                <td class="col-md-2 pr-md-1">
                                                    <input type="text" class="form-control product_price disabled_input" placeholder="Product Name"
                                                        name="price" id="product_price_${product.id}" value="${product.price}" disabled>
                                                </td>
                                                <td class="col-md-2 pr-md-1">
                                                    <input type="text" class="form-control product_quantity" placeholder="Product Name"
                                                        name="quantity" id="product_quantity_${product.id}" value="${product.quantity}">
                                                </td>
                                                <td class="col-md-2 pr-md-1">
                                                    <input type="text" class="form-control total_price disabled_input" placeholder="Product Name"
                                                        name="total" id="total_price_${product.id}" value="${product.total}" disabled>
                                                </td>
                                                <td class="col-md-2 pr-md-1">
                                                    <input type="text" class="form-control disabled_input" placeholder="Product Name"
                                                        name="category" id="product_category" value="${product.category}" disabled>
                                                </td>
                                            </tr>`;

                                $('#table_body').append(row)
                                $('#product_quantity_'+product.id).on('keyup', () => {
                                    product_price = $("#product_price_"+product.id).val();
                                    product_quantity = $('#product_quantity_'+product.id)
                                        .val();
                                    $('#total_price_'+product.id).val(product_price *
                                        product_quantity);
                                })
                                // let product_total_price = []
                                // product_total_price.p($('#total_price_'+product.id).val());
                                // // let total += product_total_price;

                                // console.log(product_total_price)
                            });
                        }


                    }
                });
            })



        });
    </script>
@endsection
