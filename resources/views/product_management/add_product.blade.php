@extends('layouts.main')
@section('content')
    <x-sidebar data="product_management"/>

    <div class="main-panel">
        <div class="content">
            @if (Session::has('success'))
                <div class="alert alert-success notification-bar">{{ Session::get('success') }}</div>
            @endif
            <form method="POST" action="{{ route('product.add') }}">
                @csrf
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header button-header">
                                <h2 class="title">Add Product</h2>
                                <a href="{{ route('product-management') }}">
                                    <input type="button" value="Back" class="btn btn-fill btn-primary">
                                </a>
                            </div>
                            <div class="card-body">
                                <h5 class="title">SR Information</h5>
                                <div class="row">
                                    <div class="col-md-4 pr-md-1">
                                        <div class="form-group">
                                            <label>SR Name</label>
                                            <input type="text" class="form-control" placeholder="SR Name" name="sr_name"
                                                   value="">
                                        </div>
                                    </div>
                                    <div class="col-md-4 px-md-1">
                                        <div class="form-group">
                                            <label>Company Name</label>
                                            <input type="text" class="form-control" placeholder="Company Name"
                                                   name="sr_company"
                                                   value="">
                                        </div>
                                    </div>
                                    <div class="col-md-4 pl-md-1">
                                        <div class="form-group">
                                            <label>Phone Number</label>
                                            <input type="tel" class="form-control" placeholder="Phone Number"
                                                   name="sr_phone">
                                        </div>
                                    </div>
                                </div>

                                <h5 class="title mt-4" id="test">Product Information</h5>
                                <div class="row">
                                    <div class="col-md-4 pr-md-1">
                                        <div class="form-group">
                                            <label>Product Name</label>
                                            <input type="text" class="form-control" placeholder="Product Name"
                                                   name="product_name" value="">
                                        </div>
                                    </div>
                                    <div class="col-md-4 px-md-1">
                                        <div class="form-group">
                                            <label>Product Price</label>
                                            <input type="text" class="form-control" name="price"
                                                   placeholder="Product Price" value="">
                                        </div>
                                    </div>
                                    <div class="col-md-4 px-md-1">
                                        <div class="form-group">
                                            <label>Product Quantity</label>
                                            <input type="text" class="form-control" name="quantity"
                                                   placeholder="Product Quantity" value="">
                                        </div>
                                    </div>
                                    <div class="col-md-4 pr-md-1">
                                        <div class="form-group">
                                            <label>Product Category</label>
                                            <select class="form-control" id="select_product">
                                                <option class="option" value="beverages">Beverages</option>
                                                <option class="option" value="bakery">Bakery</option>
                                                <option class="option" value="jarred">Jarred Goods</option>
                                                <option class="option" value="dairy">Dairy</option>
                                                <option class="option" value="baking">Baking Goods</option>
                                                <option class="option" value="frozen">Frozen Foods</option>
                                                <option class="option" value="meat">Meat</option>
                                                <option class="option" value="produce">Produce</option>
                                                <option class="option" value="cleaners">Cleaners</option>
                                                <option class="option" value="paper_goods">Paper Goods</option>
                                                <option class="option" value="personal_care">Personal Care</option>
                                                <option class="option" value="others">Others</option>
                                            </select>
                                            <input type="hidden" name="category" id="product_category">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-fill btn-primary">Save</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-user">
                            <div class="card-body">
                                <p class="card-text">
                                <div class="author">
                                    <div class="block block-one"></div>
                                    <div class="block block-two"></div>
                                    <div class="block block-three"></div>
                                    <div class="block block-four"></div>
                                    <a href="javascript:void(0)">
                                        <img src="{{ asset('assets') }}/img/anime3.png" alt="...">
                                        <h4 class="title" style="margin-top: 1rem">Rice</h4>
                                    </a>
                                    <p class="description">
                                        Romoniyo chal
                                    </p>
                                </div>
                                </p>

                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>


<script>
    $(() => {
        $('#select_product').on('change', (e) => $('#product_category').val(e.currentTarget.value))
    })
</script>

@endsection

