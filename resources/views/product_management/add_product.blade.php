@extends('layouts.main')
@section('content')
    <x-sidebar data="product_management"/>

    <div class="main-panel">
        <div class="content">
            <x-notification />
            <form method="POST" action="{{ route('product.add') }}" enctype="multipart/form-data">
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
                                                   value="{{ old('sr_name') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4 px-md-1">
                                        <div class="form-group">
                                            <label>Company Name</label>
                                            <input type="text" class="form-control" placeholder="Company Name"
                                                   name="sr_company"
                                                   value="{{ old('sr_company') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4 pl-md-1">
                                        <div class="form-group">
                                            <label>Phone Number</label>
                                            <input type="tel" class="form-control" placeholder="Phone Number"
                                                   name="sr_phone" value="{{ old('sr_phone') }}">
                                        </div>
                                    </div>
                                </div>

                                <h5 class="title mt-4" id="test">Product Information</h5>
                                <div class="row">
                                    <div class="col-md-4 pr-md-1">
                                        <div class="form-group">
                                            <label>Product Name</label>
                                            <input type="text" class="form-control" placeholder="Product Name"
                                                   name="product_name" id="product_name" value="{{ old('product_name') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4 px-md-1">
                                        <div class="form-group">
                                            <label>Product Price</label>
                                            <input type="text" class="form-control" name="price" id="product_price"
                                                   placeholder="Product Price" value="{{ old('price') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4 px-md-1">
                                        <div class="form-group">
                                            <label>Product Quantity</label>
                                            <input type="text" class="form-control" name="quantity"
                                                   placeholder="Product Quantity" value="{{ old('quantity') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4 pr-md-1">
                                        <div class="form-group">
                                            <label>Total Price</label>
                                            <input type="text" class="form-control" id="total_price"
                                                   placeholder="Total Price" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-4 pr-md-1">
                                        <div class="form-group">
                                            <label>Product Category</label>
                                            <select class="form-control" id="select_product" required>
                                                <option selected disabled>choose</option>
                                                @foreach($product_categories as $category => $v)
                                                    <option class="option" value="{{ $v  }}">{{$category}}</option>
                                                @endforeach
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
                                        <img src="{{ asset('assets') }}/img/upload2.png" id="upload_img" style="width: 150px">
                                        <input type="file" name="photo" id="product_img" style="display: none;" accept="image/x-png,image/gif,image/jpeg,image/jpg" />
                                        <h4 class="title" style="margin-top: 1rem" id="product_title"></h4>
                                        <h4 class="title" style="margin-top: 1rem" id="price"></h4>
                                    </a>
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
        $("#upload_img").click(() => $("#product_img").click() )
        $('#product_name').on('keyup', (e) => $("#product_title").text(e.currentTarget.value) )
        $('#product_price').on('keyup', (e) => $("#price").text(e.currentTarget.value + ' tk') )

        $("#product_img").change((e) => {
            e.preventDefault();
            let img = $("#product_img").prop("files");
            if (img.length > 0) {
                $("#upload_img").attr('src', URL.createObjectURL(img[0]));
            }
        })

    })
</script>

@endsection

