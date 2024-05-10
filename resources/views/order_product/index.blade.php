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
                            <h2 class="title mt-4 mb-0" id="test">Order Product</h2>

                                <div class="row">
                                    <div class="col-md-4 pr-md-1">
                                        <div class="form-group">
                                            <div class="container select_product mt-5 mb-4">
                                                <select id="choices-multiple-remove-button" name="selected_product_id[]"
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
                                    <button type="submit" class="btn btn-fill btn-primary d-none" id="print_btn">Save</button>
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
                        let sum = 0

                        if ((result.length)) {
                            $('#print_btn').removeClass('d-none')
                            $('#empty_select_list').addClass('d-none')
                            result.forEach((product) => {
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
                                                        name="product_name[${product.id}]" id="product_name" value="${product.product_name}" readonly tabindex="-1">
                                                </td>

                                                <td class="col-md-2 pr-md-1">
                                                    <input type="text" class="form-control product_price disabled_input" placeholder="Product Name"
                                                        name="product_price[${product.id}]" id="product_price_${product.id}" value="${product.price}" readonly tabindex="-1">
                                                </td>
                                                <td class="col-md-2 pr-md-1">
                                                    <input type="text" class="form-control product_quantity" placeholder="Product Name"
                                                        name="quantity[${product.id}]" id="product_quantity_${product.id}" value="${product.quantity}">
                                                </td>
                                                <td class="col-md-2 pr-md-1">
                                                    <input type="text" class="form-control total_price disabled_input" placeholder="Product Name"
                                                        name="total_purchased_price[${product.id}]" id="total_price_${product.id}" value="${product.total}" readonly tabindex="-1">
                                                </td>

                                                <td class="col-md-2 pr-md-1">
                                                    <input type="text" class="form-control disabled_input" placeholder="Product Name"
                                                        name="category[${product.id}]" id="product_category" value="${product.category}" readonly tabindex="-1">
                                                </td>
                                            </tr>`;

                                $('#table_body').append(row)
                                $('#product_quantity_'+product.id).on('keyup', () => {
                                    let product_price = $("#product_price_"+product.id).val();
                                    let product_quantity = $('#product_quantity_'+product.id)
                                        .val();
                                    let total_price = product_price * product_quantity;
                                    $('#total_price_'+product.id).val(total_price);
                                })

                                $(`#product_quantity_${product.id}, .choices__inner, .choices__input, .choices__list, .choices__list choices__list--dropdown`).on("click keyup change",(e) => {
                                    sum = 0
                                    $('.total_price').each((id, el) => {
                                        sum += Number($(el).val())
                                        $('.bottom_price').text('Total Price '+sum)

                                    })
                                })
                            });
                            let total_row = `
                                    <tr>
                                        <td class="text-center bottom_price" colspan="6" style="font-size: 1rem; font-weight: bolder"></td>
                                    </tr>`;

                            $('#table_body').append(total_row)
                        }else {
                            $('#print_btn').addClass('d-none')
                            $('#empty_select_list').removeClass('d-none')
                        }
                    }
                });
            })

            let empty_select_list = `
                                    <tr>
                                        <td class="text-center bottom_price" id="empty_select_list" colspan="6" style="font-size: 1rem; font-weight: bolder">Please Select a Product</td>
                                    </tr>`;

            $('#table_body').append(empty_select_list)


        });
    </script>
@endsection
