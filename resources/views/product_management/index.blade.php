<x-layout>
    <div class="main-panel">
        <div class="content">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h2 class="title">Add Product</h2>
                        </div>
                        <div class="card-body">
                            <form>
                                <h5 class="title">SR Information</h5>
                                <div class="row">
                                    <div class="col-md-4 pr-md-1">
                                        <div class="form-group">
                                            <label>SR Name</label>
                                            <input type="text" class="form-control" placeholder="SR Name" name="sr_name" value="">
                                        </div>
                                    </div>
                                    <div class="col-md-4 px-md-1">
                                        <div class="form-group">
                                            <label>Company Name</label>
                                            <input type="text" class="form-control" placeholder="Company Name" name="company_name"
                                                   value="">
                                        </div>
                                    </div>
                                    <div class="col-md-4 pl-md-1">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Phone Number</label>
                                            <input type="tel" class="form-control" placeholder="Phone Number" name="phone_number">
                                        </div>
                                    </div>
                                </div>

                                <h5 class="title">Category</h5>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group w-50">
                                            <label>Product Category</label>
                                            <input type="text" class="form-control" name="product_category" placeholder="Product Category" value="">
                                        </div>
                                    </div>
                                </div>

                                <h5 class="title">Product Information</h5>
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
                                            <input type="text" class="form-control" name="product_price" placeholder="Product Price" value="">
                                        </div>
                                    </div>
                                    <div class="col-md-4 pl-md-1">
                                        <div class="form-group">
                                            <label>Product Category</label>
                                            <select class="form-control">
                                                <option>Beverages</option>
                                                <option>Bakery</option>
                                                <option>Jarred Goods</option>
                                                <option>Dairy</option>
                                                <option>Baking Goods</option>
                                                <option>Frozen Foods</option>
                                                <option>Meat </option>
                                                <option>Produce</option>
                                                <option>Cleaners</option>
                                                <option>Paper Goods</option>
                                                <option>Personal Care</option>
                                                <option>Other</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </form>
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
                                    <img src="{{ asset('assets') }}/img/anime3.png" alt="..." >
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
        </div>
    </div>
</x-layout>

