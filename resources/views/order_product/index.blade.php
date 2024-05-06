@extends('layouts.main')
@section('content')
    <x-sidebar data="order_product"/>

    <div class="main-panel">
        <div class="content">
            <x-notification/>

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
                                                <select id="choices-multiple-remove-button"
                                                        name="selected_products[]"
                                                        placeholder="Select Products"
                                                        multiple>
                                                    @foreach($products as $product)
                                                        <option
                                                            value="{{ $product }}">
                                                            {{ $product->product_name}}
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
                                    <tbody>
                                    <tr>
                                        <td class="col-md-1 pr-md-1 text-center ">
                                            <span class="mx-2 icons delete_product_icon"
                                                  id="delete_product"
                                                  data-product_id=""
                                                  data-bs-toggle="modal"
                                                  data-bs-target="#confirmModal">
                                                  <i class="fa-solid fa-trash"></i>
                                            </span>
                                        </td>
                                        <td class="col-md-2 pr-md-1">
                                            <input type="text" class="form-control"
                                                   placeholder="Product Name"
                                                   name="product_name" id="product_name"
                                                   value="{{ old('product_name') }}">
                                        </td>
                                        <td class="col-md-2 pr-md-1">
                                            <input type="text" class="form-control"
                                                   placeholder="Product Name"
                                                   name="product_name" id="product_name"
                                                   value="{{ old('product_name') }}">
                                        </td>
                                        <td class="col-md-2 pr-md-1">
                                            <input type="text" class="form-control"
                                                   placeholder="Product Name"
                                                   name="product_name" id="product_name"
                                                   value="{{ old('product_name') }}">
                                        </td>
                                        <td class="col-md-2 pr-md-1">
                                            <input type="text" class="form-control"
                                                   placeholder="Product Name"
                                                   name="product_name" id="product_name"
                                                   value="{{ old('product_name') }}">
                                        </td>
                                        <td class="col-md-2 pr-md-1">
                                            <input type="text" class="form-control"
                                                   placeholder="Product Name"
                                                   name="product_name" id="product_name"
                                                   value="{{ old('product_name') }}">
                                        </td>
                                    </tr>
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
        $(document).ready(function () {

            var multipleCancelButton = new Choices('#choices-multiple-remove-button', {
                removeItemButton: true,
                maxItemCount: 100,
                searchResultLimit: 50,
                renderChoiceLimit: 5
            });

            $("#choices-multiple-remove-button").change(() => {
            selected = $("#choices-multiple-remove-button").find('selected')
            console.log(selected)
            {{--    $.ajax({--}}
            {{--    url: "{{ route('order-product') }}",--}}
            {{--    data: {--}}
            {{--        product_id : $("#choices-multiple-remove-button").val()--}}
            {{--    },--}}
            {{--    success: function (result) {--}}
            {{--    }--}}
            {{--});--}}
            })


        });
    </script>

@endsection

