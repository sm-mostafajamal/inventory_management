@extends('layouts.main')
@section('content')
    <x-sidebar data="product_management"/>

    <div class="main-panel">
        <div class="content">
            <x-notification/>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
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
                                    <th scope="col" class="text-center">Actions</th>
                                    <th scope="col" class="text-center">Image</th>
                                    <th scope="col" class="text-center">Product Name</th>
                                    <th scope="col" class="text-center">Per Product Price</th>
                                    <th scope="col" class="text-center">Quantity</th>
                                    <th scope="col" class="text-center">Total Price</th>
                                    <th scope="col" class="text-center">Category</th>
                                    <th scope="col" class="text-center">SR Name</th>
                                    <th scope="col" class="text-center">SR Number</th>
                                    <th scope="col" class="text-center">Company Name</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($products as $product)
                                    <tr>
                                        <td class="text-center">
                                            <span class="mx-2 icons edit_product_icon"
                                                  id={{ "edit_product". $product->id }}
                                                  data-product="{{ $product }}"
                                                  data-bs-toggle="modal"
                                                  data-bs-target="#editProduct">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </span>
                                            <span class="mx-2 icons delete_product_icon"
                                                  id={{"delete_product". $product->id }}
                                                  data-product_id="{{ $product->id }}"
                                                  data-bs-toggle="modal"
                                                  data-bs-target="#confirmModal"
                                            >
                                                  <i class="fa-solid fa-trash"></i>
                                            </span>
                                        </td>
                                        <td class="text-center">
                                            <img src="{{ !empty($product->image) ? 'assets/img/' . $product->image : 'assets/img/no_img.png' }}"
                                                 style="width: 100px"/>
                                        </td>
                                        <td class="text-center">{{ $product->product_name }}</td>
                                        <td class="text-center">{{ $product->price }}</td>
                                        <td class="text-center">{{ $product->quantity }}</td>
                                        <td class="text-center">{{ $product->total }}</td>
                                        <td class="text-center">{{ $product->category }}</td>
                                        <td class="text-center">{{ $product->sr_name }}</td>
                                        <td class="text-center">{{ $product->sr_phone }}</td>
                                        <td class="text-center">{{ $product->sr_company }}</td>
                                    </tr>
                                @empty
                                    <tr class="text-center">
                                        <td colspan="10">No data found!!!</td>
                                    </tr>
                                @endforelse

                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
            <div class="paginate col-12 d-flex justify-content-between">
                <div class="pagination_total">Total Available Products: {{ $products->total() }}</div>
                <div class="">{{ $products->links() }}</div>
            </div>
        </div>
    </div>

    @include('modals.confirmation_modal')
    @include('modals.edit_product')

    <script>
        $(() => {

            $('.delete_product_icon').click((e) => {
                $('#action').val('delete')
                $('#confirm_btn').click(() => {
                    $('#product_id').val($(e.currentTarget).data('product_id'))
                    $('#product_form').submit()
                })

            })

            $('.quantity, .price').on('keyup', (e) => {
                product_price = $(".price").val();
                product_quantity = $(".quantity").val();
                $('.total').val(product_price * product_quantity);
                $('.total_price').val(product_price * product_quantity);
            })

            $(".edit_product_icon").click(function (e) {
                product = $(e.currentTarget).data('product');

                $('#product_id').val(product.id);
                $('#sr_name').val(product.sr_name);
                $('#sr_company').val(product.sr_company)
                $('#sr_phone').val(product.sr_phone)
                $('#product_name').val(product.product_name)
                $('.price').val(product.price)
                $('.quantity').val(product.quantity)
                $('.total').val(product.total)
                $('#' + product.category).val(product.category).prop('selected', true)


                $("#save_changes").click(function () {
                    data = {
                        "_token": "{{ csrf_token() }}",
                        product_id: product.id,
                        sr_name: $('#sr_name').val(),
                        sr_company: $('#sr_company').val(),
                        sr_phone: $('#sr_phone').val(),
                        product_name: $('#product_name').val(),
                        price: $('.price').val(),
                        quantity: $('.quantity').val(),
                        total: $('.total').val(),
                        category: $('#select_product').find(":selected").val()
                    }
                    $.ajax({
                        url: "{{ route('product-management') }}",
                        type: "POST",
                        data: data,
                        success: function (result) {
                            if(result === 'success') {
                                  window.location.href = "{{ route('product-management') }}"
                            }
                        },
                        error: function (errors) {
                            errors = JSON.parse(JSON.stringify(errors.responseJSON))
                            $.each(errors,(id, message) => {
                                $("."+id+"_error").text(message)
                                $("#"+id).addClass('is-invalid')
                            })
                        }
                    });
                });
            });

        })


    </script>
@endsection
