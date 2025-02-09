<!-- Modal -->
<div class="modal fade" id="editProduct" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
     aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Product</h1>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>SR Name</label>
                    <input type="text"
                           class="form-control"
                           placeholder="SR Name"
                           id="sr_name"
                           name="sr_name">
                </div>
                <span class="sr_name_error error"></span>

                <div class="form-group">
                    <label>Company Name</label>
                    <input type="text"
                           class="form-control"
                           placeholder="Company Name"
                           id="sr_company"
                           name="sr_company">
                </div>
                <span class="sr_company_error error"></span>

                <div class="form-group">
                    <label>Phone Number</label>
                    <input type="tel"
                           class="form-control"
                           placeholder="Phone Number"
                           id="sr_phone"
                           name="sr_phone">
                </div>
                <span class="sr_phone_error error"></span>

                <div class="form-group">
                    <label>Product Name</label>
                    <input type="text"
                           class="form-control"
                           placeholder="Product Name"
                           name="product_name"
                           id="product_name">
                </div>
                <span class="product_name_error error"></span>

                <div class="form-group">
                    <label>Product Price</label>
                    <input type="text"
                           class="form-control price"
                           name="price"
                           placeholder="Product Price">
                </div>
                <span class="price_error error"></span>

                <div class="form-group">
                    <label>Product Quantity</label>
                    <input type="text"
                           class="form-control quantity"
                           name="quantity"
                           placeholder="Product Quantity">
                </div>
                <span class="quantity_error error"></span>

                <div class="form-group">
                    <label>Total Price</label>
                    <input type="text"
                           class="form-control total"
                           name="total"
                           placeholder="Total Price" readonly>
                </div>
                <span class="total_price_error error"></span>

                <div class="form-group">
                    <label>Product Category</label>
                    <select class="form-control" id="select_product" required>
                        @foreach($product_categories as $category => $v)
                            <option class="option" id="{{$v}}" value="{{ $v }}">{{ $category }}</option>
                        @endforeach
                    </select>
                    <input type="hidden" name="category" id="product_category">
                    <input type="hidden" name="product_id" id="product_id" value="{{ $product->id ?? '' }}">
                </div>
                <span class="select_product_error error"></span>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="save_changes">Save</button>
            </div>
        </div>
    </div>
</div>
